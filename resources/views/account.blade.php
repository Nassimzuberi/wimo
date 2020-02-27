@extends('layouts.app')
@section('content')
<script type="text/javascript">
    function ma_fct(){
        if(confirm('Voulez-vous désactiver votre compte de vendeur ?')){
            document.getElementById('destroy_seller').submit();
        }
    }
</script>
<h1>Gestion de compte</h1>
<ul>
    <li>
        <a href="{{route('comptes.edit',compact('compte'))}}">Modifier mon profil</a>
    </li>
    <li>
        <a href="">Modifier mon mot de passe</a>
    </li>
    @isset($seller)
        <li>
            <a href="magasin">Mon magasin</a>
        </li>
        <li>
            <a href="javascript:ma_fct()">Désactiver mon compte de vendeur</a>
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
        <a href="javascript:ma_fct()">Désactiver mon compte</a>
        <form method="post" id="destroy_user" action="{{route('user.destroy',Auth::id())}}">
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
