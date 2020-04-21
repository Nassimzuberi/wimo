@extends('layouts.app')

@section('title') Mes commandes @endsection

@section('content')

    <div class="pt-5">
        @include('layouts.account.nav')



        <div class="text-center p-3">
            <div class="my-2 my-sm-0">Afficher : </div>
            <a href="{{url("/comptes/".Auth::id()."/commandes")}}" class="btn @if( request()->get('filter') == null) btn-dark @else btn-outline-dark @endif m-sm-2">Tout</a>
            <a href="{{url("/comptes/".Auth::id()."/commandes?filter=1")}}" class="btn @if( request()->get('filter') == 1) btn-primary @else btn-outline-primary @endif m-sm-2">Non récupéré</a>
            <a href="{{url("/comptes/".Auth::id()."/commandes?filter=2")}}" class="btn @if( request()->get('filter') == 2) btn-success @else btn-outline-success @endif m-sm-2">Récupéré</a>
        </div>
        <div class="container">

            @if(session('success'))
                <div class="alert alert-success"> {{session('success')}} </div>
            @endif

            @forelse($commandes as $commande)
                <div class="card m-3 ">
                    <div class="card-header d-flex flex-row">
                        <div>
                            <div class="card-title text-secondary"> N° de commande : {{$commande->id}}</div>
                            <small><a href="{{route('commande.show',$commande->id)}}">Details de la commande</a></small>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="card-title mx-2">
                            Statut :
                            @if($commande->state == 0)
                                <span class="text-primary">Non récupéré</span>
                            @elseif($commande->state == 1)
                                <span class="text-success">Récupéré  le {{$commande->updated_at->format('d-m-Y')}}</span>
                            @endif
                        </div>
                        <div class="d-flex flex-sm-row flex-column text-center text-sm-left">
                            <div><img src="{{Storage::url($commande->sales->img)}}" width="150"></div>
                            <div class="col">
                                <small>Commande effectué le {{$commande->created_at->format('d-m-Y')}}</small>
                                <h4>{{$commande->quantity}} {{$commande->sales->product->name}}</h4>
                                <div>
                                    @if($commande->payement_option == 1)
                                        A réglé sur place
                                    @elseif($commande->payement_option == 2)
                                        Réglé par carte bancaire
                                    @endif
                                    : {{$commande->total}} €
                                </div>
                                <small>
                                    Produit vendu par : {{$commande->sales->seller->user->fullname()}}
                                </small>
                            </div>
                            <div class="ml-sm-auto my-2 my-sm-0 text-center">
                                @if($commande->state == 0)
                                    <form method="POST" action="{{route('commande.validate',$commande->id)}}">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Confirmer la reception</button>
                                    </form>
                                @else
                                    <button class="btn btn-secondary"> Donnez un avis</button>
                                @endif
                                <div class="my-3">
                                    <p>Un problème ? <a href="{{route('tickets.create')}}">Signalez le</a></p>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            @empty
                <div>
                    Aucune commandes passées
                </div>
            @endforelse

            <div class="row justify-content-center"> {{$commandes->appends(request()->input())->links()}} </div>
        </div>
    </div>


@endsection
