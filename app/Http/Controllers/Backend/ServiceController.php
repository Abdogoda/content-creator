<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Paragraph;
use App\Models\ParagraphTranslation;
use App\Models\Service;
use App\Models\ServiceTranslation;
use App\Models\ServiceWork;
use App\Models\ServiceWorkTranslation;
use App\Models\TemporaryFile;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ServiceController extends Controller{
    use ImageTrait;
    
    public function index(){
        $services = Service::all();
        return view("pages.backend.service.index",compact("services"));
    }

    public function show(string $slug){
        $service = Service::where("slug",$slug)->first();
        if($service){
            return view("pages.backend.service.show",compact("service"));
        }else{
            return redirect()->back()->with("danger", __('messages.service_not_found'));
        }
    }

    public function create(){
        return view("pages.backend.service.add");
    }

    public function store(Request $request){
        $request->validate([
            'name_en' => 'required|unique:service_translations,name|string|max:100',
            'name_ar' => 'required|unique:service_translations,name|string|max:100',
            'slug' => 'required|unique:services,slug|string|max:100',
            'description_en' => 'required|string|max:800',
            'description_ar' => 'required|string|max:800',
            'meta_title_en' => 'required|string|max:100',
            'meta_title_ar' => 'required|string|max:100',
            'meta_keywords_en' => 'required|string|max:100',
            'meta_keywords_ar' => 'required|string|max:100',
            'meta_description_en' => 'nullable|string|max:800',
            'meta_description_ar' => 'nullable|string|max:800',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        // return $request;
        DB::beginTransaction();
        try {
            $service = new Service();
            $service->slug = str_replace(' ', '-', $request->slug);
            if($request->hasFile('icon')){
                $icon = $request->file('icon');
                $icon_name = time().'.' . $icon->extension();
                $icon_path = 'uploads/service/icon';
                $request->file('icon')->move(public_path($icon_path), $icon_name);
                $service->icon = $icon_path.'/'.$icon_name;
            }
            $service->save();
            
            $service_translation = new ServiceTranslation();
            $service_translation->service_id = $service->id;
            $service_translation->locale = 'en';
            $service_translation->name = $request->input('name_en');
            $service_translation->description = $request->input('description_en');
            $service_translation->meta_title = $request->input('meta_title_en');
            $service_translation->meta_keywords = $request->input('meta_keywords_en');
            $service_translation->meta_description = $request->input('meta_description_en');
            $service_translation->save();
            
            $service_translation = new ServiceTranslation();
            $service_translation->service_id = $service->id;
            $service_translation->locale = 'ar';
            $service_translation->name = $request->input('name_ar');
            $service_translation->description = $request->input('description_ar');
            $service_translation->meta_title = $request->input('meta_title_ar');
            $service_translation->meta_keywords = $request->input('meta_keywords_ar');
            $service_translation->meta_description = $request->input('meta_description_ar');
            $service_translation->save();

            if($request->hasFile('image')){
                $this->uploadImage($request, 'image', 'service', $service->id, null, 'Service');
            }
            
            DB::commit();
            return redirect('/admin/services/'.$service->slug)->with('success', __('messages.service_created_successfully'));
        }catch(\Exception $e){
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
          }
    }

    public function update(Request $request, int $id){
        $service = Service::find($id);
        if($service){
            $request->validate([
                'name' => ['required', 'string', 'max:100'],
                'description' => 'required|string|max:800',
                'meta_title' => 'required|string|max:100',
                'meta_keywords' => 'required|string|max:100',
                'meta_description' => 'nullable|string|max:800',
                'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            ]);
            DB::beginTransaction();
            try {
                if($request->hasFile('icon')){
                    if(File::exists($service->icon)){
                        File::delete($service->icon);
                    }
                    $icon = $request->file('icon');
                    $icon_name = time().'.' . $icon->extension();
                    $icon_path = 'uploads/service/icon';
                    $request->file('icon')->move(public_path($icon_path), $icon_name);
                    $service->icon = $icon_path.'/'.$icon_name;
                }
                $service->save();
                
                $service_translation = ServiceTranslation::where('service_id',$service->id)->where("locale", $request->locale)->first();
                $service_translation->name = $request->input("name");
                $service_translation->description = $request->input("description");
                $service_translation->meta_title = $request->input("meta_title");
                $service_translation->meta_keywords = $request->input("meta_keywords");
                if($request->meta_description){
                    $service_translation->meta_description = $request->meta_description;
                }
                $service_translation->save();

                if($request->hasFile('image')){
                    $this->delete_image_imageable($service->id, 'Service');
                    $this->uploadImage($request, 'image', 'service', $service->id, null, 'Service');
                }
    
                DB::commit();
                return redirect()->back()->with('success', __('messages.service_updated_successfully'));
            }catch(\Exception $e){
                DB::rollback();
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
              }
        }else{
            return redirect()->back()->with("danger", __('messages.service_not_found'));
        }
    }

    public function delete(string $slug){
        $service = Service::where('slug',$slug)->first();
        if($service){
            Paragraph::where('paragraphable_id', $service->id)->where('paragraph_model', 'Service')->delete();
            $this->delete_image_imageable($service->id, 'Service');
            foreach ($service->works as $work) {
                if(File::exists('storage/'.$work->attachment)){
                    File::deleteDirectory(dirname('storage/'.$work->attachment));
                }
                if($work->image){
                    $this->delete_image_imageable($work->id, 'ServiceWork');
                }
            }
            $service->delete();
            return redirect()->back()->with("success", __('messages.service_deleted_successfully'));
        }else{
            return redirect()->back()->with("danger", __('messages.service_not_found'));
        }
    }
    
    public function delete_image(int $id){
        $this->delete_image_id($id);
        return redirect()->back()->with("success", __('messages.image_deleted_successfully'));
    }


    // ---------------------------------------
    // ------- Service Features Functions --------
    // ---------------------------------------


    public function addFeature(Request $request){
        $request->validate([
            'feature_en' => 'required|string|max:500',
            'feature_ar' => 'required|string|max:500',
        ]);
        $service_id = $request->input('id');
        $service = Service::find($service_id);
        if($service){
            DB::beginTransaction();
            try{
                $feature = new Paragraph();
                $feature->paragraphable_id = $service->id;
                $feature->paragraph_model = 'Service';
                $feature->save();

                $feature_trans = new ParagraphTranslation();
                $feature_trans->paragraph_id = $feature->id;
                $feature_trans->locale = "en";
                $feature_trans->text = $request->input('feature_en');
                $feature_trans->save();
                $feature_trans = new ParagraphTranslation();
                $feature_trans->paragraph_id = $feature->id;
                $feature_trans->locale = "ar";
                $feature_trans->text = $request->input('feature_ar');
                $feature_trans->save();

                DB::commit();
                return redirect()->back()->with('success', __('messages.feature_created_successfully'));
            }catch(\Exception $e){
                DB::rollback();
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }
        }else{
            return redirect()->back()->with("danger", __('messages.service_not_found'));
        }
    }

    public function updateFeature(Request $request){
        $request->validate([
            'feature_en' => 'required|string|max:500',
            'feature_ar' => 'required|string|max:500',
        ]);
        $feature_id = $request->input('id');
        $feature = Paragraph::find($feature_id);
        if($feature){
            DB::beginTransaction();
            try{
                $feature_translation = ParagraphTranslation::where('paragraph_id',$feature_id)->where('locale','en')->first();
                $feature_translation->text =  $request->input('feature_en');
                $feature_translation->save();
                $feature_translation = ParagraphTranslation::where('paragraph_id',$feature_id)->where('locale','ar')->first();
                $feature_translation->text =  $request->input('feature_ar');
                $feature_translation->save();

                DB::commit();
                return redirect()->back()->with('success', __('messages.feature_updated_successfully'));
            }catch(\Exception $e){
                DB::rollback();
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }
        }else{
            return redirect()->back()->with("danger", __('messages.feature_not_found'));
        }
    }

    public function deleteFeature(int $id){
        $feature = Paragraph::find($id);
        if($feature){
            $feature->delete();
            return redirect()->back()->with('success', __('messages.feature_deleted_successfully'));
        }else{
            return redirect()->back()->with("danger", __('messages.feature_not_found'));
        }
    }


    // ---------------------------------------
    // ------- Service Work Functions --------
    // ---------------------------------------

    // add work
    public function addWork(Request $request){
        $request->validate([
            'name_en' => 'required|string|max:100',
            'name_ar' => 'required|string|max:100',
            'id' => 'required|exists:services,id',
            'image_style' => 'required|string|in:small,wide,large',
            'attachment_type' => 'required|string|in:image,video',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        DB::beginTransaction();
        try {
            $work = new ServiceWork();
            $work->service_id = $request->id;
            $work->attachment_type = $request->attachment_type;
            $work->image_style = $request->image_style;

            $temporaryFile = TemporaryFile::where('folder', $request->video)->first();
            if($temporaryFile){
                Storage::move('uploads/work/tmp/'.$temporaryFile->folder.'/'.$temporaryFile->filename, 'public/uploads/work/'.$temporaryFile->folder.'/'.$temporaryFile->filename);
                $work->attachment = "uploads/work/".$temporaryFile->folder.'/'.$temporaryFile->filename;
                Storage::deleteDirectory('uploads/work/tmp/'.$temporaryFile->folder);
                $temporaryFile->delete();
            }
            
            if($request->hasFile('image')){
                $image = $request->file('image');
                $imagename = $image->getClientOriginalName();
                $folder = uniqid().'-'.now()->timestamp;
                
                $image->storeAs('uploads/work/tmp/'.$folder, $imagename);
                Storage::move('uploads/work/tmp/'.$folder.'/'.$imagename, 'public/uploads/work/'.$folder.'/'.$imagename);

                $work->attachment = "uploads/work/".$folder.'/'.$imagename;
                Storage::deleteDirectory('uploads/work/tmp/'.$folder);
            }

            $work->save();

            $work_service_translation = new ServiceWorkTranslation();
            $work_service_translation->service_work_id = $work->id;
            $work_service_translation->locale = 'en';
            $work_service_translation->name = $request->input('name_en');
            $work_service_translation->save();
            $work_service_translation = new ServiceWorkTranslation();
            $work_service_translation->service_work_id = $work->id;
            $work_service_translation->locale = 'ar';
            $work_service_translation->name = $request->input('name_ar');
            $work_service_translation->save();

            if($request->hasFile('thumbnail')){
                $this->uploadImage($request, 'thumbnail', 'work/thumbnail', $work->id, null, 'ServiceWork');
            }

            DB::commit();
            return redirect()->back()->with('success', __('messages.work_created_successfully'));
        }catch(\Exception $e){
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
          }
    }

    // temporary upload image/video
    public function upload(Request $request){
        $request->validate([
            'video' => 'required|mimes:mp4,ogx,oga,ogv,ogg,webm,jpeg,png,jpg,gif,svg',
        ]);
        if($request->hasFile('video')){
            try {
                $file = $request->file('video');
                $filename = time().'.' . $file->extension();
                $folder = uniqid().'-'.now()->timestamp;
                
                $temporaryFile = new TemporaryFile();
                $temporaryFile->folder = $folder;
                $temporaryFile->filename = $filename;
                $temporaryFile->save();
                
                $file->storeAs('uploads/work/tmp/'.$folder, $filename);
                return "$folder";
            } catch (\Exception $e) {
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }
        }
        return redirect()->back()->withErrors(['error' => __('messages.wait_until_upload_finished')]);
    }

    // update work
    public function updateWork(Request $request, int $id){
        $work = ServiceWork::find($id);
        if($work){
            $request->validate([
                'name_en' => 'required|string|max:100',
                'name_ar' => 'required|string|max:100',
                'id' => 'required|exists:services,id',
                'image_style' => 'required|string|in:small,wide,large',
            ]);
            DB::beginTransaction();
            try {
                $work->service_id = $request->id;
                $work->image_style = $request->image_style;
                $work->save();

                $work_service_translation = ServiceWorkTranslation::where('service_work_id',$work->id)->where('locale','en')->first();
                $work_service_translation->name =  $request->input('name_en');
                $work_service_translation->save();
                $work_service_translation = ServiceWorkTranslation::where('service_work_id',$work->id)->where('locale','ar')->first();
                $work_service_translation->name =  $request->input('name_ar');
                $work_service_translation->save();

                DB::commit();
                return redirect()->back()->with('success', __('messages.work_updated_successfully'));
            }catch(\Exception $e){
                DB::rollback();
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
              }
        }else{
            return redirect()->back()->with('danger', __('messages.work_not_found'));
        }
    }

    // work delete
    public function deleteWork(int $id){
        $work = ServiceWork::find($id);
        if($work){
            if(File::exists('storage/'.$work->attachment)){
                File::deleteDirectory(dirname('storage/'.$work->attachment));
            }
            if($work->image){
                $this->delete_image_imageable($work->id, 'ServiceWork');
            }
            $work->delete();
            return redirect()->back()->with("success", __('messages.work_deleted_successfully'));
        }else{
            return redirect()->back()->with("danger",__('messages.work_not_found'));
        }
    }
}