@extends('layouts.app')

@section('title') Mes commandes @endsection

@section('content')

    @isset($seller_id)
        @include('layouts.account.nav',['seller_id'=> $seller_id])
    @else
        @include('layouts.account.nav')
    @endisset

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="reception-tab" data-toggle="tab" href="#reception" role="tab" aria-controls="reception" aria-selected="true">
                <span class="material-icons align-top text-warning">schedule</span>
                Commande non réceptionnée
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="non_reception-tab" data-toggle="tab" href="#non_reception" role="tab" aria-controls="non_reception" aria-selected="false">
                <span class="material-icons align-top text-success">done</span>
                Commande réceptionnée
            </a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">

        <!-- Table des commandes non receptionnées -->

        <div class="tab-pane fade show active" id="non_reception" role="tabpanel" aria-labelledby="non_reception-tab">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>N° de la commande</th>
                        <th>Produit</th>
                        <th>Quantité</th>
                        <th>Coût</th>
                        <th>Mode de paiement</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($commandes_non_reception as $commande)
                        <tr>
                            <td>{{$commande->id}}</td>
                            <td>{{$commande->sales->product->name}}</td>
                            <td>{{$commande->quantity}}</td>
                            <td>{{$commande->total}} €</td>
                            <td>
                                @if($commande->payement_option == 1)
                                    Réglement sur place
                                @else
                                    Réglement effecutué par carte bancaire
                                @endif
                            </td>
                        </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">
                            <p>Vous n'avez pas de commande en cours</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Table des commandes receptionnées -->

        <div class="tab-pane fade" id="reception" role="tabpanel" aria-labelledby="reception-tab">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>N° de la commande</th>
                        <th>Produit</th>
                        <th>Quantité</th>
                        <th>Coût</th>
                        <th>Mode de paiement</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($commandes_reception as $commande)
                        <tr>
                            <td>{{$commande->id}}</td>
                            <td>{{$commande->sales->product->name}}</td>
                            <td>{{$commande->quantity}}</td>
                            <td>{{$commande->total}} €</td>
                            <td>
                                @if($commande->payement_option == 1)
                                    Réglement sur place
                                @else
                                    Réglement effecutué par carte bancaire
                                @endif
                            </td>
                        </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">
                            <p>Vous n'avez pas de commande en cours</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
