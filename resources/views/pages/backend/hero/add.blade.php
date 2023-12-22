@extends('layouts.backend.backendlayout')
@section('title', 'Dashboard | Add Hero')
@section('content')

<div class="contianer px-4">
  <div class="card shadow-lg my-5">
   <div class="card-header d-flex flex-wrap align-items-center justify-content-between">
    <h4>{{__('hero.create_new_hero')}}</h4>
    <div>
      <a href={{url('/admin/heros')}} class="btn btn-primary">{{__('hero.all_heros')}}</a>
      <a href={{url('/')}} class="btn btn-success">{{__('main.review')}}</a>
     </div>
   </div>
    <form action="{{\LaravelLocalization::localizeURL('/admin/heros')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
     <div class="row">
      <div class="col-md-6">
        <div class="form-group mb-3">
          <label for="title_en">{{__('hero.hero_title')}} <small class="text-danger pl-2">*</small> <small class="text-muted">({{__('main.en')}})</small></label>
          <input type="text" name="title_en" id="title_en" value="{{old('title_en')}}" class="form-control">
          @error('title_en')
           <small class="text-danger">{{ $message }}</small> 
          @enderror
         </div>
      </div>
      <div class="col-md-6">
        <div class="form-group mb-3">
          <label for="title_ar">{{__("hero.hero_title")}} <small class="text-danger pl-2">*</small> <small class="text-muted">({{__('main.ar')}})</small></label>
          <input type="text" name="title_ar" id="title_ar" value="{{old('title_ar')}}" class="form-control">
          @error('title_ar')
           <small class="text-danger">{{ $message }}</small> 
          @enderror
         </div>
      </div>
       <div class="col-md-6">
        <div class="form-group mb-3">
          <label for="subtitle_en">{{__('hero.hero_subtitle')}} <small class="text-danger pl-2">*</small> <small class="text-muted">({{__('main.en')}})</small></label>
          <input type="text" name="subtitle_en" id="subtitle_en" value="{{old('subtitle_en')}}" class="form-control">
          @error('subtitle_en')
           <small class="text-danger">{{ $message }}</small> 
          @enderror
         </div>
       </div>
       <div class="col-md-6">
        <div class="form-group mb-3">
          <label for="subtitle_ar">{{__('hero.hero_subtitle')}} <small class="text-danger pl-2">*</small> <small class="text-muted">({{__('main.ar')}})</small></label>
          <input type="text" name="subtitle_ar" id="subtitle_ar" value="{{old('subtitle_ar')}}" class="form-control">
          @error('subtitle_ar')
           <small class="text-danger">{{ $message }}</small> 
          @enderror
         </div>
       </div>
       <div class="form-group mb-3">
        <label for="image">{{__('form.image')}} <small class="text-danger pl-2">*</small></label>
        <input type="file" name="image" id="image" class="form-control">
        @error('image')
         <small class="text-danger">{{ $message }}</small> 
        @enderror
       </div>
       <div class="form-gorup mb-3">
        <button type="submit" class="btn btn-primary">{{__('main.save_date')}}</button>
       </div>
     </div>
    </div>
   </form>
  </div>
@endsection