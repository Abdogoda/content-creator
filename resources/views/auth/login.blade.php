<!DOCTYPE html>
<html lang="zxx">
 <head>
  <meta charset="UTF-8" />
  <meta name="description" content="Videograph Template" />
  <meta name="keywords" content="Videograph, unica, creative, html" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Login Page</title>
  <meta name="description" content="@yield('meta_description')">
  <meta name="keywords" content="@yield('meta_keywords')">
  <meta name="author" content="Abdo Goda">

  <!-- logo -->
  <link rel="shortcut icon" href={{asset("assets/frontend/img/logo2.png")}} type="image/x-icon" />
  <!-- Google Font -->
  <link
   href="https://fonts.googleapis.com/css2?family=Play:wght@400;700&display=swap"
   rel="stylesheet"
  />
  <link
   href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&display=swap"
   rel="stylesheet"
  />

  <!-- Css Styles -->
  <link rel="stylesheet" href={{asset("assets/frontend/css/bootstrap.min.css")}} type="text/css" />
  <link rel="stylesheet" href={{asset("assets/frontend/css/all.min.css")}} type="text/css" />
  <link rel="stylesheet" href={{asset("assets/frontend/css/elegant-icons.css")}} type="text/css" />
  <link rel="stylesheet" href={{asset("assets/frontend/css/owl.carousel.min.css")}} type="text/css" />
  <link rel="stylesheet" href={{asset("assets/frontend/css/magnific-popup.css")}} type="text/css" />
  <link rel="stylesheet" href={{asset("assets/frontend/css/slicknav.min.css")}} type="text/css" />
  <link rel="stylesheet" href={{asset("assets/frontend/css/style.css")}} type="text/css" />

  @yield('css')
  @livewireStyles
 </head>

 <body>
  <!-- Page Preloder -->
  <div id="preloder">
   <div class="loader"></div>
  </div>

<div class="container my-5">
 <div class="col-md-6 mx-auto">
  <div class="card">
   <div class="card-header">
    <h3 class="text-center">Sign In Form Auth</h3>
   </div>
   <div class="card-body">
    <form method="POST" action="{{ route('login') }}">
      @csrf
      <div class="form-group mb-3">
        <label for="email">Email Address</label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
          @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
       </div>
       <div class="form-group mb-3">
        <label for="password">Password</label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
       </div>
       <div class="form-gorup mb-3">
        <button type="submit" class="btn btn-primary">Login Now</button>
       </div>
    </form>
   </div>
  </div>
 </div>
</div>

<!-- Js Plugins -->
<script src={{asset("assets/frontend/js/jquery-3.3.1.min.js")}}></script>
<script src={{asset("assets/frontend/js/bootstrap.min.js")}}></script>
<script src={{asset("assets/frontend/js/jquery.magnific-popup.min.js")}}></script>
<script src={{asset("assets/frontend/js/mixitup.min.js")}}></script>
<script src={{asset("assets/frontend/js/masonry.pkgd.min.js")}}></script>
<script src={{asset("assets/frontend/js/jquery.slicknav.js")}}></script>
<script src={{asset("assets/frontend/js/owl.carousel.min.js")}}></script>
<script src={{asset("assets/frontend/js/main.js")}}></script>

@livewireScripts
@yield('js')
@stack('js')
</body>
</html>
