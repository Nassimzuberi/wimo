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


/* Routage vers la page d'accueil */
Route::view('/','welcome');
Route::get('/home', 'HomeController@index')->name('home');

/***** Vendeurs ******/

Route::resource('vendeurs','SellerController');
Route::get('magasin','SellerController@my_store');
/*Interroge la base de donnée si un téléphone portable existe*/
Route::get('/phone_seller/{phone}','SellerController@phone_seller');

/****** Comptes ******/

Route::resource('comptes','AccountController');
/*Interroge la base de donnée si une adresse mail existe*/
Route::get('/mail_account/{mail}','AccountController@mail_account');

/****** Inventaires */

Route::resource('inventaires','InventaireController');

/****** Annonces ******/

Route::resource('annonces','SaleController');
/*Les produits disponibles pour le vendeur */
Route::get('/product/available/category/{id}','SaleController@products_available');

/**** Utilisateurs ****/

Route::resource('user','UserController');

/**** Authentification *****/

Auth::routes();

//Route pour le panier
Route::delete('/cart/delete/{rowId}','CartController@deleteToCart')->name('cart.delete');
Route::post('/cart/add','CartController@addToCart')->name('cart.add');
Route::get('/cart','CartController@show')->name('cart');
Route::post('/cart/quantity/{rowId}','CartController@selectQuantity')->name('cart.quantity');

// Route pour le paiement

Route::get('/paiement','CheckoutController@index')->name('checkout.index');
Route::post('/paiement','CheckoutController@store')->name('checkout.store');
Route::get('/merci','CheckoutController@confirm');

//Route des commandes
Route::get('commande/{commande}','CommandeController@show')->name('commande.show');
Route::get('users/{user}/commandes','AccountController@commandes')->name('user.commandes');
Route::post('commande/{commande}/reception','CommandeController@reception')->name('commande.validate');

//Routes de la carte
Route::get('map','MapController@show')->name('map.index');
