@extends('layouts.app',['additional_head' => 'paiement.cart'])

@section('title') Panier @endsection

@section('content')
<div class="container">
    <div class="table-responsive">
    <table class="table">
      <thead>
        <th>PRODUIT</th>
        <th>QTE</th>
        <th>PRIX</th>
        <th>TOTAL</th>
      </thead>
      <tbody class="my-3">
      @forelse(Cart::content() as $cart)
      <tr>
        <td class="row">
            <img src="{{asset('images/'.$cart->model->img)}}" width="100" class="m-2"/>
            <div>{{$cart->name}}<br><small>Vendu par {{$cart->model->seller->user->fullname()}}</small></div>
        </td>
        <td>
            <select name="qty" id="qty" data-id="{{$cart->rowId}}" class="form-control mb-2">
              @for($i=1; $i <= $cart->model->inventaire->quantity ; $i++)
                  <option value="{{$i}}" {{$cart->qty  == $i ? 'selected' : '' }}  >
                    {{$i}}
                  </option>
              @endfor
            </select>
            <form method="post" action="{{route('cart.delete',$cart->rowId)}}" >
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-dark"><i class="fas fa-trash-alt"></i></button>
            </form>
        </td>
          <td >
              {{$cart->price}} €
          </td>
        <td>
          {{$cart->subtotal}} €
        </td>
      </tr>
      @empty
        <tr class="table-secondary" ><td colspan="6">Panier vide</td></tr>
      @endforelse
      </tbody>
      <caption class="text-right">
          <h4>Sous-total ({{Cart::count() == 1 ? Cart::count(). " article" : Cart::count(). " articles"}}) : <span style="color:#780404;font-weight:bold">{{Cart::subtotal()}} €</span></h4>
          <div class="mt-2">
              <a href="{{route('map.index')}}" class="text-shadow-pop-br link">Continuer vos achats</a><a href='{{route('checkout.index')}}' class="btn btn-dark ml-sm-2">Passer la commande</a>
          </div>
      </caption>
    </table>
  </div>
    <h3 class="py-3">Nous vous recommandons aussi: </h3>
    <div id="top">

    </div>
</div>


@endsection


@section('extra-js')
  <script>
    var qty = document.querySelectorAll('#qty');
    Array.from(qty).forEach(element => {

      element.addEventListener("change", function(){
        var rowId = element.getAttribute('data-id');
        var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        var url = "/cart/quantity/" + rowId
        console.log(url);
        fetch(
          url,
          {
            headers : {
              'Content-Type' : "application/json",
              "Accept" : "application/json,text-plain, */*",
              "X-Requested-with" : "XMLHttpRequest",
              "X-CSRF-TOKEN" : token
            },
            method:'post',
            body: JSON.stringify({
              quantity: this.value
            })
          }
        ).then((data) => {
          console.log(data)
          location.reload()

        }).catch((error) => {
          console.log(error)
        })
      })
    });


  </script>
@endsection
