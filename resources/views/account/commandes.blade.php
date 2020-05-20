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
            <a class="nav-link active" id="en_attentes-tab" data-toggle="tab" href="#en_attentes" role="tab" aria-controls="en_attentes" aria-selected="true">
                <span class="material-icons align-top text-warning">schedule</span>
                En attentes
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="en_cours-tab" data-toggle="tab" href="#en_cours" role="tab" aria-controls="en_cours" aria-selected="false">
                <span class="material-icons align-top text-warning">schedule</span>
                En cours de préparation
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="prete-tab" data-toggle="tab" href="#prete" role="tab" aria-controls="prete" aria-selected="false">
                <span class="material-icons align-top text-success">done</span>
                Prête
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="reception-tab" data-toggle="tab" href="#reception" role="tab" aria-controls="reception" aria-selected="false">
                <span class="material-icons align-top text-warning">warning</span>
                Non réceptionnée
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="non_reception-tab" data-toggle="tab" href="#non_reception" role="tab" aria-controls="non_reception" aria-selected="false">
                <span class="material-icons align-top text-success">done</span>
                Réceptionnée
            </a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <!-- Table des commandes en attente-->

        <div class="tab-pane fade show active" id="en_attentes" role="tabpanel" aria-labelledby="en_attentes-tab">
            <table class="table table-bordered commandes">
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
                    @forelse($commandes_attentes as $commande)
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
                            <p>Vous n'avez pas de commande en attente</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Table des commandes en cours de préparations-->

        <div class="tab-pane fade" id="en_cours" role="tabpanel" aria-labelledby="en_cours-tab">
            <table class="table table-bordered commandes">
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
                    @forelse($commandes_en_cours as $commande)
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

        <!-- Table des commandes prêtes -->

        <div class="tab-pane fade" id="prete" role="tabpanel" aria-labelledby="prete-tab">
            <table class="table table-bordered commandes">
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
                    @forelse($commandes_prets as $commande)
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
                            <p>Vous n'avez pas de commandes prêtes</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>


        <!-- Table des commandes non receptionnées -->

        <div class="tab-pane fade" id="non_reception" role="tabpanel" aria-labelledby="non_reception-tab">
            <table class="table table-bordered commandes">
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
                            <p>Vous n'avez pas de commandes non réceptionnées</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Table des commandes receptionnées -->

        <div class="tab-pane fade" id="reception" role="tabpanel" aria-labelledby="reception-tab">
            <table class="table table-bordered commandes">
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
                            <p>Vous n'avez pas de commandes réceptionnées</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
