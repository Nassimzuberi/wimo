/*Affiche un pop up si le vendeur veut supprimer une annonce */
function delete_announce(id){
	if(confirm('Supprimer cette annonce ?')){
		document.getElementById(id).submit();
	}
}

var product_select = null;
var product_select_id = null;
var list_id = "Fruit";


/* Ajouter le produit selectionné dans le formulaire */
function add_product(new_product,new_product_id){
	if(product_select != null){
		/* On retire la class de l'ancien product */
		product_select.classList.toggle("product-select");
		/* selection du même produit et initialisation des products */
		if(product_select_id == new_product_id){
			document.getElementById('produit').value = "";
			product_select = null;
			product_select_id = null;
			return;
		}
	}
	new_product.classList.toggle("product-select");
	product_select = new_product;
	product_select_id = new_product_id;
	document.getElementById('produit').value = new_product_id;
}

function change_quantity_mesure(type_quantity){
	document.getElementById("addon-quantity").innerHTML = type_quantity;
}

function change_price_mesure(type_price){
	document.getElementById("addon-price").innerHTML = type_price;
}

function init_placeholder(catgeroy){
	let message = "";
	switch(catgeroy){
		case "Fruit" : message = "un fruit"; break;
		case "Légume" : message = "un légume"; break;
		case "Épice" : message = "une épice"; break;
		case "Plante_aromatique": message = "une plante aromatique"; break;
		case "Céréale": message = "un céréale";break;
		case "Champignon": message = "un champignon";break;

	}
	document.getElementById('search_bar').placeholder = "Rechercher "+message;
}

function init_filter(id){
	list_id = id;
	init_placeholder(id);
}

function filter_product(search){
	let i,product_name,taille;
	let filter = search.toUpperCase();
	let products = document.getElementById(list_id).getElementsByClassName('product_name');
	taille = products.length;
	for(i = 0; i < taille; i++){
		product_name = products[i].innerText || products[i].textContent; 
		if(product_name.toUpperCase().indexOf(filter)>-1)
			products[i].parentElement.style.display = "";
		else
			products[i].parentElement.style.display = "none";
	}

}
var option_search = "fr";

function filter_country(search){
	if(search.length > 0){
		let i,country_name,taille,nbr_display_none = 0;
		let filter = search.toUpperCase();
		let countries = document.getElementById("countries");
		let countries_names = countries.getElementsByClassName('country_name');
		let not_found = countries.getElementsByClassName('not_found')[0];
		taille = countries_names.length;
		
		/* Parcours le tableau pour le filtrage */
		for(i = 0; i < taille; i++){
			country_name = countries_names[i].innerText || countries_names[i].textContent; 
			if(country_name.toUpperCase().indexOf(filter)>-1)
				countries_names[i].parentElement.style.display = "";
			else{
				countries_names[i].parentElement.style.display = "none";
				nbr_display_none++;
			}
		}

		/* Affichage du message "aucun résultat" */
		if(nbr_display_none == taille)
			not_found.classList.toggle("d-none");
		/* Disparition du message "aucun résultat" */
		else{
			if(!not_found.classList.contains("d-none"))
				not_found.classList.toggle("d-none");
		}
		/* Affichage du liste des pays */
		if(countries.classList.contains("d-none")){
			countries.classList.toggle("d-none");
			countries.classList.toggle("d-flex");
		}
	}
	/* Disparition de la liste des pays */
	else{
		if(countries.classList.contains("d-flex")){
			countries.classList.toggle("d-flex");
			countries.classList.toggle("d-none");
		}
	}
}

function filter_departement(search){
	if(search.length > 0){
		let i,departement_nom,taille,nbr_display_none = 0;
		let filter = search.toUpperCase();
		let departements = document.getElementById("departements");
		let departements_noms = departements.getElementsByClassName('departement_nom');
		let not_found = departements.getElementsByClassName('not_found')[0];
		taille = departements_noms.length;
		
		/* Parcours le tableau pour le filtrage */
		for(i = 0; i < taille; i++){
			departement_nom = departements_noms[i].innerText || departements_noms[i].textContent; 
			if(departement_nom.toUpperCase().indexOf(filter)>-1){
				if(departements_noms[i].parentElement.classList.contains('d-none')){
					departements_noms[i].parentElement.classList.toggle('d-none');
					departements_noms[i].parentElement.classList.toggle('d-block');
				}
			}
			else{
				if(!departements_noms[i].parentElement.classList.contains('d-none')){
					departements_noms[i].parentElement.classList.toggle('d-block');
					departements_noms[i].parentElement.classList.toggle('d-none');
					nbr_display_none++;
				}
				else
					nbr_display_none++;
			}
		}

		/* Affichage du message "aucun résultat" */
		if(nbr_display_none == taille){
			if(not_found.classList.contains("d-none"))
				not_found.classList.toggle("d-none");
		}
		/* Disparition du message "aucun résultat" */
		else{
			if(!not_found.classList.contains("d-none"))
				not_found.classList.toggle("d-none");
		}
		/* Affichage du liste des pays */
		if(departements.classList.contains("d-none")){
			departements.classList.toggle("d-none");
		}
	}
	/* Disparition de la liste des pays */
	else{
		if(!departements.classList.contains("d-none")){
			departements.classList.toggle("d-none");
		}
	}
}

function auto_search_country(search){
	search = search.trimStart();
	filter_country(search);
}

function auto_search_departement(search){
	search = search.trimStart();
	filter_departement(search);
}

function change_origin_geo(origine_geo){
	let origine = document.getElementById('origine');
	option_search = origine_geo;
	if(origine_geo=="world"){
		origine.placeholder = "Ex: Belgique, Brésil, etc...";
		origine.setAttribute("onfocus","auto_search_country(this.value)");
		origine.setAttribute("oninput","filter_country(this.value)");
	}
	else{
		origine.placeholder = "Ex: Val-de-Marne,Paris, etc..."
		origine.setAttribute("onfocus","auto_search_departement(this.value)");
		origine.setAttribute("oninput","filter_departement(this.value)");
	}
}


function set_country(div){
	let country_name = div.getElementsByClassName('country_name')[0];
	document.getElementById("origine").value = country_name.innerText || country_name.textContent;
	/* Disparition de la liste */
	document.getElementById("countries").classList.toggle('d-flex');
	document.getElementById("countries").classList.toggle('d-none');
}

function set_departement(div){
	let departement_name = div.getElementsByClassName('departement_nom')[0];
	document.getElementById("origine").value = departement_name.innerText || departement_name.textContent;
	/* Disparition de la liste */
	document.getElementById('departements').classList.toggle('d-none');
}

/* Disparition de la liste si le cursur de la souris n'est pas focus sur la liste ou le champs  */
window.addEventListener("click",(event)=>{
	if(option_search=="world"){
		let countries = document.getElementById("countries");
		if(!(	event.target.classList.contains("flag-icon") ||
				event.target.classList.contains("country_name") ||
				event.target.classList.contains("country")
			)){
			/* Disparition de la liste qui est déjà affichée */
			if(countries.classList.contains("d-flex")){
				countries.classList.toggle("d-flex");
				countries.classList.toggle("d-none");
			}
		}
	}
	else{
		let departements = document.getElementById('departements');
		if(!(	event.target.classList.contains("departement") ||
				event.target.classList.contains("departement_name") ||
				event.target.classList.contains("departement_code") ||
				event.target.id=="origine"
			)){
			/* Disparition de la liste qui est déjà affichée */
			if(!departements.classList.contains("d-none")){
				departements.classList.toggle("d-none");
			}
		}		
	}
	
});
