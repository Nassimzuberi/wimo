@extends('layouts.app',['additional_head'=>'maps'])
@section('title')
    Map
@endsection

@section('content')

<div chttps://twitter.com/musdebxl/status/1230172484969861120tlass="wrapper">

    <!-- Bloc de gauche servant à effectuer les recherches -->
    <div id="left-block">

      <!-- Formulaire de recherche -->
      <form action="" method="post" class="map-form">
        <input type="text" name="search" placeholder="ex : bananas, eggs...">
        <input type="range" name="distance" id="distance-range"> 
        <input type="submit" value="search">
      </form>


      <!-- Affichage des produits recherchés -->
      <div id="search-results">
@foreach($sales as $sale)

        <!-- Résultat -->
        <div class="result">
          <div class="result-user-icon-wrapper">
          <img src="{{ asset('images/user-icons/'.$sale->seller_id.'.png')}}" alt="user-icon" class="result-user-icon">
          </div>
          <div>
            <a href="{{route('annonces.show',$sale->id)}}">{{$sale->product->name}}</a>
          </div>
        </div>
@endforeach
      </div>
    </div>

    <!-- Affichage de la carte -->

      <div id="mapid">
        <script type="text/javascript">
          var mymap = L.map('mapid').setView([48.873, 2.356], 16);

          L.tileLayer('https://stamen-tiles-{s}.a.ssl.fastly.net/toner/{z}/{x}/{y}{r}.{ext}', {
            attribution: '',
            minZoom: 6,
            maxZoom: 19,
            id: 'mapbox/streets-v11',
            accessToken: 'pk.eyJ1IjoiYW5pemUiLCJhIjoiY2s1ODBxa2dnMDVqajNqam1kajE1ODh0cCJ9.0o0ghQy-gOh8LANGxysXAw',
            ext: 'png'
          }).addTo(mymap);

          var Stamen_Toner = L.tileLayer('https://stamen-tiles-{s}.a.ssl.fastly.net/toner/{z}/{x}/{y}{r}.{ext}', {
          	attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
          	subdomains: 'abcd',
          	minZoom: 0,
          	maxZoom: 20,
          	ext: 'png'
          });


          //Style du marqueur

          var greenIcon = L.icon({
            iconUrl: 'images/marker-shadow.svg',


            iconSize:     [47, 95], // size of the icon
            shadowSize:   [0, 0], // size of the shadow
            iconAnchor:   [23, 68], // point of the icon which will correspond to marker's location
            shadowAnchor: [4, 62],  // the same for the shadow
            popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
          });

          var marker = L.marker([48.873, 2.359], {icon: greenIcon}).addTo(mymap);
          var marker2 = L.marker([48.874, 2.3597], {icon: greenIcon}).addTo(mymap);
          var marker3 = L.marker([48.8725, 2.35], {icon: greenIcon}).addTo(mymap);
          var marker4 = L.marker([48.871, 2.359], {icon: greenIcon}).addTo(mymap);
          var marker5 = L.marker([48.873, 2.359], {icon: greenIcon}).addTo(mymap);
          var marker6 = L.marker([35.751203, 0,551528], {icon: greenIcon}).addTo(mymap); //Relizane




        </script>
      </div>

  </div>


@endsection
