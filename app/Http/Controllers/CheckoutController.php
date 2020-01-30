<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Illuminate\Support\Arr;
use App\Commande;
use Illuminate\Support\Facades\Mail;
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
      if(Cart::count() <= 0){
        return redirect()->route('produit.index');
      }
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
      foreach(Cart::content() as $produit){
        Auth::user()->commandes()->create([
          'produit_id' => $produit->id,
          'quantity' => $produit->qty,
          'total' => $produit->subtotal,
          'payement_option' => 2,
        ]);
        $produit->model->update([
          'quantity' => $produit->model->quantity - $produit->qty,
        ]);
      }
      Mail::to(Auth::user()->email)->send(new CommandeValidation(Cart::content(),Auth::user()));

      Cart::destroy();
      $data = $request->json()->all();
      return $data['paymentIntent'];
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
