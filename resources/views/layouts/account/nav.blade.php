<div class="container">
    <div class=" row row-cols-1 row-cols-sm-6">

        <a href="{{route('comptes.index')}}" class="btn btn-light @if(Route::currentRouteName() == 'comptes.index' ) active @endif">
            @lang('app.my_profile')
        </a>

        <a href="{{route('comptes.edit',Auth::user())}}" class="btn btn-light @if(Route::currentRouteName() == 'comptes.edit' ) active @endif">
            @lang('app.edit_profil')
        </a>

        <a href="" class="btn btn-light @if(Route::currentRouteName() == 'comptes.edit.password' ) active @endif">
            @lang('app.edit_password')
        </a>
        <a href="{{route('user.commandes',Auth::id())}}" class="btn btn-light @if(Route::currentRouteName() == 'user.commandes' ) active @endif">
            @lang('app.command')
        </a>

        @isset(Auth::user()->seller)
            <a href="{{route('vendeurs.show',Auth::user()->seller->id)}}" class="btn btn-light @if(Route::currentRouteName() == 'vendeurs.show') active @endif">
                @lang('app.my_market')
            </a>
            <a href="javascript:close_account('seller')" class="btn btn-light @if(Route::currentRouteName() == 'comptes.edit.password' ) active @endif">
                <!-- Lien qui désactive le compte du vendeur -->
                @lang('app.delete_seller')
                <form method="post" id="destroy_seller" action="{{route('vendeurs.destroy',Auth::user()->seller->id)}}">
                    @csrf
                    @method('DELETE')
                </form>
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
