@extends('layouts.app')
@section('content')
	<h1>Modification de l'annonce: {{$annonce->product->name}}</h1>
	<form method="post" action="{{route('annonces.update',$id)}}">
		@csrf
		@method('PUT')
		<ul>
			<li>
				<span>Prix au poids ou à l'unité:</span>
			</li>
			<li>				
				<input type="radio" name="type" value="price_weight" @if(!is_null($annonce->price_weight)) checked @endif>poids
			</li>
			<li>
				<input type="radio" name="type" value="price_unit" @if(!is_null($annonce->price_unit)) checked @endif>unité
			</li>
		</ul>
		<input type="text" name="price" value="{{!is_null($annonce->price_weight) ? $annonce->price_weight : $annonce->price_unit}}">
		<input type="submit">
	</form>
@endsection