<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Wimo') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles2.css') }}">
</head>
<body>
    <div id="app">


      <header>

        <div id="header-left">

        </div>
        <!-- Logo -->
        <a href="/"> <img src="images/wimo-logo.png" alt="" style="height:43px; filter: drop-shadow(4px 4px 0px #1CE6BE);"></a>

        <div id="header-right">
          <div id="user-icon-wrapper">
            @auth


                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      <img src="images/user.png" alt="user-icon" id="user-icon"> <span class="caret"></span>
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


        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
