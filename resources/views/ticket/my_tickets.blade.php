@extends('layouts.app')
@section('title') Mes tickets @endsection
@section('content')
    <div class="container pt-5">
        <a href="{{route('tickets.create')}}" >Créer un nouveau ticket</a>
        @foreach($tickets as $ticket)
            <div class="p-3">
                <div class="row shadow p-2">
                    <h4>Ticket n°{{$ticket->id}} </h4>
                    <small class="ml-auto">statut : @if($ticket->state) <span class="text-success">Répondu</span> @else <span class="text-danger">Non répondu</span> @endif </small>
                </div>
                <p class="p-3" >{{$ticket->response}} </p>
            </div>
            @endforeach

    </div>

    <script>

    </script>
    @endsection
