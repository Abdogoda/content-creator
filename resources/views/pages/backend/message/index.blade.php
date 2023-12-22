@extends('layouts.backend.backendlayout')
@section('title', 'Dashboard | Messages')
@section('content')

<div class="contianer px-4">
  <div class="card shadow-lg my-5">
   <div class="card-header d-flex align-items-center justify-content-between">
    <h1 class="">{{__('main.our_messages')}}</h1>
    @if (count($unread_messages) > 0)
    <a href="{{url('/admin/message/mark-all-read')}}" class="btn btn-sm btn-primary">{{__('main.mark_all_as_read')}} ({{count($unread_messages)}})</a> 
    @endif
   </div>
   <div class="card-body">
    <div class="mt-4">
      @isset($unread_messages)
       @forelse ($unread_messages as $message)
        <div class="message-row p-3">
          <div class="message-header d-flex align-items-center justify-content-between flex-wrap">
            <div class="message-info d-flex">
              <div class="message-logo text-capitalize">{{str(mb_substr($message->name, 0, 1))}}</div>
              <div>
                <p>{{$message->name}}</p>
                <a href="mailto:{{$message->email}}" class="message-email">{{$message->email}}</a>
              </div>
            </div>
              <small class="text-muted">{{$message->created_at->diffForHumans()}}</small>
          </div>
            <div class="message-text">
              <p class="message-content">
                {{$message->message}}
              </p>
              <div class="row">
                <div class="col-md-8"></div>
                <div class="col-md-4 d-flex align-items-end gap-2 mt-3">
                  <a href="{{url('admin/message/mark-read/'.$message->id)}}" class="btn btn-sm btn-primary" style="width:100%">{{__('main.mark_as_read')}} <i class="fa fa-eye"></i></a>
                  <a href="{{url('admin/message/delete/'.$message->id)}}" class="btn btn-sm btn-danger" style="width:100%">{{__('main.delete')}} <i class="fa fa-trash"></i></a>
                </div>
  
              </div>
            </div>
        </div>
       @empty
           <div class="col-12 text-center border py-2 fs-5" >{{__('main.no_unreaded_messages')}}</div>
       @endforelse
      @endisset
      </div>
      <hr>
      <hr>
     <div class="mb-4">
      @isset($read_messages)
       @forelse ($read_messages as $message)
        <div class="message-row p-3">
          <div class="message-header d-flex align-items-center justify-content-between flex-wrap">
            <div class="message-info d-flex">
              <div class="message-logo text-capitalize">{{str(mb_substr($message->name, 0, 1))}}</div>
              <div>
                <p>{{$message->name}}</p>
                <a href="" class="message-email">{{$message->email}}</a>
              </div>
            </div>
              <small class="text-muted">{{$message->created_at->diffForHumans()}}</small>
          </div>
            <div class="message-text">
              <p class="message-content">
                {{$message->message}}
              </p>
              <div class="row">
                <div class="col-md-8"></div>
                <div class="col-md-4 d-flex align-items-end gap-2 mt-3">
                  <a href="{{url('admin/message/delete/'.$message->id)}}" class="btn btn-sm btn-danger" style="width:100%">{{__('main.delete')}} <i class="fa fa-trash"></i></a>
                </div>
  
              </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center border py-2 fs-5" >{{__('main.no_readed_messages')}}</div>
    @endforelse
      @endisset
      </div>
     </div>
     </div>
   </div>
</div>
@endsection