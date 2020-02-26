@extends('layouts.app')
@section('content')
<h1>Modification de mon profil</h1>
<form method="post" action="{{route('comptes.update',compact('compte'))}}">
	@csrf
	@method('PUT')
	<label>Prénom</label>
	<input type="text" name="first_name" value="{{$compte->first_name}}"><br>
	<label>Nom</label>
	<input type="text" name="last_name" value="{{$compte->last_name}}"><br>
	<label>Date de naissance</label>
    <input type="date" name="birthday" value="{{$compte->birthday}}"><br>
	<label>Sexe</label>
    <input type="radio" name="gender" value="Man" {{$compte->gender=="Man"?"checked":""}}>
    <span>Homme</span>
    <input type="radio" name="gender" value="Woman" {{$compte->gender=="Woman"?"checked":""}}>
    <span>Femme</span><br>    
	<input type="submit" value="Valider">
</form>
@endsection