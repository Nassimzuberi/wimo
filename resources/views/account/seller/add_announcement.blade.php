@extends('layouts.app')
@section('content')
<script type="text/javascript">
<<<<<<< HEAD:resources/views/account/seller/add_announcement.blade.php
	let url = "http://localhost/wimo/public/";
=======
	const url = "http://wimo.test/";
>>>>>>> anis:resources/views/add_announcement.blade.php
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
<form method="post" action="{{route('vendeurs.annonces.store',$seller_id)}}">
	@csrf
</form>
@endsection
