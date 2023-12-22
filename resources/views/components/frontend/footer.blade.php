<footer class="footer">
 <div class="container">
  <div class="footer__top">
   <div class="row">
    <div class="col-lg-6 col-md-6">
     <div class="footer__top__logo">
      <a href={{url("/")}} class="text-white d-flex align-items-center"
      >
      <img src={{asset("assets/frontend/img/logo/logo-03.png")}} alt="website-logo" class="mr-1 header__logo__img" />
      {{$WEBSITE_NAME}}</a
     >
     </div>
    </div>
    <div class="col-lg-6 col-md-6">
     <div class="footer__top__social">
      @foreach (App\Models\ContactLink::all() as $item)
       <a href="{{$item->link}}" target="_blank" aria-label="{{$item->name}}" title="{{$item->name}}"><i class="fab fa-{{$item->name}}"></i></a>
     @endforeach
     </div>
    </div>
   </div>
  </div>
  <div class="footer__option">
   <div class="row">
    <div class="col-sm-6 col-md-5">
     <div class="footer__option__item">
      <h5>{{__('about.about_us')}}</h5>
       <p>{{substr(App\Models\Page::where('slug', 'about-us')->first()->description, 0, 300)}}...</p>
       <a href="{{url('/about')}}" class="read__more">{{__('about.read_more_about_us')}}</a>
     </div>
    </div>
    <div class="col-sm-6 col-md-2">
     <div class="footer__option__item">
      <h5>{{__('main.quick_links')}}</h5>
      <ul>
       <li><a href="{{url('/about')}}" aria-label="{{__('main.about')}}">{{__('main.about')}}</a></li>
       <li><a href="{{url('/services')}}" aria-label="{{__('main.services')}}">{{__('main.services')}}</a></li>
       <li><a href="{{url('/portfolio')}}" aria-label="{{__('main.portfolio')}}">{{__('main.portfolio')}}</a></li>
       <li><a href="{{url('/contact')}}" aria-label="{{__('main.contact')}}">{{__('main.contact')}}</a></li>
      </ul>
     </div>
    </div>
    <div class="col-sm-6 col-md-2">
     <div class="footer__option__item">
      <h5>{{__('services.our_services')}}</h5>
      <ul>
        @foreach (App\Models\Service::all() as $service)
            <li><a href={{url("/services/".$service->slug)}} aria-label="{{$service->name}}">{{$service->name}}</a></li>
         @endforeach
       <li><a href="{{url('/services')}}">{{__('main.all_services')}}</a></li>
      </ul>
     </div>
    </div>
    <div class="col-sm-6 col-md-3">
     <div class="footer__option__item">
      <h5>{{__('contact.contact_us')}}</h5>
      <p class="d-flex flex-column">
       <a href={{"tel:+20".App\Models\Contact::all()->first()->phone}} aria-label="Phone"><i class="fa fa-phone mr-2" style="color: white"></i> {{App\Models\Contact::all()->first()->phone}}</a>
       <a href={{"mailto:".App\Models\Contact::all()->first()->email}} aria-label="Email"><i class="fa fa-envelope mr-2" style="color: white"></i> {{App\Models\Contact::all()->first()->email}}</a>
       <a href="#" aria-label="Location"><i class="fa fa-location-dot mr-2" style="color: white"></i> {{App\Models\Contact::all()->first()->address}}</a>
       <a href="{{url('/contact#contact')}}" class="primary-btn mt-4" style="width: fit-content"
       aria-label="Contact">{{__('contact.get_in_touch')}}</a
       >
      </p>
     </div>
    </div>
   </div>
  </div>
 </div>
</footer>