@extends('layouts.app',['additional_head'=>'maps'])
@section('title')
    Map
@endsection
<<<<<<< HEAD
=======
@section('extra-script')
    <!-- MAPBOX -->
    <script src='https://api.mapbox.com/mapbox-gl-js/v1.8.0/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v1.8.0/mapbox-gl.css' rel='stylesheet' />

    <!-- LEAFLET -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
          integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
          crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
            integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
            crossorigin=""></script>
    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- STYLE -->
    <style>
           .marker {
            background-image: url('images/marker-shadow.svg');
            background-size: cover;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            cursor: pointer;
            }

        .map-app-container{
            overflow-y:none;
        }


    </style>
@endsection
>>>>>>> anis

@section('content')



<div class = map-app-container>
    <!-- Bloc de gauche servant à effectuer les recherches -->
    <div id="left-block">
      @if(session()->has('success'))
        <div class="alert alert-success">
          {{session()->get('success')}}
        </div>
      @endif
      @if(session()->has('warning'))
        <div class="alert alert-warning">
          {{session()->get('warning')}}
        </div>
      @endif
      <!-- Formulaire de recherche -->
<<<<<<< HEAD
      <form action="" method="post" class="map-form">
        <input type="text" name="search" placeholder="ex : bananas, eggs...">
        <input type="range" name="distance" id="distance-range">
        <input type="submit" value="search">
      </form>
=======
        <div class="map-form">
      <form action="" method="post">
        @csrf
        <div class="seach-line">
        <input type="text" name="search-string" value="{{old('search-string')}}" placeholder="ex : bananas, eggs...">
        <button type="submit" value="search">
          <i class="fa fa-search" aria-hidden="true"></i>
        </div>
        </button>
        <!--<input
          type="range"
          name="distance"
          id="distance-range"
          min=""
          max=""
          > -->
>>>>>>> anis

      </form>
        </div>

      <!-- Affichage des produits recherchés -->
      <div id="search-results" class="animated fadeInUp">
@foreach($sales as $sale)
        <!-- Résultat -->
        <div class="result">

                <img src="{{ asset('images/user-icons/100x100/'.$sale->seller->user->id.'.jpg')}}" alt="user-icon" class="result-user-icon">

            <div class="result-infos">
         <p><span class="product-name">{{$sale->product->name}}</span><br>
        <span class="seller-name">by {{$sale->seller->user->first_name}} {{$sale->seller->user->last_name}}</span></p>
        <!-- <a href="{{route('annonces.show',$sale->id)}}">{{$sale->product->name}}  {{$sale->seller->user->first_name}} {{$sale->seller->user->last_name}}</a>-->
          </div>

        <div class="result-image" style="background-image: url({{asset('images/sales-images/'.$sale->id.'.jpg')}})">

        </div>

        </div>
@endforeach
      </div>
    </div>

    <div class = "result-expand">
dfsdfuib
    </div>

    <!-- Affichage de la carte -->

      <div id="mapid" class="animated fadeIn">

      </div>
</div>

  <script type="text/javascript">

    // Obtention de la géolocalisation de l'utilisateur
    if ("geolocation" in navigator) {
      navigator.geolocation.getCurrentPosition(function(position) {
        console.log(position.coords.latitude, position.coords.longitude);
      });
    } else {
      console.log("T moche");
    }

    // Importation des annonces de PHP vers JavaScript
    let sales = @json($sales, JSON_PRETTY_PRINT);
    sales = sales.data;



    /*
    var mymap = L.map('mapid').setView([48.872, 2.352], 16);

    L.tileLayer('https://stamen-tiles-{s}.a.ssl.fastly.net/toner-background/{z}/{x}/{y}{r}.{ext}', {
      attribution: '',
      minZoom: 6,
      maxZoom: 19,
      id: 'mapbox/streets-v11',
      accessToken: 'pk.eyJ1IjoiYW5pemUiLCJhIjoiY2s1ODBxa2dnMDVqajNqam1kajE1ODh0cCJ9.0o0ghQy-gOh8LANGxysXAw',
      ext: 'png'
    }).addTo(mymap);

    var CartoDB_PositronOnlyLabels = L.tileLayer('https://{s}.basemaps.cartocdn.com/light_only_labels/{z}/{x}/{y}{r}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
    subdomains: 'abcd',
    maxZoom: 20
  }).addTo(mymap);


    //Style du marqueur

    var greenIcon = L.icon({
      iconUrl: 'images/marker-shadow.svg',


      iconSize:     [47, 91], // size of the icon
      shadowSize:   [0, 0], // size of the shadow
      iconAnchor:   [23, 68], // point of the icon which will correspond to marker's location
      shadowAnchor: [4, 62],  // the same for the shadow
      popupAnchor:  [-3, -76], // point from which the popup should open relative to the iconAnchor
      className: ''
    });


    //Boucle qui parcourt les positions des utilisateurs pour placer les marqueurs
    sales.forEach(sale => {
      position = JSON.parse(sale.seller.position);
        var newmarker = L.marker([position.lat , position.long],
        {icon: greenIcon,
        bounceOnAdd: true,
        bounceOnAddOptions: {duration: 700, height: 200, loop: 1},
        }).addTo(mymap);

    });

*/

    // Création de la map mapbox
    mapboxgl.accessToken = 'pk.eyJ1IjoiYW5pemUiLCJhIjoiY2s1ODBxa2dnMDVqajNqam1kajE1ODh0cCJ9.0o0ghQy-gOh8LANGxysXAw';
    var map = new mapboxgl.Map({
    container: 'mapid',
    center:[2.352, 48.872],
    style: 'mapbox://styles/anize/ck7t2y21b47to1imtiqfvwz37',
    zoom:14.5,
        pitch:45,

    });

    // Initialisation d'un GeoJSON qui va contenir nos marqueurs
    var geojson = {
        type: 'FeatureCollection',
        features: []
      };

    // Boucle qui parcourt chaque vente, extrait la position,
    // et crée un point dans le GeoJSON pour chacune des ventes.
    sales.forEach(sale => {
          position = JSON.parse(sale.seller.position);
          geojson.features.push(
        {
            type:'Feature',
            geometry: {
                type: 'Point',
                coordinates:[position.long,position.lat]
            },

            });

        });

// Boucle qui rajoute un marqueur pour chaque point du GeoJSON
geojson.features.forEach(function(marker) {

// create a HTML element for each feature
var el = document.createElement('div');
el.className = 'marker';

// make a marker for each feature and add to the map
new mapboxgl.Marker(el)
  .setLngLat(marker.geometry.coordinates)
  .addTo(map);
});

    document.querySelector('.left-block').scrollIntoView({
        behavior: 'smooth'
    });

  </script>

@endsection
