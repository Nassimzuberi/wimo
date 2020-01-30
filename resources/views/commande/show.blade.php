@extends('layouts.app')

@section('content')
<a href="{{route('user.commandes',Auth::id())}}"> Retour à mes commandes </a>
<div class="text-center">
  <h3>Ma commande n°{{$commande->id}}</h3>
  <hr>
  <div>Vous avez commandé : <div>
    <div>{{$commande->quantity}} <a href="{{route('produit.show',$commande->produit_id)}}" > {{$commande->produit->name}}</a></div>

    <div class="m-sm-3">
      <img src="{{$commande->produit->img}}" width="100">
      <div class="m-2"> <br>
        Valeur unitaire : {{$commande->produit->prix_unit}} € <br>
        {{$commande->produit->description}}
      </div>
    </div>
    <hr>
  <div> Paiement :
    @if($commande->payement_option == 2)
    carte bancaire
    @elseif($commande->payement_option == 1)
    espèce
    @endif
  </div>
  <div> Veuillez récupérer votre commande chez le vendeur : </div>
  <div> {{$commande->produit->user->name}} </div>
  <div class="mb-2"> {{$commande->produit->user->email}} </div>

    @if($commande->state == 0)
      <form method="POST" action="{{route('commande.validate',$commande->id)}}">
         @csrf
        <button type="submit" class="btn btn-sm btn-success">Avez vous récupérer le produit ?</button>
      </form>
    @else
      <div class="text-success"> Le produit a été récupéré le {{$commande->updated_at}} </div>
    @endif
</div>
@endsection
