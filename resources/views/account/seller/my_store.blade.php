@extends('layouts.app')
@section('content')
<a href="{{route('comptes.show',Auth::user())}}">Mon compte</a>
<h1>Mon magasin</h1>
<ul>
	<li>
		<a href="{{route('annonces.index')}}">Mes annonces</a>
	</li>
	<li>
		<a href="{{route('inventaires.index')}}">Mon inventaire</a>
	</li>
	<li>
		<a href="">Mes commandes</a>
	</li>
</ul>
@endsection
