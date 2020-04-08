@extends('layouts.app')

@section('content')
  <div class="mt-5">
    @if(session('message'))
      <div class="alert alert-success"> {{session('message')}} </div>
    @endif
    <div class="container">
      <div class="row">
        <div class="col-sm-4 p-3 border">
          <img src="{{$annonce->img}}"  />
        </div>
        <div class="col">
          <h3 class="text-center">{{$annonce->product->name}}</h3>
          <div>{{$annonce->description}} </div>
          <div>Vendu par {{$annonce->seller->user->fullname()}}</div>
          @if($annonce->inventaire->quantity <= 0)
          <small class="text-danger">Rupture de stock </small>
          @else
          <form action="{{route('cart.add')}}" method="post">
            @csrf
            <input type='hidden' name="sales_id" value="{{$annonce->id}}">
            <div class='row p-3 align-items-center'>
              <label>Quantité : </label>
              <select name="quantity" class="custom-select mx-3 w-25">
                @for ( $i = 1 ; $i <= $annonce->inventaire->quantity ; $i++)
                <option value="{{$i}}">{{$i}} </option>
                @endfor
              </select>
              <button type="submit" class="btn btn-primary">Ajouter au panier </button>
            </div>

            @endif
          </form>


        </div>
      </div>
    </div>
  </div>

                    @endsection
