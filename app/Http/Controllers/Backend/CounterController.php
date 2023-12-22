<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Counter;
use App\Models\CounterTranslation;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CounterController extends Controller{
    use ImageTrait;
    public function index(){
        $counters = Counter::all();
        return view("pages.backend.counter.index", compact('counters'));
    }

    public function store(Request $request){
        $request->validate([
            'title_en' => 'required|string|min:3|max:100',
            'title_ar' => 'required|string|min:3|max:100',
            'value' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        DB::beginTransaction();
        try {
            $counter = new Counter();
            $counter->value = $request->value;
            $counter->save();
            
            if($request->has('image')){
                $this->uploadImage($request, "image", 'counter', $counter->id, null, 'Counter');
            }

            $counter_translation = new CounterTranslation();
            $counter_translation->counter_id = $counter->id;
            $counter_translation->locale = "en";
            $counter_translation->title = $request->title_en;
            $counter_translation->save();
            $counter_translation = new CounterTranslation();
            $counter_translation->counter_id = $counter->id;
            $counter_translation->locale = "ar";
            $counter_translation->title = $request->title_ar;
            $counter_translation->save();

            DB::commit();
            return redirect()->back()->with('success', __('messages.counter_created_successfully'));
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    
    public function update(Request $request, int $id){
        $request->validate([
            'title_en' => 'required|string|min:3|max:100',
            'title_ar' => 'required|string|min:3|max:100',
            'value' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        DB::beginTransaction();
        try {
            $counter = Counter::find($id);
            if($counter){
                $counter->value = $request->value;
                $counter->save();
                
                $counter_translation = CounterTranslation::where('counter_id', $counter->id)->where('locale', 'en')->first();
                $counter_translation->title = $request->title_en;
                $counter_translation->save();
                $counter_translation = CounterTranslation::where('counter_id', $counter->id)->where('locale', 'ar')->first();
                $counter_translation->title = $request->title_ar;
                $counter_translation->save();
                
                if($request->has('image')){
                    $this->delete_image_imageable($counter->id, 'Counter');
                    $this->uploadImage($request, "image", 'counter', $counter->id, null, 'Counter');
                }
    
                DB::commit();
                return redirect()->back()->with('success', __('messages.counter_updated_successfully'));
            }else{
                return redirect()->back()->with('danger', __('messages.counter_not_found'));
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    
    public function delete(int $id) {
        $counter = Counter::find($id);
        if($counter){
            $this->delete_image_imageable($counter->id, 'Counter');
            $counter->delete();
            return redirect()->back()->with('success', __('messages.counter_deleted_successfully'));
        }else{
            return redirect()->back()->with('warning', __('messages.counter_not_found'));
        }
    }
}