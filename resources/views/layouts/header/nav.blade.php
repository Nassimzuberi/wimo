
    <nav class="navbar navbar-expand navbar-light bg-white " style="height:60px;" >


        <ul class="navbar-nav mr-auto mt-lg-0">
            <li class="nav-item dark">
                <a class="nav-link text-shadow-pop-br" href="{{route('map.index')}}"> map </a>
            </li>
        </ul>
        <a class="navbar-brand  wimo-logo " href="{{url('/')}}">
            <img class="" src="{{asset('images/wimo-logo.png')}}" alt="" style="height:33px; filter: drop-shadow(4px 4px 0px #1CE6BE);">
        </a>
        <ul class="navbar-nav align-items-center" style="flex-direction:row;">

            @auth
                <li class="nav-item" >
                    <a class="nav-link" href="{{route('cart')}}">  <span class="basket-numer" style="font-family: 'Montserrat', sans-serif; font-weight:300;">{{Cart::count()}}</span> <i class="fas fa-shopping-basket" style="transition: 0.2s"></i></A>
                </li>
                <li class="nav-item">
                    <a id="navbarDropdown" class="nav-link dropdown logged-user-icon floating" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <img src="{{ asset('/images/user-icons/'.Auth::id().'.jpg') }}" alt="user-icon" id="user-icon" width='50'> <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right user-commands" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('user.commandes',Auth::id()) }}">
                            commandes
                        </a>
                        <a class="dropdown-item" href="{{ url('/comptes') }}">
                            compte
                        </a>
                        <a style="color:tomato" class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                            {{ __('déconnexion') }}
                            <form method="post" id="logout-form" action="{{route('logout')}}"> @csrf </form>
                        </a>
                </li>

            @else
                <li class="nav-item">
                    <a class="nav-link text-shadow-pop-br" href="{{route('login')}}">connexion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-shadow-pop-br" href="{{route('register')}}">inscription </a>
                </li>
                @endauth
                </div>
    </nav>
