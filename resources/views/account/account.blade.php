@extends('layouts.app',['additional_head'=>'account.head'])

@section('title') Mon compte @endsection
@section('content')
    <div class="pt-5">

        @include('layouts.account.nav')

            {{-- Notification de succès --}}
            @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="text-center" style="margin:15px;background-color:#ffffff;">
                <div style="height:150px;background-size:cover;"></div>
                <div><img class="rounded-circle" style="margin-top:-70px;" src="{{Storage::disk()->url(Auth::user()->avatar)}}" height="150px" />
                    <h3>{{Auth::user()->fullname()}}</h3>
                    <p>
                        <small style="padding:20px;padding-bottom:0;padding-top:5px;">Statut :
                            @if(Auth::user()->role_id == 1) <span>Admin</span>
                            @elseif(Auth::user()->role_id == 3) <span>@lang('app.moderator')</span>
                            @elseif((!is_null(Auth::user()->seller))) <span>@lang('app.seller')</span>
                            @else <span>@lang('app.tourist')</span>
                            @endif
                        </small>
                    </p>
                </div>
                <div class="row" style="padding:0;padding-bottom:10px;padding-top:20px;">
                    <div class="col-md-6">
                        <p class="text-nowrap text-right">@lang('app.name')</p>
                        <p class="text-right"><strong>{{Auth::user()->fullname()}}</strong></p>
                    </div>
                    <div class="col-md-6">
                        <p class="text-left">@lang('app.gender')</p>
                        <p class="text-left"><strong>{{Auth::user()->gender}}</strong></p>
                    </div>
                </div>
                <div class="row" style="padding:0;padding-bottom:10px;padding-top:20px;">
                    <div class="col-md-6">
                        <p class="text-nowrap text-right">@lang('app.mail')</p>
                        <p class="text-right"><strong>{{Auth::user()->email}}</strong></p>
                    </div>
                    <div class="col-md-6">
                        <p class="text-left">@lang('app.birthday')</p>
                        <p class="text-left"><strong>{{date('d/m/Y',strtotime(Auth::user()->birthday))}}</strong></p>
                    </div>
                </div>
                <a href="javascript:close_account('user')" class="btn btn-link text-danger text-decoration-none">
                    <!-- Lien qui désactive le compte de l'utilisateur -->
                    @lang('app.delete_account')
                    <form method="post" id="destroy_user" action="{{route('comptes.destroy',Auth::user())}}">
                        @csrf
                        @method('DELETE')
                    </form>
                </a>
            </div>

        </div>



@endsection
