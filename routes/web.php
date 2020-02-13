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
Route::view('/merci','checkout.confirm');

//Route des commandes
Route::get('commande/{commande}','CommandeController@show')->name('commande.show');
Route::get('users/{user}/commandes','UserController@commandes')->name('user.commandes');
Route::post('commande/{commande}/reception','CommandeController@reception')->name('commande.validate');

Route::resource('produit','ProduitController');
Route::resource('user','UserController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route pour les avis
Route::post('/produit/{produit_id}', ['uses' => 'AvisController@store', 'as' => 'avis.store']);
