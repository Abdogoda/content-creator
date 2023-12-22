@extends('layouts.backend.backendlayout')
@section('title', 'Dashboard | Edit Hero')
@section('content')

<div class="contianer px-4">
  <div class="card shadow-lg my-5">
    <div class="card-header d-flex flex-wrap align-items-center justify-content-between">
     <h4>{{__('hero.update_hero')}}</h4>
     <div>
       <a href={{url('/admin/heros')}} class="btn btn-primary">{{__('hero.all_heros')}}</a>
       <a href={{url('/')}} class="btn btn-success">{{__('main.review')}}</a>
      </div>
    </div>
    <form action="{{\LaravelLocalization::localizeURL('/admin/heros/'.$hero->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="card-body">
     <div class="form-group mb-3">
      <label for="title">{{__('hero.hero_title')}} <small class="text-danger">*</small></label>
      <input type="text" name="title" id="title" value="{{$hero->title}}" class="form-control">
      @error('title')
       <small class="text-danger">{{ $message }}</small> 
      @enderror
     </div>
     <div class="form-group mb-3">
      <label for="subtitle">{{__('hero.hero_subtitle')}} <small class="text-danger">*</small></label>
      <input type="text" name="subtitle" id="subtitle" value="{{$hero->subtitle}}" class="form-control">
      @error('subtitle')
       <small class="text-danger">{{ $message }}</small> 
      @enderror
     </div>
     <div class="form-group mb-3">
      <label for="image">{{__('form.image')}}</label>
      @isset($hero)
          <img src={{asset($hero->image->image_path.'/'.$hero->image->image_name)}} alt="hero-image" class="my-2 d-block" width="200px">
      @endisset
      <input type="file" name="image" id="image" class="form-control">
      @error('image')
       <small class="text-danger">{{ $message }}</small> 
      @enderror
     </div>
     <div class="form-gorup mb-3">
      <button type="submit" class="btn btn-primary">{{__('main.save_date')}}</button>
     </div>
    </div>
   </form>
  </div>
@endsection