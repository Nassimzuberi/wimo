<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\Auth\RegisterController;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('mail_account','create','store');
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
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $controleur = new RegisterController();
        $controleur->register($request);
        /* 
            Si l'utilisateur s'est inscrit pour devenir vendeur,
            on appelle le controlleur Seller.
        */
        if(isset($request->register_seller)){
            $controleur = new SellerController();
            return $controleur->store($request);
        }
        return redirect()->route('comptes.show',Auth::user())->with('status','Inscription réussie');
    }

    public function mail_account($mail){
        return User::where('email',$mail)->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('account.account',[
            'seller' => Auth::user()->seller,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('edit_profil',[
            'compte'=> Auth::user(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Auth::user()->first_name = $request["first_name"];
        Auth::user()->last_name = $request["last_name"];
        Auth::user()->birthday = $request["birthday"];
        Auth::user()->save();
        return redirect('/comptes')->with(['status'=>'Profil mis à jour']);
    }
   

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        /* 
        *   Si l'utilisateur possède un compte vendeur 
        *   On supprime ses données.
        */
        if(Auth::user()->seller){
            $controleur = new SellerController();
            $controleur->destroy(Auth::user()->seller->id);
        }
        Auth::user()->delete();
        return redirect('/');
    }
}
