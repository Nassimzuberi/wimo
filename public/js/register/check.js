const url = "/";
/* Retourne un booléan si un champs est vide ou pas. */
function input_text_empty(input){
    return input.value.length < 1;
}/* Retourne un booléan si un email est valid */
function email_valid(){
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(document.getElementById("email").value);
}
/* Verification de l'unicité du mail */
function email_unique(){
    let ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function(){
        if(ajax.readyState == 4 && ajax.status == 200){
            document.getElementById('email').dataset.unique_mail = !(JSON.parse(ajax.responseText).length > 0);
        }
    };
    ajax.open("GET", `${url}mail_account/${document.getElementById("email").value}/`,false);
    ajax.send();
}
/* On vérifie si l'utilisation a renseigné son genre */
function check_gender(){
    return !(document.getElementById("man").checked || document.getElementById("woman").checked);
}

/* Vérification des données du formulaire */
function check_form_user(){
    let inputs = ["first_name","last_name","birthday","email","password","password_confirmation"];
    let i = 0;
    let result = true;
    /* Verification si les inputs ne sont pas vides */
    for(;i<6;i++){
        if(input_text_empty(document.getElementById(inputs[i]))){
            document.getElementById(inputs[i]).classList.toggle("pas_bon");
            if(inputs[i]=="password_confirmation")
                document.getElementById(`error_password`).innerHTML="Ce champ est requis.";
            else
                document.getElementById(`error_${inputs[i]}`).innerHTML="Ce champ est requis.";
            result = false;
        }
    }
    if(check_gender()){
        document.getElementById('error_gender').innerHTML="Ce champ est requis.";
        result = false;
    }
    if(!result)
        return result;
    if(!email_valid()){
        document.getElementById('error_email').innerHTML="L'email est invalide.";
        result = false;
    }
    else{
        email_unique(document.getElementById("email").value);
        if(!JSON.parse(document.getElementById('email').dataset.unique_mail)){
            document.getElementById('error_email').innerHTML="Cet adresse mail existe déjà.";
            result = false;
        }
    }
    if(document.getElementById("password").value != document.getElementById("password_confirmation").value){
        document.getElementById('error_password').innerHTML= "Les mots de passes divent être identique.";
        result = false;
    }
    return result;
}
/* Vérification du format du numéro téléphone */
function check_phone_number_valid(){
    let regex = /^0[1-9]\d{8}/;
    return regex.test(document.getElementById('telephone').value);
}
/* Le numéro de téléphone n'est pas unique s'il appartient à un vendeur */
function check_unique_phone(){
    let ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function(){
        if(ajax.readyState == 4 && ajax.status == 200){
            document.getElementById('telephone').dataset.unique_phone = !(JSON.parse(ajax.responseText).length > 0);
        }
    };
    ajax.open("GET", `${url}phone_seller/${document.getElementById("telephone").value}/`,false);
    ajax.send();
}

/* Vérification du format du téléphone */
function check_form_seller(){
    let result = true;
    let inputs = ["num","voie","cp","commune","telephone"];
    let i = 0;
    for(;i<5;i++){
        if(input_text_empty(document.getElementById(inputs[i]))){
            document.getElementById(inputs[i]).classList.toggle("pas_bon");
            document.getElementById(`error_${inputs[i]}`).innerHTML="Ce champs est requis.";
            result = false;
        }
    }
    if(!result)
        return result;
    if(!check_phone_number_valid()){
        document.getElementById('error_telephone').innerHTML = "Ce numéro de télépone est incorrect.";
        document.getElementById('telephone').classList.toggle('pas_bon');
        result = false;
    }
    else{
        check_unique_phone();
        if(!JSON.parse(document.getElementById('telephone').dataset.unique_phone)){
            document.getElementById('telephone').classList.toggle('pas_bon');
            document.getElementById('error_telephone').innerHTML = 'Ce numéro de télépone appartient déjà à un autre vendeur.';
            result = false;
        }
    }
    return result;
}
