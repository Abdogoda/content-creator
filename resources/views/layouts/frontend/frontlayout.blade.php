<!DOCTYPE html>
<html lang="en">
 <head>
  <meta charset="UTF-8" />
  <meta name="description" content="{{$WEBSITE_NAME}}" />
  <meta name="keywords" content="{{$WEBSITE_NAME}}" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>@yield('title')</title>
  <meta name="description" content="@yield('meta_description')">
  <meta name="keywords" content="@yield('meta_keywords')">

  <!-- logo -->
  <link rel="shortcut icon" href={{asset("assets/frontend/img/logo/logo-02.png")}} type="image/x-icon" />
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Css Styles -->
  <link rel="stylesheet" href={{asset("assets/frontend/css/bootstrap.min.css")}} type="text/css" />
  <link rel="stylesheet" href={{asset("assets/frontend/css/all.min.css")}} type="text/css" />
  <link rel="stylesheet" href={{asset("assets/frontend/css/owl.carousel.min.css")}} type="text/css" />
  <link rel="stylesheet" href={{asset("assets/frontend/css/magnific-popup.css")}} type="text/css" />
  <link rel="stylesheet" href={{asset("assets/frontend/css/slicknav.min.css")}} type="text/css" />
  <link rel="stylesheet" href={{asset("assets/frontend/css/style.css")}} type="text/css" />
  @if (App::getLocale() == 'ar')
  <link rel="stylesheet" href={{asset("assets/frontend/css/style_rtl.css")}} type="text/css" />
  <link rel="stylesheet" href="{{asset('assets/messages/alert_rtl.css')}}">
  @endif
  @if (App::getLocale() != 'ar')
  <link rel="stylesheet" href="{{asset('assets/messages/alert.css')}}">
  @endif

  @yield('css')
 </head>

 <body>
  <!-- Page Preloder -->
  <div id="preloder">
   <div class="loader"></div>
  </div>

 <!-- Start Messages -->
 @extends('components.messages')
 <!-- End Messages -->

<!-- Header Section Begin -->
 @include('components/frontend/header')
<!-- Header End -->

@yield('content')

<!-- Footer Section Begin -->
 @include('components/frontend/footer')
<!-- Footer Section End -->

<!-- Js Plugins -->
<script>
  window.onload = function () {
  var loader = document.querySelector(".loader");
  var preloader = document.getElementById("preloder");

  if (loader) {
    loader.style.display = "none";
  }
  
  if (preloader) {
    setTimeout(function () {
      preloader.style.display = "none";
    }, 200);
  }
}
</script>
<script src={{asset("assets/frontend/js/jquery-3.3.1.min.js")}}></script>
<script src={{asset("assets/frontend/js/bootstrap.min.js")}}></script>
<script src={{asset("assets/frontend/js/jquery.magnific-popup.min.js")}}></script>
<script src={{asset("assets/frontend/js/mixitup.min.js")}}></script>
<script src={{asset("assets/frontend/js/masonry.pkgd.min.js")}}></script>
<script src={{asset("assets/frontend/js/jquery.slicknav.js")}}></script>
<script src={{asset("assets/frontend/js/owl.carousel.min.js")}}></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js"></script>
<script src={{asset("assets/frontend/js/main.js")}}></script>
<script src={{asset('assets/messages/alert.js')}}></script>
@if (App::getLocale() == 'ar')
 <script src={{asset("assets/frontend/js/main_slider_rtl.js")}}></script>
@else
 <script src={{asset("assets/frontend/js/main_slider.js")}}></script>
@endif

@yield('js')
</body>
</html>
