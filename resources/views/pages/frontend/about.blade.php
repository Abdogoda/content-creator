@extends('layouts.frontend.frontlayout')
@section('title', $about->title)
@section('meta_title', $about->meta_title)
@section('meta_keywords', $about->meta_keywords)
@section('meta_descriptoin', $about->meta_description)
@section('content')

  <!-- Breadcrumb Begin -->
  {{-- assets/frontend/img/breadcrumb-bg.jpg --}}
  <div class="breadcrumb-option spad set-bg" data-setbg={{asset("assets/frontend/img/backgrounds/dark-2.jpg")}}>
    <span class="bottom"></span>
   <div class="container">
    <div class="row">
     <div class="col-lg-12 text-center">
      <div class="breadcrumb__text">
       <h2>{{__('about.about_us')}}</h2>
       <div class="breadcrumb__links">
        <a href="{{url('/')}}">{{__('main.home')}}</a>
        <span>{{__('main.about')}}</span>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
  <!-- Breadcrumb End -->



  <!-- About Section Begin -->
  <section class="about spad">
   <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="about__text">
         <div class="section-title">
          <span>{{__('about.about_us')}}</span>
          <h2>{{__('about.who_are_we')}}</h2>
         </div>
         <div class="about__text__desc">
             <p>{{$about->description}}</p>
         </div>
        </div>
       </div>
     <div class="col-lg-6">
      <div class="about__pic">
       <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
         <div
          class="about__pic__item about__pic__item--large set-bg"
          data-setbg={{asset("assets/frontend/img/about/about-1.jpg")}}
         ></div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
         <div class="row">
          <div class="col-lg-12">
           <div
            class="about__pic__item set-bg"
            data-setbg={{asset("assets/frontend/img/about/about-2.jpg")}}
           ></div>
          </div>
          <div class="col-lg-12">
           <div
            class="about__pic__item set-bg"
            data-setbg={{asset("assets/frontend/img/about/about-3.jpg")}}
           ></div>
          </div>
         </div>
        </div>
       </div>
      </div>
     </div>
    </div>
   </div>
  </section>
  <!-- About Section End -->

  <!-- Testimonial Section Begin -->
  <section class="testimonial spad background-3-20">
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
        <div class="row mt-5" id="testimonial">
          <form action="{{ \LaravelLocalization::localizeURL('/add-review')}}" method="post" class="review-form">
            @csrf
            <h2>{{__('testimonial.add_review')}}</h2>
            <div class="form-group mb-3">
              <label for="name">{{__('form.user_name')}}</label>
              <input type="text" name="name" id="name" placeholder="{{__('form.please_enter_your_name')}}" value="{{old('name')}}" class="form-control">
              @error('name')
               <small class="text-danger">{{ $message }}</small> 
              @enderror
             </div>
             <div class="form-group mb-3">
              <label for="stars">{{__('form.rating')}} <small class="text-danger pl-2">*</small></label>
              <select name="stars" id="stars" >
               <option value="0">__{{__('form.choose_your_rating')}}__</option>
               <option value="1">⭐</option>
               <option value="2">⭐⭐</option>
               <option value="3">⭐⭐⭐</option>
               <option value="4">⭐⭐⭐⭐</option>
               <option value="5">⭐⭐⭐⭐⭐</option>
              </select>
              @error('stars')
               <small class="text-danger">{{ $message }}</small> 
              @enderror
             </div>
             <div class="form-group mb-3">
              <label for="text">{{__('form.message')}} <small class="text-danger pl-2">*</small></label>
              <textarea name="text" placeholder="{{__('form.please_enter_your_message')}}" id="text" class="form-control" >{{old('text')}}</textarea>
              @error('text')
               <small class="text-danger">{{ $message }}</small> 
              @enderror
             </div>
             <div class="form-group mt-4">
              <button type="submit" class="site-btn m-auto" style="width:fit-content">{{__('testimonial.add_review')}}</button>
             </div>
          </form>
        </div>
      </div>
  </section>
  <!-- Testimonial Section End -->

  <!-- Counter Section Begin -->
  @if (count($counters) > 0)
  <section class="counter">
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

@endsection

@section('js')

@endsection