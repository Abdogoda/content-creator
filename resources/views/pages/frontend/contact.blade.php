@extends('layouts.frontend.frontlayout')
@section('title', $contact_section->title)
@section('meta_title', $contact_section->meta_title)
@section('meta_keywords', $contact_section->meta_keywords)
@section('meta_descriptoin', $contact_section->meta_description)
@section('content')

  <!-- Breadcrumb Begin -->
  <div class="breadcrumb-option spad set-bg" data-setbg={{asset("assets/frontend/img/backgrounds/dark-1.jpg")}}>
    <span class="bottom"></span>
   <div class="container">
    <div class="row">
     <div class="col-lg-12 text-center">
      <div class="breadcrumb__text">
       <h2>{{__('contact.contact_us')}}</h2>
       <div class="breadcrumb__links">
        <a href="{{url('/')}}">{{__('main.home')}}</a>
        <span>{{__('main.contact')}}</span>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
  <!-- Breadcrumb End -->

  <!-- Contact Widget Section Begin -->
  <section class="contact-widget spad">
   <div class="container">
    <div class="row">
     <div class="col-lg-4 col-md-6 col-md-6 col-md-3">
      <div class="contact__widget__item">
       <div class="contact__widget__item__icon">
        <i class="fa fa-location-dot"></i>
       </div>
       <div class="contact__widget__item__text">
        <h4>{{__('contact.address')}}</h4>
        <p class="text-muted">{{$contact ? $contact->address : 'company address'}}</p>
       </div>
      </div>
     </div>
     <div class="col-lg-4 col-md-6 col-md-6 col-md-3">
      <div class="contact__widget__item">
       <div class="contact__widget__item__icon">
        <i class="fa fa-phone"></i>
       </div>
       <div class="contact__widget__item__text">
        <h4>{{__('contact.phone')}}</h4>
        <a href="tel:+20{{$contact ? $contact->phone : ''}}" class="text-muted">{{$contact ? $contact->phone : 'phone number'}}</a>
       </div>
      </div>
     </div>
     <div class="col-lg-4 col-md-6 col-md-6 col-md-3">
      <div class="contact__widget__item">
       <div class="contact__widget__item__icon">
        <i class="fa fa-envelope"></i>
       </div>
       <div class="contact__widget__item__text">
        <h4>{{__('contact.email')}}</h4>
        <a href="mailto:{{$contact ? $contact->email : ''}}" class="text-muted">{{$contact ? $contact->email : 'email@example.com'}}</a>
       </div>
      </div>
     </div>
    </div>
   </div>
  </section>
  <!-- Contact Widget Section End -->

  <!-- Call To Action Section Begin -->
  <section class="contact spad" id="contact">
   <div class="container">
    <div class="row">
     <div class="col-lg-6 col-md-6">
      <div class="contact__map">
        <iframe src="{{$contact ? $contact->location : ''}}"  height="450"
        style="border: 0"></iframe>
      </div>
     </div>
     <div class="col-lg-6 col-md-6">
      <div class="contact__form">
       <h3>{{__('contact.get_in_touch')}}</h3>
       <form action="{{ \LaravelLocalization::localizeURL('/send-message')}}" method="post">
        @csrf
        <input type="text" name="name" value="{{old('name')}}" placeholder="{{__('form.user_name')}}" />
          @error('name')
           <small class="text-danger">{{ $message }}</small> 
          @enderror
        <input type="email" name="email" value="{{old('email')}}" placeholder="{{__('form.email_address')}}" />
          @error('email')
           <small class="text-danger">{{ $message }}</small> 
          @enderror
        <textarea placeholder="{{__('form.message')}}" name="message" value="{{old('message')}}"></textarea>
          @error('message')
           <small class="text-danger">{{ $message }}</small> 
          @enderror
          <br>
        <button type="submit" class="site-btn">{{__('contact.send_message')}}</button>
       </form>
      </div>
     </div>
    </div>
   </div>
  </section>
  <!-- Call To Action Section End -->

@endsection