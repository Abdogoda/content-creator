@extends('layouts.backend.backendlayout')
@section('title', 'Dashboard | Counters')
@section('content')

<div class="contianer px-4">
  <div class="card shadow-lg my-5">
   <div class="card-header flex-wrap d-flex justify-content-between align-items-center">
    <h1 class="">{{__('counter.counter_section')}}</h1>
    <div>
      <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addCounter">
        {{__('counter.add_new_counter')}}
       </button>
      
   <a href={{url('/')}} target="_blank" class="btn btn-sm btn-success">{{__('main.review')}}</a>
    </div>
   </div>
   <div class="card-body">
    <div class="row">
      <small class="text-muted mb-2">{{__('counter.counter_message')}}</small>
    </div>
    <div class="row">
      @forelse ($counters as $key => $counter)
          <div class="col-md-3 mb-3">
            <div class="border text-center p-2 {{$key > 3 ? 'unused' : ''}}">
              <img src={{$counter->image ? asset($counter->image->image_path.'/'.$counter->image->image_name) :  asset('') }} alt="{{$counter->title}}" style="width:100px; height:100px" class="mb-2">
              <h5>{{$counter->title}}</h5>
              <p>{{$counter->value}}</p>
              <div class="d-flex flex-wrap align-items-center justify-content-center">
                <button type="button" class="btn btn-sm btn-primary m-1" data-bs-toggle="modal" data-bs-target="#editCounter-{{$counter->id}}">{{__('main.edit')}} <i class="fa fa-edit"></i></button>
                 <a href="{{url('/admin/counters/delete/'.$counter->id)}}" class="btn btn-sm btn-danger m-1">{{__('main.delete')}} <i class="fa fa-trash"></i></a>
              </div>
            </div>
          </div>
          @include('pages.backend.counter.edit')
      @empty
          <div class="col-12"><h3 class="text-center">{{__('counter.no_counters_available')}}</h3></div>
      @endforelse
    </div>
   </div>
  </div>
</div>
@include('pages.backend.counter.add')
@endsection