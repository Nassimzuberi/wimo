@extends('layouts.app',['additional_head'=>'register.seller'])
@section('content')
<div class="pt-5">
    @include('layouts.account.nav')

    <h2 class="text-center my-5">Vous souhaitez devenir vendeur ?</h2>
    <p class="text-center my-3">
        Renseignez les informations de votre local, boutique, magasin, ferme ou point de vente.
    </p>
    <!-- 
        l'inclusion du formulaire universelle pour le vendeurs.
     -->
    @include('layouts.forms.seller',['route'=>'vendeurs.store'])
</div>

@endsection
