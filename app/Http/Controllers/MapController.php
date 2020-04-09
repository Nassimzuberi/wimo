<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sales;
use App\Product;

class MapController extends Controller
{

    //index
    public function index(){
      $sales = Sales::paginate(6);
      return view('map.show',compact('sales'));
    }

    //recherche
    public function search(Request $request){

      $name = request('search-string');
      $productIds = Product::select('id')
                    ->where('name','sounds like',"%{$name}%")
                    ->get();
      $productIdsArray =[];
      foreach($productIds as $productId){
        array_push($productIdsArray,$productId->id);
      }
      $sales = Sales::whereIn('product_id', $productIdsArray)
                    ->paginate(6);

      return view('map.show',compact('sales'));
    }
}
