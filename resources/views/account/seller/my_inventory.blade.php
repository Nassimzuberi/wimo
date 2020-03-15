@extends("layouts.app")
@section("content")
<a href="{{url('magasin')}}">Mon magasin</a>
<h1>Inventaire de mes produits</h1>
@if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<table class="table table-hover">
	<thead>
		<tr>
			<th>Produit</th>
			<th>Poids</th>
			<th>Quantité</th>
			<th>Modifier</th>
		</tr>
	</thead>
	<tbody>
		@foreach($products as $product)
			<tr>
				<td>{{$product->product->name}}</td>
				<td>{{$product->inventaire->weight}}</td>
				<td>{{$product->inventaire->quantity}}</td>
				<td>
					<a href="{{route('inventaires.edit',$product->inventaire->id)}}">
						Modifier
					</a>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
@endsection