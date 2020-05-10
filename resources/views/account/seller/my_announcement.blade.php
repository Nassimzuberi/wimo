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
	<h1>Mes produits</h1>
	<a href="{{route('vendeurs.annonces.create',$seller_id)}}" class="btn btn-success">
		<i class="fas fa-plus-circle"></i>
		Ajouter un produit
	</a>
	{{-- Notification de succès --}}
    @if(session('status'))
        <div class="alert alert-success alert-dismissible">
        	<button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session('status') }}
        </div>
    @endif	
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Produit</th>
				<th>Catégorie</th>
				<th>Prix</th>
				<th>Quantité</th>
				<th>Stock</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@if($annonces->isEmpty())
				<tr>
					<td colspan="6" class="text-center">
						<p>
							Vous n'avez aucun produit en vente.<br>
							Pour ajouter un produit cliquez sur le bouton "Ajouter un produit":<br>
							<a href="{{route('vendeurs.annonces.create',$seller_id)}}" class="btn btn-success">
								<i class="fas fa-plus-circle"></i>
								Ajouter un produit
							</a>	
						</p>
					</td>
				</tr>
			@else
				@foreach($annonces as $annonce)
					<!-- Ligne concernant les informations du produit -->
					<tr>

						<td>
							<img src="{{asset('images/products/'.$annonce->product->image)}}" alt="{{$annonce->product->name}}">
							{{$annonce->product->name}}
						</td>

						<td>
							@foreach($annonce->product->categories as $category)
								<span class="badge badge-info">
									{{$category->name}}
								</span>
							@endforeach							
						</td>

						<td>
							<!-- Prix par kilogramme -->
							@if($annonce->price_mesure == "kilogramme")
								{{ $annonce->price." € / Kg" }}

							<!-- Prix par gramme -->
							@elseif($annonce->price_mesure == "gramme")
								{{ $annonce->price." € / gr" }}

							<!-- Prix par pièce -->
							@else
								{{$annonce->price." € / pièce/unité"}}

							@endif
						</td>

						<td>
							<!-- Quantité par kilogramme -->
							@if($annonce->quantity_mesure == "kilogramme")
								{{ $annonce->quantity." Kg" }}

							<!-- Quantité par gramme -->
							@elseif($annonce->quantity_mesure == "gramme")
								{{ $annonce->quantity." gr" }}

							<!-- Quantité par pièce -->
							@else
								{{$annonce->quantity." 	pièce/unité"}}

							@endif							
						</td>
						
						<td>
							{{$annonce->stock}}
						</td>

						<td>
							<!-- Lien pour modifier un produit -->
							<a href="{{route('annonces.edit',$annonce->id)}}" class="btn btn-warning">
								<i class="far fa-edit"></i>
								Modifier le produit
							</a>

							<!-- Bouton pour gérer son stock de produit -->
							<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#stock{{$annonce->id}}">
								<i class="far fa-edit"></i>
								Gérer le stock
							</button>

							<!-- Supprimer un produit -->
							<a href="javascript:delete_announce('delete{{$annonce->id}}')" class="btn btn-danger">
								<i class="far fa-trash-alt"></i>
								Supprimer le produit
							</a>
							<!-- Formulaire pour supprimer une annonce -->
							<form method="post" action="{{route('annonces.destroy',$annonce->id)}}" id="delete{{$annonce->id}}">
								@csrf
								@method('DELETE')
							</form>
						</td>
					</tr>
					<!-- Ligne concernant la quantité disponible du produit -->
					<tr>
						<td colspan="6" class="p-0">
							<form method="post" action="{{route('annonces.update',$annonce->id)}}" id="stock{{$annonce->id}}" class="form-inline collapse m-2">
								@csrf
								@method('PUT')
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">
											Stock {{$annonce->product->name}}:
										</span>
									</div>
									<input type="text" name="quantity_{{$annonce->id}}" class="form-control @error('quantity') is-invalid @enderror" value="{{$annonce->quantity}}" required="required" maxlength="7">
									<div class="input-group-append">
										<span class="input-group-text">
											<!-- Quantité par kilogramme -->
											@if($annonce->quantity_mesure == "kilogramme")
												{{"Kg"}}

											<!-- Quantité par gramme -->
											@elseif($annonce->quantity_mesure == "gramme")
												{{"gr"}}

											<!-- Quantité par pièce -->
											@else
												{{"pièce/unité"}}

											@endif
										</span>
									</div>		        		
								</div>
								<div class="form-check form-check-inline ml-2">
									<input type="radio" value="disponible" class="form-check-input" name="stock_{{$annonce->id}}" id="disponible_{{$annonce->id}}" @if($annonce->stock == "disponible") checked @endif>
									<label class="@error('stock') is-invalid @enderror form-check-label" for="disponible_{{$annonce->id}}">
										Disponible
									</label>
								</div>

								<div class="form-check form-check-inline">
									<input type="radio" value="bientôt disponible" class="form-check-input" name="stock_{{$annonce->id}}" id="bientôt_disponible_{{$annonce->id}}" @if($annonce->stock == "bientôt disponible") checked @endif>
									<label class="@error('stock') is-invalid @enderror form-check-label" for="bientôt_disponible_{{$annonce->id}}">
										Bientôt disponible
									</label>
								</div>

								<div class="form-check form-check-inline">
									<input type="radio" value="épuisé" class="form-check-input" name="stock_{{$annonce->id}}" id="épuisé_{{$annonce->id}}">
									<label class="@error('stock') is-invalid @enderror form-check-label" for="épuisé_{{$annonce->id}}" @if($annonce->stock=="épuisé") checked @endif>
										Épuisé
									</label>
								</div>

								<div class="form-check form-check-inline">
									<input type="radio" value="bientôt épuisé" class="form-check-input" name="stock_{{$annonce->id}}" id="bientôt_épuisé_{{$annonce->id}}" @if($annonce->stock == "bientôt épuisé") checked @endif>
									<label class="@error('stock') is-invalid @enderror form-check-label" for="bientôt_épuisé_{{$annonce->id}}">
										bientôt épuisé
									</label>
								</div>
								<input type="submit" name="update_stock" value="Modifier" class="ml-2">
							</form>
						</td>
					</tr>
				@endforeach
			@endif
		</tbody>
	</table>

@endsection
