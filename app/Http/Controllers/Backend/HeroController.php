<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use App\Models\HeroTranslation;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HeroController extends Controller{
    use ImageTrait;
    public function index(){
        $heros = Hero::all()->take(5);
        return view("pages.backend.hero.index", compact('heros'));
    }

    public function create(){
        return view("pages.backend.hero.add");
    }

    public function store(Request $request){
        $request->validate([
            'title_en' => 'required|string|min:6|max:100',
            'title_ar' => 'required|string|min:6|max:100',
            'subtitle_en' => 'nullable|max:100',
            'subtitle_ar' => 'nullable|max:100',
            'image' => 'required|image|mimes:png,jpg,jpeg'
        ]);
        DB::beginTransaction();
        try {
            $hero = new Hero();
            $hero->save();
            
            if($request->hasFile('image')){
                $this->uploadImage($request, 'image', 'hero', $hero->id, null, 'Hero');
            }
            
            $hero_translation = new HeroTranslation();
            $hero_translation->hero_id = $hero->id;
            $hero_translation->locale = "en";
            $hero_translation->title = $request->title_en;
            $hero_translation->subtitle = $request->subtitle_en;
            $hero_translation->save();
            $hero_translation = new HeroTranslation();
            $hero_translation->hero_id = $hero->id;
            $hero_translation->locale = "ar";
            $hero_translation->title = $request->title_ar;
            $hero_translation->subtitle = $request->subtitle_ar;
            $hero_translation->save();
            
            DB::commit();
            return redirect('/admin/heros')->with('success', __('messages.hero_created_successfully'));
        }catch(\Exception $e){
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show(string $id){
        $hero = Hero::find($id);
        return view("pages.backend.hero.edit", compact('hero'));
    }

    public function edit(string $id){
        $hero = Hero::find($id);
        if($hero){
            return view("pages.backend.hero.edit", compact('hero'));
        }else{
            return redirect()->back()->with('warning', __('messages.hero_not_found'));
        }
    }

    public function update(Request $request, string $id){
        $request->validate([
            'title' => 'required|string|min:6',
            'subtitle' => 'nullable',
            'image' => 'nullable|image|mimes:png,jpg,jpeg'
        ]);
        $hero = Hero::find($id);
        if($hero){
            DB::beginTransaction();
            try {
                $hero->title = $request->title;
                if($request->subtitle){
                    $hero->subtitle = $request->subtitle;
                }
                $hero->save();
                if($request->hasfile('image')){
                    $this->delete_image_imageable($hero->id, 'Hero');
                    $this->uploadImage($request, 'image', 'hero', $hero->id, null, 'Hero');
                }
                DB::commit();
                return redirect()->back()->with('success', __('messages.hero_updated_successfully'));
            }catch(\Exception $e){
                DB::rollback();
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }
        }else{
            return redirect()->back()->with('warning', __('messages.hero_not_found'));
        }
    }

    public function destroy(string $id){
        $hero = Hero::find($id);
        if($hero){
            $this->delete_image_imageable($hero->id, 'Hero');
            $hero->delete();
            return redirect()->back()->with('success', __('messages.hero_deleted_successfully'));
        }else{
            return redirect()->back()->with('warning', __('messages.hero_not_found'));
        }
    }
}