@extends('layouts.app',['additional_head'=>'register.seller'])
@section('content')
<div class="pt-5">
    @include('layouts.account.nav')

    <h2 class="text-center my-5">Vous souhaitez devenir vendeur ?</h2>
    <p class="text-center my-3">
        Renseignez les informations de votre local, boutique, magasin, ferme ou point de vente.
    </p>

    <form method="POST" action="{{route('vendeurs.store')}}" class="container">
        @csrf
        <div class="form-group">
            <label for="name_shop">Le nom du local <i>(si le local possède un nom)</i> :</label>
            <input id="name_shop" type="text" name="name_shop" class="form-control">
        </div>
        <div class="form-group">
            <label for="address">Adresse:</label>
            <input id="address" type="text" name="address" class="form-control address" onfocus="auto_search(this)" oninput="search_adress(this)">
            <div class="list-group position-absolute" style="z-index: 1"></div>
        </div>

        <label>Type d'adresse:</label>

        <div class="form-check form-check-inline">
            <input type="radio" name="type-search" value="housenumber" id="numero" class="form-check-input" oninput="set_type_search(this.value)" checked="checked">
            <label for="numero" class="form-check-label">Numéro</label>
        </div>

        <div class="form-check form-check-inline">
            <input type="radio" name="type-search" id="rue" value="street" class="form-check-input" oninput="set_type_search(this.value)">
            <label for="rue" class="form-check-label">Rue</label>
        </div>

        <div class="form-check form-check-inline">
            <input type="radio" name="type-search" id="lieu-dit" value="locality" class="form-check-input" oninput="set_type_search(this.value)">
            <label for="lieu-dit" class="form-check-label">lieu-dit</label>
        </div>
        <div class="form-group">
            <label for="telephone">Numéro de téléphone:</label>
            <input type="text" name="telephone" id="telephone" maxlength="10" class="form-control">
        </div>
        <input type="hidden" id="latitude" name="latitude">
        <input type="hidden" id="longitude" name="longitude">
        <input type="submit" value="Envoyer">
    </form>
</div>

@endsection
