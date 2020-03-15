/*Affiche un pop up si le vendeur veut supprimer une annonce */
function delete_announce(id){
	if(confirm('Supprimer cette annonce ?')){
		document.getElementById(`delete_announce_${id}_form`).submit();
	}
}