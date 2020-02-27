<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Illuminate\Support\Arr;
use App\Commande;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Mail\CommandeValidation;
use Auth;

class CheckoutController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // si le panier est vide il redirige vers la liste des produits
      if(Cart::count() <= 0){
        return redirect()->route('map.index');
      }
      // Panier non vide => affichage du formulaire de paiement Stripe
      Stripe::setApiKey('sk_test_Chg88zyjWqUPJj8tpCDHLDwe00oyIXMrCg');

      $intent = PaymentIntent::create([
      'amount' => round(Cart::subtotal()) * 100,
      'currency' => 'eur',
      ]);

      $clientSecret = Arr::get($intent, 'client_secret');
        return view('checkout.index',[
          'clientSecret' => $clientSecret,
        ]);
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



      $data = $request->json()->all();
      if($data['paymentIntent']['status'] === 'succeeded'){
        // créer la commande dans la bdd et enlève la quantité acheté dans le produit
        foreach(Cart::content() as $produit){
          Auth::user()->commandes()->create([
            'sales_id' => $produit->id,
            'quantity' => $produit->qty,
            'total' => $produit->subtotal,
            'payement_option' => 2,
          ]);
          $produit->model->inventaire->update([
            'quantity' => $produit->model->inventaire->quantity - $produit->qty,
          ]);
        }
        // envoie le mail de validation de commande
        //Mail::to(Auth::user()->email)->send(new CommandeValidation(Cart::content(),Auth::user()));
        //détruit le panier
        Cart::destroy();
        Session::flash('success','Votre commande a bien été traitée');
        return response()->json(['success'=> 'Paimement traité']);
      } else {
        return response()->json(['error'=> 'Paimement non traité']);
      }
    }

    public function confirm(){
      return Session::has('success') ? view('checkout.confirm') : redirect()->route('map.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
