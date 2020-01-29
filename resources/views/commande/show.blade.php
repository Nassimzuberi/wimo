@extends('layouts.app')

@section('content')
<h3>Commande n°{{$commande->id}}</h3>

<div>Vous avez commandé : {{$commande->quantity}} <a href="{{route('produit.show',$commande->produit_id)}}" > {{$commande->produit->name}}</a> </div>
<div>
  @if($commande->payement_option == 2)
  Vous avez réglé par carte bancaire
  @elseif($commande->payement_option == 1)
  Vous avez choisi de régler par espèce
  @endif
  : {{$commande->total}} €
</div>
<div> Veuillez récupérer votre commande chez le vendeur : </div>
<div> {{$commande->produit->user->name}} </div>
<div> {{$commande->produit->user->email}} </div>
<form method="POST" action="{{route('commande.validate',$commande->id)}}">
   @csrf
  <button type="submit" class="btn btn-sm btn-success">Avez vous récupérer le produit ?</button>
</form>
@endsection
