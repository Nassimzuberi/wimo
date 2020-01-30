<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <h2>Bonjour {{$user->name}}</h2>
    <p>Vous avez commandé :</p>
    <ul>
      @foreach($commande as $cart)
        <div class="row align-items-center my-2">
          <img src='{{$cart->model->img}}' width="100" class="m-2"/>
          <div class="col m-2">
            <div>{{$cart->model->name}}</div>
            <div>Quantité : {{$cart->qty}} </div>
            <div>Prix : {{$cart->subtotal}} €</div>
          </div>

        </div>
      @endforeach
    </ul>
  </body>
</html>
