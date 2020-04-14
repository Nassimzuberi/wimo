@extends('voyager::master')

@section('content')

    <div>
        @if(session('success'))
            <div class="alert alert-success">Vous avez envoyé la réponse</div>
        @elseif(session('error'))
            <div class="alert alert-danger">Une erreur s'est produite</div>
        @endif
        @foreach($tickets as $ticket)
            <div style="padding:20px;margin:20px;" class="{{$ticket->state ? 'bg-success' : 'bg-danger'}}">
                <h5 >Ticket de <a href="{{url("admin/users/".$ticket->user->id)}}" >{{$ticket->user->fullname()}}</a>    <small>{{$ticket->typeprob()}}</small></h5>

                <p>{{$ticket->text}}</p>

                @if($ticket->state)
                    <div>Réponse :</div>
                    <p>{{$ticket->response}}</p>
                @else

                <form method="post" action="{{route('tickets.update',$ticket->id)}}">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label>Répondre :</label>
                        <textarea name="response" style="width:50%" class="form-control"> </textarea>
                        <button type="submit" class="btn btn-success" >Confirmer</button>
                    </div>

                </form>
                    @endif

            </div>
            @endforeach
<div class="text-center"> {{$tickets->links()}}</div>

    </div>

    @endsection
