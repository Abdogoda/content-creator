@extends('layouts.backend.backendlayout')
@section('title', 'Dashboard | PreVideo')
@section('content')

<div class="contianer px-4">
  <div class="card shadow-lg my-5">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h1 class="">{{__('prevideo.prevideo_section')}}</h1>
    </div>
    <div class="card-body">
      <div class="row">
        <small class="text-muted mb-2">{{__('prevideo.prevideo_message')}}</small>
      </div>
      @isset($video)
      <div class="row">
        <video src="{{asset($video->image_path.'/'.$video->image_name)}}" autoplay="autoplay" controls width="500px" class="m-auto" style="max-width: 100%; max-height:500px"></video>
       </div>
       <hr>
       @endisset
     <div class="row">
      <form action="{{\LaravelLocalization::localizeURL('/admin/prevideo')}}" method="post" enctype="multipart/form-data">
       @csrf
       <div class="form-group mb-3">
        <label for="Video">{{__('prevideo.choose_a_video')}}</label>
        <input type="file" class="form-control" id="video" name="video">
        @error('video')
         <small class="text-danger">{{ $message }}</small> 
        @enderror
       </div>
       <button type="submit" class="btn btn-primary">@if ($video) {{__('prevideo.update_prevideo')}} @else {{__('prevideo.add_prevideo')}} @endif</button>
      </form>
     </div>
    </div>
   </div>
</div>
@endsection
