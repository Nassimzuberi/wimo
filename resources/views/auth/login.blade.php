@extends('layouts.app')
@section('title') Connexion @endsection
@section('content')
<div class="container">
    <div class="row justify-content-center ">
        <div class="col-md-6 text-center mt-2">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <h2 class="text-center my-5"> @lang('menu.signin')</h2>
                        <div class="form-group">
                                <input id="email" placeholder="@lang('app.mail')" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                                <input id="password" type="password" placeholder="@lang('app.password')" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                                <button type="submit" class="btn btn-light btn-block">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link text-dark" href="{{ route('password.request') }}">
                                        @lang('app.password_forget') ?
                                    </a>
                                @endif
                        </div>
                    </form>
            </div>
        </div>
    </div>
@endsection
