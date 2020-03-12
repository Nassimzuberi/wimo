function next(skip){
    if(actual_step == 0){
        if(check_form_user()){
            document.getElementById("user").style.opacity = "0";
            document.getElementById("user").style.left = "0%";
            document.getElementById("seller").style.opacity = "1";
            document.getElementById("seller").style.left="calc(50% - 203.91px)";
            /* Activation de la visibilité des boutons pour la suite des inscriptions */
            document.getElementById("previous_step").style.visibility="visible";
            document.getElementById("skip_step").style.visibility="visible";
            /* Activation des champs de la partie d'inscription vendeur */
            disable_able_input('seller','enable');
            /* Désactivation des champs de la partie d'inscription user */
            disable_able_input('user','disable');
            coloring_circle("next");
        }     
    }
    else if(actual_step == 1){
        if(skip){
            disable_able_input('user','enable');
            final_step();
            coloring_circle("next");
        }
        else{
            if(check_form_seller()){
                disable_able_input('user','enable');
                final_step();
                document.getElementById("register_seller").value=true;
                coloring_circle('next');
            }
        }
    }
}
function previous(){
    document.getElementById("user").style.opacity = "1";
    document.getElementById("user").style.left= "calc(50% - 204.945px)";
    document.getElementById("seller").style.opacity = "0";
    document.getElementById("seller").style.left="calc(99.5% - 407.82px)";
    /* Desactivation de la visibilité des boutons */
    document.getElementById("previous_step").style.visibility="hidden";
    document.getElementById("skip_step").style.visibility="hidden";
    /* Activation des champs de la partie d'inscription vendeur */
    disable_able_input('seller','disable');
    /* Désactivation des champs de la partie d'inscription user */
    disable_able_input('user','able');        
    coloring_circle("previous");
}