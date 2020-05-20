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
Route::group(['middleware'=>'locale'],function ()
{
    /* Routage vers la page d'accueil */
    Route::view('','home');

    /****** Comptes ******/
    Route::resource('comptes','AccountController');


    /***** Vendeurs ******/

    Route::resource('vendeurs','SellerController');
    Route::resource('vendeurs.annonces','SaleController')->shallow();

    /* Les commandes du user */
    Route::resource('comptes.commandes','CommandeController')->shallow();

    /**** Authentification *****/

    Auth::routes();
    Route::post('logout/soft',function(){
        Auth::logout();
        return back();
    })->name('logout.soft');

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

    /* Cette route n'est plus utile */
    //Route::get('comptes/{user}/commandes','AccountController@commandes')->name('user.commandes');
    Route::post('commande/{commande}/reception','CommandeController@reception')->name('commande.validate');

//Routes de la carte

    Route::get('/map','MapController@index')->name('map.index');
    Route::post('/map','MapController@search')->name('map.search');

//Route pour les avis
    Route::post('/sales/{sales_id}', ['uses' => 'CommentController@store', 'as' => 'comment.store']);



    Route::group(['prefix' => 'admin'], function () {
        Voyager::routes();
        Route::get('tickets', 'TicketController@index')->middleware('admin.user');
        Route::post('tickets/{ticket}/edit', 'TicketController@update')->name('tickets.update')->middleware('admin.user');
    });
//Route pour les tickets

    Route::get('users/tickets', 'TicketController@my_tickets');
    Route::get('tickets/create', 'TicketController@create')->name('tickets.create');
    Route::post('tickets/create', 'TicketController@store')->name('tickets.store');

});

Route::get('setlocale/{locale}',function($lang){
    \Session::put('locale',$lang);
    return back();
});
