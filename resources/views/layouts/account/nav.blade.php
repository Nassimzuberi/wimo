<ul class="nav nav-tabs">
	<li class="nav-item">
		<a href="{{route('comptes.index')}}" class="nav-link @if(Route::currentRouteName() == 'comptes.index' ) active @endif">
            <span class="material-icons align-top">account_circle</span>
            @lang('app.my_profile')
        </a>
	</li>
	<li class="nav-item">
        <a href="{{route('user.commandes',Auth::id())}}" class="nav-link @if(Route::currentRouteName() == 'user.commandes' ) active @endif">
            <i class="fas fa-shopping-basket"></i>
            @lang('app.command')
        </a>		
	</li>
	<li class="nav-item">
		@isset($seller_id)
			<!-- Pour une meilleure verification penser au fichier controller  -->

			<a class="nav-link @if(in_array(Route::currentRouteName(),['vendeurs.show','vendeurs.edit','vendeurs.annonces.index','vendeurs.annonces.show','annonces.edit','vendeurs.annonces.create'])) active @endif" href="{{route('vendeurs.show',$seller_id)}}">
				<span class="material-icons mx-auto align-top">store</span>
				<span>@lang('app.my_market')</span>
			</a>
		@else
            <a href="{{route('vendeurs.create')}}" class="nav-link @if(Route::currentRouteName() == 'vendeurs.create' ) active @endif">
                <span class="material-icons mx-auto align-top">store</span>
                @lang('app.become_seller')
            </a>
        @endisset		
	</li>
	<li class="nav-item">
		<a href="{{ url('/users/tickets') }}" class="nav-link text-danger @if(Route::currentRouteName() == 'my_tickets' ) active @endif">
            <i class="fas fa-exclamation-triangle"></i>
            @lang('app.signal')
        </a>
	</li>
</ul>