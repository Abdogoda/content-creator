@extends('layouts.backend.backendlayout')
@section('title', 'Dashboard | Profile')
@section('content')

<div class="contianer px-4">
  <div class="card shadow-lg my-5">
   <div class="card-header">
    <div class="d-flex align-items-center flex-wrap justify-content-between">
      <h1 class="">@if ($admin->id == Auth::user()->id) {{__('main.my_profile')}} @else {{$admin->name}} {{__('main.profile')}} @endif</h1>
      <div class="d-flex gap-1">
        @if (Auth::user()->admin->admin_type != "admin" || Auth::user()->id == $admin->id)
          <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAdmin-{{$admin->id}}">
            {{__('admin.delete_profile')}}<i class="fa fa-trash"></i>
          </button>
        @endif
        <a href="{{url('/admin/admins')}}" class="btn btn-sm btn-primary">{{__('admin.back_to_admin')}}</a>
      </div>
    </div>
   </div>
   <div class="card-body">
    @if (Auth::user()->admin->admin_type != "admin" || Auth::user()->id == $admin->id)
      <form action="{{\LaravelLocalization::localizeURL('/admin/admins/'.$admin->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
    @endif
        <div class="form-group mb-3">
          <img src={{$admin->image ? asset($admin->image->image_path.'/'.$admin->image->image_name) : asset('/')}} alt="admin-image" width="100px" height="100px" class="rounded-circle p-1 border mb-1"><br>
          
          @if (Auth::user()->admin->admin_type != "admin" || Auth::user()->id == $admin->id)
            <label for="image" class="btn btn-sm btn-secondary">{{__('form.change_image')}}</label>
            <input type="file" name="image" id="image" accept="image*" class="form-control d-none">
            @error('image')
            <small class="text-danger">{{ $message }}</small> 
            @enderror
          @endif
        </div>
        <div class="form-group mb-3">
         <label for="name">{{__('form.name')}} <small class="text-danger pl-2">*</small></label>
         <input type="text" name="name" id="name" value="{{$admin->name}}" class="form-control" {{($admin->id != Auth::user()->id && Auth::user()->admin->admin_type == "admin") ? 'readonly' : ''}}>
         @error('name')
          <small class="text-danger">{{ $message }}</small> 
         @enderror
        </div>
        <div class="form-group mb-3">
         <label for="email">{{__('form.email_address')}} <small class="text-danger pl-2">*</small></label>
         <input type="email" name="email" id="email" value="{{$admin->email}}" class="form-control" {{($admin->id != Auth::user()->id && Auth::user()->admin->admin_type == "admin") ? 'readonly' : ''}}> 
         @error('email')
          <small class="text-danger">{{ $message }}</small> 
         @enderror
        </div>
        <div class="form-group mb-3">
          <label for="phone">{{__('form.phone_number')}} <small class="text-danger pl-2">*</small></label>
          <input type="text" name="phone" id="phone" value="{{$admin->phone}}" class="form-control" maxlength="11" minlength="11" > 
          @error('phone')
           <small class="text-danger">{{ $message }}</small> 
          @enderror
         </div>
        <div class="form-group mb-3">
         <label for="status">{{__('form.status')}} <small class="text-danger pl-2">*</small></label>
         <select name="status" id="status" class="form-control">
          @if (Auth::user()->admin->admin_type != "admin" && Auth::user()->id != $admin->id )
            <option value="1" {{$admin->status == '1' ? 'selected' : ''}}>{{__('form.active')}}</option>
            <option value="0" {{$admin->status == '0' ? 'selected' : ''}}>{{__('form.deactive')}}</option>
          @else
            <option value="{{$admin->status}}" selected>{{$admin->status == '1' ? __('form.active') : __('form.deactive')}}</option>
          @endif
         </select>
         @error('status')
          <small class="text-danger">{{ $message }}</small> 
         @enderror
        </div>
        <div class="form-group mb-3">
         <label for="admin_type">{{__('form.admin_type')}} <small class="text-danger pl-2">*</small></label>
         <select name="admin_type" id="admin_type" class="form-control">
          @if (Auth::user()->admin->admin_type == "owner")
            <option value="owner" {{$admin->admin->admin_type == 'owner' ? 'selected' : ''}}>{{__('form.owner')}}</option>
            <option value="manager" {{$admin->admin->admin_type == 'manager' ? 'selected' : ''}}>{{__('form.manager')}}</option>
            <option value="admin" {{$admin->admin->admin_type == 'admin' ? 'selected' : ''}}>{{__('form.admin')}}</option>
          @else
            <option value="{{$admin->admin->admin_type}}" selected>{{$admin->admin->admin_type}}</option>
          @endif
         </select>
         @error('admin_type')
          <small class="text-danger">{{ $message }}</small> 
         @enderror
        </div>
        @if (Auth::user()->admin->admin_type != "admin" || Auth::user()->id == $admin->id)
            <div class="form-group mb-3">
              <button type="submit" class="btn btn-primary">{{__('form.update_admin_profile')}}</button>
            </div>
          </form>
        @endif
   </div>
  </div>
  
  @if (Auth::user()->admin->admin_type != "admin" || Auth::user()->id == $admin->id)
  <div class="card shadow-lg my-5">
    <div class="card-header">
     <div class="d-flex align-items-center justify-content-between">
       <h1 class=""> {{__('form.update_password')}}</h1>
     </div>
    </div>
    <div class="card-body">
     <form action="{{\LaravelLocalization::localizeURL('/admin/admins/update-password/'.$admin->id)}}" method="post">
       @csrf
       @method('put')
         <div class="form-group mb-3">
          <label for="current_password">{{__('form.current_password')}}</label>
          <input type="password" name="current_password" id="current_password" class="form-control" > 
          @error('current_password')
           <small class="text-danger">{{ $message }}</small> 
          @enderror
         </div>
         <div class="form-group mb-3">
          <label for="password">{{__('form.new_password')}}</label>
          <input type="password" name="password" id="password" class="form-control" > 
          @error('password')
           <small class="text-danger">{{ $message }}</small> 
          @enderror
         </div>
         <div class="form-group mb-3">
          <label for="password_confirmation">{{__('form.password_confirmation')}}</label>
          <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"> 
          @error('password_confirmation')
           <small class="text-danger">{{ $message }}</small> 
          @enderror
         </div>
         <div class="form-group mb-3">
           <button type="submit" class="btn btn-primary">{{__('form.change_password')}}</button>
         </div>
     </form>
    </div>
   </div>
  @endif
  
  @include('pages.backend.admins.delete')
</div>
@endsection

