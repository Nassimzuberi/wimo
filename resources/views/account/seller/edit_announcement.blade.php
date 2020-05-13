@extends(
	'layouts.app',
	[
		'additional_head'=>'account.seller'
	]
)
@section('content')
	@include('layouts.account.nav')
	@include(
		'layouts.account.seller_nav',
		[
			'id' => $seller_id
		]
	)
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="{{route('vendeurs.annonces.index',$seller_id)}}">
					Mes produits
				</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">
				Modifier mon produit
			</li>
		</ol>
	</nav>
	<div class="container">
	<div class="card d-inline-block align-top" id="current_sale">
		<div class="card-header text-center">
			{{$annonce->product->name}}
		</div>
		<img class="card-img" src="@if(config('app.env')=='production'){{Storage::url($annonce->img)}}@else{{asset('images/products/'.$annonce->product->image)}}@endif" alt="{{$annonce->product->name}}">
		<div class="card-body">
			<!-- L'origine du produit -->
			<p class="card-text">
				<b>Origine:</b> {{$annonce->origine}}
			</p>

			<!-- Prix produit -->
			<p class="card-text">
				@if($annonce->price_mesure == "kilogramme")
					<b>Prix:</b> {{ $annonce->price." € / Kg" }}

				<!-- Prix par gramme -->
				@elseif($annonce->price_mesure == "gramme")
					<b>Prix:</b> {{ $annonce->price." € / gr" }}

				<!-- Prix par pièce -->
				@else
					<b>Prix:</b> {{$annonce->price." € / pièce/unité"}}

				@endif
			</p>

			<!-- Description du produit -->
			<p class="card-text">
				<b>Description:</b><br>
				@isset($annonce->description)
					{{ $annonce->description }}
				@else
					Aucune description.
				@endisset
			</p>

			<!-- L'état du stock du produit -->
			@if($annonce->stock == "disponible" )
				<p class="card-text text-center text-success">
					<i class="fas fa-check-circle"></i>
					Produit disponible
				</p>
			@elseif($annonce->stock == "bientôt disponible" )
				<p class="card-text text-center text-info">
					<i class="fas fa-info-circle"></i>
					Produit bientôt disponible<br>
				</p>
			@elseif($annonce->stock == "bientôt épuisé" )
				<p class="card-text text-center text-warning">
					<i class="fas fa-exclamation-circle"></i>
					Produit bientôt épuisé
					Quantité restant: {{$annonce->quantity}}
				</p>
			@else
				<p class="card-text text-center text-danger">
					<i class="far fa-times-circle"></i>
					Produit épuisé
				</p>
			@endif
		</div>
	</div>
	@include(
		'layouts.forms.sale',
		[
			'route' => 'annonces.update',
			'parameter_action' => $annonce->id,
			'verb' => 'PUT',
			'annonce' => $annonce
		]
	)		
	</div>
@endsection