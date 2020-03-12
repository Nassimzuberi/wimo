<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sales;
use App\Product;

class MapController extends Controller
{
    //index
    public function index(){
      $sales = Sales::paginate(50);
      return view('map.show',compact('sales'));
    }

    //recherche
    public function search(){
      
      $name = request('search-string');
      $productIds = Product::select('id')
                    ->where('name','sounds like',"%{$name}%")
                    ->get();
      $productIdsArray =[];
      foreach($productIds as $productId){
        array_push($productIdsArray,$productId->id);
      }
      $sales = Sales::whereIn('product_id', $productIdsArray)
                    ->get();
      return view('map.show',compact('sales'));
    }

}
