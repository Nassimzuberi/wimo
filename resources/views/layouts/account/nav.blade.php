<div class="container">
    <div class=" row row-cols-1 row-cols-sm-6 justify-content-center">

        <a href="{{route('comptes.index')}}" class="btn btn-light @if(Route::currentRouteName() == 'comptes.index' ) active @endif">
            @lang('app.my_profile')
        </a>

        <a href="{{route('comptes.edit',Auth::user())}}" class="btn btn-light @if(Route::currentRouteName() == 'comptes.edit' ) active @endif">
            @lang('app.edit_profil')
        </a>
        <a href="{{route('user.commandes',Auth::id())}}" class="btn btn-light @if(Route::currentRouteName() == 'user.commandes' ) active @endif">
            @lang('app.command')
        </a>

        @isset(Auth::user()->seller)
            <a href="{{route('vendeurs.show',Auth::user()->seller->id)}}" class="btn btn-light @if(Route::currentRouteName() == 'vendeurs.show') active @endif">
                @lang('app.my_market')
            </a>
        @else
            <a href="{{route('vendeurs.create')}}" class="btn btn-light @if(Route::currentRouteName() == 'vendeurs.create' ) active @endif">
                @lang('app.become_seller')
            </a>
        @endisset
        <a href="{{ url('/users/tickets') }}" class="btn btn-light text-danger @if(Route::currentRouteName() == 'my_tickets' ) active @endif">
            <i class="fas fa-exclamation-triangle"></i>@lang('app.signal')
        </a>

    </div>

</div>
