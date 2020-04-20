/* id de l'input qui est focus par l'utilisateur */
var type_search = "type=housenumber";

window.addEventListener("click",(event)=>{
	/* Vide le tableau de suggestion d'adresse */
	if(!(event.target.classList.contains("address") || event.target.classList.contains("list-group-item") || event.target.classList.contains("label-search") || event.target.classList.contains("context-search") || event.target.classList.contains("type-search"))){
		if(document.getElementById("address").nextElementSibling.children.length > 0){
			document.getElementById("address").nextElementSibling.innerHTML = "";
		}
	}
});

function translation_type(type){
	if(type == "housenumber")
		return "numéro";
	else if(type == "street")
		return "rue";
	else if(type == "locality")
		return "lieu-dit";
	else
		return "commune";
}

function set_adress(adresse){
	document.getElementById(input_focus_id).value = adresse;
	/* Suppression de la liste des suggestions des adresses */
	document.getElementById(input_focus_id).nextElementSibling.innerHTML = '';
}

function set_position(long,lat){
	document.getElementById("latitude").value = lat;
	document.getElementById("longitude").value = long;
}

function search_adress(input){
	let ajax = new XMLHttpRequest();
	let url = "https://api-adresse.data.gouv.fr/search/?q=";
	let autocomplete = "autocomplete=1";
	input_focus_id = input.id;

	ajax.onreadystatechange = function(){
		if(ajax.readyState == 4 && ajax.status == 200){
			let adresses = JSON.parse(ajax.responseText);
			let i;
			let text = ``;
			for(i in adresses.features){
				text += `<a href="javascript:set_adress('${adresses.features[i].properties.label}');set_position(${adresses.features[i].geometry.coordinates})"
							class="list-group-item d-flex list-group-item-action justify-content-between align-items-center">
								<div class="d-flex flex-column">
									<strong class="label-search">${adresses.features[i].properties.label}</strong>
									<span class="context-search">${adresses.features[i].properties.context}</span>
								</div>
							<span class="type-search">${translation_type(adresses.features[i].properties.type)}</span>
						</a>`;
			}
			input.nextElementSibling.innerHTML = text;
		}
	};

	ajax.open("GET",`${url}${input.value}&${type_search}&${autocomplete}`);
	ajax.send();
}

/* Initialisation de la recherche */
function auto_search(input){
	if(input.value.length > 0)
		search_adress(input);
}

function set_type_search(type){
	type_search = `type=${type}`;
}