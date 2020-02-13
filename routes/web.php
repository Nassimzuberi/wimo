<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route pour le panier
Route::delete('/cart/delete/{rowId}','CartController@deleteToCart')->name('cart.delete');
Route::post('/cart/add','CartController@addToCart')->name('cart.add');
Route::get('/cart','CartController@show')->name('cart');
Route::get('/cart/delete/quantity/{rowId}','CartController@deleteQuantity')->name('cart.delete.quantity');
Route::get('/cart/add/quantity/{rowId}','CartController@addQuantity')->name('cart.add.quantity');

// Route pour le paiement

Route::get('/paiement','CheckoutController@index')->name('checkout.index');
Route::post('/paiement','CheckoutController@store')->name('checkout.store');
Route::get('/merci','CheckoutController@confirm');

//Route des commandes
Route::get('commande/{commande}','CommandeController@show')->name('commande.show');
Route::get('users/{user}/commandes','UserController@commandes')->name('user.commandes');
Route::post('commande/{commande}/reception','CommandeController@reception')->name('commande.validate');
/* Routage vers la page mon compte */
Route::get('/compte','AccountController@index');

/* Routage vers le formulaire de modification du profil */
Route::get('/compte/modifier/profil/','AccountController@edit_profil');
/* Routage vers la fonction qui met à jour la modification du profil */
Route::post('/compte/modifier/profil/','AccountController@update_profil')->name('update_profil');
/* Routage vers le formulaire d'inscription de vendeur */
Route::get('/devenir/vendeur','SellerController@create');
/* Routage vers la fonction qui enregistre le nouveau vendeur */
Route::post('/devenir/vendeur','SellerController@store')->name('register_seller');
/* Routage vers la page du magasin du vendeur */
Route::get('/compte/magasin','SellerController@index');
/* Routage vers la page des annonces du vendeur */
Route::get('/compte/magasin/annonces','SaleController@index');
/* à terminer*/
Route::post('/compte/magasin/annonces','SaleController@store')->name('add_announce');
Route::resource('produit','ProduitController');
Route::resource('product','ProduitController');

Route::resource('user','UserController');

//Routes de la carte
Route::get('map','MapController@show')->name('map.index');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
