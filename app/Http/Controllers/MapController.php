<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sales;

class MapController extends Controller
{
    public function show(){
      $sales = Sales::paginate(50);
      return view('map.show',compact('sales'));
    }
}
