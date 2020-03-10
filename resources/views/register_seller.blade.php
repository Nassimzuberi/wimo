@extends('layouts.register.app')
@section('content')
<h1>Devenir vendeur</h1>
<p style="text-align: center;">
    Renseignez l'adresse de votre point de vente <br>
    et un numéro afin que les acheteurs puissent vous joindre
</p>
<form method="POST" action="{{route('vendeurs.store')}}">
	@csrf
	<label for="num">Numéro de la voie</label>
	<input type="text" id="num" name="num" required class="form-control @error('num') is-invalid @enderror" value="{{old('num')}}">
	@error('num')
		<span class="invalid-feedback" role="alert">
    	<strong>{{ $message }}</strong>
    	</span>	
	@enderror
	<label>Voie</label>
	<input type="text" name="voie" required class="form-control @error('voie') is-invalid @enderror" value="{{old('voie')}}">
	@error('voie')
		<span class="invalid-feedback" role="alert">
    	<strong>{{ $message }}</strong>
    	</span>	
	@enderror	
	<label>Code postal</label>
	<input type="text" name="cp" required class="form-control @error('cp') is-invalid @enderror" maxlength="5" value="{{old('cp')}}">
	@error('cp')
		<span class="invalid-feedback" role="alert">
    	<strong>{{ $message }}</strong>
    	</span>
    @enderror
	<label>Commune / Ville</label>
	<input type="text" name="commune" required
	class="form-control @error('commune') is-invalid @enderror" value="{{old('commune')}}">
	<label>Télephone</label>
	<input type="text" name="telephone" class="form-control @error('telephone') is-invalid @enderror" maxlength="10">
	@error('telephone')
		<span class="invalid-feedback" role="alert">
    	<strong>{{ $message }}</strong>
    	</span>
    @enderror
	<input type="submit">
</form>
@endsection