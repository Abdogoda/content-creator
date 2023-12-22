@extends('layouts.backend.backendlayout')
@section('title', 'Dashboard | Contact')
@section('content')

<div class="contianer px-4">
  <div class="card shadow-lg my-5">
   <div class="card-header">
    <h1 class="">{{__('main.contact_information')}}</h1>
   </div>
    <form action="{{\LaravelLocalization::localizeURL('/admin/contact-us')}}" method="post" enctype="multipart/form-data">
     @csrf
     <div class="card-body">
      <div class="form-group mb-3">
       <label for="phone">{{__('form.phone_number')}} <small class="text-danger pl-2">*</small></label>
       <input type="text" name="phone" id="phone" value="{{$contact->phone}}" class="form-control" maxlength="11" minlength="11">
       @error('phone')
        <small class="text-danger">{{ $message }}</small> 
       @enderror
      </div>
      <div class="form-group mb-3">
       <label for="phone_2">{{__('form.phone_number')}} 2 <small class="text-danger pl-2">*</small></label>
       <input type="text" name="phone_2" id="phone_2" value="{{$contact->phone_2}}" class="form-control" maxlength="11" minlength="11">
       @error('phone_2')
        <small class="text-danger">{{ $message }}</small> 
       @enderror
      </div>
      <div class="form-group mb-3">
       <label for="email">{{__('form.email_address')}} <small class="text-danger pl-2">*</small></label>
       <input type="email" name="email" id="email" value="{{$contact->email}}" class="form-control">
       @error('email')
        <small class="text-danger">{{ $message }}</small> 
       @enderror
      </div>
      <div class="form-group mb-3">
       <label for="address">{{__('contact.address')}} <small class="text-danger pl-2">*</small></label>
       <textarea name="address" id="address" value="{{$contact->address}}" class="form-control">{{$contact->address}}</textarea>
       @error('address')
        <small class="text-danger">{{ $message }}</small> 
       @enderror
      </div>
      <div class="form-group mb-3">
        <label for="location">{{__('contact.location')}} <small class="text-danger pl-2">*</small></label>
        <input type="url" name="location" id="location" value="{{$contact->location}}" class="form-control">
        @error('location')
         <small class="text-danger">{{ $message }}</small> 
        @enderror
       </div>
      <div class="form-gorup mb-3">
       <button type="submit" class="btn btn-primary">{{__('main.save_date')}}</button>
      </div>
     </div>
    </form>
  </div>
</div>
<div class="contianer px-4">
  <div class="card shadow-lg my-5">
   <div class="card-header">
    <div class="d-flex justify-content-between align-items-center">
      <h1 class="">{{__('contact.socail_links')}}</h1>
      <button type="button" onclick="addLink()" class="btn btn-primary btn-sm">{{__('contact.add_another_link')}}</button>
    </div>
   </div>
    @isset($sociallinks)
    <form action="{{\LaravelLocalization::localizeURL('/admin/contact-links')}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="card-body">
      <div class="linksContainer row">
        @foreach ($sociallinks as $key => $sociallink)
          <div class="col-md-6 mb-3" id="link_{{$key}}">
            <div class="border p-2">
              <div class="d-flex align-items-center gap-2 mb-2">
                <i class="fs-2 fab fa-{{$sociallink->name}}"></i>
                <div class="form-group" style="width: 100%">
                  <input type="name" placeholder="Enter the name of the socail link in small letters eg: facebook"  value="{{$sociallink->name}}" name="names[]" class="form-control mb-2">
                  @error('names.'.$key)
                  <small class="text-danger">{{ $message }}</small> 
                 @enderror
                  <input type="text" placeholder="Enter the url of the social link" value="{{$sociallink->link}}"  name="links[]" class="form-control">
                  @error('links.'.$key)
                  <small class="text-danger">{{ $message }}</small> 
                 @enderror
                </div>
              </div>
              <button type="button" onclick="removeLink({{'link_'.$key}})"class="btn btn-danger btn-sm">{{__('main.delete')}} <i class="fa fa-trash"></i></button>
            </div>
          </div>
        @endforeach
      </div>
       <div class="form-gorup mb-3">
        <button type="submit" class="btn btn-primary">{{__('main.save_date')}}</button>
       </div>
      </div>
     </form>
    @endisset
  </div>
</div>
@endsection

@section('js')
    <script>
     const linksContainer = document.querySelector('.linksContainer');
     const addLink = () => {
      var linksCount = linksContainer.childElementCount;
      linksContainer.innerHTML += `
      <div class="col-md-6 mb-3" id="link_${linksCount}">
            <div class="border p-2">
              <div class="d-flex align-items-center gap-2 mb-2">
                <i class="fs-2 fab fa-ss"></i>
                <div class="form-group" style="width: 100%">
                  <input type="name" value="" placeholder="Enter the name of the socail link in small letters eg: facebook" name="names[]" required class="form-control mb-2">
                  @error('names.${linksCount}')
                  <small class="text-danger">{{ $message }}</small> 
                 @enderror
                  <input type="url" value="" placeholder="Enter the url of the social link" name="links[]" required class="form-control">
                  @error('links.${linksCount}')
                  <small class="text-danger">{{ $message }}</small> 
                 @enderror
                </div>
              </div>
              <button type="button" onclick="removeLink(link_${linksCount})"class="btn btn-danger btn-sm">Delete <i class="fa fa-trash"></i></button>
            </div>
          </div>`
     }
     const removeLink = (link) => {
      link.remove();
     }
    </script>
@endsection