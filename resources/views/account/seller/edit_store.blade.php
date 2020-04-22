@extends('layouts.app',['additional_head'=>'account.head'])
@section('content')

<div class="pt-5">
	@include('layouts.account.nav')
	<div class="container mt-5">

	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="{{route('vendeurs.show',$magasin->id)}}">
					Mon magasin
				</a>
			</li>
			<li class="breadcrumb-item text-primary">
				Gestion de mon magasin
			</li>
			<li class="breadcrumb-item active" aria-current="page">Modifier mes informations</li>
		</ol>
	</nav>
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
			</div>
		</div>
	</div>
</div>
@endsection
