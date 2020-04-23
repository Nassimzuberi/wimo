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
        $this->middleware('auth');
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

    /** 
     *  Les règles de validation
     *  @param mixed $option: L'option de validation la vérification des données
     *  @param array $data: Données du formulaire
    */
    public function validator(array $data,$option=NULL){
        $rule = [
                'name_shop' => [
                    'string',
                    'max:191'
                ],
                'address' => [
                    'required',
                    'string',
                    'max:191'
                ],
                'phone_number'=> [
                    'required',
                    'regex:/^[0]\d{9}/',
                ],
                'longitude' =>[
                    'required'
                ],
            ];
        if((is_bool($option) && !$option) || !is_bool($option)){
            $rule['phone_number'][]='unique:sellers';
        }
        return Validator::make(
            $data,
            $rule,
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
            ]
        );

        Seller::create(
            [
                'name_shop' => $request['name_shop'] ?? NULL,
                'address' => $request['address'],
                'position' => $position,
                'user_id' => Auth::id(),
                'phone_number'=> $request["phone_number"],
        ]);

        return redirect()->route(
            'vendeurs.show',
            Auth::user()->seller->id
        )->with('status','Inscription réussie');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $magasin = Seller::find($id);
        $magasin->setCoordinates();
        return view('account.seller.my_store',['magasin' => $magasin]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $magasin = Seller::find($id);
        $magasin->setCoordinates();
        return view('account.seller.edit_store',['magasin' => $magasin]);
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
        $magasin = Seller::find($id);
        /* Vérification des données */
        
        $this->validator(
            $request->all(),
            $request["phone_number"]==$magasin->phone_number
        )->validate();

        $magasin->name_shop = $request["name_shop"];
        $magasin->address = $request["address"];
        $magasin->position = json_encode(
            [
                'lat' => $request["latitude"],
                'long' => $request["longitude"],
            ]
        );
        $magasin->save();
        
        return redirect()->route('vendeurs.show',$id)->with('status','Magasin mis à jour.');
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
        return redirect()->route('comptes.index')->with('status','Votre compte est désactivé');
    }
}
