@extends('layouts.app')
@section('content')
<h1>Mes annonces</h1>
<form method="post" action="{{route('add_announce')}}" style="display:inline">
	@csrf
	<label for="fruit">Fruits</label>
	<select id="fruit" name="produit">
		@foreach($fruits as $fruit)
			<option value="{{$fruit->id}}">{{$fruit->name}}</option>
		@endforeach
	</select>
	<label>Prix à l'unite ou poids:</label>
	<input id="unit" type="radio" name="type" value="unit">
	<label>Unité</label>
	<input id="unit" type="radio" name="type" value="poids">
	<label>Poids</label>
	<label>Prix:</label>
	<input type="text" name="prix">	
	<input type="submit">
</form>
<form method="post" action="" style="display:inline;margin-left:15px">
	@csrf
	<label>Légumes</label>
	<select>
		@foreach($legumes as $legume)
			<option value="{{$legume->id}}">{{$legume->name}}</option>
		@endforeach
	</select>
	<label>Prix à l'unite ou poids:</label>
	<input id="unit" type="radio" name="type" value="unit">
	<label>Unité</label>
	<input id="unit" type="radio" name="type" value="poids">
	<label>Poids</label>
	<label>Prix:</label>
	<input type="text" name="prix">	
	<input type="submit">
</form>
<table class="table table-hover">
	<thead>
		<tr>
			<th>Produit</th>
			<th>Prix au kilo</th>
			<th>Prix à l'unité</th>
			<th>Modifier</th>
			<th>Supprimer</th>
		</tr>
	</thead>
	<tbody>
		@foreach($produits as $produit)
			<tr>
				<td>{{$produit}}</td>
				<td>{{$produit}}</td>
				<td>{{}}</td>
				<td><a href="">Modifier</a></td>
				<td><a href="">Supprimer</a></td>
			</tr>
		@endforeach
	</tbody>
</table>
@endsection
