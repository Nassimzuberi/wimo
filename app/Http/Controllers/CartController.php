<?php

namespace App\Http\Controllers;

use App\Sales;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Auth;

class CartController extends Controller
{

  public function __construct(){
    //
  }

  // --  Modifier la quantité des produits du paniers

  public function selectQuantity($rowId,Request $request){
    Cart::update($rowId,$request->quantity);
    return back();
  }

  // -- Ajout et suppression des produits dans le panier

  public function deleteToCart($rowId){
    Cart::remove($rowId);
    return back()->with('success','Le produit a bien été supprimé.');

  }

  public function addToCart(Request $request){
      // cherche si le produit est déja dans le panier
      $duplicata = Cart::search(function($cartItem, $rowId) use ($request) {
        return $cartItem->id == $request->sales_id;
      });
      if($duplicata->isNotEmpty()){
        return redirect()->route('map.index')->with('warning','Le produit a déjà été ajouté.');
      }
      // il n'est pas dans le panier du coup le code ci-dessous est enclenché
      $sales = Sales::find($request->sales_id);
      $sales->price_unit == null ? $sales->price = $sales->price_weight : $sales->price = $sales->price_unit;
      Cart::add($sales->id,$sales->product->name,$request->quantity,$sales->price)->associate('App\Sales');
      return  redirect()->route('map.index')->with('success','Le produit a bien été ajouté');
    }

// -- Affiche le panier
  public function show(){
      return view('cart.cart');
    }

}
