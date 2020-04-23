@extends('layouts.app',['additional_head'=>'account.head'])
@section('content')

<div class="pt-5">
	@include('layouts.account.nav')
	{{-- Notification de succès --}}
        @if(session('status'))
            <div class="alert alert-success alert-dismissible">
            	<button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ session('status') }}
            </div>
        @endif
	<div class="container mt-5">

		<ul class="nav nav-tabs" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" data-toggle="tab" href="#magasin">
					<i class="fas fa-store"></i>
					<span>Mon magasin</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#produit">
					<i class='fas fa-carrot'></i>
					<span>Mes produits</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#commande">
					<i class="fas fa-clipboard-list"></i>
					<span>Mes commandes</span>
				</a>
			</li>
		</ul>

		<div class="tab-content">
			<div id="magasin" class="container tab-pane active"><br>
				<div class="row">
					<div class="col-md-3">
						<div class="card">
							<div class="card-header text-center">
								@isset($magasin->name_shop)
									{{$magasin->name_shop}}
								@else
									Mon magasin
								@endisset
							</div>
							<i class="fas fa-store mx-auto mt-2" style="font-size:5em"></i>
							<div class="card-body">
								<p>
									<i class="fas fa-map-marker-alt"></i>
									{{$magasin->address}}
								</p>
								<p>
									<i class="fas fa-phone-square"></i>
									{{$magasin->phone_number}}
								</p>
							</div>
						</div>					
					</div>
					<div class="col-md-4">
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
					</div>
				</div>
			</div>
			<div id="produit" class="container tab-pane fade"><br>
				<h3>Mes produits</h3>
			</div>
			<div id="commande" class="container tab-pane fade"><br>
				<h3>Mes commandes</h3>
			</div>
		</div>
	</div>
</div>
@endsection
