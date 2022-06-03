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

       <div class="row justify-content-center">
           <div class="col-lg-4">
            <nav class="offcanvas offcanvas-start show" tabindex="-1" id="offcanvas" data-bs-keyboard="false" data-bs-backdrop="true" data-bs-scroll="true">
                <div class="offcanvas-header border-bottom">
                  <a href="/" class="d-flex align-items-center text-decoration-none offcanvas-title d-sm-block">
                    <h3>
                      <i class="bi bi-chat-right-text-fill"></i>
                      Sidebar
                    </h3>
                  </a>
                </div>
                <div class="offcanvas-body px-0">
                  
                  <ul class="list-unstyled ps-0">
                    <li class="mb-1">
                      <button
                        class="btn btn-toggle align-items-center rounded"
                        data-bs-toggle="collapse"
                        data-bs-target="#home-collapse"
                        aria-expanded="true"
                      >
                        Home
                      </button>
                      <div class="collapse show" id="home-collapse" style="">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                          <li><a href="/" class="rounded">Overview</a></li>
                          <li><a href="#" class="rounded">Updates</a></li>
                          <li><a href="#" class="rounded">Reports</a></li>
                        </ul>
                      </div>
                    </li>
                    <li class="mb-1">
                      <button
                        class="btn btn-toggle align-items-center rounded collapsed"
                        data-bs-toggle="collapse"
                        data-bs-target="#dashboard-collapse"
                        aria-expanded="false"
                      >
                        Dashboard
                      </button>
                      <div class="collapse" id="dashboard-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                          <li><a href="#" class="rounded">Overview</a></li>
                          <li><a href="#" class="rounded">Weekly</a></li>
                          <li><a href="#" class="rounded">Monthly</a></li>
                          <li><a href="#" class="rounded">Annually</a></li>
                        </ul>
                      </div>
                    </li>
                    <li class="mb-1">
                      <button
                        class="btn btn-toggle align-items-center rounded collapsed"
                        data-bs-toggle="collapse"
                        data-bs-target="#orders-collapse"
                        aria-expanded="false"
                      >
                        Orders
                      </button>
                      <div class="collapse" id="orders-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                          <li><a href="#" class="rounded">New</a></li>
                          <li><a href="#" class="rounded">Processed</a></li>
                          <li><a href="#" class="rounded">Shipped</a></li>
                          <li><a href="#" class="rounded">Returned</a></li>
                        </ul>
                      </div>
                    </li>
                    <li class="border-top my-3"></li>
                    <li class="mb-1">
                      <button
                        class="btn btn-toggle align-items-center rounded collapsed"
                        data-bs-toggle="collapse"
                        data-bs-target="#account-collapse"
                        aria-expanded="false"
                      >
                        Account
                      </button>
                      <div class="collapse" id="account-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                          <li><a href="#" class="rounded">New...</a></li>
                          <li><a href="#" class="rounded">Profile</a></li>
                          <li><a href="#" class="rounded">Settings</a></li>
                          <li><a href="#" class="rounded">Sign out</a></li>
                        </ul>
                      </div>
                    </li>
                  </ul>
                </div>
              </nav>
           </div>

           <div class="col-lg-8">
                <div class="row">  
                    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                        <div class="container">
                            <a class="navbar-brand" href="{{ url('/') }}">
                                {{ config('app.name', 'Laravel') }}
                            </a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <!-- Left Side Of Navbar -->
                                <ul class="navbar-nav me-auto">

                                </ul>

                                <!-- Right Side Of Navbar -->
                                <ul class="navbar-nav ms-auto">
                                    <!-- Authentication Links -->
                                    @guest
                                        @if (Route::has('login'))
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                            </li>
                                        @endif

                                        @if (Route::has('register'))
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                            </li>
                                        @endif
                                    @else
                                        <li class="nav-item dropdown">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                {{ Auth::user()->name }}
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </div>
                                        </li>
                                    @endguest
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>

                <div class="row">
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
        <div class="col p-4">
        Copyright All rights reserved | Developed by Sam Holford 2021
        </div>
      </div>
    </footer>
</body>
</html>
