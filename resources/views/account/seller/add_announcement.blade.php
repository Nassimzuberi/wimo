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
			<div class="tab-content mb-5" id="v-pills-tabContent" >
				<!-- Selection du produit -->
				<h5>
					1.
					<span>
						Sélectionner un produit
					</span>
					<span>*</span>
				</h5>
				@error('produit')
			        <span class="alert alert-danger" role="alert">
			            <strong>{{ $message }}</strong>
			        </span>
        		@enderror
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
								<div class="card product mt-2 flex-fill" onclick="add_product(this,'{{$product->id}}')">
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
			@include('layouts.forms.sale',[
				'route' => 'vendeurs.annonces.store',
				'parameter_action' => $seller_id,
			])				
		</div>		
	</div>
@endsection
