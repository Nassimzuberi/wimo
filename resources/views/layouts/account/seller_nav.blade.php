<ul class="nav nav-tabs">
	<li class="nav-item">
		<!-- Pour une meilleure verification penser au fichier controller  -->
		<a class="nav-link @if(class_basename(Route::current()->controller)=='SellerController') active @endif" href="{{route('vendeurs.show',$id)}}">
			<i class="fas fa-store"></i>
			<span>Mon magasin</span>
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link @if(class_basename(Route::current()->controller)=='SaleController') active @endif" href="{{route('vendeurs.annonces.index',$id)}}">
			<i class='fas fa-carrot'></i>
			<span>Mes produits</span>
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="#commande">
			<i class="fas fa-clipboard-list"></i>
			<span>Mes commandes</span>
		</a>
	</li>
</ul>