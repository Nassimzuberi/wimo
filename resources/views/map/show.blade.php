    @extends('layouts.app')
@section('title')
    Map
@endsection
@section('extra-script')
    <!-- LEAFLET -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
          integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
          crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
            integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
            crossorigin=""></script>
@endsection

@section('content')

<div class="wrapper">

    <!-- Bloc de gauche servant à effectuer les recherches -->
    <div id="left-block">



      <!-- Affichage des produits recherchés -->
      <div id="search-results">
        <!-- Nom de la recherche -->
        <div id="search-name-block">
          <!-- Image SVG de loupe -->
          <div id="magnifying-glass">
            <img src="images/magnifying-glass.svg" alt="">
          </div>

          <div id="search-name">
            <p><i>Search results for "banana"</i></p>
          </div>
        </div>

        <!-- Résultat -->
        <div class="result">
          <div class="result-user-icon-wrapper">
          <img src="images/user-icons/image-1.png" alt="user-icon" class="result-user-icon">
          </div>
        </div>

        <!-- Résultat -->
        <div class="result">
          <div class="result-user-icon-wrapper">
          <img src="images/user-icons/image-2.png" alt="user-icon" class="result-user-icon">
          </div>
         </div>

        <!-- Résultat -->
        <div class="result">
          <div class="result-user-icon-wrapper">
          <img src="images/user-icons/image-3.png" alt="user-icon" class="result-user-icon">
          </div>
        </div>

        <!-- Résultat -->
        <div class="result">
          <div class="result-user-icon-wrapper">
          <img src="images/user-icons/image-4.png" alt="user-icon" class="result-user-icon">
          </div>
        </div>

        <!-- Résultat -->
        <div class="result">
          <div class="result-user-icon-wrapper">
          <img src="images/user-icons/image-5.png" alt="user-icon" class="result-user-icon">
          </div>
        </div>
        <!-- Résultat -->
        <div class="result">
          <div class="result-user-icon-wrapper">
          <img src="images/user-icons/image-6.png" alt="user-icon" class="result-user-icon">
          </div>
        </div>

        <!-- Résultat -->
        <div class="result">
          <div class="result-user-icon-wrapper">
          <img src="images/user-icons/image-7.png" alt="user-icon" class="result-user-icon">
          </div>        </div>

        <!-- Résultat -->
        <div class="result">
          <div class="result-user-icon-wrapper">
          <img src="images/user-icons/image-8.png" alt="user-icon" class="result-user-icon">
          </div>
        </div>

        <!-- Résultat -->
        <div class="result">
          <div class="result-user-icon-wrapper">
          <img src="images/user-icons/image-9.png" alt="user-icon" class="result-user-icon">
          </div>
        </div>

        <!-- Résultat -->
        <div class="result">
          <div class="result-user-icon-wrapper">
          <img src="images/user-icons/image-10.png" alt="user-icon" class="result-user-icon">
          </div>
        </div>
        <!-- Résultat -->
        <div class="result">
          <div class="result-user-icon-wrapper">
          <img src="images/user-icons/image-11.png" alt="user-icon" class="result-user-icon">
          </div>
        </div>

        <!-- Résultat -->
        <div class="result">
          <div class="result-user-icon-wrapper">
          <img src="images/user-icons/image-12.png" alt="user-icon" class="result-user-icon">
          </div>
        </div>

        <!-- Résultat -->
        <div class="result">
          <div class="result-user-icon-wrapper">
          <img src="images/user-icons/image-13.png" alt="user-icon" class="result-user-icon">
          </div>
        </div>

        <!-- Résultat -->
        <div class="result">
          <div class="result-user-icon-wrapper">
          <img src="images/user-icons/image-14.png" alt="user-icon" class="result-user-icon">
          </div>
        </div>

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
