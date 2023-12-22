@extends('layouts.frontend.frontlayout')
@section('title', $portfolio->title)
@section('meta_title', $portfolio->meta_title)
@section('meta_keywords', $portfolio->meta_keywords)
@section('meta_descriptoin', $portfolio->meta_description)
@section('content')

  <!-- Breadcrumb Begin -->
  <div class="breadcrumb-option spad set-bg" data-setbg={{asset('assets/frontend/img/backgrounds/dark-4.jpg')}}>
    <span class="bottom"></span>
   <div class="container">
    <div class="row">
     <div class="col-lg-12 text-center">
      <div class="breadcrumb__text">
       <h2>{{__('main.portfolio')}}</h2>
       <div class="breadcrumb__links">
        <a href={{url('/')}}>{{__('main.home')}}</a>
        <span>{{__('main.portfolio')}}</span>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
  <!-- Breadcrumb End -->

  <!-- Portfolio Section Begin -->
  @if (count($works) > 0)
  <section class="portfolio spad">
    <div class="container">
     <div class="row">
      <div class="col-lg-12">
       <ul class="portfolio__filter">
        <li class="active" data-filter="*">{{__('main.all')}}</li>
        @foreach ($services as $key => $service)
         @if (count($service->works) > 0)
           <li data-filter=".{{$service->slug}}">{{$service->name}}</li>
         @endif
        @endforeach
       </ul>
      </div>
     </div>
     <div class="row portfolio__gallery">
       @foreach ($works as $key => $work)
         <div class="col-lg-4 col-md-6 col-sm-6 mix {{$work->service->slug}}">
           <div class="portfolio__item">
           <div
             class="portfolio__item__video set-bg"
             data-setbg={{$work->image ? asset($work->image->image_path.'/'.$work->image->image_name) : asset('storage/'.$work->attachment)}}
           >
           @if ($work->attachment_type === 'video')
             <a href={{asset('storage/'.$work->attachment)}} class="play-btn video-popup" >
               <i class="fa fa-play"></i >
             </a>
           @else
             <a href={{asset('storage/'.$work->attachment)}} class="play-btn image-popup" >
               <i class="fa fa-plus"></i >
             </a>
           @endif
           </div>
           <div class="portfolio__item__text">
             <h4>{{$work->name}}</h4>
             <ul>
             <li>{{$work->service->name}}</li>
             </ul>
           </div>
           </div>
         </div>
       @endforeach
     </div>
     <div class="row ">
      <div class="col-lg-12">
       <div class="pagination__option">
         {{$works->links('vendor.pagination.custom_pagination')}}
       </div>
      </div>
     </div>
    </div>
   </section>
  @else
  <section class="portfolio spad">
    <div class="row">
      <div class="col-12 border text-center p-3">
        <h1>{{__('portfolio.no_works_available_yet')}}</h1>
      </div>
    </div>
  </section>
  @endif
  
  <!-- Portfolio Section End -->
@endsection
