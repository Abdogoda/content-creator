@extends('layouts.backend.backendlayout')
@section('title', 'Dashboard | Reviews')
@section('content')

<div class="contianer px-4">
  <div class="card shadow-lg my-5">
   <div class="card-header d-flex align-items-center justify-content-between">
    <h1 class="">{{__('main.our_reviews')}}</h1>
   </div>
   <div class="card-body">
    <div class="mt-4">
      @isset($reviews)
       @forelse ($reviews as $review)
        <div class="message-row p-3">
          <div class="message-header d-flex align-items-center justify-content-between flex-wrap">
            <div class="message-info d-flex">
              <div class="message-logo text-capitalize">{{str(mb_substr($review->name ? $review->name : __('main.unknown'), 0, 1))}}</div>
              <div>
                <p>{{$review->name ? $review->name : __('main.unknown')}}</p>
              </div>
            </div>
              <small class="text-muted">{{$review->created_at->diffForHumans()}}</small>
          </div>
            <div class="message-text">
              <p class="message-content">
                {{$review->text}}
              </p>
              <div class="row">
                <div class="col-md-8"></div>
                <div class="col-md-4 d-flex align-items-end gap-2 mt-3">
                  <a href="{{url('admin/reviews/delete/'.$review->id)}}" onclick="return confirm('{{__('messages.are_you_sure_to_delete_review')}}')" class="btn btn-sm btn-danger" style="width:100%">{{__('main.delete')}} <i class="fa fa-trash"></i></a>
                </div>
  
              </div>
            </div>
        </div>
       @empty
           <div class="col-12 text-center border py-2 fs-5" >{{__('main.no_reviews_available')}}</div>
       @endforelse
      @endisset
      </div>
     </div>
   </div>
</div>
@endsection