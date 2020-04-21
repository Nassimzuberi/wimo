@extends('layouts.app')

@section('title') Commande n°{{$commande->id}} @endsection

@section('content')
<a href="{{route('user.commandes',Auth::id())}}"> Retour à mes commandes </a>
<div class="text-center">
  <h3>Ma commande n°{{$commande->id}}</h3>
  <hr>
  <div>Vous avez commandé : <div>
    <div>{{$commande->sales->quantity}} <a href="{{route('annonces.show',$commande->sales_id)}}" > {{$commande->sales->product->name}}</a></div>

    <div class="m-sm-3">
      <img src="{{Storage::disk()->url($commande->sales->img)}}" width="100">
      <div class="m-2"> <br>
        Valeur unitaire : {{$commande->sales->price_unit}} € <br>
        {{$commande->sales->description}}
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
  <div> {{$commande->sales->seller->user->fullname()}} </div>
  <div class="mb-2"> {{$commande->sales->seller->user->email}} </div>

    @if($commande->state == 0)
      <form method="POST" action="{{route('commande.validate',$commande->id)}}">
         @csrf
         <label>Avez vous récupérer le produit ?</label>
        <button type="submit" class="btn btn-sm btn-success">Confirmer</button>
      </form>
    @else
      <div class="text-success"> Le produit a été récupéré le {{$commande->updated_at->format('d-m-Y')}} </div>
    @endif
</div>
@endsection
