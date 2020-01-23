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

Route::get('/product', function () {
    return view('welcome');
});

Route::get('users/{user}/commandes','UserController@commandes')->name('user.commandes');

Route::resource('produit','ProduitController');
Route::resource('user','UserController');
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
