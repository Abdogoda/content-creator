<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <title>@yield('title')</title>
        <!-- logo -->
        <link rel="shortcut icon" href={{asset("assets/frontend/img/logo/logo-02.png")}} type="image/x-icon" />
        <link
            href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css"
            rel="stylesheet"
        />
        @if (App::getLocale() == 'ar')
            <link href={{asset("assets/backend/css/styles_rtl.css")}} rel="stylesheet" />
            <link href="{{asset('assets/messages/alert_rtl.css')}}" rel="stylesheet">
        @else
            <link href={{asset("assets/backend/css/styles.css")}} rel="stylesheet" />
            <link href="{{asset('assets/messages/alert.css')}}" rel="stylesheet">
        @endif
        <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">

        
        <script
            src="https://use.fontawesome.com/releases/v6.3.0/js/all.js"
            crossorigin="anonymous"
        ></script>
    </head>
    <body class="sb-nav-fixed">
        <!-- Start Navbar -->
        @include('components.backend.navbar')
        <!-- End Navbar -->
        <div id="layoutSidenav">

            <!-- Start Messages -->
            @extends('components.messages')
            <!-- End Messages -->


            <!-- Start Sidebar -->
            @include('components.backend.sidebar')
            <!-- End Sidebar -->
            <div id="layoutSidenav_content">
                <main>
                    @yield('content')
                </main>
            </div>
        </div>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            crossorigin="anonymous"
        ></script>
        <script src={{asset("assets/backend/js/scripts.js")}}></script>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"
            crossorigin="anonymous"
        ></script>
        <script
            src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
            crossorigin="anonymous"
        ></script>
        <script src={{asset("assets/backend/js/datatables-simple-demo.js")}}></script>
        <script src={{asset('assets/messages/alert.js')}}></script>
        <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
        @yield('js')
    </body>
</html>