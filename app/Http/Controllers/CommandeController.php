<?php

namespace App\Http\Controllers;

use App\Commande;
use Illuminate\Http\Request;
use Auth;

class CommandeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id)
    {
        /* Les commandes réceptionnées par le client sont de state ( statut ) "1" */
        $commandes_reception = Auth::user()->commandes()->where('state',1)->orderBy('created_at','desc');

        /* Les commandes non réceptionnées par le client sont de state ( statut ) "0" */
        $commandes_non_reception = Auth::user()->commandes()->where('state',0)->orderBy('created_at','desc');

        /* Les commandes en cours de préparation par le vendeurs */
        $commandes_en_cours = Auth::user()->commandes()->where('state',2)->orderBy('created_at','desc');

        /* Les commandes prêts à être réceptionnées par le client */
        $commandes_prets = Auth::user()->commandes()->where('state',3)->orderBy('created_at','desc');

        /* Les commandes en attente d'être pris en charge par le vendeur */
        $commandes_attentes = Auth::user()->commandes()->where('state',4)->orderBy('created_at','desc');


        if(isset(Auth::user()->seller)){
            $seller_id = Auth::user()->seller->id;
            return view('account.commandes',compact('seller_id','commandes_reception','commandes_non_reception','commandes_en_cours','commandes_prets','commandes_attentes'));
        }
        return view('account.commandes',compact('commandes_reception','commandes_non_reception','commandes_en_cours','commandes_prets','commandes_attentes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function show(Commande $commande)
    {
        return view('commande.show',compact('commande'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function edit(Commande $commande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commande $commande)
    {
      //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commande $commande)
    {
      //
    }

    public function reception(Request $request,Commande $commande){

      $commande->update(['state' => 1]);
      return redirect()->route('user.commandes',Auth::id())->with('success',"Vous avez confirmer avoir réceptionner la commande n° $commande->id");
    }

}
