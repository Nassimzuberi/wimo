<?php

namespace App\Http\Controllers;

use App\Policies\AccountPolicy;
use App\User;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

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
        return view('account.account',[
            'seller' => Auth::user()->seller,
        ]);
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
        return redirect()->route('comptes.index',Auth::user())->with('status','Inscription réussie');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $compte
     * @param $compte
     * @return \Illuminate\Http\Response
     */
    public function edit(User $compte)
    {
        $this->authorize('edit', $compte);

        return view('account.edit_profil');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $compte)
    {
        $this->authorize('edit', $compte);
        Auth::user()->first_name = $request["first_name"];
        Auth::user()->last_name = $request["last_name"];
        Auth::user()->birthday = $request["birthday"];
        Auth::user()->save();
        if($request->img) {
            Storage::delete(Auth::user()->avatar);
            if(config('app.env') === 'production'){
                Auth::user()->avatar = Storage::disk()->putFile('users', $request->img, 'public');
            } else{
                Auth::user()->avatar = $request->img->store('users', 'public');
            }

            Auth::user()->save();
        }
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
    public function commandes(User $user,Request $request){
        $this->authorize('edit', $user);
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
        return view('account.commandes',compact('commandes'));
    }
}
