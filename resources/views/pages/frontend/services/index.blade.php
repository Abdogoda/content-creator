@extends('layouts.frontend.frontlayout')
@section('title', $service_section->title)
@section('meta_title', $service_section->meta_title)
@section('meta_keywords', $service_section->meta_keywords)
@section('meta_descriptoin', $service_section->meta_description)
@section('content')



  <!-- Breadcrumb Begin -->
  <div class="breadcrumb-option spad set-bg" data-setbg={{asset('assets/frontend/img/backgrounds/dark-6.jpg')}}>
    <span class="bottom"></span>
   <div class="container">
    <div class="row">
     <div class="col-lg-12 text-center">
      <div class="breadcrumb__text">
       <h2>{{__('services.our_services')}}</h2>
       <div class="breadcrumb__links">
        <a href="{{url('/')}}">{{__('main.home')}}</a>
        <span>{{__('main.services')}}</span>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
  <!-- Breadcrumb End -->

  <!-- Services Section Begin -->
  <section class="services-page spad">
   <div class="container">
    <div class="row">
     @forelse ($services as $key => $service)
      <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="services__item">
        <div class="services__item__icon">
          <img src={{asset($service->icon)}}
          alt="services-{{$key}}-image"
          />
        </div>
        <h4>{{$service->name}}</h4>
        <p>{{$service->description}}</p>
        <a href="{{url('/services/'.$service->slug)}}" class="link">{{__('main.read_more')}}</a>
        </div>
      </div>
     @empty
         <div class="col-12 border border-white py-2 fs-5 text-white text-center">
         {{__('services.no_services_found')}}
         </div>
     @endforelse
    </div>
   </div>
  </section>
  <!-- Services Section End -->

  <!-- Call To Action Section Begin -->
  <section class="callto sp__callto" style="margin-bottom: 50px">
   <div class="container">
    <div class="callto__services spad set-bg" data-setbg={{asset("assets/frontend/img/calltos-bg.jpg")}}>
     <div class="row d-flex justify-content-center">
      <div class="col-lg-10 text-center">
       <div class="callto__text">
        <h2>{{__('main.call_to_action')}}</h2>
        <p>{{$service_section->description}}</p>
        <a href="{{url('/contact')}}">{{__('main.start_creating_your_content')}}</a>
       </div>
      </div>
     </div>
    </div>
   </div>
  </section>
  <!-- Call To Action Section End -->
@endsection