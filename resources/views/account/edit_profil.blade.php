@extends('layouts.app')
@section('content')

    @isset($seller_id)
        @include('layouts.account.nav',['seller_id'=> $seller_id])
    @else
        @include('layouts.accont.nav')
    @endisset

        <div class="container p-5 align-items-center text-center ">

            <h2 class="text-center">@lang('app.edit_profil')</h2>

            <form method="post" action="{{route('comptes.update',Auth::user())}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="my-2">
                    <img class="rounded-circle" src="{{Storage::url(Auth::user()->avatar)}}" height="150px" width="150px" />
                </div>
                <input type="file" class="form-control" name="img">
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


@endsection
