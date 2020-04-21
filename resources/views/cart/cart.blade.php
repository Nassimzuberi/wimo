@extends('layouts.app',['additional_head' => 'paiement.cart'])

@section('title') Panier @endsection

@section('content')
<div class="container">
    <div class="table-responsive">
    <table class="table mt-5 p-sm-0" style="overflow:hidden">
      <thead>
        <th>@lang('app.product')</th>
        <th>@lang('app.quantity')</th>
        <th>@lang('app.price')</th>
        <th>TOTAL</th>
      </thead>
      <tbody class="my-3">
      @forelse(Cart::content() as $cart)
      <tr>
        <td class="row">
            <img src="{{Storage::url($cart->model->img)}}" width="100" class="mr-2"/>
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
            <a class="link" href="#" onclick="document.getElementById('delete_sale').submit()">
                Supprimer
                <form method="post" id="delete_sale" action="{{route('cart.delete',$cart->rowId)}}" >
                    @csrf
                    @method('DELETE')
                </form>
            </a>

        </td>
          <td >
              {{$cart->price}} €
          </td>
        <td>
          {{$cart->subtotal}} €
        </td>
      </tr>
      @empty
        <tr class="table-secondary text-center animated flipInX" ><td colspan="6">@lang('app.emptycart')</td></tr>
      @endforelse
      </tbody>
      <caption class="text-center text-sm-right">
          <h4>@lang('app.subtotal') ({{Cart::count() == 1 ? Cart::count(). " article" : Cart::count(). " articles"}}) : <span style="color:#780404;font-weight:bold">{{Cart::subtotal()}} €</span></h4>
          <div class="mt-2">
              <a href="{{route('map.index')}}" class="btn btn-link text-dark text-decoration-none">@lang('app.continue')</a>
              <a href='{{route('checkout.index')}}' class="btn btn-dark ml-sm-2">@lang('app.checkout')</a>
          </div>
      </caption>
    </table>
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
