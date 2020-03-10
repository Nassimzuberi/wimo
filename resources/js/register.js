/* L'étape actuelle */
var actual_step = 0;
/* Les intitulés de chaque étapes */
function consignes(){
    let header = document.getElementById('consigne');
    if(actual_step == 0){
        header.innerHTML = "Mes informations";
    }
    else if(actual_step == 1)
        header.innerHTML = "Devenir un vendeur";
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
function input_text_empty(input){
    return input.value.length == 0;
}
function gender_empty(){
    console.log(document.getElementById("man").checked&&true);
}
function check_form_user(){
    let inputs = ["first_name","last_name","birthday","email","password","password_confirmation"];
    let i = 0;
    for(;i<6;i++){
        if(input_text_empty(document.getElementById(inputs[i]))){
            document.getElementById(inputs[i]).classList.toggle("pas_bon");
            return false; 
        }
    }
    return document.getElementById("man").checked && document.getElementById("woman").checked;
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
        }      
    }
    else if(actual_step == 1){
        if(skip){
            ;
        }
        document.getElementById("seller").style.opacity = "0";
        document.getElementById("seller").style.left= "-30%";
        document.getElementById("final").style.opacity = "1";
        document.getElementById("final").style.left="0%";
        document.getElementById("previous_step").style.visibility="hidden";
        document.getElementById("skip_step").style.visibility="hidden";  
    }
    coloring_circle("next");
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