@extends('layouts.app')
@section('content')
<script type="text/javascript">
	const url = "http://localhost/wimo/public/";
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
	function type_inventory(type){
		document.getElementById('inventaire').innerHTML=`L'inventaire de votre produit ${type}:`;
	}
</script>
@if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<a href="{{route('annonces.index')}}">Mes annonces</a>
<form method="post" action="{{route('annonces.store')}}">
	@csrf
	<label>Categorie du produit:</label>
	<select onchange="load_product(this.value)">
		<option value="NULL" selected></option>
		@foreach($categories as $category)
			<option value="{{$category->id}}">{{$category->name}}</option>
		@endforeach
	</select><br>
	<label for="product">Produits:</label>
	<select id="product" name="product_id">
	</select><br>
	<label>Prix à l'unite ou poids:</label>
	<input id="unit" type="radio" name="type" value="price_unit" oninput="type_inventory(`à l'unité`)">
	<label for="unit">Unité</label>
	<input id="poids" type="radio" name="type" value="price_weight" oninput="type_inventory(`au poids`)">
	<label for="poids">Poids au kilogramme</label><br>
	<label for="prix">Prix:</label>
	<input id="prix" type="text" name="price"><br>

	<label for="description">Description de votre annonce:</label><br>
	<textarea name="description" id="description" rows="4" cols="50">
		
	</textarea><br>
	<span id="inventaire">L'inventaire de votre produit:</span><br>
	<input type="text" name="inventory">
	<input type="submit">
</form>
@endsection