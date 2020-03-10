@extends('layouts.register.app')
@section('content')

<h2 id="header_consigne">Mes informations</h2>
<p id="consigne">
    
</p>
<form method="post" action="{{route('comptes.store')}}" id="register">
    @csrf
    <div id="user" class="init">
        <label for="first_name">Prénom</label>
        <input id="first_name" type="text" name="first_name" oninput="clear_error(this)">
        <div class="message_error">
            <span id="error_first_name"></span>
        </div>
        <label for="last_name">Nom</label>
        <input id="last_name" type="text" name="last_name" oninput="clear_error(this)">
        <div class="message_error">
            <span id="error_last_name"></span>
        </div>
        <label for="birthday">Date de naissance</label>
        <input type="date" name="birthday"  id="birthday" oninput="clear_error(this)">
        <div class="message_error">
            <span id="error_birthday"></span>
        </div>
        <span>Sexe</span>
        <input type="radio" name="gender" value="Man" id="man" oninput="clear_error(this)" checked="checked">
        <label for="man">Homme</label>
        <input type="radio" name="gender" value="Woman" id="woman" oninput="clear_error(this)">
        <label for="woman">Femme</label>
        <div class="message_error">
            <span id="error_gender"></span>
        </div>
        <label for="email">email</label>
        <input type="text" name="email" data-unique_mail="" id="email" oninput="clear_error(this)">
        <div class="message_error">
            <span id="error_email"></span>
        </div>
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" oninput=""><br>
        <label for="password_confirmation">Mot de passe de confirmation</label>
        <input type="password" name="password_confirmation" id="password_confirmation" oninput="clear_error(this)">
        <div class="message_error">
            <span id="error_password"></span>
        </div>       
    </div>
    <div id="seller" class="init">
        <p style="text-align: center;">
            Adresse de votre point de vente <br>
            et un numéro afin que les acheteurs puissent vous joindre
        </p>
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
    </div>
    <div class="init" id="final">
        <p>
            Bienvenue sur wimo. <br>Vous allez être redirigé automatiquement vers la page d'accueil.
        </p>
        <div id="loader">
        </div>
    </div>
    <input type="hidden" name="register_seller" id="register_seller">    
</form>
<div id="steps">
    <div class="step actual_step" id="step_0"></div>
    <div class="step" id="step_1"></div>
    <div class="step" id="step_2"></div>
</div>
<div id="buttons">
    <button id="previous_step" onclick="previous()">precedent</button>
    <button id="skip_step" onclick="next(true)">Skip</button>
    <button id="next_step" onclick="next(false)">Suivant</button>    
</div>
<button onclick="remplir()">user</button>
<button onclick="remplir_seller()">seller</button>
@endsection
