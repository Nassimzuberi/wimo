<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Titre -->
    <title>{{ config('app.name', 'Wimo') }} | @yield('title') </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/0a9da0bbd4.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    @yield('extra-script')

    <!-- Favicon --> 

    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('/images/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('/images/apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('/images/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/images/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('/images/apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('/images/apple-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('/images/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('/images/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/images/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('/images/android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/images/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('/images/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/images/favicon-16x16.png')}}">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">


</head>



<body>

    <div id="app">
      <header>
      <nav class="navbar navbar-expand navbar-light bg-white " style="height:70px;" >

          
          <ul class="navbar-nav mr-auto mt-lg-0">
            <li class="nav-item dark">
              <a class="nav-link text-shadow-pop-br" href="{{route('map.index')}}"> map </a>
            </li>
          </ul>
          <a class="navbar-brand  wimo-logo " href="{{url('/')}}">
            <img class="" src="{{asset('images/wimo-logo.png')}}" alt="" style="height:43px; filter: drop-shadow(4px 4px 0px #1CE6BE);">
        </a>
          <ul class="navbar-nav align-items-center" style="flex-direction:row;">
            
          @auth
          <li class="nav-item" >
            <a class="nav-link" href="{{route('cart')}}"> <i class="fas fa-shopping-cart" style="transition: 0.2s"></i> <span class="badge badge-info round-border" style="background-color:#1CE6BE;filter: drop-shadow(0px 0px 1px #1CE6BE);">{{Cart::count()}}</span> </A>
          </li>
          <li class="nav-item">
                <a id="navbarDropdown" class="nav-link dropdown logged-user-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <img src="{{asset('images/user.png')}}" alt="user-icon" id="user-icon" width='50'> <span class="caret"></span>
                </a>
            <div class="dropdown-menu dropdown-menu-right user-commands" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('user.commandes',Auth::id()) }}">
                    Mes commandes
                </a>
                <a class="dropdown-item" href="{{ url('/compte') }}">
                    Mon compte
                </a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                    <form method="post" id="logout-form" action="{{route('logout')}}"> @csrf </form>
                </a>
              </li>

          @else
          <li class="nav-item">
            <a class="nav-link" href="{{route('login')}}">Connexion </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('register')}}">Inscription </a>
          </li>
          @endauth
        </div>
      </nav>
    </header>

    <!--<header>

        <div id="header-left">
          <a href="{{route('cart')}}"> Panier <span class="badge badge-info">{{Cart::count()}}</span> </A>
        </div>-->
        <!-- Logo --> <!--
        <a href="/"> <img src="{{asset('images/wimo-logo.png')}}" alt="" style="height:43px; filter: drop-shadow(4px 4px 0px #1CE6BE);"></a>

        <div id="header-right">

          <div id="user-icon-wrapper">
            @auth
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      <img src="{{asset('images/user.png')}}" alt="user-icon" id="user-icon"> <span class="caret"></span>
                  </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('user.commandes',Auth::id()) }}">
                      Mes commandes
                  </a>
                  <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                      <form method="post" id="logout-form" action="{{route('logout')}}"> @csrf </form>
                  </a>

                @endauth
          </div>
        </div>


      </header>
-->

        <main>
            @yield('content')
        </main>

    </div>
    @yield('extra-js')
  </body>
  
  </html>