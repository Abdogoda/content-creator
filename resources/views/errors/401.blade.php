<!DOCTYPE html>
<html lang="zxx">
 <head>
  <meta charset="UTF-8" />
  <meta name="description" content="Videograph Template" />
  <meta name="keywords" content="Videograph, unica, creative, html" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>{{__('errors.401_unauthorized')}}</title>

  <!-- logo -->
  <link rel="shortcut icon" href={{asset("assets/frontend/img/logo2.png")}} type="image/x-icon" />
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Css Styles -->
  <link rel="stylesheet" href={{asset("assets/frontend/css/bootstrap.min.css")}} type="text/css" />
  <link rel="stylesheet" href={{asset("assets/frontend/css/style.css")}} type="text/css" />
  @if (App::getLocale() == 'ar')
  <link rel="stylesheet" href={{asset("assets/frontend/css/style_rtl.css")}} type="text/css" />
 @endif
<style>
    .error-section{
        padding-top: 200px;
    }
    .error-image{
        margin-top: -80px;
    }
    @media (max-width:768px){
        .error-section{
        padding-top: 50px;
        }
        .error-image{
            margin-top: 0;
        }
    }
</style>
 </head>

 <body>

  <section class="error-section spad background-3-20" style="min-height: 100vh">
    <div class="container">
     <div class="row">
      <div class="col-md-6">
       <div class="services__title">
        <div class="section-title">
            <span>{{__('errors.error_page')}}</span>
            <h2>{{__('errors.401_unauthorized')}}</h2>
        </div>
            <p>{{__('errors.401_description')}}</p>
        <a href={{url('/')}} class="primary-btn">{{__('errors.go_home')}}</a>
       </div>
      </div>
      <div class="col-md-6 d-flex justify-content-center">
        <img class="error-image" style="width: 80%" src={{asset('assets/frontend/img/errors/401.svg')}} alt="error-401-image">
     </div>
     </div>
    </div>
  </section>

</body>
</html>



