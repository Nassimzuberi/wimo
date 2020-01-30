<?php

namespace App\Http\Controllers;

use App\Produit;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Auth;



class CartController extends Controller
{

  public function __construct(){
    //
  }
  public function deleteQuantity(Request $request,$rowId){
    Cart::update($rowId,$request->quantity - 1);
    return back();
  }
  public function addQuantity($rowId,Request $request){
    Cart::update($rowId,$request->quantity + 1);
    return back();
  }
  public function deleteToCart($rowId){
    Cart::remove($rowId);
    return back()->with('success','Le produit a bien été supprimé.');

  }


  public function addToCart(Request $request){
      $duplicata = Cart::search(function($cartItem, $rowId) use ($request) {
        return $cartItem->id == $request->produit_id;
      });
      if($duplicata->isNotEmpty()){
        return redirect()->route('produit.index')->with('warning','Le produit a déjà été ajouté.');
      }
      $produit = Produit::find($request->produit_id);
      Cart::add($produit->id,$produit->name,$request->quantity,$produit->prix_unit)->associate('App\Produit');
      return  redirect()->route('produit.index')->with('success','Le produit a bien été ajouté');
    }

  public function show(){
      return view('cart.cart');
    }

}
