<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\PageTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller{

    public function show(string $slug){
        $page = Page::where('slug', $slug)->first();
        return view("pages.backend.pages.show", compact('page'));
    }

    public function update(Request $request, int $id){
        $page = Page::find($id);
        if($page){
            $request->validate([
                'title' => 'required|string|max:500',
                'description' => 'required|string',
                'meta_title' => 'required|string|max:500',
                'meta_keywords' => 'required|string|max:500',
                'meta_description' => 'required|string|max:500',
            ]);
            DB::beginTransaction();
            try {
                $locale = $request->input('locale');
                $page_translation = PageTranslation::where('page_id', $id)->where('locale', $locale)->first();
                if($page_translation){
                    $page_translation->title = $request->title;
                    $page_translation->description = $request->description;
                    $page_translation->meta_title = $request->meta_title;
                    $page_translation->meta_keywords = $request->meta_keywords;
                    $page_translation->meta_description = $request->meta_description;
                    $page_translation->save();
                    DB::commit();
                    return redirect()->back()->with('success', __('messages.page_data_saved_successfully'));
                }else{
                    return redirect()->back()->with('danger', __('messages.page_not_found'));
                }
            } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }
        }else{
            return redirect()->back()->with('danger', __('messages.page_not_found'));
        }
    }


}