@extends('layouts.app')

@section('title') Panier @endsection

@section('content')
<div class="d-flex flex-column flex-sm-row">
  <div class="m-sm-2 border col col-sm-9 shadow">
    <div class="table-responsive">
    <table class="table text-center">
      <thead>
        <th></th>
        <th>Nom du produit</th>
        <th>Prix unité</th>
        <th>Quantité</th>
        <th>Total</th>
        <th>Supprimer</th>
      </thead>
      <tbody class="my-3">
      @forelse(Cart::content() as $cart)
      <tr>
        <td class="align-middle">
          <img src='{{$cart->model->img}}' width="100" class="m-2"/>
        </td>
        <td class="align-middle">
            <div>{{$cart->name}}</div>
        </td>
        <td class="align-middle">
          {{$cart->price}} €
        </td>
        <td class="align-middle">
            <select name="qty" id="qty" data-id="{{$cart->rowId}}" class="form-control">
              @for($i=1; $i <= $cart->model->inventaire->quantity ; $i++)
                  <option value="{{$i}}" {{$cart->qty  == $i ? 'selected' : '' }}  >
                    {{$i}}
                  </option>
              @endfor
            </select>
        </td>
        <td class="align-middle">
          {{$cart->subtotal}} €
        </td>
        <td class="align-middle">
          <form method="post" action="{{route('cart.delete',$cart->rowId)}}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></button>
          </form>
        </td>
      </tr>
      @empty
        <tr class="table-secondary" ><td colspan="6">Panier vide</td></tr>
      @endforelse
      </tbody>
      <caption class="text-right">
        Sous total ({{Cart::count() == 1 ? Cart::count(). " article" : Cart::count(). " articles"}}) : <span style="color:#780404;font-weight:bold">{{Cart::subtotal()}} €</span>
      </caption>
    </table>
  </div>
  </div>
    <div class="col align-self-start my-2 p-3 border text-center shadow">
        <h4>Sous-total ({{Cart::count() == 1 ? Cart::count(). " article" : Cart::count(). " articles"}}) : <span style="color:#780404;font-weight:bold">{{Cart::subtotal()}} €</span></h4>
        <hr class="w-100">
        <div class="mt-2">
            <a href='{{route('checkout.index')}}' class="btn btn-warning">Passer la commande</a>
    </div>
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
