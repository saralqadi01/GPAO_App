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


Route::resource('clients','ClientsController');

Route::resource('produits','ProduitController');

Route::resource('ateliers','AteliersController');

Route::resource('stocks','StockController');

Route::resource('poste_charges','Poste_chargesController');

Route::resource('profil_projetO','Ordre_fabricationController');

Route::resource('profil_projet','OperationController');

Route::resource('users','UsersController');

Route::get('profil/{id}', 'OperationController@index2');



Route::get('acceuil', 'AcceuilController@chartjs');






// Route::get('acceuil', function () {
//     return view('acceuil');
// });






Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
