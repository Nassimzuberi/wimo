<?php

namespace App\Http\Controllers;

use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Auth;

class CartController extends Controller
{

  public function __construct(){
    //
  }

  // --  Modifier la quantité des produits du paniers

  public function deleteQuantity(Request $request,$rowId){
    Cart::update($rowId,$request->quantity - 1);
    return back();
  }
  public function addQuantity($rowId,Request $request){
    Cart::update($rowId,$request->quantity + 1);
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
        return $cartItem->id == $request->product_id;
      });
      if($duplicata->isNotEmpty()){
        return redirect()->route('product.index')->with('warning','Le produit a déjà été ajouté.');
      }
      // il n'est pas dans le panier du coup le code ci-dessous est enclenché
      $product = Product::find($request->product_id);
      Cart::add($product->id,$product->name,$request->quantity,$product->prix_unit)->associate('App\Product');
      return  redirect()->route('product.index')->with('success','Le produit a bien été ajouté');
    }

// -- Affiche le panier
  public function show(){
      return view('cart.cart');
    }

}
