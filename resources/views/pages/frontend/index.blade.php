@extends('layouts.frontend.frontlayout')
@section('title', $home->title)
@section('meta_title', $home->meta_title)
@section('meta_keywords', $home->meta_keywords)
@section('meta_descriptoin', $home->meta_description)

@section('content')


  <!-- Hero Section Begin -->
  <section class="hero">
   <div class="hero__slider owl-carousel">
        @forelse ($heros as $hero)
        <div class="hero__item set-bg" data-setbg={{$hero->image ? asset($hero->image->image_path.'/'.$hero->image->image_name) :asset("assets/frontend/img/hero/1.jpg")}}>
          <div class="container">
           <div class="row">
            <div class="col-lg-6">
             <div class="hero__text">
              <span>{{$hero->subtitle}}</span>
              <h2>{{$hero->title}}</h2>
              <a href={{url('/about')}} class="primary-btn">{{__('about.read_more_about_us')}}</a>
             </div>
            </div>
           </div>
          </div>
         </div>
         @empty
         <div class="hero__item set-bg" data-setbg={{asset("assets/frontend/img/hero/1.jpg")}}>
          <div class="container">
           <div class="row">
            <div class="col-lg-6">
             <div class="hero__text">
              <span>{{__('main.the_best_place_to_work')}}</span>
              <h2>{{$WEBSITE_NAME}}</h2>
              <a href={{url('/about')}} class="primary-btn">{{__('about.read_more_about_us')}}</a>
             </div>
            </div>
           </div>
          </div>
         </div>
        @endforelse
   </div>
  </section>
  <!-- Hero Section End -->

  <!-- About Section Begin -->
  <section class="about-section spad set-bg" data-setbg={{asset("assets/frontend/img/backgrounds/trans-3.jpg")}}>
   <div class="container">
    <div class="row">
     <div class="col-lg-6">
      <div class="services__title">
       <div class="section-title">
        <span>{{__('about.about_us')}}</span>
        <h2>{{__('about.who_are_we')}}</h2>
       </div>
       <p>{{substr($about->description, 0, 500)}}...</p>
       <a href={{url('/about')}} class="primary-btn">{{__('about.read_more_about_us')}}</a>
      </div>
     </div>
     <div class="col-lg-6 d-none d-lg-flex justify-content-end">
      <div class="">
       <script
        src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs"
        type="module"
       ></script>
       <dotlottie-player
        src="https://lottie.host/f78092df-649c-4f58-969b-16dc51436f45/2zTlvFfZNt.json"
        background="transparent"
        speed="1"
        style="width: 100%; padding-top: 0; margin-top: -50px; max-height: 100%"
        direction="1"
        mode="normal"
        loop
        autoplay
       ></dotlottie-player>
      </div>
     </div>
    </div>
   </div>
  </section>
  <!-- About Section End -->

  <!-- Services Section Begin -->
  @if(count($services) > 0)
    <section class="services background-3-20" style="margin-bottom:10px">
      <span class="top"></span>
     <div class="container">
      <div class="row">
        <div class="col-lg-4">
        <div class="services__title">
          <div class="section-title">
          <span>{{__('services.our_services')}}</span>
          <h2>{{__('services.what_we_do')}}</h2>
          </div>
          <p>
          {{__('services.description')}}
          </p>
          <a href="{{url('/services')}}" class="primary-btn">{{__('services.view_all_services')}}</a>
        </div>
        </div>
        <div class="col-lg-8">
        <div class="row">
              @forelse ($services as $key => $service)
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <div class="services__item">
                  <div class="services__item__icon">
                    <img
                    src={{asset($service->icon)}}
                    alt="services-{{$key}}-image"
                    />
                  </div>
                  <h4>{{$service->name}}</h4>
                  <p>{{ strlen( $service->description ) > 150 ? substr($service->description, 0, 150)."..." : $service->description}}</p>
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
      </div>
      </div>
    </section>
  @endif
  <!-- Services Section End -->

  <!-- Work Section Begin -->
  @if (count($works) > 0)
    <section class="work">
      <div class="work__gallery">
        <div class="grid-sizer"></div>
        @foreach ($works as $key => $work)
          <div class="work__item {{$work->image_style.'__item'}} set-bg" data-setbg={{$work->image ? asset($work->image->image_path.'/'.$work->image->image_name) : asset("storage/".$work->attachment)}} >
            @if ($work->attachment_type === 'video')
              <a href={{asset('storage/'.$work->attachment)}} class="play-btn video-popup" >
                <i class="fa fa-play"></i >
              </a>
            @else
              <a href={{asset('storage/'.$work->attachment)}} class="play-btn image-popup" >
                <i class="fa fa-plus"></i >
              </a>
            @endif
            @if ($work->image_style != 'small')
              <div class="work__item__hover">
                <h4>{{$work->name}}</h4>
                <ul><li>{{$work->service->name}}</li></ul>
              </div>
            @endif
          </div>
        @endforeach
      </div>
    </section>
  @endif
  <!-- Work Section End -->


  <!-- Counter Section Begin -->
  @if (count($counters) > 0)
    <section class="counter" id="counter">
      <div class="container">
        <div class="counter__content">
          <div class="row">
            @foreach ($counters as $counter)
            <div class="counter__item__container col-lg-3 col-md-6 col-sm-6">
              <div class="counter__item">
              <div class="overlay"></div>
              <div class="counter__item__text">
                <img
                src={{$counter->image ? asset($counter->image->image_path.'/'.$counter->image->image_name) : ''}}
                alt="counter-{{$counter->title}}"
                />
                <h2 class="counter_num">{{$counter->value}}</h2>
                <p>{{$counter->title}}</p>
              </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </section>
  @endif
  <!-- Counter Section End -->


  <!-- Testimonial Section Begin -->
  <section class="testimonial spad background-3-20" id="testimonial" >
    <span class="top"></span>
    <span class="bottom"></span>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-title center-title">
            <span>{{__('testimonial.loved_by_clients')}}</span>
            <h2>{{__('testimonial.what_clients_say')}}</h2>
          </div>
        </div>
      </div>
      @if(count($reviews) > 0)
          <div class="row">
            <div class="testimonial__slider owl-carousel">
            @foreach ($reviews as $key => $review)
              <div class="col-lg-4">
                <div class="testimonial__item">
                  <div class="testimonial__text">
                    <p>{{strlen($review->text) > 100 ? substr($review->text, 0, 100)."..." : $review->text}}</p>
                  </div>
                  <div class="testimonial__author">
                    <div class="testimonial__author__pic">
                      <div class="pic">{{str(mb_substr($review->name, 0, 1))}}</div>
                    </div>
                    <div class="testimonial__author__text">
                    <h5>{{$review->name}}</h5>
                    <span>
                      @for ($i = 0; $i < 5; $i++)
                        @if ($i <  $review->stars)
                            <i class="fa fa-star text-gold"></i>
                        @else
                            <i class="far fa-star"></i>
                        @endif
                      @endfor
                    </p>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
            </div>
          </div>
        @endif
        <div class="row mt-5">
          <a href="{{url('/about#testimonial')}}" class="primary-btn m-auto" style="background: none">{{__('testimonial.add_review')}}</a>
        </div>
      </div>
  </section>
  <!-- Testimonial Section End -->

  <!-- Team Section Begin -->
  @if (count($team) > 3)
  <section class="team spad">
    <div class="container">
     <div class="row">
      <div class="col-lg-12">
       <div class="section-title team__title">
        <span>{{__('team.nice_to_meet')}}</span>
        <h2>{{__('team.our_team')}}</h2>
       </div>
      </div>
     </div>
     <div class="row">
      @foreach ($team as $key => $admin)
      <div class="col-lg-3 col-md-6 col-sm-6 p-0">
        <div class="team__item team__item__{{$key+1}} set-bg" data-setbg="{{$admin->image ? asset($admin->image->image_path.'/'.$admin->image->image_name) : asset('')}}">
         <div class="team__item__text">
          <h4>{{$admin->name}}</h4>
          <a href="mailto:{{$admin->email}}">{{$admin->email}}</a><br>
          <a href="tel:+02{{$admin->phone}}">{{$admin->phone}}</a>
         </div>
        </div>
       </div>
      @endforeach
      <div class="col-lg-12 p-0">
       <div class="team__btn">
        <a href="{{url('/team')}}" class="primary-btn">{{__('team.meet_our_team')}}</a>
       </div>
      </div>
     </div>
    </div>
  </section>
  @endif
   <!-- Team Section End -->


   <!-- Call To Action Section Begin -->
  <section class="callto spad  background-3-20">
    <span class="top"></span>
    <div class="container">
     <div class="row">
      <div class="col-lg-8">
       <div class="callto__text">
        <h2>{{__('main.call_to_action')}}</h2>
        <p>{{__('main.the_best_place_to_work')}}</p>
        <a href="{{url('/contact')}}" class="site-btn">{{__('main.start_creating_your_content')}}</a>
       </div>
      </div>
     </div>
    </div>
  </section>
  <!-- Call To Action Section End -->

  {{-- adv --}}
  <?php $previd = App\Models\Image::where('imageable_id', '1')->where('image_model', 'PreVideo')->first(); ?>
  @if ($previd)
    <a href="{{asset($previd->image_path.'/'.$previd->image_name)}}"  class="video-popup autoload-popup"></a>
  @endif
  {{-- adv --}}
@endsection

@section('js')
    <script>
      $(document).ready(function(){
        $('img').lazyload()
      })
    </script>
@endsection

@section('css')
    <style>
      img:not(.header__logo__img){
        background-color: #b8b8b8;
      }
    </style>
@endsection