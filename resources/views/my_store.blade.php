@extends('layouts.app')
@section('content')
<a href="{{url('comptes')}}">Mon compte</a>
<h1>Mon magasin</h1>
<ul>
	<li>
		<a href="{{url('/annonces')}}">Mes annonces</a>
	</li>
	<li>
		<a href="{{url('/inventaires')}}">Mon inventaire</a>
	</li>
	<li>
		<a href="">Mes commandes</a>
	</li>
</ul>
@endsection
