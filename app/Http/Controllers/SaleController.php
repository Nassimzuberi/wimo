<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Category;
use App\Product;
use App\Sales;
use Auth;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{

    public $sectionCategory;
    public function __construct()
    {
        $this->middleware('auth');
        $this->sectionCategory = [];
        /* Liste des pays pour les origines des produits */
        $this->countries = DB::table('pays')->select('alpha2','nom_fr_fr')->get();
        /* Liste des départements français pour les produits d'origine nationale. */
        $this->departements = DB::table('departement')->select('departement_code','departement_nom')->get();

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($seller_id)
    {
        /* Les produits du vendeurs */
        $annonces =  Sales::where('seller_id',$seller_id)->get();
        return view(
            'account.seller.my_announcement',
            [
                'seller_id' => $seller_id,
                'annonces' => $annonces
            ]
        );
    }

    /* Initialise les différentes sections des produits en fct de categorie */
    public function initSectionCategory($seller_id){
        $categories = Category::all();
        $products = Product::all();
        foreach ($categories as $category) {
            $this->sectionCategory[$category->name] = [];
        }
        foreach($products as $product){
            $prod_cat = $product->categories;
            foreach($prod_cat as $cat){
                /* On rajoute uniquement les produits que le vendeur n'a pas encore commercialisé. */
                if(Sales::where('seller_id',$seller_id)->where('product_id',$product->id)->first()==null)
                    $this->sectionCategory[$cat->name][]=$product;
            }
        }
    }  


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($seller_id)
    {
        
        $this->initSectionCategory($seller_id);

        return view(
            'account.seller.add_announcement',
            [
                'seller_id' => $seller_id,
                'sectionCategory' => $this->sectionCategory,
                'departements' => $this->departements,
                'countries' => $this->countries
            ]
        );
    }

    public function validator(array $data,$type_action){
        $rules = [
            'quantity' => ['required','regex:/^\d{1,4}(\.\d{1,2})?$/'],
            'stock' => ['required'],
            'image'=>['image'],
            'price' => ['required','regex:/^\d{1,4}(\.\d{1,2})?$/'],
            'quantity_mesure' => ['required'],
            'price_mesure' => ['required'],
            'origine_geo' => ['required'],
        ];
        $messages = [
            'origine_geo.required'=> 'Veuillez cocher l\'origine géographique du produit',
            'quantity.regex' => "Seuls les chiffres entre 0 et 9 et le point '.' qui sont acceptés et la quantité maximum est de 9999 . 99",
            'produit.required' => 'Veuillez sélectionner un produit.',
            'quantity.regex' => "Seuls les chiffres entre 0 et 9 et le point '.' qui sont acceptés et la quantité maximum est de 9999 . 99",
            'price.regex'=>"Seuls les chiffres entre 0 et 9 et le point '.' qui sont acceptés et le prix maximum est de 9999 . 99",
            'quantity_mesure.required' => 'Comment se mesure la quantité de votre produit ?',
            'price_mesure'=>'Comment se fixe le prix de votre produit ?',
            'origine.exists'=>'Seuls les pays ou les départements français sont acceptés comme origine du produit.',
            'origine.string'=>'Veuillez bien saisir l\'origine.',            
        ];

        /* 
            On vérifie que le vendeur a bien sélectionné son produit lors de l'enregistrement.
            Lors du "update" d'un produit, la sélection du produit n'est pas nécessaire
            puisque ça été réalisé auparavant.
         */
        if($type_action == "store")
            $rules['produit']=['required'];

        /* En fonction de l'origine on vérifie s'il existe dans la bdd */
        if(array_key_exists('origine_geo', $data)){
            if($data["origine_geo"]=="world")
                $rules['origine'] = ['required','string','exists:pays,nom_fr_fr'];
            else
                $rules['origine'] = ['required','string','exists:departement,departement_nom'];
        }

        else
            return Validator::make($data,$rules,$messages);

        return Validator::make($data,$rules,$messages);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$seller_id)
    {
        $this->validator($request->all(),'store')->validate();
        $product = Sales::create([
            'origine' => $request['origine'],
            'stock' => $request['stock'],
            'price' => $request['price'],
            'quantity' => $request['quantity'],
            'quantity_mesure' => $request['quantity_mesure'],
            'price_mesure' => $request['price_mesure'],
            'seller_id' => $seller_id,
            'product_id' => $request['produit'],
            'description' => $request['description'] ?? NULL,
        ]);
        
        /* Stockage de l'image dans le cloud si en production sinon en developpement stockage en local */
        if(array_key_exists('image',$request->all())) {
            if(config('app.env') === 'production'){
                $product->update(['img' => $request['image']->store('sales')]);
            } else {
                $product->update(['img' => 'sales-default.png']);
            }
        }
        return redirect()->route('vendeurs.annonces.index',$seller_id)->with('status','Nouveau produit ajouté.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Sales $annonce)
    {
        return view('sales.show',compact('annonce'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($annonce_id)
    {
        return view(
            'account.seller.edit_announcement',
            [
                'annonce' => Sales::find($annonce_id),
                'seller_id' => Auth::user()->seller->id,
                'departements' => $this->departements,
                'countries' => $this->countries
            ]
        );
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
        if(isset($request["update_stock"])){

            $request->validate([
                "quantity_$id" => 'required|regex:/^\d{1,4}(\.\d{1,2})?$/',
                "stock_$id" => 'required',
            ]);
            $annonce->quantity = $request["quantity_$id"];
            $annonce->stock = $request["stock_$id"];
            $annonce->save();
            return back()->with('status','Le stock a été mis à jour.');
        }
        else{
            $this->validator($request->all(),'update')->validate();
            $annonce->origine = $request["origine"];
            $annonce->price_mesure = $request["price_mesure"];
            $annonce->quantity_mesure = $request["quantity_mesure"];
            $annonce->price = $request["price"];
            $annonce->quantity = $request["quantity"];
            $annonce->stock = $request["stock"];
            $annonce->description = $request["description"] ?? NULL;
            $annonce->save();
            if(array_key_exists('image',$request->all())) {
                if(config('app.env') === 'production'){
                    $annonce->update(['img' => $request['image']->store('sales')]);
                }
                else {
                    $annonce->update(['img' => 'sales-default.png']);
                }
            }
        }

        return redirect()->route("vendeurs.annonces.index",Auth::user()->seller->id)->with('status','Annonce modifiée.');
    }

    /**
     * Supprime l'annonce du vendeur.
     * Retour sur la page des annonces si c'est vrai
     *
     * @param  int  $id
     * @param  bool $response
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$response=true)
    {
        $sale = Sales::find($id);
        $sale->delete();
        if($response)
            return back()->with('status','Annonce supprimée');
    }
}
