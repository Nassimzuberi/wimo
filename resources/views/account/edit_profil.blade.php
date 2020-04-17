@extends('layouts.app')
@section('content')
    <div class="container pt-3 border">


        <div class="p-5 align-items-center text-center ">
            <h1 class="text-center">Editer mon profil</h1>
            <form method="post" action="{{route('comptes.update',Auth::user())}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    <div class="d-flex flex-sm-row align-items-center">
                        <img src="{{asset(file_exists(public_path().'/images/user-icons/'.Auth::id().'.jpg') ? '/images/user-icons/'.Auth::id().'.jpg' : '/images/user-icon.png')}}" alt="user-img" class="rounded">
                        <input type="file" class="form-control" name="img">
                    </div>
                    <label>Prénom</label>
                    <input type="text" name="first_name" value="{{Auth::user()->first_name}}" class="form-control"><br>
                    <label>Nom</label>
                    <input type="text" name="last_name" value="{{Auth::user()->last_name}}" class="form-control"><br>
                    <label>Date de naissance</label>
                    <input type="date" name="birthday" value="{{Auth::user()->birthday}}" class="form-control"><br>
                    <label>Sexe</label>
                    <input type="radio" name="gender" value="Man" {{Auth::user()->gender=="Man"?"checked":""}}>
                    <span>Homme</span>
                    <input type="radio" name="gender" value="Woman" {{Auth::user()->gender=="Woman"?"checked":""}}>
                    <span>Femme</span><br>
                    <input type="submit" value="Valider" class="btn btn-success">

            </form>
    </div>


    </div>

@endsection
