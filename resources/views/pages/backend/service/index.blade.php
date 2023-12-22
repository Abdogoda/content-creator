@extends('layouts.backend.backendlayout')
@section('title', 'Dashboard | Services')
@section('content')

<div class="contianer px-4">
  <div class="card shadow-lg my-5">
   <div class="card-header d-flex align-items-center justify-content-between flex-wrap">
    <h1 class="">{{__('services.our_services')}}</h1>
    <div>
      <a href="{{url('/admin/services/create')}}" class="btn btn-sm btn-primary mr-1">{{__('services.create_new_service')}}</a>
      <a href="{{url('/services')}}" class="btn btn-sm btn-success">{{__('main.review')}}</a>
    </div>
   </div>
   <div class="row p-0 mx-2 mx-lg-3 my-4">
    @isset($services)
      @forelse ($services as $key => $service)
        <div class="col-md-6 mb-3" style="min-height: 300px">
          <div class="border p-2">
            <div class="d-flex justify-content-between f-wrap align-items-start">
              <img src={{asset($service->icon)}} alt="service-{{$key}}-image" width="70px" height="70px" class="rounded p-2 border mb-3">
              <div class="d-flex flex-column">
                <a href="{{url('/admin/services/'.$service->slug)}}" class="btn btn-primary m-1 mt-0 btn-sm">{{__('main.edit')}} <i class="fa fa-edit"></i></a>
                <a href="{{url('/admin/services/delete/'.$service->slug)}}" onclick="return confirm('{{__('messages.are_you_sure_to_delete_service')}}')" class="btn btn-sm m-1 btn-danger">{{__('main.delete')}} <i class="fa fa-trash"></i></a>
              </div>
            </div>
            <div>
            <p class="m-0 mb-1"><b>{{__('form.name')}}:</b> {{$service->name}}</p>
            <p class="m-0 mb-1"><b>{{__('main.slug')}}:</b> {{$service->slug}}</p>
            <p class="m-0 mb-1"><b>{{__('services.service_description')}}:</b> {{$service->description}}</p>
            @isset($service->paragraphs)
              <h5>{{__('services.service_features')}}</h5>
              <ul>
                @foreach ($service->paragraphs as $ind => $paragraph)
                  <li><p>{{$paragraph->text}}</p></li>
                @endforeach
              </ul>
              @endisset
            </div>
          </div>
        </div>
      @empty
          <div class="col-12 text-center border py-3 fs-1" >{{__('services.no_services_found')}}</div>
      @endforelse
    @endisset
 </div>
  </div>
</div>
@endsection