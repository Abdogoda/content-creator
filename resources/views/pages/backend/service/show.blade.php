@extends('layouts.backend.backendlayout')
@section('title', 'Dashboard | Services')

@section('content')

<div class="contianer px-4">
  {{-- service information --}}
  <div class="card shadow-lg my-5">
    <div class="card-header d-flex align-items-center justify-content-between flex-wrap">
      <h1 class="">{{$service->name}}</h1>
      <a href="{{url('/admin/services')}}" class="btn btn-sm btn-primary">{{__('services.back_to_services')}}</a>
    </div>
    <div class="card-body">
      <form class="row" action="{{\LaravelLocalization::localizeURL('/admin/services/'. $service->id)}}" method="post" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <input type="hidden" name="locale" value="{{LaravelLocalization::getCurrentLocale()}}">
      <div class="col-md-12">
      <div class="form-group mb-3">
        <label for="name">{{__('services.service_name')}} <small class="text-danger pl-2">*</small></label>
        <input type="text" name="name" id="name" value="{{$service->name}}" class="form-control">
        @error('name')
        <small class="text-danger">{{ $message }}</small> 
        @enderror
      </div>
      </div>
      <div class="form-group mb-3">
        <label for="description">{{__('services.service_description')}} <small class="text-danger pl-2">*</small></label>
        <textarea name="description" id="description" value="{{$service->description}}" class="form-control">{{$service->description}}</textarea>
        @error('description')
        <small class="text-danger">{{ $message }}</small> 
        @enderror
      </div>

      <div class="col-md-6">
        <div class="form-group mb-3">
        <label for="meta_title">{{__('main.meta_title')}} <small class="text-danger pl-2">*</small></label>
        <input type="text" name="meta_title" id="meta_title" value="{{$service->meta_title}}" class="form-control">
        @error('meta_title')
          <small class="text-danger">{{ $message }}</small> 
        @enderror
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group mb-3">
        <label for="meta_keywords">{{__('main.meta_keywords')}} <small class="text-danger pl-2">*</small></label>
        <input type="text" name="meta_keywords" id="meta_keywords" value="{{$service->meta_keywords}}" class="form-control">
        @error('meta_keywords')
          <small class="text-danger">{{ $message }}</small> 
        @enderror
        </div>
      </div>
      <div class="form-group mb-3">
        <label for="meta_description">{{__('main.meta_description')}}</label>
        <textarea name="meta_description" id="meta_description" value="{{$service->meta_description}}" class="form-control">{{$service->meta_description}}</textarea>
        @error('meta_description')
        <small class="text-danger">{{ $message }}</small> 
        @enderror
      </div>
      <div class="form-group mb-3">
        <label for="icon">{{__('services.service_icon')}} <small class="text-danger pl-2">*</small></label>
        @isset($service->icon)
        <img src={{asset($service->icon)}} alt="service-image" width="70px" height="70px" class="d-block rounded p-2 border my-2">
        @endisset
        <input type="file" name="icon" id="icon" class="form-control" accept="image.*">
        @error('icon')
        <small class="text-danger">{{ $message }}</small> 
        @enderror
      </div>
      <div class="form-group mb-3">
        <label for="image">{{__('services.service_image')}} <small class="text-muted">(Optional)</small></label>
        @isset($service->image)
        <img src={{asset($service->image->image_path.'/'.$service->image->image_name)}} alt="service-image" width="70px" height="70px" class="d-block rounded p-2 border my-2">
        <a href="{{url('/admin/services/delete-image/'.$service->image->id)}}" class="btn btn-sm btn-danger">{{__('main.delete')}}</a>
        @endisset
        <input type="file" name="image" id="image" class="form-control" accept="image.*">
        @error('image')
        <small class="text-danger">{{ $message }}</small> 
        @enderror
      </div>
      <div class="form-gorup mb-3">
        <button type="submit" class="btn btn-primary">{{__("main.save_date")}}</button>
      </div>
    </form>
    </div>
  </div>
  <hr><hr>
  {{-- service feature card --}}
  <div class="card shadow-lg my-5">
    <div class="card-header d-flex flex-wrap align-items-center justify-content-between">
        <h1 class="">{{$service->name}} Features</h1>
        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addServiceFeatures">
          {{__('services.add_service_feature')}}
          </button>
    </div>
    <div class="card-body">
      <div class="row p-2">
        @forelse ($service->paragraphs as $key => $paragraph)
          <div class="d-flex flex-wrap justify-content-between align-items-center mt-2 border p-2 shadow">
            <div class="">
              <p class="m-0">{{$key+1}}- {{$paragraph->text}}</p>
            </div>
            <div class="">
              <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editServiceFeatures-{{$key}}">
                <i class="fa fa-edit"></i>
                </button>
              <a href="{{url('/admin/services/features/delete/'.$paragraph->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
            </div>
          </div>
          @include('pages.backend.service.edit_features')
        @empty
          <div class="d-flex align-items-center mt-2"><h3>{{__('services.no_features_for_this_service')}}</h3></div>
        @endforelse
      </div>
    </div>
  </div>
  <hr><hr>
  {{-- service work card --}}
  <div class="card shadow-lg my-5">
    <div class="card-header d-flex flex-wrap align-items-center justify-content-between">
        <h1 class="">{{__('portfolio.works')}}</h1>
        <div class="dropdown">
          <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            {{__('services.add_service_work')}}
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#addServiceVideoWork">
              {{__('services.add_video')}}
              </button>
            <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#addServiceImageWork">
              {{__('services.add_image')}}
              </button>
          </ul>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
          @forelse ($service->works as $key => $work)
          <div class="col-12 p-2">
            <div class="border p-2 thumbnail-holder">
              <div class="d-flex flex-wrap justify-content-between align-items-center">
                <h3>{{$work->name}}</h3>
                <div class="d-flex">
                  <button type="button" class="btn btn-sm btn-primary m-1" data-bs-toggle="modal" data-bs-target="#editServiceWork-{{$work->id}}">{{__('main.edit')}} <i class="fa fa-edit"></i></button>
                  <a href="{{url('/admin/services/delete-work/'.$work->id)}}" onclick="return confirm('{{__('messages.are_you_sure_to_delete_work')}}')" class="btn btn-danger btn-sm m-1">{{__('main.delete')}} <i class="fa fa-trash"></i></a>
                </div>
              </div><hr>
              <div class="row m-0">
                @if ($work->attachment_type === 'video')
                  <div class="col-md-6 bg-light p-2 border-bottom border-md-end text-center">
                      <p>{{__('services.work_attachment')}}</p>
                      <video src="{{asset('storage/'.$work->attachment)}}" style="max-width:100%;  max-height:200px" controls></video>
                  </div>
                  <div class="col-md-6 bg-light p-2 text-center" >
                    <p>{{__('services.work_thumbnail')}}</p>
                    <img src={{asset($work->image->image_path.'/'.$work->image->image_name)}} style="max-width:100%;  max-height:200px" alt="work-{{$key}}-thumbnail">
                  </div>
                @else
                  <div class="col-12 bg-light p-2">
                      <img src="{{asset('storage/'.$work->attachment)}}" style="max-width:100%;  max-height:200px" alt="work-{{$key}}-image">
                  </div>
                @endif
              </div>
            </div>
          </div>
          @include('pages.backend.service.edit_work')
        @empty
            <div class="col-12">
              <h3>{{__('services.no_works_for_this_service')}}</h3>
            </div>
        @endforelse
        </div>
    </div>
</div>
  @include('pages.backend.service.add_image_work')
  @include('pages.backend.service.add_video_work')
  @include('pages.backend.service.add_features')
</div>
@endsection



@section('js')
  <script>  
    const inputElement = document.querySelector('input[id="video"]');
        const pond = FilePond.create(inputElement);
        FilePond.setOptions({
          server: {
            url: '/admin/services/add-work/upload',
            headers: {
              'X-CSRF-TOKEN' : '{{ csrf_token() }}'
            }
          }
        })
  </script>
@endsection
