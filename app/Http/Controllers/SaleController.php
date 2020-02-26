<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\InventaireController;
use App\Category;
use App\Sales;
use Auth;

class SaleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $annonces = Auth::user()->seller->sales;
        return view('my_announcement',compact('categories','annonces'));
    }
    /* 
        Retourne les produits que le vendeur peut vendre 
        $id: identifiant de la categorie

    */
    public function products_available($id){
        $products_id = [];
        foreach(Auth::user()->seller->sales as $sale){
            $products_id[]=$sale->product_id;
        }
        return Category::find($id)->products->reject(function($product)use($products_id){
            return in_array($product->id,$products_id);
        });
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
        /** 
        *   Récupération de l'id de l'annonce qui vient d'être créée,
        *   afin de créer l'inventaire de l'annonce.
        **/
        $id_announce = Sales::create([
            $request["type"]=>$request["price"],
            "seller_id"=>Auth::user()->seller->id,
            "product_id"=>$request["product_id"],
        ])->where([
            'seller_id'=>Auth::user()->seller->id,
            'product_id'=>$request["product_id"],
        ])->get()[0]->id;
        
        /* Appel au controlleur concerné pour la création de l'inventaire */
        $inventory = new InventaireController();
        $inventory->store($request,$id_announce);

        return back()->with('status','Annonce ajoutée');
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
        $annonce = Sales::find($id);
        return view('edit_announcement',compact('annonce','id'));
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
        $annonce = Sales::find($id);
        if($request["type"]=="price_unit"){
            $annonce->price_unit = $request["price"];
            $annonce->price_weight = NULL;
        }
        else{
           $annonce->price_weight = $request["price"];
           $annonce->price_unit = NULL;
        }
        $annonce->save();
        return redirect('/annonces')->with('status','Annonce modifiée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sale = Sales::find($id);
        /* Appel au controlleur concerné pour la suppression 
            de l'inventaire de l'annonce concerné
        */

        $inventory = new InventaireController();
        $inventory->destroy($sale->inventaire->id);
        $sale->delete();        
        return back()->with('status','Annonce supprimée');
    }
}

