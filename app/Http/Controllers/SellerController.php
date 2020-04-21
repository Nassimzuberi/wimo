<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Seller;
use App\Http\Controllers\SaleController;
use Illuminate\Support\Facades\Validator;

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
        return view('auth.register_seller');
    }

    public function my_store(){
        return view('account.seller.my_store');
    }

    /* Les règles de validation */
    public function validator(array $data){
        return Validator::make(
            $data,
            [
                'name_shop' => [
                    'string',
                    'max:191'
                ],
                'address' => [
                    'required',
                    'string',
                    'max:191'
                ],
                'phone_number' => [
                    'required',
                    'unique:sellers',
                    'regex:/^[0]\d{9}/',
                ],
                'longitude' =>[
                    'required'
                ],
            ],
            [
                'address.required' => 'Une adresse est requise.',
                'phone_number.regex' => 'Le numéro de téléphone est incorrect.',
                'phone_number.unique' => 'Le numéro de téléphone est déjà utilisé.',
                'longitude.required' => "L'adresse est introuvable",
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        
        $position=json_encode(
            [
                'lat' => $request["latitude"],
                'long' => $request["longitude"],
            ]);

        Seller::create(
            [
                'name_shop' => $request['name_shop'] ?? NULL,
                'address' => $request['address'],
                'position' => $position,
                'user_id' => Auth::id(),
                'phone_number'=> $request["phone_number"],
        ]);

        return redirect()->route('comptes.index',Auth::user())->with('status','Inscription réussie');

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
