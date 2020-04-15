@extends('layouts.app',['additional_head'=>'account.head'])
@section('content')

<h1>Gestion de compte</h1>
<ul>
    <li>
        <a href="{{route('comptes.edit',Auth::user())}}">Modifier mon profil</a>
    </li>
    <li>
        <a href="">Modifier mon mot de passe</a>
    </li>
    @isset($seller)
        <li>
            <a href="{{url('magasin')}}">Mon magasin</a>
        </li>
        <li>
            <!-- Lien qui désactive le compte du vendeur -->
            <a href="javascript:close_account('seller')">Désactiver mon compte de vendeur</a>
            <form method="post" id="destroy_seller" action="{{route('vendeurs.destroy',$seller->id)}}">
                @csrf
                @method('DELETE')
            </form>
        </li>
    @else
        <li>
            <a href="{{route('vendeurs.create')}}">Devenir vendeur</a>
        </li>
    @endisset
    <li>
        <!-- Lien qui désactive le compte de l'utilisateur -->
        <a href="javascript:close_account('user')">Désactiver mon compte</a>
        <form method="post" id="destroy_user" action="{{route('comptes.destroy',Auth::user())}}">
            @csrf
            @method('DELETE')
        </form>
    </li>
</ul>
{{-- Notification de succès --}}
@if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
@endsection
