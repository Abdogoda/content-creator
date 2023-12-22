@extends('layouts.backend.backendlayout')
@section('title', 'Dashboard | Page Information')
@section('content')

<div class="contianer px-4">
  <div class="card shadow-lg my-5">
   <div class="card-header">
    <h1 class="">{{$page->title}}</h1>
   </div>
    <form action="{{\LaravelLocalization::localizeURL('/admin/pages/'. $page->id)}}" method="post" enctype="multipart/form-data">
     @csrf
     @method('put')
     <input type="hidden" name="locale" value="{{LaravelLocalization::getCurrentLocale()}}">
     <div class="card-body">
      <div class="form-group mb-3">
       <label for="title">{{__('pages.meta_title')}} <small class="text-danger pl-2">*</small></label>
       <input type="text" name="title" id="title" value="{{$page->title}}" class="form-control">
       @error('title')
        <small class="text-danger">{{ $message }}</small> 
       @enderror
      </div>
      <div class="form-group mb-3">
        <label for="description">{{__('pages.page_description')}} <small class="text-danger pl-2">*</small></label>
        <textarea name="description" id="description" value="{{$page->description}}" class="form-control">{{$page->description}}</textarea>
        @error('description')
         <small class="text-danger">{{ $message }}</small> 
        @enderror
       </div>
      <div class="form-group mb-3">
       <label for="meta_title">{{__('pages.meta_title')}} <small class="text-danger pl-2">*</small></label>
       <input type="text" name="meta_title" id="meta_title" value="{{$page->meta_title}}" class="form-control">
       @error('meta_title')
        <small class="text-danger">{{ $message }}</small> 
       @enderror
      </div>
      <div class="form-group mb-3">
       <label for="meta_keywords">{{__('pages.meta_keywords')}} <small class="text-danger pl-2">*</small></label>
       <input type="text" name="meta_keywords" id="meta_keywords" value="{{$page->meta_keywords}}" class="form-control">
       @error('meta_keywords')
        <small class="text-danger">{{ $message }}</small> 
       @enderror
      </div>
      <div class="form-group mb-3">
       <label for="meta_description">{{__('pages.meta_description')}} <small class="text-danger pl-2">*</small></label>
       <textarea name="meta_description" id="meta_description" value="{{$page->meta_description}}" class="form-control">{{$page->meta_description}}</textarea>
       @error('meta_description')
        <small class="text-danger">{{ $message }}</small> 
       @enderror
      </div>
      <div class="form-gorup mb-3">
       <button type="submit" class="btn btn-primary">{{__('main.save_date')}}</button>
      </div>
     </div>
    </form>
  </div>
</div>
@endsection