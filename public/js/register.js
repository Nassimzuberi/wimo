/* L'étape actuelle */
var actual_step = 0;
const url = "http://localhost/wimo/public/";
/* Les intitulés de chaque étapes */
function consignes(){
    let header = document.getElementById('header_consigne');
    let consigne = document.getElementById('consigne');

    if(actual_step == 0){
        header.innerHTML = "Mes informations";
        consigne.innerHTML = "Formulaire où vous devez remplir votre profil.";
    }
    else if(actual_step == 1){
        header.innerHTML = "Devenir un vendeur";
        consigne.innerHTML = "Cette étape n'est pas obligatoire, mais si vous souhaitez vendre vos produits bios. Remplissez ce formulaire."
    }
    else
        header.innerHTML = "Inscription terminée";
}
function coloring_circle(action){
    /* Décoloration de l'ancien cercle */
    document.getElementById(`step_${actual_step}`).classList.toggle('actual_step');
    if(action == "previous"){
        actual_step -= 1;
        document.getElementById(`step_${actual_step}`).classList.toggle('step_succes');
    }
    else{
        document.getElementById(`step_${actual_step}`).classList.toggle('step_succes');
        actual_step += 1;
    }
    consignes();
    /* Coloraction du nouveau cercle */
    if(actual_step==2)
        document.getElementById(`step_${actual_step}`).classList.toggle('step_succes');
    else
        document.getElementById(`step_${actual_step}`).classList.toggle('actual_step');
}
/* Retourne un booléan si un champs est vide ou pas. */
function input_text_empty(input){
    return input.value.length < 1;
}

/* Retourne un booléan si un email est valid */
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
/* Efface les erreurs au moment où l'utilisateur resaisie des informations */
function clear_error(input){
    if(input.type == "radio")
        document.getElementById('error_gender').innerHTML="";
    if(input.classList.contains('pas_bon')){
        input.classList.toggle('pas_bon');
        if(input.name=="password_confirmation")
            document.getElementById('error_password').innerHTML="";
        else
            document.getElementById(`error_${input.name}`).innerHTML ="";
    }
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
            document.getElementById('error_telephone').innerHTML = 'Ce télépone appartient déjà à un autre vendeur.';
            result = false;
        }
    }
    return result;
}

function remplir(){
    document.getElementById('first_name').value="Loudjair";
    document.getElementById('last_name').value="Mauvais";
    document.getElementById('birthday').value="1995-04-16";
    document.getElementById('email').value="mr.Loud@gmail.com";
    document.getElementById('password').value = document.getElementById('password_confirmation').value = "azertyuiop";
}

function remplir_seller(){
    document.getElementById('num').value = "3";
    document.getElementById('voie').value = "rue du chemin vert";
    document.getElementById('cp').value ="94380";
    document.getElementById('commune').value ="Bonneuil-sur-Marne";
    document.getElementById('telephone').value ="0603280639";
}

function final_step(){
    document.getElementById("seller").style.opacity = "0";
    document.getElementById("seller").style.left= "-30%";
    document.getElementById("final").style.opacity = "1";
    document.getElementById("final").style.left="35%";
    document.getElementById("previous_step").style.visibility="hidden";
    document.getElementById("skip_step").style.visibility="hidden";
    document.getElementById('loader').classList.toggle('animate_loader');
    window.setTimeout(function(){
        document.getElementById("register").submit();
    },2500);    
}
function next(skip){
    if(actual_step == 0){
        if(check_form_user()){
            document.getElementById("user").style.opacity = "0";
            document.getElementById("user").style.left = "0%";
            document.getElementById("seller").style.opacity = "1";
            document.getElementById("seller").style.left="12%";
            document.getElementById("previous_step").style.visibility="visible";
            document.getElementById("skip_step").style.visibility="visible";
            coloring_circle("next");
        }     
    }
    else if(actual_step == 1){
        if(skip){
            final_step();
            coloring_circle("next");
        }
        else{
            if(check_form_seller()){
                final_step();
                document.getElementById("register_seller").value=true;
                coloring_circle('next');
            }
        }
    }
}
function previous(){
    document.getElementById("user").style.opacity = "1";
    document.getElementById("user").style.left= "35%";
    document.getElementById("seller").style.opacity = "0";
    document.getElementById("seller").style.left="55%";
    document.getElementById("previous_step").style.visibility="hidden";
    document.getElementById("skip_step").style.visibility="hidden";        
    coloring_circle("previous");
}