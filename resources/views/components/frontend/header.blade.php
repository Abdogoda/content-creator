<header class="header" id="header">
 <div class="container">
  <div class="row align-items-center">
   <div class="col-lg-2">
    <div class="header__logo">
     <a href={{url("/")}} class=" d-flex align-items-center"
      ><img src={{asset("assets/frontend/img/logo/logo-03.png")}} alt="website-logo" class="mr-1 header__logo__img" />
      {{$WEBSITE_NAME}}</a
     >
    </div>
   </div>
   <div class="col-lg-10">
    <div class="header__nav__option">
     <nav class="header__nav__menu mobile-menu">
      <ul>
       <li class="active" data-link=""><a href={{url("/")}}>{{__('main.home')}}</a></li>
       <li data-link="about"><a href={{url('/about')}}>{{__('main.about')}}</a></li>
       <li data-link="portfolio"><a href={{url("/portfolio")}}>{{__('main.portfolio')}}</a></li>
       <li data-link="services">
        <a href="#">{{__('main.services')}}</a>
        <ul class="dropdown">
            <li data-link="services"><a href={{url("/services")}}>{{__('main.all_services')}}</a></li>
            @foreach (App\Models\Service::all() as $service)
               <li data-link="{{$service->slug}}"><a href={{url("/services/".$service->slug)}}>{{$service->name}}</a></li>
            @endforeach
        </ul>
       </li>
       <li data-link="contact"><a href={{url("/contact")}}>{{__('main.contact')}}</a></li>
       <div class="header__nav__social">
        @if (Auth::check())
         @if (Auth::user()->role_as == 'user')
            <li>
               <a href="#">{{Auth::user()->name}}</a>
               <ul class="dropdown">
                  <li data-link="profile"><a href={{url("/profile")}}>{{__('main.profile')}}</a></li>
                  <li data-link="logout"><a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                     {{ __('frontend/main.sign_out') }}
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                     @csrf
                  </form></li>
               </ul>
            </li>
         @else
               <li><a href="{{url('/admin')}}">{{__('main.admin')}}</a></li>
         @endif
        @else
         <li data-link="login"><a href={{url('/login')}} title="{{__('main.sign_in')}}"><i class="fa fa-user"></i></a></li>
        @endif
         <li>
            <a href="#" class="country-flag1">
               @if (App::getLocale() == 'ar')
                  <img src="{{asset('assets/img/flags/egypt_flag.png')}}" alt="eg_img" style="width: 30px">
               @else
                  <img src="{{asset('assets/img/flags/us_flag.jpg')}}" alt="us_img" style="width: 30px">
               @endif
            </a>
            <ul class="dropdown">
                  @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                     <li>
                        <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                           {{ $properties['native'] }}
                       </a>
                     </li>
                  @endforeach
            </ul>
         </li>
       </div>
      </ul>
     </nav>
    </div>
   </div>
  </div>
  <div id="mobile-menu-wrap"></div>
 </div>
</header>