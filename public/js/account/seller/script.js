/*Affiche un pop up si le vendeur veut supprimer une annonce */
function delete_announce(id){
	if(confirm('Supprimer cette annonce ?')){
		document.getElementById(`delete_announce_${id}_form`).submit();
	}
}

var product_select = null;
var product_select_name = "";
var list_id = "fruits";


/* Ajouter le produit selectionné dans le formulaire */
function add_product(new_product,new_product_name){
	if(product_select != null){
		/* On retire la class de l'ancien product */
		product_select.classList.toggle("product-select");
		/* selection du même produit et initialisation des products */
		if(product_select_name == new_product_name){
			document.getElementById('product').value = "";
			product_select = null;
		}
		else{
			new_product.classList.toggle("product-select");
			product_select = new_product;
			product_select_name = new_product_name;
			document.getElementById('product').value = new_product_name;
		}
	}
	else{
		new_product.classList.toggle("product-select");
		product_select = new_product;
		product_select_name = new_product_name;
	}
}

function change_addon(type_quantity){
	document.getElementById("addon-quantity").innerHTML = type_quantity;
}

function init_filter(id){
	list_id = id;
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