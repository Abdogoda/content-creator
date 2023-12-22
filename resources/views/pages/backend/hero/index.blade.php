@extends('layouts.backend.backendlayout')
@section('title', 'Dashboard | Hero')
@section('content')

<div class="contianer px-4">
  <div class="card shadow-lg my-5">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
      <h1 class="">{{__('hero.hero_section')}}</h1>
      <div>
       <a href={{url('/admin/heros/create')}} class="btn btn-primary">{{__('hero.add_new_hero')}}</a>
       <a href={{url('/')}} target="_blank" class="btn btn-success">{{__('main.review')}}</a>
      </div>
    </div>
    <div class="card-body">
      <div class="row">
        <small class="text-muted mb-2">{{__('hero.hero_message')}}</small>
      </div>
      <div class="row">
        @isset($heros)
         @forelse ($heros as $hero)
         <div class="col-md-6 p-2 text-white" style="min-height: 300px">
          <div class="set-bg p-4 d-flex flex-column justify-content-between" style="background-image: url({{$hero->image ? asset($hero->image->image_path.'/'.$hero->image->image_name) :asset("assets/frontend/img/hero/1.jpg")}})">
           <div>
             <span>{{$hero->subtitle}}</span>
             <h3>{{$hero->title}}</h3>
           </div>
           <div class="d-flex f-wrap align-items-center">
            <a href="{{url('/admin/heros/edit/'. $hero->id)}}" class="btn btn-primary m-1 btn-sm">{{__('main.edit')}} <i class="fa fa-edit"></i></a>
            <a href="{{url('/admin/heros/delete/'. $hero->id)}}" onclick="return confirm('{{__('messages.are_you_sure_to_delete_hero')}}')" class="btn btn-sm m-1 btn-danger">{{__('main.delete')}} <i class="fa fa-trash"></i></a>
           </div>
          </div>
         </div>
         @empty
             <div class="col-12 text-center border py-3 fs-1" >{{__('hero.no_hero_available')}}</div>
         @endforelse
        @endisset
     </div>
    </div>
   </div>
</div>
@endsection
