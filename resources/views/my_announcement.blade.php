@extends('layouts.app')
@section('content')
<!-- Fct qui affiche une alert avant de supprimer une annonce -->
<script type="text/javascript">
<<<<<<< HEAD
	const url = "http://wimo.test/";
=======
>>>>>>> 90d98ee293dd80401710051d0a1ec08028a8797c
	/*Affiche un pop up si le vendeur veut supprimer une annonce */
	function ma_fct(id){
		if(confirm('Supprimer cette annonce ?')){
			document.getElementById(`delete_announce_${id}_form`).submit();
		}
	}
</script>
<a href="{{url('magasin')}}">Mon magasin</a>
<h1>Mes annonces</h1>
<a href="{{route('annonces.create')}}">Ajouter une annonce</a>
<table class="table table-hover">
	<thead>
		<tr>
			<th>Produit</th>
			<th>Catégorie</th>
			<th>Prix au kilo</th>
			<th>Prix à l'unité</th>
			<th>Modifier</th>
			<th>Supprimer</th>
		</tr>
	</thead>
	<tbody>
		@foreach($annonces as $annonce)
			<tr>
				<td>{{$annonce->product->name}}</td>
				@foreach($annonce->product->categories as $category)
					<td>{{$category->name}}</td>
				@endforeach
				<td>{{$annonce->price_weight ? $annonce->price_weight." €" : NULL}}</td>
				<td>{{$annonce->price_unit ? $annonce->price_unit." €" : NULL}}</td>
				<td><a href="{{url('/annonces/'.$annonce->id.'/edit')}}">Modifier</a></td>
				<td>
					<a href="javascript:ma_fct({{$annonce->id}})">Supprimer</a>
					<!-- Formulaire pour supprimer une annonce -->
					<form method="post" id="delete_announce_{{$annonce->id}}_form" action="{{route('annonces.destroy',$annonce->id)}}">
						@csrf
						@method('DELETE')
					</form>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
@endsection
