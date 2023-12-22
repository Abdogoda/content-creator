@extends('layouts.frontend.frontlayout')
@section('title', 'Login Page')

@section('content')

 <!-- Breadcrumb Begin -->
 <div class="breadcrumb-option spad set-bg" data-setbg={{asset('assets/frontend/img/backgrounds/dark-1.jpg')}}>
  <div class="container">
   <div class="row">
    <div class="col-lg-12 text-center">
     <div class="breadcrumb__text">
      <h2>{{__('main.sign_in')}}</h2>
      <div class="breadcrumb__links">
       <a href={{url('/')}}>{{__('main.home')}}</a>
       <span>{{__('main.sign_in')}}</span>
      </div>
     </div>
    </div>
   </div>
  </div>
 </div>
 <!-- Breadcrumb End -->
  <!-- About Section Begin -->
  <section class=" login-section spad background-3-20" style="padding: 100px 0">
    <div class="container">
     <div class="row">
      <div class="col-lg-6">
       <div class="services__title">
        <div class="section-title">
         <span>{{__('login.join_us_now')}}</span>
         <h2>{{__('login.sign_in_from')}}</h2>
        </div>
            <p>{{__('login.description_1')}}<br>{{__('login.description_2')}} {{__('login.description_3')}}</p>
        <a href={{url('/about')}} class="primary-btn">{{__('about.read_more_about_us')}}</a>
       </div>
      </div>
      <div class="col-lg-6">
        <form method="POST" action="{{ route('login') }}" class="review-form" style="padding: 50px 15px">
          @csrf
          <div class="form-group mb-3">
            <label for="email">{{__('form.email_address')}}</label>
            <input id="email" type="email" placeholder="{{__('form.please_enter_your_email')}}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
           </div>
           <div class="form-group mb-3">
            <label for="password">{{__('form.password')}}</label>
            <input id="password" type="password" placeholder="{{__('form.please_enter_your_password')}}" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
           </div>
           <div class="form-gorup mb-3">
            <button type="submit" class="btn site-btn">{{__('login.sign_in_now')}}</button>
           </div>
        </form>
      </div>
     </div>
    </div>
   </section>
@endsection