@extends('layouts.frontend.frontlayout')
@section('title', 'Our Services | '.$service->name)
@section('meta_title', 'Our Services | '.$service->meta_title)
@section('meta_keywords', $WEBSITE_NAME.', '.$WEBSITE_NAME.' Services, '.$service->name.' Services, '.$service->name.', '.$service->meta_keywords)
@section('meta_descriptoin', $service->meta_description)
@section('content')

  <!-- Breadcrumb Begin -->
  <div class="breadcrumb-option spad set-bg" data-setbg={{asset('assets/frontend/img/backgrounds/dark-3.jpg')}}>
    <span class="bottom"></span>
   <div class="container">
    <div class="row">
     <div class="col-lg-12 text-center">
      <div class="breadcrumb__text">
       <h2>{{$service->name}}</h2>
       <div class="breadcrumb__links">
        <a href="{{url('/')}}">{{__('main.home')}}</a>
        <a href="{{url('/services')}}">{{__('main.services')}}</a>
        <span>{{$service->name}}</span>
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
     <div class="{{$service->image ? 'col-md-6' : 'col-12'}}">
      <div class="services__item">
       <div class="services__item__icon">
        <img src="{{asset($service->icon)}}" alt="service-icon" />
       </div>
       <h1>{{$service->name}}</h1>
       <p>{{$service->description}}</p>
      @if (count($service->paragraphs) > 0)
        <div class="service__features">
          <h5>{{__('services.service_features')}}</h5>
          <ul>
            @foreach ($service->paragraphs as $paragraph)
                <li><p>{{$paragraph->text}}</p></li>
            @endforeach
          </ul>
        </div>
      @endif
      </div>
     </div>
     @if ($service->image)
         <div class="col-md-6 d-flex align-items-center">
            <img class="service-image" src={{asset($service->image->image_path.'/'.$service->image->image_name)}} alt="service-image">
         </div>
     @endif
    </div>
   </div>
  </section>
  <!-- Services Section End -->

@if (count($service->works) > 0)
  <section class="portfolio spad background-3-20">
    <span class="top"></span>
    <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="section-title center-title">
        <span style="text-transform: capitalize">{{$service->name}}</span>
        <h2>{{__('portfolio.recent_work')}}</h2>
        </div>
      </div>
    </div>
    <div class="row portfolio__gallery justify-content-center">
      <?php $count = 0 ?>
      @foreach ($service->works as $key => $work)
        @if ($count < 9)
          <div class="col-lg-4 col-md-6 col-sm-6 mix branding">
            <div class="portfolio__item">
              <div  class="portfolio__item__video set-bg" data-setbg={{$work->image ? asset($work->image->image_path.'/'.$work->image->image_name) : asset('storage/'.$work->attachment)}} >
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
              </div>
            </div>
          </div>
        @endif
        <?php $count++ ?>
      @endforeach
      
    </div>
    @if (count($service->works) > 9)
      <div class="row">
        <div class="col-lg-12">
        <div class="pagination__option">
          <a href="{{url('/portfolio')}}" class="primary-btn"
          >{{__('main.see_more')}}</a
          >
        </div>
        </div>
      </div>
    @endif
    </div>
  </section>
@endif
@endsection