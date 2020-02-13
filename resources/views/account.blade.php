@extends('layouts.app')
@section('content')
<h1>Gestion de compte</h1>
<ul>
    <li>
        <a href="{{url('/compte/modifier/profil')}}">Modifier mon profil</a>
    </li>
    <li>
        <a href="">Modifier mon mot de passe</a>
    </li>
    @isset($seller)
        <li>
            <a href="{{url('/compte/magasin')}}">Mon magasin</a>
        </li>
    @else
        <li>
            <a href="{{url('/devenir/vendeur')}}">Devenir vendeur</a>
        </li>
    @endisset
    <li>
        <a href="">Désactiver mon compte</a>
    </li>
</ul>
{{-- Notification de succès --}}
@if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
@endsection
