@extends('layouts.app')
@section('title') Home @endsection
@section('extra-script')
    <link  rel="stylesheet" type="text/css" href="{{asset('/css/home.css')}}">
@endsection

@section('content')
    <section id="presentation" class="">
        <div class="image"></div>

        <div class="container text-center pt-5 ">
            <h1 class="animated fadeIn">Where is my organic ?</h1>
            <p> @lang('home.catch')</p>

            <div class="map-form">
                <p>@lang('home.launch')</p>
                <form action="{{route('map.index')}}" method="post">
                    @csrf
                    <div class="seach-line">
                        <input type="text" name="search-string" value="{{old('search-string')}}" placeholder="ex : bananas, eggs...">
                        <button type="submit" value="search">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <section id="description">
        <div class="container text-center py-5 animated fadeInUp slower">
            <h3>@lang('home.description')<br> @lang('home.description2')</h3>
        </div>
    </section>
@endsection
