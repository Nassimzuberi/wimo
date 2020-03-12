/* L'étape actuelle */
var actual_step = 0;
/* Les intitulés de chaque étapes */
function consignes(){
    let header = document.getElementById('header_step');
    let consigne = document.getElementById('instruction_step');

    if(actual_step == 0){
        header.innerHTML = "Mes informations";
        consigne.innerHTML = "Formulaire où vous devez remplir votre profil.";
    }
    else if(actual_step == 1){
        header.innerHTML = "Devenir un vendeur";
        consigne.innerHTML = "Cette étape n'est pas obligatoire, mais si vous souhaitez vendre vos produits bios. Remplissez ce formulaire."
    }
    else{
        header.innerHTML = "Inscription terminée";
        consigne.innerHTML="";
    }
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

/* Désactivation des champs */
function disable_able_input(id,action){
    let inputs = document.querySelectorAll(`div#${id} input`);
    let i = 0;
    let taille = inputs.length;
    for(;i<taille;i++){
    	if(action=="disable")
        	inputs[i].disabled=true;
        else
        	inputs[i].disabled=false;
    }
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

function final_step(){
    document.getElementById("seller").style.opacity = "0";
    document.getElementById("seller").style.left= "0%";
    document.getElementById("final").style.opacity = "1";
    document.getElementById("final").style.left="calc(50% - 224.84px)";
    /* Désactivation de la visibilité des boutons car c'est la fin des inscriptions */
    document.getElementById("previous_step").style.visibility="hidden";
    document.getElementById("skip_step").style.visibility="hidden";
    document.getElementById('loader').classList.toggle('animate_loader');
    window.setTimeout(function(){
        document.getElementById("register").submit();
    },2500);    
}