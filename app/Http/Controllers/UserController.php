<?php

namespace App\Http\Controllers;

use App\User;
use App\Commande;
use Illuminate\Http\Request;
use Auth;


class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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

    public function userMail($mail){
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
    public function commandes(User $user,Request $request){
      $id = $user->id;
      switch($request->filter){
        case 1 :
          $commande =$user->commandes()->where('state',0)->orderBy('created_at','desc');
          break;
        case 2 :
          $commande =$user->commandes()->where('state',1)->orderBy('created_at','desc');
          break;
        default :
          $commande = $user->commandes()->orderBy('created_at','desc');
          break;
      }
      $commandes = $commande->paginate(5);
        return view('user.commandes',compact('commandes','id'));
    }
}
