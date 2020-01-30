@extends('layouts.app')

@section('content')
@if(session('success'))
  <div class="alert alert-success"> {{session('success')}} </div>
@endif

  <div class="row justify-content-center align-items-center">
    <div class="my-2 my-sm-0">Afficher : </div>
    <div>
    <a href="{{url("/users/$id/commandes")}}" class="btn btn-outline-dark m-sm-2">Tout</a>
    <a href="{{url("/users/$id/commandes?filter=1")}}" class="btn btn-outline-primary m-sm-2">Non récupéré</a>
    <a href="{{url("/users/$id/commandes?filter=2")}}" class="btn btn-outline-success m-sm-2">Récupéré</a>
    </div>
 </div>
    @foreach($commandes as $commande)
    <div class="card m-3 d-flex flex-sm-row flex-column text-center text-sm-left">
      <div><img src="{{$commande->produit->img}}" width="150"></div>
      <div class="card-body">
        <div class="card-title"><a href="{{route('commande.show',$commande->id)}}"> Commande n°{{$commande->id}}</a></div>
        <h4>{{$commande->quantity}} {{$commande->produit->name}}</h4>
        <small>Commandé le {{$commande->created_at->format('d-m-Y')}}</small>
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
        <div class="text-success">Récupéré  le <br>{{$commande->updated_at->format('d-m-Y')}}</div>
      @endif
    </div>
  </div>

    @endforeach

    <div class="row justify-content-center"> {{$commandes->links()}} </div>
@endsection
