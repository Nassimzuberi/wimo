<form method="POST" action="@isset($parameter_action){{ route($route,$parameter_action) }}@else{{ route($route) }}@endisset" class="container">
    @csrf
    <!-- Pour la methode PUT -->
    @isset($verb)
        @method($verb)
    @endisset
    <div class="form-group">
        <label for="name_shop">Le nom du local <i>(si le local possède un nom)</i> :</label>
        <input id="name_shop" type="text" name="name_shop" value="@isset($magasin){{ $magasin->name_shop }}@else{{ old('name_shop') }}@endisset" class="form-control @error('name_shop') is-invalid @enderror" autofocus>
        @error('name_shop')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="address">Adresse:</label>
        <input id="address" type="text" name="address" class="form-control address @error('address') is-invalid @enderror @error('longitude') is-invalid @enderror" onfocus="auto_search(this)" oninput="search_adress(this)" value="@isset($magasin){{ $magasin->address }}@else{{ old('address') }}@endisset" required="required" autocomplete="off">
        <div class="list-group position-absolute" style="z-index: 1"></div>
        @error('address')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        @error('longitude')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <label>Type d'adresse:</label>

    <div class="form-check form-check-inline">
        <input type="radio" name="type-search" value="housenumber" id="numero" class="form-check-input" oninput="set_type_search(this.value)" checked="checked">
        <label for="numero" class="form-check-label">Numéro</label>
    </div>

    <div class="form-check form-check-inline">
        <input type="radio" name="type-search" id="rue" value="street" class="form-check-input" oninput="set_type_search(this.value)">
        <label for="rue" class="form-check-label">Rue</label>
    </div>

    <div class="form-check form-check-inline">
        <input type="radio" name="type-search" id="lieu-dit" value="locality" class="form-check-input" oninput="set_type_search(this.value)">
        <label for="lieu-dit" class="form-check-label">lieu-dit</label>
    </div>
    <div class="form-group">
        <label for="phone_number">Numéro de téléphone:</label>
        <input type="text" value="@isset($magasin){{ $magasin->phone_number }}@else{{ old('phone_number') }}@endisset" name="phone_number" id="phone_number" maxlength="10" class="form-control @error('phone_number') is-invalid @enderror" required="required">
        @error('phone_number')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <input type="hidden" id="latitude" name="latitude" value="@isset($magasin){{$magasin->coordinates->lat}}@endisset">
    <input type="hidden" id="longitude" name="longitude" value="@isset($magasin){{$magasin->coordinates->long}}@endisset">
    <input type="submit" value="Envoyer">
</form>