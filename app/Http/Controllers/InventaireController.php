<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Inventaire;

class InventaireController extends Controller
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
        $products = Auth::user()->seller->sales;
        return view('account.seller.my_inventory',compact('products'));
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
    public function store(Request $request,$id_announce)
    {
        Inventaire::create([
            "quantity" => $request["type"] == "price_unit" ? $request["inventory"] : NULL,
            "weight" => $request["type"] == "price_weight" ? $request["inventory"] : NULL,
            "sale_id" => $id_announce, 
        ]);
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
        $inventory = Inventaire::find($id);
        return view('account.seller.edit_inventory',compact("inventory"));
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
        $inventory = Inventaire::find($id);
        if($request["type"]=="weight"){
            $inventory->weight = $request->weight;
            $inventory->quantity = NULL;
        }
        else{
            $inventory->quantity = $request->quantity;
            $inventory->weight = NULL;
        }
        $inventory->save();
        return redirect('inventaires')->with('status','inventaire mis à jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Inventaire::destroy($id);
    }
}
