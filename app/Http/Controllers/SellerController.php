<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use GuzzleHttp;
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

    /* Appel à l'api pour chercher une adresse en France */
    public function call_api_adress($adress){
        $request ='https://api-adresse.data.gouv.fr/search/?q='.$adress;
        
        $client = new GuzzleHttp\Client();
        $response = $client->get($request);
        $content = $response->getBody()->getContents();
        return json_decode($content);
    }

    public function check_adress($adress){
        
        $result = $this->call_api_adress($adress);
        $taille_result = count($result->features);

        /* Aucun résultat de la part de l'api, donc cela signifie que l'adresse ne figure pas dans la base
            de donnée des adresses en France.
        */


        if($taille_result < 0){
            return false;
        }

        /* 
            Plusieurs résultats dans la liste d'adresse, signifie que l'adresse n'est pas assez précise
            pour suggérer une seule adresse qui se rapporte à l'adresse du vendeur. 
        */

        else if($taille_result > 1)
            return false;

        /*
            Un seul résultat dans la bdd, correspond à l'adresse de l'utilisateur
        */

        else{
            $tab_adress = explode(" ",$adress);
            $tab_result = explode(" ",$result->features[0]->properties->label);
            
            /* Une différente taille des résultats signifie que les adresses sont différentes */
            if(count($tab_adress) != count($tab_result))
                return false;

            /* Vérification des éléments de chaque adresse pour vérifier s'ils sont similaire */
            for($i = 0 ; $i < count($tab_adress); $i++){
                if( strtoupper($tab_adress[$i]) != strtoupper($tab_result[$i]))
                    return false;
            }
            return true;
        }
    }

    /** 
     *  Les règles de validation
     *  @param mixed $option: L'option de validation la vérification des données
     *  @param array $data: Données du formulaire
    */
    public function validator(array $data,$option=NULL){
        $rule = [
                'name_shop' => 'string|max:191',
                'address' => 'required|string|max:191',
                'phone_number'=> 'required|regex:/^[0]\d{9}/',
                'adresse_valid'=> 'required',
            ];
        /* Si l'option est un booléen alors on est dans l'édition du magasin. */
        /* Et que le vendeur possède un nouveau téléphone. */  
        if((is_bool($option) && !$option) || !is_bool($option)){
            $rule['phone_number'] = $rule['phone_number'].'|'.'unique:sellers,phone_number';
        }

        /* 
            On rajoute "adresse_valid" au tableau $data pour confirmer la validation de l'adresse.
            Sans la validation, le formulaire d'inscription n'est pas valide.
        */
        if($this->check_adress($data["address"])){
            $data['adresse_valid']=true;
        }


        return Validator::make(
            $data,
            $rule,
            [
                'address.required' => 'Une adresse est requise.',
                'phone_number.regex' => 'Le numéro de téléphone est incorrect.',
                'phone_number.unique' => 'Le numéro de téléphone est déjà utilisé.',
                'adresse_valid.required' => "L'adresse est introuvable",
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
        
        $adress = $this->call_api_adress($request["address"]);

        /* Récupération des coordonnées géographique*/
        $position_adress = $adress->features[0]->geometry->coordinates;

        /* encodage des coordonnées */
        $position=json_encode(
            [
                'lat' => $position_adress[1],
                'long' => $position_adress[0]
            ]
        );
        
        Seller::create(
            [
                'name_shop' => $request['name_shop'] ?? NULL,
                'address' => json_encode([
                    "voie" => $adress->features[0]->properties->name,
                    "code_postal" => $adress->features[0]->properties->postcode,
                    "commune" => $adress->features[0]->properties->city
                ]),
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
        $magasin->setAdress();
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
        $magasin->setAdress();
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

        $adress = $this->call_api_adress($request["address"]);

        $magasin->name_shop = $request["name_shop"];
        $magasin->address = json_encode([
            "voie" => $adress->features[0]->properties->name,
            "code_postal" => $adress->features[0]->properties->postcode,
            "commune" => $adress->features[0]->properties->city
        ]);
        $magasin->position = json_encode(
            [
                'lat' => $adress->features[0]->geometry->coordinates[1],
                'long' => $adress->features[0]->geometry->coordinates[0],
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
