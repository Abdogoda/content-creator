<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark justify-content-between">
 <!-- Navbar Brand-->
 <a class="navbar-brand ps-3" href="{{url('/admin')}}">{{$WEBSITE_NAME}}</a>
 <!-- Sidebar Toggle-->
 <div class="d-flex gap-1">
    <button
     class="btn btn-link btn-sm"
     id="sidebarToggle"
     href="#!"
 >
     <i class="fas fa-bars"></i>
 </button>
 <!-- Navbar-->
 <ul class="navbar-nav my-2 my-md-0 p-0">
     <li class="nav-item dropdown">
         <a
             class="nav-link dropdown-toggle"
             id="navbarDropdown"
             href="#"
             role="button"
             data-bs-toggle="dropdown"
             aria-expanded="false"
             ><i class="fas fa-user fa-fw"></i
         ></a>
         <ul
             class="dropdown-menu dropdown-menu-end"
             aria-labelledby="navbarDropdown"
         >
             <li><a class="dropdown-item" href="{{url('/admin/profile/'.Auth::user()->id)}}">{{__('main.profile')}}</a></li>
             <li><a class="dropdown-item" href="{{url('/admin/settings')}}">{{__('main.settings')}}</a></li>
             <li><hr class="dropdown-divider" /></li>
             <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('main.logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
            </li>
         </ul>
     </li>
     <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle"
        id="navbarLanguageDropdown"
        href="#"
        role="button"
        data-bs-toggle="dropdown"
        aria-expanded="false">
           @if (App::getLocale() == 'ar')
              <img src="{{asset('assets/img/flags/egypt_flag.png')}}" alt="eg_img" style="width: 30px">
           @else
              <img src="{{asset('assets/img/flags/us_flag.jpg')}}" alt="us_img" style="width: 30px">
           @endif
        </a>
        <ul  class="dropdown-menu dropdown-menu-end"
        aria-labelledby="navbarLanguageDropdown">
              @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                 <li>
                    <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                       {{ $properties['native'] }}
                   </a>
                 </li>
              @endforeach
        </ul>
     </li>
 </ul>
 </div>
</nav>