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
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@if($annonces->isEmpty())
				<tr>
					<td colspan="4" class="text-center">
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
					<tr>
						<td>{{$annonce->product->name}}</td>
						@foreach($annonce->product->categories as $category)
							<td>{{$category->name}}</td>
						@endforeach
						<td>
							@isset($annonce->price_unit)
								{{ $annonce->price_weight." € / piece" }}
							@else
								{{ $annonce->price_weight." € / kg" }}
							@endisset
						</td>
						<td>
							<a href="{{route('vendeurs.annonces.create',$seller_id)}}" class="btn btn-warning">
								<i class="far fa-edit"></i>
								Modifier un produit
							</a>	
							<a href="javascript:delete_announce(this)" class="btn btn-danger">
								<i class="far fa-trash-alt"></i>
								Supprimer un produit
							</a>
							<!-- Formulaire pour supprimer une annonce -->
							<form method="post" action="{{route('annonces.destroy',$annonce->id)}}">
								@csrf
								@method('DELETE')
							</form>
						</td>
					</tr>
				@endforeach
			@endif
		</tbody>
	</table>
@endsection
