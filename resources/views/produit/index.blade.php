@extends('layouts.app')

@section('content')
@if(session('success'))
  <div class="alert alert-success"> {{session('success')}} </div>
@elseif(session('warning'))
  <div class="alert alert-warning"> {{session('warning')}} </div>
@endif

<div class="row">

  <div class="col-sm-4 border">
    @foreach($produits as $produit)
      <div class="p-3"> <a href="{{route('produit.show',$produit->id)}}"> {{$produit->name}} </a> </div>
      <hr>

    @endforeach
  </div>
  <div class="col">
     <div id="mapid"></div>
  </div>
</div>
@endsection
