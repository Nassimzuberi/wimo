@extends('layouts.app')
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
				Ajouter un produit
			</li>
		</ol>
	</nav>
	<form method="post" action="{{route('vendeurs.annonces.store',$seller_id)}}">
		@csrf
	</form>
@endsection
