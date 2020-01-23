@extends('layouts.app')

@section('content')
    @foreach($commandes as $commande)
    <div class="card"> {{$commande->produit->name}}</div>
    @endforeach
@endsection