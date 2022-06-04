<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CES') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/script.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">
    

    <main class="container-fluid">

       <div class="row">
           <div class="col-lg-2" style="background-color: aquamarine;">

              @include('includes.sidebar')

           </div>

           <div class="col-lg-10">
                <div class="row">  
                    @include('includes.top_nav')
                
                    <div class="col-10">
                        @yield('content')
                    </div>     
                </div>
           </div>
    
      {{-- <div class="row">
        <div class="col p-4">
          <!-- toggler -->
          <button id="sidebarCollapse" class="float-end" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" role="button" aria-label="Toggle menu">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
          </button>
        </div>
      </div> --}}

      {{-- @yield('content') --}}
    </main>

    <footer class="container text-muted border-top mt-auto">
      <div class="row">
        <div class="col p-2">
        Copyright All rights reserved 2022
        </div>
      </div>
    </footer>
</body>
</html>
