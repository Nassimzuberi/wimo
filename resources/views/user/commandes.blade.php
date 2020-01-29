@extends('layouts.app')

@section('content')
@if(session('success'))
  <div class="alert alert-success"> {{session('success')}} </div>
@endif
    @foreach($commandes as $commande)
    <div class="card m-3 d-flex flex-sm-row flex-column">
      <img src="{{$commande->produit->img}}" width="150">
      <div class="card-body">
        <div class="card-title"><a href="{{route('commande.show',$commande->id)}}"> Commande n°{{$commande->id}}</a></div>
        <h4>{{$commande->produit->name}}</h4>
        <div>Quantité : {{$commande->quantity}} </div>
        <div>
          @if($commande->payement_option == 1)
            A réglé sur place
          @elseif($commande->payement_option == 2)
            Réglé par carte bancaire
          @endif
          : {{$commande->total}} €
      </div>

    </div>
    <div class="card-footer text-center">
      Statut :
      @if($commande->state == 0)
        <div class="text-primary">Non récupéré</div>
      @elseif($commande->state == 1)
        <div class="text-success">Récupéré </div>
      @endif
    </div>
  </div>

    @endforeach
@endsection
