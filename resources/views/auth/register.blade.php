@extends('layouts.app')

@section('content')
<form method="POST" action="{{route('register')}}">
    @csrf
    <label>Prénom</label>
    <input type="text" name="first_name" value="{{old('first_name')}}"><br>
    <label>Nom</label>
    <input type="text" name="last_name" value="{{old('last_name')}}"><br>
    <label>Date de naissance</label>
    <input type="date" name="birthday" value="{{old('birthday')}}"><br>
    <label>Sexe</label>
    <input type="radio" name="gender" value="Man">
    <span>Homme</span>
    <input type="radio" name="gender" value="Woman">
    <span>Femme</span><br>
    <label>email</label>
    <input type="text" name="email" value="{{old('email')}}"><br>
    <label>Mot de passe</label>
    <input type="password" name="password"><br>
    <label>Mot de passe de confirmation</label>
    <input type="password" name="password_confirmation"><br>
    <input type="submit" value="Valider">    
</form>
@endsection
