<?php

namespace App\Traits;

use App\Models\Image;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

trait ImageTrait {

 public function uploadImage(Request $request, $inputname, $foldername, $imageable_id, $image_type, $image_model){
  if($request->hasFile($inputname)){
   if(!$request->file($inputname)->isValid()){
    Session()->flash('danger', 'File not found');
    return redirect()->back()->withInput();
   }
   $photo = $request->file($inputname);
   $image_name = time().'.' . $photo->extension();
   $image_path = 'uploads/'. $foldername;

   // insert image
   $Image = new Image();
   $Image->image_name = $image_name;
   $Image->image_path = $image_path;
   $Image->imageable_id = $imageable_id;
   $Image->image_type = $image_type;
   $Image->image_model = $image_model;
   $Image->save();
   if($Image){
    return $request->file($inputname)->move(public_path($image_path), $image_name);
   }else{
    Session()->flash('danger', 'Something went wrong');
    return redirect()->back()->withInput();
   }
  }
 }
 
 public function uploadImages($varForeach, $key, $foldername, $imageable_id, $image_type, $image_model){
  $image_name = $key.time().'.' . $varForeach->extension();
  $image_path = 'uploads/'. $foldername;

  // insert image
  $Image = new Image();
  $Image->image_name = $image_name;
  $Image->image_path = $image_path;
  $Image->imageable_id = $imageable_id;
  $Image->image_type = $image_type;
  $Image->image_model = $image_model;
  $Image->save();
  if($Image){
   return $varForeach->move(public_path($image_path), $image_name);
  }else{
   Session()->flash('danger', 'Something went wrong');
   return redirect()->back()->withInput();
  }
 }

public function delete_image_imageable($imageable_id, $image_model){
 $image = Image::where('imageable_id', $imageable_id)->where('image_model', $image_model)->first();
 if($image){
  if(File::exists($image->image_path."/".$image->image_name)){
   File::delete($image->image_path."/".$image->image_name);
  }
  $image->delete();
 }else{
  return redirect()->back();
 }
}

public function delete_image_id($id){
 $image = Image::where('id', $id)->first();
 if($image){
  if(File::exists($image->image_path."/".$image->image_name)){
   File::delete($image->image_path."/".$image->image_name);
  }
  $image->delete();
 }else{
  return redirect()->back();
 }
}
}