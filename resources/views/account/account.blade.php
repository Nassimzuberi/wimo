@extends('layouts.app',['additional_head'=>'account.head'])

@section('title') Mon compte @endsection
@section('content')

    <div class="container pt-3">
        <div class="text-center profile-card" style="margin:15px;background-color:#ffffff;">
            <div class="profile-card-img" style="height:150px;background-size:cover;"></div>
            <div><img class="rounded-circle" style="margin-top:-70px;" src="{{asset(file_exists(public_path().'/images/user-icons/'.Auth::id().'.jpg') ? '/images/user-icons/'.Auth::id().'.jpg' : '/images/user-icon.png')}}" height="150px" />
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
                <a href="{{route('comptes.edit',Auth::user())}}" class="text-decoration-none">@lang('app.edit_profil')</a>
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
            <ul class="list-inline text-center">
                <li class="list-inline-item">
                </li>
                <li class="list-inline-item">
                    <a href="">@lang('app.edit_password')</a>
                </li>
                @isset($seller)
                    <li class="list-inline-item">
                        <a href="{{url('magasin')}}">@lang('app.my_market')</a>
                    </li>
                    <li class="list-inline-item">
                        <!-- Lien qui désactive le compte du vendeur -->
                        <a href="javascript:close_account('seller')">@lang('app.delete_seller')</a>
                        <form method="post" id="destroy_seller" action="{{route('vendeurs.destroy',$seller->id)}}">
                            @csrf
                            @method('DELETE')
                        </form>
                    </li>
                @else
                    <li class="list-inline-item">
                        <a href="{{route('vendeurs.create')}}">@lang('app.become_seller')</a>
                    </li>
                @endisset
                <li class="list-inline-item">
                    <a href="{{ url('/users/tickets') }}"><i class="fas fa-exclamation-triangle"></i>@lang('app.signal')</a>
                </li>
                <li class="list-inline-item">
                    <!-- Lien qui désactive le compte de l'utilisateur -->
                    <a href="javascript:close_account('user')" class="text-danger">@lang('app.delete_account')</a>
                    <form method="post" id="destroy_user" action="{{route('comptes.destroy',Auth::user())}}">
                        @csrf
                        @method('DELETE')
                    </form>
                </li>
            </ul>
        </div>

        {{-- Notification de succès --}}
        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>

@endsection
