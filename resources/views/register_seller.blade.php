@extends('layouts.app')
@section('content')
<h1>Devenir vendeur</h1>
<p style="text-align: center;">
    Renseignez l'adresse de votre point de vente <br>
    et un numéro afin que les acheteurs puissent vous joindre
</p>
<form method="POST" action="{{route('vendeurs.store')}}">
	@csrf
    <label for="num">Numéro de la voie</label>
    <input type="text" id="num" name="num" placeholder="ex:1" oninput="clear_error(this)">
    <div class="message_error">
        <span id="error_num"></span>
    </div> 
    <label for="voie">Nom de la voie</label>
    <input id="voie" type="text" name="voie" placeholder="ex:rue du chemin vert" oninput="clear_error(this)">
    <div class="message_error">
        <span id="error_voie"></span>
    </div>    
    <label for="cp">Code postal</label>
    <input id="cp" type="text" name="cp" maxlength="5" placeholder="ex:94380" oninput="clear_error(this)">
    <div class="message_error">
        <span id="error_cp"></span>        
    </div>
    <label for="commune">Commune / Ville</label>
    <input type="text" id="commune" name="commune" placeholder="ex:Bonneuil-sur-Marne" oninput="clear_error(this)">
    <div class="message_error">
        <span id="error_commune"></span>
    </div>
    <label for="telephone">Télephone</label>
    <input type="text" name="telephone" id="telephone" maxlength="10" data-unique_phone="" placeholder="ex:0601010101" oninput="clear_error(this)">
    <div class="message_error">
        <span id="error_telephone"></span>
    </div>
	<input type="submit">
</form>
@endsection