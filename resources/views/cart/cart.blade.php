@extends('layouts.app')

@section('content')
<div class="d-flex flex-column flex-sm-row">
  <div class="m-sm-2 border col col-sm-9 shadow">
    <h3 class="m-2">Panier</h3>
    <div class="col">
      @if(Cart::count() == 0)
        <div class="my-3"> Le panier est vide </div>
      @endif
      @foreach(Cart::content() as $cart)
        <div class="row align-items-center my-2">
          <img src='{{$cart->model->img}}' width="100" class="m-2"/>
          <div class="col m-2">
            <div>{{$cart->model->name}}</div>
            <div>Quantité : {{$cart->qty}} </div>
            <div>Prix : {{$cart->subtotal}} €</div>
          </div>
          <div class="ml-auto mr-2">
            <form method="post" action="{{route('cart.delete',$cart->rowId)}}">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></button>
            </form>
          </div>
        </div>
      @endforeach
    </div>
  </div>
    <div class="col align-self-start my-2 p-3 border text-center text-md-left shadow">
      <div>Sous total : {{Cart::subtotal()}} €</div>
      <div>Taxe : {{Cart::tax()}} €</div>
      <div>Total : {{Cart::total()}} €</div>
      <hr class="w-100">
      <div class="mt-2">
        <a href='{{route('checkout.index')}}' class="btn btn-warning">Procéder au paiement</a>
      </form>
    </div>
  </div>
</div>
@endsection
