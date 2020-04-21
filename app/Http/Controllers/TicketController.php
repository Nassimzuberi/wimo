<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $tickets = Ticket::orderBy( 'created_at','desc')->paginate(10);
        return view('admin.ticket',compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('ticket.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $ticket = Auth::user()->tickets()->create($request->all());
        if ($request->img) {
            if(config('app.env') === 'production'){
                $ticket->img = request('img')->store('tickets');
            } else {
                $ticket->img = request('img')->store('tickets','public');
            }
            $ticket->save();
        }
        return redirect()->route('tickets.create')->with('success', true);
    }

    /**
     * Display the specified resource.
     *
     * @param Ticket $ticket
     * @return Response
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Ticket $ticket
     * @return Response
     */
    public function edit(Ticket $ticket)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Ticket $ticket
     * @return Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        $data =$request->all();
        $data['state'] = 1;
        if($ticket->update($data)){
            return back()->with('success',true);
        }
        return back()->with('error',true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Ticket $ticket
     * @return Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }

    public function my_tickets(){
        $tickets = Auth::user()->tickets()->orderBy('id', 'desc')->get();
        return view('ticket.my_tickets',compact('tickets'));
    }
}
