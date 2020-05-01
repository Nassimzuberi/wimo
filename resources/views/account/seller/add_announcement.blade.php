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
		<div class="row p-5">

			<div class="nav flex-column nav-pills col-md-4" id="v-pills-tab" role="tablist" aria-orientation="vertical">
				<span class="text-center">Catégories</span>
				@include('layouts.components.nav_link_category')
			</div>

			<div class="col-md-6">
				<div class="tab-content" id="v-pills-tabContent" >
					<!-- Selection du produit -->

					<h5>
						1.
						<span>
							Selectionner un produit
						</span>
						<span>*</span>
					</h5>

					<!-- Barre de recherche ou filtre de produit -->

					<div class="input-group">
						<input type="text" class="form-control" id="search_bar" placeholder="Rechercher un fruit" oninput="filter_product(this.value)">
						<div class="input-group-append">
							<span class="input-group-text">
								<i class="fas fa-search"></i>
							</span>
						</div>
					</div>

					<!-- Les produits -->

					@foreach($sectionCategory as $categorie => $products)
						<div class="overflow-auto tab-pane fade @if($categorie == 'Fruit') show active @endif" id="v-pills-{{str_replace(' ','_',$categorie)}}" role="tabpanel" aria-labelledby="v-pills-{{str_replace(' ','_',$categorie)}}-tab">
							<div class="d-flex flex-wrap bg-light" id="{{str_replace(' ','_',$categorie)}}">
								@foreach($products as $product)
									<div class="card product mt-2 flex-fill" onclick="add_product(this,'{{$product->name}}')">
										<!--
										<i class="fas fa-apple-alt mx-auto"></i>-->
										<img src="{{asset('images/products/'.$product->image)}}" alt="fruits" class="card-img-top">
										<div class="card-body text-center product_name">
											{{$product->name}}
										</div>
									</div>
								@endforeach
							</div>
						</div>
					@endforeach

				</div>
				<!-- Le formulaire -->
				<form method="post" action="{{route('vendeurs.annonces.store',$seller_id)}}" class=" flex-column mt-5" enctype="multipart/form-data">
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
						<div class="input-group">
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
						<div class="input-group">
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

					<div class="form-group">
						<h5>
							4.
							<span>
								Image du produit <i>(pas obligatoire)</i>
							</span>
						</h5>
						<div class="input-group">
							<input id="img" type="file" name="img" class="form-control">
						</div>
					</div>

					<div class="form-group mt-5">
						<h5>
							5.
							<span>
								Description du produit <i>(pas obligatoire)</i>
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
		</div>
@endsection
