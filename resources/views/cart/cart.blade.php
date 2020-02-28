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
          <div class="row justify-content-center">
            <form method="GET" action='{{route('cart.delete.quantity',$cart->rowId)}}'>
              <input type="hidden" name="quantity" value="{{$cart->qty}}">
              <button type="submit" class="btn btn-sm btn-outline-dark" @if($cart->qty <= 1) disabled @endif> - </button>
            </form>
            <div class="mx-2">{{$cart->qty}} </div>
            <form method="GET" action='{{route('cart.add.quantity',$cart->rowId)}}'>
              <input type="hidden" name="quantity" value="{{$cart->qty}}">
              <button type="submit" class="btn btn-sm btn-outline-dark" @if($cart->qty >= $cart->model->inventaire->quantity) disabled @endif> + </button>
            </form>
          </div>
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
      </form>
    </div>
  </div>
</div>
@endsection
