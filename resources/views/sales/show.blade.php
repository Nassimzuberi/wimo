@extends('layouts.app')

@section('content')
  <div class="mt-5">
    @if(session('message'))
      <div class="alert alert-success"> {{session('message')}} </div>
    @endif
    <div class="d-flex flex-column border text-center">
      <h3 class="">{{$annonce->product->name}}</h3>
      <div>{{$annonce->description}} </div>
      <div>Vendu par {{$annonce->seller->user->name}}</div>
      @if($annonce->inventaire->quantity <= 0)
      <small class="text-danger">Rupture de stock </small>
      @else
      <div> Quantité : {{$annonce->inventaire->quantity}}</div>
      <form action="{{route('cart.add')}}" method="post">
        @csrf
        <input type='hidden' name="sales_id" value="{{$annonce->id}}">
        <div class='d-flex flex-row  justify-content-center align-items-center m-3'>
          <label>Quantité : </label>
          <select name="quantity" class="custom-select mx-3 w-25">
            @for ( $i = 1 ; $i <= $annonce->inventaire->quantity ; $i++)
            <option value="{{$i}}">{{$i}} </option>
            @endfor
          </select>
        </div>

        <button type="submit" class="btn btn-primary">Ajouter au panier </button>
        @endif
      </form>
    </div>
  </div>
@endsection
