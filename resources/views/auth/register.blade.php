@extends('layouts.app')
@section('title')
Inscription
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-md-6 mt-2">
                <form method="post" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf
                    <h2 class="text-center my-5"> @lang('menu.signup')</h2>


                    <div class="form-group">
                        <label for="last_name">@lang('app.lastname')</label>
                        <input id="last_name" type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{old('last_name')}}" autofocus>
                        @error('last_name')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="first_name">@lang('app.firstname')</label>
                        <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{old('first_name')}}">
                        @error('first_name')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>



                    <div class="form-group">
                        <label for="img">Avatar</label>
                        <input id="img" type="file" name="img" class="form-control @error('img') is-invalid @enderror" value="{{old('img')}}">
                        @error('img')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="birthday">@lang('app.birthday')</label>
                        <input type="date" name="birthday" id="birthday" class="form-control @error('birthday') is-invalid @enderror" value="{{old('birthday')}}">
                        @error('birthday')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>@lang('app.gender')</label>
                        <input type="radio" name="gender" value="Man" id="man" checked="checked">
                        <label for="man">Homme</label>
                        <input type="radio" name="gender" value="Woman" id="woman">
                        <label for="woman">Femme</label>
                        @error('gender')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">@lang('app.mail')</label>
                        <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">@lang('app.password')</label>
                        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">@lang('app.confirm_password')</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-light btn-block">
                            Valider
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
