@extends('layouts.app')

@section('title') Signalez un problème @endsection
@section('content')
    <div class="container pt-5">
        <div class="p-5  shadow">
            <h2 class="text-center my-2">Créer un ticket</h2>
            @if(session()->has('success'))
                <div class="text-center text-success">Le ticket a bien été envoyé <br>  Nous vous repondrons dans les plus brefs delais</div>
            @endif
            <form method="post" action="{{route('tickets.store')}}" class="py-3" enctype= ‘multipart/form-data’>
                @csrf
                <label>Quel type de problème avez-vous eu ?</label>
                <select class="form-control mb-3" name="type">
                    <option value="1">Vous avez eu un problème avec un produit</option>
                    <option value="2">Vous avez eu un problème avec le vendeur ?</option>
                    <option value="3">Vous avez eu un problème avec le site ?</option>
                </select>
                <label>Décrivez le problème</label>
                <textarea name="text" class="form-control mb-3"></textarea>
                <label>Ajouter une capture d'écran ou une photo</label>
                <input type="file" class="form-control" name="images" multiple>
                <div>
                    <button type="submit" class="btn btn-success my-3">Envoyer</button>
                </div>
            </form>
        </div>

    </div>

    @endsection
