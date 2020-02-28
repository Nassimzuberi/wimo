@extends('layouts.app')
@section('content')
<!-- Fct qui affiche une alert avant de supprimer une annonce -->
<script type="text/javascript">
	const url = "http://localhost/wimo/public/";
	/*Affiche un pop up si le vendeur veut supprimer une annonce */
	function ma_fct(id){
		if(confirm('Supprimer cette annonce ?')){
			document.getElementById(`delete_announce_${id}_form`).submit();
		}
	}
	/* A terminer */
	function load_product(category_id){
		let ajax = new XMLHttpRequest();
		let select = document.getElementById('product');
		let options = ``;
		let i = 0;
		select.setAttribute('onchange','inventaire(this.value)');
		ajax.onreadystatechange = function(){
			if(ajax.readyState == 4 && ajax.status == 200){
				let resultat = JSON.parse(ajax.responseText);
				for(i in resultat){
					options += `<option value="${resultat[i].id}" class="products">${resultat[i].name}</option>`;
				}
				select.innerHTML = options;
			}
		};
		ajax.open("GET", `${url}product/available/category/${category_id}`, true);
		ajax.send();
	}
	function disable_enable_input_inventory(input_disable,input_enable){
		document.querySelector(`input[name='${input_disable}']`).disabled=true;
		document.querySelector(`input[name='${input_enable}']`).disabled=false;
	}
</script>
<h1>Mes annonces</h1>
<form method="post" action="{{route('annonces.store')}}" style="display:inline">
	@csrf
	<div style="display: inline-block;vertical-align:top">
		<label>Categorie du produit:</label>
		<select onchange="load_product(this.value)">
			<option value="NULL" selected></option>
			@foreach($categories as $category)
				<option value="{{$category->id}}">{{$category->name}}</option>
			@endforeach
		</select>
		<label for="product">Produits:</label>
		<select id="product" name="product_id">
			<option value="NULL" selected></option>
			@foreach($products as $product)
				<option value="{{$product->id}}">{{$product->name}}</option>
			@endforeach
		</select><br>
		<label>Prix à l'unite ou poids:</label>
		<input id="unit" type="radio" name="type" value="price_unit" oninput="disable_enable_input_inventory('weight','quantity')">
		<label for="unit">Unité</label>
		<input id="poids" type="radio" name="type" value="price_weight" oninput="disable_enable_input_inventory('quantity','weight')">
		<label for="poids">Poids au kilogramme</label><br>
		<label for="prix">Prix:</label>
		<input id="prix" type="text" name="price">
	</div>
	<div style="display: inline-block;padding-left:10px ;margin-left:10px;border-left: solid black 3px;">
		<span id="inventaire">L'inventaire:</span><br>
		<label for="quantity">La quantité:</label>
		<input type="text" name="quantity"><br>
		<label for="weight">Le poids total:</label>
		<input type="text" name="weight">
		<input type="submit">
	</div>
</form>
@if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
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
