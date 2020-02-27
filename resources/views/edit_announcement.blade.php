@extends('layouts.app')
@section('content')
<a href="{{route('annonces.index')}}">Mes annonces</a>
	<h1>Modification de l'annonce: {{$annonce->product->name}}</h1>
	<form method="post" action="{{route('annonces.update',$id)}}">
		@csrf
		@method('PUT')
		<label for="description">Description de l'annonce</label><br>
		<textarea id="description" name="description" rows="4" cols="50">
			{{$annonce->description}}
		</textarea><br>
		<label>Prix au poids ou à l'unité:</label>			
		<input id="poids" type="radio" name="type" value="price_weight" @if(!is_null($annonce->price_weight)) checked @endif>
		<label for="poids">Poids au kilogramme</label>
		
		<input id="unit" type="radio" name="type" value="price_unit" @if(!is_null($annonce->price_unit)) checked @endif>
		<label for="unit">Unité</label><br>
		<label for="prix">Prix</label>
		<input id="prix" type="text" name="price" value="{{!is_null($annonce->price_weight) ? $annonce->price_weight : $annonce->price_unit}}">

		<input type="submit">
	</form>
@endsection