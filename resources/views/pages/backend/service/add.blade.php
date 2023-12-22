@extends('layouts.backend.backendlayout')
@section('title', 'Dashboard | Create Service')
@section('content')

<div class="contianer px-4">
  <div class="card shadow-lg my-5">
   <div class="card-header d-flex align-items-center justify-content-between">
    <h1 class="">{{__('services.create_new_service')}}</h1>
    <a href="{{url('/admin/services')}}" class="btn btn-sm btn-primary">{{__('services.back_to_services')}}</a>
   </div>
   <div class="card-body">
    <form class="row" action="{{\LaravelLocalization::localizeURL('/admin/services')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="col-md-6">
     <div class="form-group mb-3">
      <label for="name_en">{{__('services.service_name')}} <small class="text-danger pl-2">*</small> <small class="text-muted">({{__('main.en')}})</small></label>
      <input type="text" name="name_en" id="name_en" value="{{old('name_en')}}" class="form-control" >
      @error('name_en')
       <small class="text-danger">{{ $message }}</small> 
      @enderror
     </div>
    </div>
    <div class="col-md-6">
     <div class="form-group mb-3">
      <label for="name_ar">{{__('services.service_name')}} <small class="text-danger pl-2">*</small> <small class="text-muted">({{__('main.ar')}})</small></label>
      <input type="text" name="name_ar" id="name_ar" value="{{old('name_ar')}}" class="form-control" >
      @error('name_ar')
       <small class="text-danger">{{ $message }}</small> 
      @enderror
     </div>
    </div>
    <div class="col-md-12">
     <div class="form-group mb-3">
      <label for="slug">{{__('main.slug')}} <small class="text-danger pl-2">*</small> <small class="text-muted">({{__('main.must_be_in_english')}})</small></label>
      <input type="text" name="slug" id="slug" value="{{old('slug')}}" class="form-control" >
      @error('slug')
       <small class="text-danger">{{ $message }}</small> 
      @enderror
     </div>
    </div>
    <div class="form-group mb-3">
      <label for="description_en">{{__("services.service_description")}} <small class="text-danger pl-2">*</small> <small class="text-muted">({{__('main.en')}})</small></label>
      <textarea name="description_en" id="description_en" value="{{old('description_en')}}"  class="form-control">{{old('description_en')}}</textarea>
      @error('description_en')
        <small class="text-danger">{{ $message }}</small> 
      @enderror
    </div>
    <div class="form-group mb-3">
      <label for="description_ar">{{__('services.service_description')}} <small class="text-danger pl-2">*</small> <small class="text-muted">({{__('main.ar')}})</small></label>
      <textarea name="description_ar" id="description_ar" value="{{old('description_ar')}}"  class="form-control">{{old('description_ar')}}</textarea>
      @error('description_ar')
        <small class="text-danger">{{ $message }}</small> 
      @enderror
    </div>


     <div class="col-md-6">
      <div class="form-group mb-3">
       <label for="meta_title_en">{{__('main.meta_title')}} <small class="text-danger pl-2">*</small> <small class="text-muted">({{__('main.en')}})</small></label>
       <input type="text" name="meta_title_en" id="meta_title_en" value="{{old('meta_title_en')}}"  class="form-control">
       @error('meta_title_en')
        <small class="text-danger">{{ $message }}</small> 
       @enderror
      </div>
     </div>
     <div class="col-md-6">
      <div class="form-group mb-3">
       <label for="meta_title_ar">{{__('main.meta_title')}} <small class="text-danger pl-2">*</small> <small class="text-muted">({{__('main.ar')}})</small></label>
       <input type="text" name="meta_title_ar" id="meta_title_ar" value="{{old('meta_title_ar')}}"  class="form-control">
       @error('meta_title_ar')
        <small class="text-danger">{{ $message }}</small> 
       @enderror
      </div>
     </div>
     <div class="col-md-6">
      <div class="form-group mb-3">
       <label for="meta_keywords_en">{{__('main.meta_keywords')}} <small class="text-danger pl-2">*</small> <small class="text-muted">({{__('main.en')}})</small></label>
       <input type="text" name="meta_keywords_en" id="meta_keywords_en" value="{{old('meta_keywords_en')}}"  class="form-control">
       @error('meta_keywords_en')
        <small class="text-danger">{{ $message }}</small> 
       @enderror
      </div>
     </div>
     <div class="col-md-6">
      <div class="form-group mb-3">
       <label for="meta_keywords_ar">{{__('main.meta_keywords')}} <small class="text-danger pl-2">*</small> <small class="text-muted">({{__('main.ar')}})</small></label>
       <input type="text" name="meta_keywords_ar" id="meta_keywords_ar" value="{{old('meta_keywords_ar')}}"  class="form-control">
       @error('meta_keywords_ar')
        <small class="text-danger">{{ $message }}</small> 
       @enderror
      </div>
     </div>
     <div class="form-group mb-3">
      <label for="meta_description_en">{{__('main.meta_description')}} <small class="text-muted">({{__('main.en')}})</small></label>
      <textarea name="meta_description_en" id="meta_description_en" value="{{old('meta_description_en')}}" class="form-control">{{old('meta_description_en')}}</textarea>
      @error('meta_description_en')
       <small class="text-danger">{{ $message }}</small> 
      @enderror
     </div>
     <div class="form-group mb-3">
      <label for="meta_description_ar">{{__('main.meta_description')}} <small class="text-muted">({{__('main.ar')}})</small></label>
      <textarea name="meta_description_ar" id="meta_description_ar" value="{{old('meta_description_ar')}}" class="form-control">{{old('meta_description_ar')}}</textarea>
      @error('meta_description_ar')
       <small class="text-danger">{{ $message }}</small> 
      @enderror
     </div>
     <div class="form-group mb-3">
      <label for="icon">{{__('services.service_icon')}} <small class="text-danger pl-2">*</small></label>
      <input type="file" name="icon" id="icon" class="form-control" accept="image.*">
      @error('icon')
       <small class="text-danger">{{ $message }}</small> 
      @enderror
     </div>
     <div class="form-group mb-3">
      <label for="image">{{__('services.service_image')}}</label>
      <input type="file" name="image" id="image" class="form-control" accept="image.*">
      @error('image')
       <small class="text-danger">{{ $message }}</small> 
      @enderror
     </div>
     <div class="form-gorup mb-3">
      <button type="submit" class="btn btn-primary">{{__('main.save_date')}}</button>
     </div>
   </form>
  </div>
</div>
@endsection
