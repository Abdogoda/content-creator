<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;

class PrevideoController extends Controller{
    use ImageTrait;
    public function index(){
        $video = Image::where('imageable_id', '1')->where('image_model', 'PreVideo')->first();
        return view('pages.backend.prevideo.index',compact('video'));
    }

    public function update(Request $request){
        $request->validate([
            'video' => 'required|mimes:mp4,ogx,oga,ogv,ogg'
        ]);
        $video = Image::where('imageable_id', '1')->where('image_model', 'PreVideo')->first();
        if($video){
            $this->delete_image_imageable('1', 'PreVideo');
            $video->delete();
        }
        $this->uploadImage($request, 'video', 'prevideo', '1', null, 'PreVideo');
        return redirect()->back()->with('success', __('messages.video_saved_successfully'));
    }
}