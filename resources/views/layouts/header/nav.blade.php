<nav class="navbar navbar-expand navbar-light bg-white">
    <ul class="navbar-nav mr-auto mt-lg-0">
        <li class="nav-item dark">
            <a class="nav-link text-shadow-pop-br" href="{{route('map.index')}}">
                map
            </a>
        </li>
    </ul>
    <a class="navbar-brand  wimo-logo" href="{{url('/')}}">
      <img src="{{asset('images/wimo-logo.png')}}" alt="logo">
    </a>
    <ul class="navbar-nav align-items-center">

        <!-- Affichage du panier -->
        <li class="nav-item" >
            <a class="nav-link" href="{{route('cart')}}">
                <span class="basket-number">
                    {{Cart::count()}}
                </span>
                <i class="fas fa-shopping-basket"></i>
            </a>
        </li>
    @auth


        <!-- Menu déroulant de l'utilisateur -->
        <li class="nav-item">
            <a id="navbarDropdown" class="nav-link dropdown logged-user-icon floating" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                <img src="{{ asset('/images/user-icons/'.Auth::id().'.png') }}" alt="user-icon" id="user-icon" width='50'>
                <span class="caret"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right user-commands" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('user.commandes',Auth::id()) }}">
                    Mes commandes
                </a>
                <a class="dropdown-item" href="{{ route('comptes.show',Auth::user())}}">
                    Mon compte
                </a>
                <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="logout()">
                    {{ __('Logout') }}
                    <form method="post" id="logout-form" action="{{route('logout')}}">
                        @csrf
                    </form>
                </a>
            </div>
        </li>
    @else
        <li class="nav-item">
            <a class="nav-link text-shadow-pop-br" href="{{route('login')}}">
                connexion
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-shadow-pop-br" href="{{route('comptes.create')}}">
                inscription
            </a>
        </li>
    @endauth
</nav>
