
@extends('layouts.backend.backendlayout')
@section('title', 'Dashboard | Admins')
@section('content')

<div class="contianer px-4">
  <div class="card shadow-lg my-5">
   <div class="card-header">
    <div class="d-flex align-items-center justify-content-between">
      <h1 class="">{{__('admin.add_admin')}}</h1>
      <a href="{{url('/admin/admins')}}" class="btn btn-sm btn-primary">{{__('admin.back_to_admin')}}</a>
    </div>
   </div>
   <div class="card-body">
    <form action="{{\LaravelLocalization::localizeURL('/admin/admins')}}" method="post" enctype="multipart/form-data">
      @csrf
        <div class="form-group mb-3">
         <label for="name">{{__('form.name')}} <small class="text-danger pl-2">*</small></label>
         <input type="text" name="name" id="name" value="{{old('name')}}" class="form-control" >
         @error('name')
          <small class="text-danger">{{ $message }}</small> 
         @enderror
        </div>
        <div class="form-group mb-3">
         <label for="email">{{__('form.email_address')}} <small class="text-danger pl-2">*</small></label>
         <input type="email" name="email" id="email" value="{{old('email')}}" class="form-control" > 
         @error('email')
          <small class="text-danger">{{ $message }}</small> 
         @enderror
        </div>
        <div class="form-group mb-3">
          <label for="phone">{{__('form.phone_number')}} <small class="text-danger pl-2">*</small></label>
          <input type="text" name="phone" id="phone" value="{{old('phone')}}" class="form-control" maxlength="11" minlength="11" > 
          @error('phone')
           <small class="text-danger">{{ $message }}</small> 
          @enderror
         </div>
        <div class="form-group mb-3">
         <label for="status">{{__('form.status')}} <small class="text-danger pl-2">*</small></label>
         <select name="status" id="status" class="form-control" >
          <option value="1" selected>{{__('form.active')}}</option>
          <option value="0">{{__('form.deactive')}}</option>
         </select>
         @error('status')
          <small class="text-danger">{{ $message }}</small> 
         @enderror
        </div>
        <div class="form-group mb-3">
         <label for="admin_type">{{__('form.admin_type')}} <small class="text-danger pl-2">*</small></label>
         <select name="admin_type" id="admin_type" class="form-control" >
          <option value="admin" selected>{{__('form.admin')}}</option>
          <option value="manager">{{__('form.manager')}}</option>
         </select>
         @error('admin_type')
          <small class="text-danger">{{ $message }}</small> 
         @enderror
        </div>
        <div class="form-group mb-3">
         <label for="password">{{__('form.password')}} <small class="text-danger pl-2">*</small></label>
         <input type="password" name="password" id="password" class="form-control" > 
         @error('password')
          <small class="text-danger">{{ $message }}</small> 
         @enderror
        </div>
        <div class="form-group mb-3">
         <label for="password_confirmation">{{__('form.password_confirmation')}} <small class="text-danger pl-2">*</small></label>
         <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"> 
         @error('password_confirmation')
          <small class="text-danger">{{ $message }}</small> 
         @enderror
        </div>
        <div class="form-group mb-3">
         <label for="image">{{__('form.profile_image')}} <small class="text-danger pl-2">*</small></label>
         <input type="file" name="image" id="image" accept="image*" class="form-control">
         @error('image')
          <small class="text-danger">{{ $message }}</small> 
         @enderror
        </div>
        <div class="form-group mb-3">
          <button type="submit" class="btn btn-primary">{{__('admin.add_admin')}}</button>
        </div>
    </form>
   </div>
  </div>
</div>
@endsection