<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Seller;
use App\Http\Controllers\SaleController;

class SellerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('phone_seller');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('register_seller');
    }
    /* Retourne le vendeur en fonction de son numéro de téléphone */
    public function phone_seller($phone){
        return Seller::where('phone_number',$phone)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Seller::create([
            'address' => json_encode([
            'num' => $request["num"],
            'voie' => $request["voie"],
            'cp'=> $request["cp"],
            'commune'=>$request["commune"]
        ]),
        'user_id' => Auth::id(),
        'phone_number'=> $request["telephone"]
        ]);
        return redirect()->route('comptes.show',Auth::user())->with('status','Inscription réussie');
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
     * Désactivation du compte de vendeur et suppression de ces annonces
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $controleur = new SaleController();
        $annonces = Auth::user()->seller->sales;
        foreach($annonces as $annonce){
            $controleur->destroy($annonce->id,false);
        }
        Auth::user()->seller->delete();
        return back()->with('status','Votre compte est désactivé');
    }
}
