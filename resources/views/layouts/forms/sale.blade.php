<form method="POST" action="{{route($route,$parameter_action)}}" class=" flex-column" enctype="multipart/form-data">
	@csrf
    <!-- Pour la methode PUT -->
    @isset($verb)
        @method($verb)
    @else
		<input type="hidden" name="produit" id="produit">	    
    @endisset				
	
	<!-- Origine -->
	<div class="form-group">
		<h5>
			2.
			<span>
				Renseigner l'origine du produit
			</span>
			<span>*</span>
		</h5>
		
		<input type="text" placeholder="Ex: Belgique, Brésil, etc..." id="origine" name="origine" class="form-control @error('origine') is-invalid @enderror" value="@isset($annonce){{$annonce->origine}}@else{{old('origine')}}@endisset" onfocus="auto_search_country(this.value)" oninput="filter_country(this.value)" required="required" autocomplete="off">
		
		<!-- Liste des départements -->
		
		<div class="d-none overflow-auto position-absolute bg-white border" id="departements">
			@foreach($departements as $departement)
				<div class="d-block departement border" onclick="set_departement(this)" onmouseover="this.classList.toggle('bg-primary')" onmouseout="this.classList.toggle('bg-primary')">
					<span class="departement_code">{{$departement->departement_code}}</span>
					<span class="departement_nom">{{$departement->departement_nom}}</span>
				</div>
			@endforeach
			<div class="d-none text-center not_found">
				<span>Aucun résultat</span>
			</div>		
		</div>

		<!-- Liste des pays -->

		<div class="d-none flex-wrap overflow-auto position-absolute bg-white border" id="countries">
			@foreach($countries as $country)
				<div class="border py-2 px-3 flex-fill text-center country" onclick="set_country(this)" onmouseover="this.classList.toggle('bg-primary')" onmouseout="this.classList.toggle('bg-primary')">
					<span class="flag-icon flag-icon-{{strtollower($country->alpha2)}}" ></span>
					<span class="country_name">{{$country->nom_fr_fr}}</span>
				</div>
			@endforeach
			<div class="d-none border py-2 px-3 flex-fill text-center not_found">
				<span>Aucun résultat</span>
			</div>
		</div>

		<!-- Option de recherches pour les origines  -->

		<div class="form-check form-check-inline">
			<input type="radio" value="world" class="form-check-input" name="origine_geo" id="world" oninput="change_origin_geo('world')" @isset($annonce) @if(DB::table('pays')->where('nom_fr_fr',$annonce->origine)->first()) checked @endif @else checked @endisset>
			<label class="@error('territory') is-invalid @enderror form-check-label" for="world">
				Origine internationale
			</label>
		</div>

		<div class="form-check form-check-inline">
			<input type="radio" value="fr" class="form-check-input" name="origine_geo" id="fr" oninput="change_origin_geo('fr')" @isset($annonce) @if(DB::table('pays')->where('nom_fr_fr',$annonce->origine)->first() == null) checked @endif @endisset>
			<label class="@error('origine_geo') is-invalid @enderror form-check-label" for="fr">
				Origine française
			</label>
		</div>

		@error('origine')
			<div class="alert alert-danger" role="alert">
				<span>
		            <strong>{{ $message }}</strong>
		        </span>
			</div>
		@enderror
		@error('origine_geo')
			<div class="alert alert-danger" role="alert">
				<span>
		            <strong>{{ $message }}</strong>
		        </span>
			</div>
		@enderror

	</div>

	<!-- Quantité -->

	<div class="form-group">
		<h5>
			3.
			<span>
				Renseigner la quantité du produit dont vous disposez
			</span>
			<span>*</span>
		</h5>
		<div class="input-group">
			<input type="text" name="quantity" placeholder="Exemple: 100.00" class="form-control @error('quantity') is-invalid @enderror" value="@isset($annonce){{$annonce->quantity}}@else{{old('quantity')}}@endisset" required="required" maxlength="7">
			<div class="input-group-append">
				<span class="input-group-text" id="addon-quantity">
					@isset($annonce)
						@if($annonce->quantity_mesure == "kilogramme")
							{{'Kg'}}
						@elseif($annonce->quantity_mesure == "gramme")
							{{'Gr'}}
						@else
							{{'pièce'}}
						@endif
					@else
						{{'Kg'}}
					@endisset
				</span>
			</div>		        		
		</div>
		<div class="form-check form-check-inline">
			<input type="radio" value="kilogramme" class="form-check-input" name="quantity_mesure" id="qk" oninput="change_quantity_mesure('Kg')" @isset($annonce)@if($annonce->quantity_mesure == "kilogramme") checked @endif @else checked @endisset>
			<label class="@error('quantity_mesure') is-invalid @enderror form-check-label" for="qk">
				Kilogramme
			</label>
		</div>
		<div class="form-check form-check-inline">
			<input type="radio" value="gramme" class="form-check-input" name="quantity_mesure" id="qg" oninput="change_quantity_mesure('Gr')" @isset($annonce)@if($annonce->quantity_mesure == "gramme") checked @endif @endisset>
			<label class="@error('quantity_mesure') is-invalid @enderror form-check-label" for="qg">
				Gramme
			</label>
		</div>
		<div class="form-check form-check-inline">
			<input type="radio" value="pièce" class="form-check-input" name="quantity_mesure" id="qp" oninput="change_quantity_mesure('pièce')" @isset($annonce) @if($annonce->quantity_mesure == "pièce") checked @endif @endisset>
			<label class="@error('quantity_mesure') is-invalid @enderror form-check-label" for="qp">
				pièce / unité
			</label>		  		
		</div>
		@error('quantity_mesure')
			<div class="alert alert-danger" role="alert">
				<span>
	            	<strong>{{ $message }}</strong>
	        	</span>
			</div>
	    @enderror
	    @error('quantity')
			<div class="alert alert-danger" role="alert">
				<span>
		            <strong>{{ $message }}</strong>
		        </span>
			</div>
		@enderror		
	</div>

    <!-- Le stock du produit -->

    <div class="form-group">
    	<h5>
			4.
			<span>
				Renseigner le stock du produit
			</span>
			<span>*</span>
		</h5>
		<div class="form-check form-check-inline">
			<input type="radio" value="disponible" class="form-check-input" name="stock" id="disponible" @isset($annonce) @if($annonce->stock == "disponible") checked @endif @else checked @endisset>
			<label class="@error('stock') is-invalid @enderror form-check-label" for="disponible">
				Disponible
			</label>
		</div>

		<div class="form-check form-check-inline">
			<input type="radio" value="bientôt disponible" class="form-check-input" name="stock" id="bientôt_disponible" @isset($annonce) @if($annonce->stock == "bientôt disponible") checked @endif @endisset>
			<label class="@error('stock') is-invalid @enderror form-check-label" for="bientôt_disponible">
				Bientôt disponible
			</label>
		</div>

		<div class="form-check form-check-inline">
			<input type="radio" value="épuisé" class="form-check-input" name="stock" id="épuisé">
			<label class="@error('stock') is-invalid @enderror form-check-label" for="épuisé" @isset($annonce) @if($annonce->stock=="épuisé") checked @endif @endisset>
				Épuisé
			</label>
		</div>

		<div class="form-check form-check-inline">
			<input type="radio" value="bientôt épuisé" class="form-check-input" name="stock" id="bientôt_épuisé" @isset($annonce) @if($annonce->stock == "bientôt épuisé") checked @endif @endisset>
			<label class="@error('stock') is-invalid @enderror form-check-label" for="bientôt_épuisé">
				bientôt épuisé
			</label>
		</div>		
    </div>

	<!-- Le prix -->

	<div class="form-group mt-2">
		<h5>
			5.
			<span>
				Fixer le prix du produit
			</span>
			<span>*</span>
		</h5>
		<div class="input-group">
			<input type="text" name="price" placeholder="Exemple: 1.50" class="form-control @error('price') is-invalid @enderror" maxlength="7" value="@isset($annonce){{ $annonce->price }}@else{{ old('price') }}@endisset" required="required">
			<div class="input-group-append">
				<span class="input-group-text">
					€
				</span>
			</div>
			<div class="input-group-append">
				<span class="input-group-text">
					/
				</span>
			</div>
			<div class="input-group-append">
				<span class="input-group-text" id="addon-price">
					@isset($annonce)
						@if($annonce->price_mesure == "kilogramme")
							{{'Kg'}}
						@elseif($annonce->price_mesure == "gramme")
							{{'Gr'}}
						@else
							{{'Pièce'}}
						@endif
					@else
						{{'Kg'}}
					@endisset
				</span>
			</div>		        	
		</div>
		<span>Prix par poids ou par pièce:</span><br>
		<div class="form-check form-check-inline">
			<input type="radio" value="kilogramme" class="form-check-input" name="price_mesure" id="pk" oninput="change_price_mesure('Kg')" @isset($annonce) @if($annonce->price_mesure == "kilogramme") checked @endif @else checked @endisset>
			<label class="@error('price_mesure') is-invalid @enderror form-check-label" for="pk">
				Kilogramme
			</label>
		</div>
		<div class="form-check form-check-inline">
			<input type="radio" value="gramme" class="form-check-input" name="price_mesure" id="pg" oninput="change_price_mesure('Gr')" @isset($annonce) @if($annonce->price_mesure=="gramme") checked @endif @endisset>
			<label class="@error('price_mesure') is-invalid @enderror form-check-label" for="pg">
				Gramme
			</label>
		</div>
		<div class="form-check form-check-inline">
			<input type="radio" value="pièce" class="form-check-input" name="price_mesure" id="pp" oninput="change_price_mesure('pièce')" @isset($annonce) @if($annonce->price_mesure=="pièce") checked @endif @endisset>
			<label class="@error('price_mesure') is-invalid @enderror form-check-label" for="pp">
				pièce / unité
			</label>
		</div>
		@error('price')
			<div class="alert alert-danger" role="alert">
				<span>
	            	<strong>{{ $message }}</strong>
	        	</span>
			</div>
		@enderror	
		
		@error('price_mesure')
			<div class="alert alert-danger" role="alert">
				<span>
	            	<strong>{{ $message }}</strong>
	        	</span>						
			</div>
	    @enderror		
	</div>


	<!-- L'image du produit -->
	<div class="form-group mt-2">
		<h5>
			6.
			<span>
				Image du produit <i>(pas obligatoire)</i>
			</span>
		</h5>
		<div class="input-group">
			<input type="file" name="image" class="form-control">
		</div>
	</div>

	<!-- Description du produit -->
	<div class="form-group mt-5">
		<h5>
			7.
			<span>
				Description du produit <i>(pas obligatoire)</i>
			</span>
		</h5>
		<textarea class="form-control" name="description">@isset($annonce){{$annonce->description}}@else{{ old('description') }}@endisset</textarea>
	</div>
	<p>
		<i class="fas fa-exclamation-triangle text-warning"></i>
		<span style="color:red">*</span>
		L'étoile rouge signifie que le champs est obligatoire.
	</p>
	<input type="submit" value="Ajouter">
</form>	