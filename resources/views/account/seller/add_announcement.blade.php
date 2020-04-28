@extends('layouts.app',['additional_head'=>'account.seller'])
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
	<div class="flex-column">
		<h5 class="text-center">
			1.
			<span>
				Selectionner un produit
			</span>
			<span>*</span>
		</h5>
		<div class="d-flex justify-content-center">
			<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
				<span class="text-center">Categorie</span>
				<a class="nav-link active" id="v-pills-fruits-tab" data-toggle="pill" href="#v-pills-fruits" role="tab" aria-controls="v-pills-fruits" aria-selected="true" onclick="init_filter('fruits')">
					<i class="fas fa-apple-alt"></i>
					Fruits
				</a>
				<a class="nav-link" id="v-pills-legumes-tab" data-toggle="pill" href="#v-pills-legumes" role="tab" aria-controls="v-pills-legumes" aria-selected="false" onclick="init_filter('legumes')">
					<i class='fas fa-carrot'></i>
					Légumes
				</a>
			</div>
			<div class="tab-content w-25 ml-5" id="v-pills-tabContent" >
				<div class="tab-pane fade show active" id="v-pills-fruits" role="tabpanel" aria-labelledby="v-pills-fruits-tab">
					<div class="d-flex flex-wrap bg-light" id="fruits">
						@foreach(['pomme','poire','tomate','kiwi','citron','pêche'] as $fruit)
							<div class="card flex-fill product" onclick="add_product(this,'{{$fruit}}')">
								<i class="fas fa-apple-alt mx-auto"></i>
								<div class="card-body text-center product_name">
									{{$fruit}}
								</div>
							</div>
						@endforeach
					</div>
				</div>
				<div class="tab-pane fade" id="v-pills-legumes" role="tabpanel" aria-labelledby="v-pills-legumes-tab">
					<div class="d-flex flex-wrap bg-light" id="legumes">
						@foreach(['pomme de terre','poireau','tomate','bettrave','avocat','carrote'] as $fruit)
						<div class="card flex-fill product" onclick="add_product(this,'{{$fruit}}')">
							<i class='fas fa-carrot mx-auto'></i>
							<div class="card-body text-center product_name">
								{{$fruit}}
							</div>
						</div>
						@endforeach
					</div>	      	
				</div>
				<!-- Barre de recherche ou filtre de produit -->
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Rechercher..." oninput="filter_product(this.value)">
					<div class="input-group-append">
						<span class="input-group-text">
							<i class="fas fa-search"></i>
						</span>
					</div>
				</div>
			</div>
		</div>	
		<form method="post" action="{{route('vendeurs.annonces.store',$seller_id)}}" class="w-50 mx-auto flex-column text-center mt-5">
			@csrf
			<input type="hidden" name="product" id="product">
			<div class="form-group">
				<h5>
					2.
					<span>
						Renseigner la quantité du produit dont vous disposez
					</span>
					<span>*</span>
				</h5>
				<div class="input-group w-50 mx-auto">
					<input type="text" id="quantity" name="quantity" placeholder="Quantité" class="form-control @error('quantity') is-invalid @enderror" value="{{old('quantity')}}" required="required">
					<div class="input-group-append">
						<span class="input-group-text" id="addon-quantity">
							Kg
						</span>
					</div>
				</div>
				@error('quantity')
			        <span class="invalid-feedback" role="alert">
			            <strong>{{ $message }}</strong>
			        </span>
        		@enderror
			</div>
			<div class="form-check form-check-inline">
				<input type="radio" class="form-check-input" name="quantity_type" id="kg" oninput="change_addon('Kg')" checked>
				<label class="form-check-label" for="kg">
					Kilogramme
				</label>
			</div>
			<div class="form-check form-check-inline">
				<input type="radio" class="form-check-input" name="quantity_type" id="piece" oninput="change_addon('pièce')">
				<label class="form-check-label" for="piece">
					pièce / unité
				</label>		  		
			</div>

			@error('quantity_type')
	            <span class="invalid-feedback" role="alert">
	                <strong>{{ $message }}</strong>
	            </span>
        	@enderror

			<div class="form-group mt-5">
				<h5>
					3.
					<span>
						Fixer le prix du produit
					</span>
					<span>*</span>
				</h5>
				<div class="input-group w-25 mx-auto">
					<input type="text" name="price" placeholder="Prix" class="form-control @error('price') is-invalid @enderror" value="{{old('price')}}" required="required">
					<div class="input-group-append">
						<span class="input-group-text">
							€
						</span>
					</div>
				</div>
				@error('price')
		            <span class="invalid-feedback" role="alert">
		                <strong>{{ $message }}</strong>
		            </span>
		        @enderror
			</div>
			<div class="form-group mt-5">
				<h5>
					4.
					<span>
						Ajouter une petite description du produit
					</span>
				</h5>
				<textarea class="form-control" name="description" value="{{old('description')}}">
				</textarea>
			</div>
			<p>
				<i class="fas fa-exclamation-triangle text-warning"></i>
				<span style="color:red">*</span>
				L'étoile rouge signifie que le champs est obligatoire.
			</p>
			<input type="submit" name="" value="Ajouter">
		</form>
	</div>
@endsection
