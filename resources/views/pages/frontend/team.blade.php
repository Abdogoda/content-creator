@extends('layouts.frontend.frontlayout')
@section('title', "Our Team")
@section('meta_title', "Our Team")
@section('meta_keywords', "Our Team")
@section('meta_descriptoin', "Our Team")
@section('content')

  <!-- Breadcrumb Begin -->
  <div class="breadcrumb-option spad set-bg" data-setbg={{asset('assets/frontend/img/breadcrumb-bg.jpg')}}>
    <span class="bottom"></span>
   <div class="container">
    <div class="row">
     <div class="col-lg-12 text-center">
      <div class="breadcrumb__text">
       <h2>{{__('team.our_team')}}</h2>
       <div class="breadcrumb__links">
        <a href={{url('/')}}>{{__('main.home')}}</a>
        <span>{{__('main.team')}}</span>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
  <!-- Breadcrumb End -->

  <!-- Portfolio Section Begin -->
  <section class="team spad">
   <div class="container">
    <div class="row">
      @foreach ($team as $key => $admin)
      <div class="col-lg-3 col-md-6 col-sm-6 p-0">
        <div class="team__item set-bg" data-setbg="{{asset($admin->image->image_path.'/'.$admin->image->image_name)}}">
         <div class="team__item__text">
          <h4>{{$admin->name}}</h4>
          <a href="mailto:{{$admin->email}}">{{$admin->email}}</a><br>
          <a href="tel:+02{{$admin->phone}}">{{$admin->phone}}</a>
         </div>
        </div>
       </div>
      @endforeach
    </div>
   </div>
  </section>
  <!-- Team Section End -->
@endsection
