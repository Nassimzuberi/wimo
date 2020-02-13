@extends('layouts.app')
@section('content')
<h1>Mon magasin</h1>
<ul>
	<li>
		<a href="{{url('compte/magasin/annonces')}}">Mes annonces</a>
	</li>
	<li>
		<a href="">Mon inventaire</a>
	</li>
	<li>
		<a href="">Mes commandes</a>
	</li>
</ul>
@endsection
