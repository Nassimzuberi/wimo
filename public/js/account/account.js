function close_account(compte){
	if(compte=='user'){
		if(confirm('Voulez-vous désactiver votre compte wimo?'))
			document.getElementById('destroy_user').submit();
	}
	else{
		if(confirm('Voulez-vous désactiver votre compte de vendeur ?'))
			document.getElementById('destroy_seller').submit();
	}
}