@extends('layouts.backend.backendlayout')
@section('title', 'Dashboard')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">{{__('main.dashboard')}}</h1>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body d-flex align-items-center justify-content-between">{{__('main.services')}} <h5>{{$services_count}}</h5></div>
                <div
                    class="card-footer d-flex align-items-center justify-content-between"
                >
                    <a
                        class="small text-white stretched-link"
                        href="{{url('/admin/services')}}"
                        >{{__('main.view_details')}}</a
                    >
                    <div class="small text-white">
                        <i class="fas fa-angle-right"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body d-flex align-items-center justify-content-between">{{__('portfolio.works')}} <h5>{{$works_count}}</div>
                <div
                    class="card-footer d-flex align-items-center justify-content-between"
                >
                    <a
                        class="small text-white stretched-link"
                        href="{{url('/admin/services')}}"
                        >{{__('main.view_details')}}</a
                    >
                    <div class="small text-white">
                        <i class="fas fa-angle-right"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body d-flex align-items-center justify-content-between">{{__('main.admins')}} <h5>{{$admins_count}}</h5></div>
                <div
                    class="card-footer d-flex align-items-center justify-content-between"
                >
                    <a
                        class="small text-white stretched-link"
                        href="{{url('/admin/admins')}}"
                        >{{__('main.view_details')}}</a
                    >
                    <div class="small text-white">
                        <i class="fas fa-angle-right"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body d-flex align-items-center justify-content-between">{{__('main.visitors')}} <h5>{{$visitors_count}}</h5></div>
                <div
                    class="card-footer d-flex align-items-center justify-content-between"
                >
                    <a
                        class="small text-white stretched-link"
                        href="#"
                        >{{__('main.view_details')}}</a
                    >
                    <div class="small text-white">
                        <i class="fas fa-angle-right"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            
        </div>
    </div>
</div>
@endsection