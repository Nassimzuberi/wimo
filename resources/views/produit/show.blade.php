@extends('layouts.app')
<?php
use App\Http\Controllers\CommandeController;
?>
<script src="{{ asset('js/app.js') }}"></script>
@section('content')
  <div class="mt-5">
    @if(session('message'))
      <div class="alert alert-success"> {{session('message')}} </div>
    @endif
    <div class="d-flex flex-column border text-center">
      <h3 class="">{{$data->name}}</h3>
      <div>{{$data->description}} </div>
      <p>coucou</p>
      <div>Vendu par {{$data->user->name}}</div>
      @if($data->quantity <= 0)
      <small class="text-danger">Rupture de stock </small>
      @else
      <div> Quantité : {{$data->quantity}}</div>
      <form action="{{route('cart.add')}}" method="post">
        @csrf
        <input type='hidden' name="produit_id" value="{{$data->id}}">
        <div class='d-flex flex-row  justify-content-center align-items-center m-3'>
          <label>Quantité : </label>
          <select name="quantity" class="custom-select mx-3 w-25">
            @for ( $i = 1 ; $i <= $data->quantity ; $i++)
            <option value="{{$i}}">{{$i}} </option>
            @endfor
          </select>
        </div>

        <button type="submit" class="btn btn-primary">Ajouter au panier </button>
      </form>
      <br>
      <br>

      <?php
          $user = auth()->user();
          if (isset($user)) {
            $commande = CommandeController::isSaled($data->id, $user->id);
          }
          
        ?>
        @if(isset($commande))

      <div>
        <button onclick="myFunction()" class="btn btn-primary">avis</button>
      </div>
      @endif

      <div id="mydiv" style="display: none;">
        <form class ="avis" id="form_avis" action="{{route('avis.store', $data->id)}}" method="post">
          @csrf
          <textarea class="form-control" id="text_avis" name="text_avis" rows="4"></textarea>
          <div>
            <input type="radio" name="like" id="like" class='like' value="1">
            <label for="like">J'aime</label>
            <input type="radio" name="like" id="dislike" class='like' value="0">
            <label for="dislike">Je n'aime pas</label>
          </div>
          <input type="submit" id="submit-avis" class="btn btn-primary" value="Enregistrer">
        </form>
      </div>
      <script>
function myFunction() {
  var x = document.getElementById("mydiv");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

$("#form_avis").submit(function(e){
  $.ajax ({
    url  :"{{route('avis.store', $data->id)}}",
    type : 'POST',
    data : {
      text_avis:$('#text_avis').val(),
      like:$('.like:checked').val()      
    },
    success: function(data)
    {
      console.log(data);
      alert('tsafet');
    }

  });
});


</script>

      <div>
        @foreach($data->avis as $avis)
        {{$avis->text_avis}}
        @endforeach

      </div>
    
      @endif
      
    </div>
  </div>
@endsection
