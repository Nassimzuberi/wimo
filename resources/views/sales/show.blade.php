@extends('layouts.app')

@section('content')
  <div >
    @if(session('message'))
      <div class="alert alert-success"> {{session('message')}} </div>
    @endif
    <div class="container">
      <div class="row">
        <div class="col-sm-4 p-3 border">
          <img src="{{$annonce->img}}"  />
        </div>
        <div class="col">



          <?php
          $user = auth()->user();
          //print_r($annonce);
          //die();
          if (isset($user)) {
            //$commande = CommandeController::isSaled($annonce->id, $user->id);
          }

        ?>

        @if(!empty($commande))

      <div>
        <button onclick="myFunction()" class="btn btn-primary">avis</button>
      </div>
      @endif

      <div id="mydiv" style="display: none;">
        <form class ="avis" id="form_avis" action="{{route('comment.store', $annonce->id)}}" method="post">
          @csrf
          <textarea class="form-control" id="text_avis" name="text_avis" rows="4" required></textarea>
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
                    url  :"{{route('comment.store', $annonce->id)}}",
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



        </div>
      </div>
    </div>
  </div>

                    @endsection
