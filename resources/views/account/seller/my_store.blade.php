@extends('layouts.app')
@section('content')
<div class="container">
	@include('layouts.account.nav')
</div>
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
