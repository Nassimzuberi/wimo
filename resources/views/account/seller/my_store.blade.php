@extends('layouts.app',['additional_head'=>'account.head'])
@section('content')
	@include('layouts.account.nav',['seller_id'=>$magasin->id])
	{{-- Notification de succès --}}
        @if(session('status'))
            <div class="alert alert-success alert-dismissible">
            	<button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ session('status') }}
            </div>
        @endif
	<div class="container d-flex flex-wrap mt-3">
		<div class="card">
			<div class="card-header text-center">
				@isset($magasin->name_shop)
					{{$magasin->name_shop}}
				@else
					Mon magasin
				@endisset
			</div>
			<!-- Logo magasin -->
			<span class="material-icons mx-auto" style="font-size: 8em">store</span>
			<div class="card-body">
				<p>
					<i class="fas fa-map-marker-alt"></i>
					{{$magasin->address->voie}}
					<br>
					{{$magasin->address->code_postal." ".$magasin->address->commune}}
				</p>
				<p>
					<i class="fas fa-phone-square"></i>
					{{$magasin->phone_number}}
				</p>
			</div>
		</div>					
		<div class="card">
			<div class="card-header text-center">
				Gestion de mon magasin
			</div>
			<div class="card-body">
				<ul class="nav flex-column">
					<li class="nav-item d-flex align-items-center">
						<i class="fas fa-user-edit"></i>
						<a href="{{route('vendeurs.edit',$magasin->id)}}" class="nav-link">
							Modifier mes informations
						</a>
					</li>
					<li class="nav-item d-flex align-items-center">
						<i class="far fa-credit-card"></i>
						<a href="" class="nav-link">
							Coordonnées bancaires
						</a>
					</li>
					<li class="nav-item d-flex align-items-center" role="alert">
						<i class="fas fa-store-slash"></i>
						<a href="javascript:close_account('seller')" class="nav-link alert-link text-danger">
							Désactiver mon compte vendeur
						</a>
						<form method="post" action="{{route('vendeurs.destroy',$magasin->id)}}" id="destroy_seller">
							@csrf
							@method('DELETE')
						</form>
					</li>
				</ul>
			</div>
		</div>
		<div class="card">
			<div class="card-header text-center">
				Gestion de mes produits
			</div>
			<div class="card-body">
				<ul class="nav flex-column">
					<li class="nav-item d-flex align-items-center">
						<i class="fas fa-plus-circle"></i>
						<a href="{{route('vendeurs.annonces.create',$magasin->id)}}" class="nav-link">
							Ajouter un produit
						</a>
					</li>
					<li class="nav-item d-flex align-items-center">
						<i class='fas fa-carrot'></i>
						<a href="{{route('vendeurs.annonces.index',$magasin->id)}}" class="nav-link">
							Mes produits en vente
						</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="card">
			<div class="card-header text-center">
				Gestion de mes commandes
			</div>
			<div class="card-body">
				<ul class="nav flex-column">
					<li class="nav-item d-flex align-items-center">
						<i class="fas fa-clipboard-list"></i>
						<a href="" class="nav-link"	>Liste des commandes</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
@endsection
