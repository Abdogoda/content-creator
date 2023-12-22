@extends('layouts.backend.backendlayout')
@section('title', 'Dashboard | Admins')
@section('content')

<div class="contianer px-4">
  <div class="card shadow-lg my-5">
   <div class="card-header">
    <div class="d-flex align-items-center flex-wrap justify-content-between">
      <h1 class="">{{__('main.admins')}}</h1>
      @if (Auth::user()->admin->admin_type != 'admin')
        <a href="{{url('/admin/admins/new')}}" class="btn btn-sm btn-primary">
          {{__('admin.add_admin')}} <i class="fa fa-user-plus"></i>
        </a>
      @endif
    </div>
   </div>
   <div class="card-body">
    <table id="datatablesSimple" class="text-nowrap">
      <thead>
          <tr>
              <th>{{__('form.name')}}</th>
              <th>{{__('form.email')}}</th>
              <th>{{__('form.phone')}}</th>
              <th>{{__('form.status')}}</th>
              <th>{{__('form.admin_type')}}</th>
              <th>{{__('form.start_date')}}</th>
              <th>{{__('main.action')}}</th>
          </tr>
      </thead>
      <tbody>
        @forelse ($admins as $key => $admin)
          <tr>
            <td>
              <div class="d-flex align-items-center gap-2">
                <img src="{{$admin->image ? asset($admin->image->image_path.'/'.$admin->image->image_name) : asset('')}}" class="rounded-circle border p-1" width="50px" height="50px" alt="admin-image">
                <b class="ml-2">{{$admin->name}}</b>
              </div>
            </td>
            <td>{{$admin->email}}</td>
            <td>{{$admin->phone}}</td>
            <td><span class=" m-auto badge bg-{{$admin->status === '1' ? 'success' : 'danger'}}">{{$admin->status === '1' ? __('form.active') : __('form.deactive')}}</span></td>
            <td>{{$admin->admin->admin_type}}</td>
            <td>{{$admin->created_at->diffForHumans()}}</td>
            <td>
              <div class="d-flex align-items-center gap-2 flex-wrap">
                <a href="{{url('/admin/profile/'.$admin->id)}}" class="btn btn-sm btn-primary">
                  Edit <i class="fa fa-edit"></i>
                </a>
                @if (Auth::user()->admin->admin_type != 'admin')
                  <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAdmin-{{$admin->id}}">
                    {{__('main.delete')}} <i class="fa fa-trash"></i>
                  </button>
                @endif
              </div>
            </td>
          </tr>
          @include('pages.backend.admins.delete')
        @empty
            <tr>
              <td><div class="text-center">___</div></td>
              <td><div class="text-center">___</div></td>
              <td><div class="text-center">___</div></td>
              <td><div class="text-center">___</div></td>
              <td><div class="text-center">___</div></td>
              <td><div class="text-center">___</div></td>
              <td><div class="text-center">___</div></td>
            </tr>
        @endforelse
      </tbody>
    </table>
   </div>
  </div>
</div>
@endsection