<div id="layoutSidenav_nav">
 <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
  <div class="sb-sidenav-menu">
      <div class="nav">
          <a class="nav-link" href="{{url('/admin')}}">
            <div class="sb-nav-link-icon">
                <i class="fas fa-chart-pie"></i>
            </div>
            {{__('main.dashboard')}}
        </a>
        <a class="nav-link"
        href="{{url('/admin/profile/'.Auth::user()->id)}}"
        ><div class="sb-nav-link-icon">
            <i class="fas fa-user"></i>
        </div> {{__('main.my_profile')}}</a >
        <a class="nav-link"
        href="{{url('/admin/admins')}}"
        ><div class="sb-nav-link-icon">
            <i class="fas fa-users"></i>
        </div> {{__('main.admins')}}</a >
      
        <div class="sb-sidenav-menu-heading">{{__('main.main')}}</div>
          <a
          class="nav-link collapsed"
          href="#"
          data-bs-toggle="collapse"
          data-bs-target="#sectionLayouts"
          aria-expanded="false"
          aria-controls="sectionLayouts"
      >
          <div class="sb-nav-link-icon">
              <i class="fas fa-list"></i>
          </div>
          {{__('main.sections')}}
          <div class="sb-sidenav-collapse-arrow">
              <i class="fas fa-angle-down"></i>
          </div>
      </a>
      <div class="collapse" id="sectionLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
        <nav class="sb-sidenav-menu-nested nav">
            <a class="nav-link" href="{{url('/admin/heros')}}">{{__('main.hero_section')}}</a>
            <a class="nav-link" href="{{url('/admin/counters')}}">{{__('main.counter_section')}}</a>
            <a class="nav-link" href="{{url('/admin/prevideo')}}">{{__('main.prevideo_section')}}</a>
        </nav>
      </div>
      <a
          class="nav-link collapsed"
          href="#"
          data-bs-toggle="collapse"
          data-bs-target="#pagesLayouts"
          aria-expanded="false"
          aria-controls="pagesLayouts"
      >
          <div class="sb-nav-link-icon">
              <i class="fa-solid fa-bars-staggered"></i>
          </div>
          {{__('main.pages')}}
          <div class="sb-sidenav-collapse-arrow">
              <i class="fas fa-angle-down"></i>
          </div>
      </a>
      <div class="collapse" id="pagesLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
        <nav class="sb-sidenav-menu-nested nav">
            @foreach (App\Models\Page::all() as $page)
            <a
            class="nav-link"
            href="{{url('/admin/pages/'.$page->slug)}}"
            >{{$page->title}}</a>
        @endforeach
        </nav>
      </div>
      <a
      class="nav-link collapsed"
      href="#"
      data-bs-toggle="collapse"
      data-bs-target="#servicesLayouts"
      aria-expanded="false"
      aria-controls="servicesLayouts"
  >
      <div class="sb-nav-link-icon">
          <i class="fas fa-photo-film"></i>
      </div>
      {{__('main.services')}}
      <div class="sb-sidenav-collapse-arrow">
          <i class="fas fa-angle-down"></i>
      </div>
  </a>
  <div
      class="collapse"
      id="servicesLayouts"
      aria-labelledby="headingOne"
      data-bs-parent="#sidenavAccordion"
  >
      <nav class="sb-sidenav-menu-nested nav">
        <a
              class="nav-link"
              href="{{url('/admin/services')}}"
              >{{__('main.all_services')}}</a
          >
        @foreach (App\Models\Service::all() as $service)
            <a
            class="nav-link"
            href="{{url('/admin/services/'.$service->slug)}}"
            >{{$service->name}}</a>
        @endforeach
      </nav>
  </div>
      <a class="nav-link" href="{{url('/admin/messages')}}">
        <div class="sb-nav-link-icon">
            <i class="fas fa-message"></i>
        </div>
        {{__('main.messages')}}
    </a>
      <a class="nav-link" href="{{url('/admin/reviews')}}">
        <div class="sb-nav-link-icon">
            <i class="fas fa-ranking-star"></i>
        </div>
        {{__('main.reviews')}}
    </a>
      <div class="sb-sidenav-menu-heading">{{__('main.settings')}}</div>
      <a class="nav-link" href="{{url('/admin/contact-us')}}">
        <div class="sb-nav-link-icon">
            <i class="fas fa-address-card"></i>
        </div>
        {{__('main.contact_information')}}
    </a>
      <a class="nav-link" href="{{url('/')}}" target="_blank">
        <div class="sb-nav-link-icon">
            <i class="fas fa-link"></i>
        </div>
        {{__('main.our_website')}}
    </a>
  </div>
 </nav>
</div>