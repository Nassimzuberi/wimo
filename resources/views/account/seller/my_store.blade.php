@extends('layouts.app')
@section('content')
@include('layouts.account.nav')
<div class="container">

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
				<div class="card col-md-3">
					<div class="card-header">
						Mon magasin
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
				<div class="col-md-9">
					<a href="">Modifier les informations</a>
					<a href="">Désactiver mon compte</a>
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
@endsection
