<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') {{ config('app.name', 'Wimo') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
<script src="https://kit.fontawesome.com/0a9da0bbd4.js" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <!--  <link rel="stylesheet" href="{{ asset('css/styles2.css') }}"> -->
    @yield('extra-script')
    <!-- LEAFLET -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
  integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
  crossorigin=""/>
  <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
   integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
   crossorigin=""></script>
</head>
<body>
    <div id="app">

      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="{{url('/')}}">
          <img src="{{asset('images/wimo-logo.png')}}" alt="" style="height:43px; filter: drop-shadow(4px 4px 0px #1CE6BE);">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">

          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('produit.index')}}"> Les produits </a>
            </li>
            <li class="nav-item">
            </li>

          </ul>
          <ul class="navbar-nav align-items-center">
            <li class="nav-item">
              <a class="nav-link" href="{{route('cart')}}"> <i class="fas fa-shopping-cart"></i> <span class="badge badge-info">{{Cart::count()}}</span> </A>
            </li>
          @auth
          <li class="nav-item">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <img src="{{asset('images/user.png')}}" alt="user-icon" id="user-icon" width='50'> <span class="caret"></span>
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

  <!--    <header>

        <div id="header-left">
          <a href="{{route('cart')}}"> Panier <span class="badge badge-info">{{Cart::count()}}</span> </A>
        </div>
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

        <main class=" container py-4">
            @yield('content')
        </main>
    </div>
    @yield('extra-js')
</body>
</html>
