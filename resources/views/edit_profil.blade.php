@extends('layouts.app')
@section('content')
<h1>Modification de mon profil</h1>
<form method="post" action="{{route('update_profil')}}">
	@csrf
	<label>Prénom</label>
	<input type="text" name="first_name" value="{{$user->first_name}}"><br>
	<label>Nom</label>
	<input type="text" name="last_name" value="{{$user->last_name}}"><br>
	<label>Date de naissance</label>
    <input type="date" name="birthday" value="{{$user->birthday}}"><br>
	<label>Sexe</label>
    <input type="radio" name="gender" value="Man" {{$user->gender=="Man"?"checked":""}}>
    <span>Homme</span>
    <input type="radio" name="gender" value="Woman" {{$user->gender=="Woman"?"checked":""}}>
    <span>Femme</span><br>    
	<input type="submit" value="Valider">
</form>
@endsection