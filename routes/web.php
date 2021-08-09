<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('accueil');
Route::get('categorie','CategorieController@index')->name('categorie');
Route::post('save-categorie','CategorieController@store')->name('save-categorie');

Route::get('fournisseur','FournisseurController@index')->name('fournisseur');
Route::get('create-fourn','FournisseurController@create')->name('create-fourn');
Route::post('save-fourn','FournisseurController@store')->name('save-fourn');

Route::get('produit','ProduitController@index')->name('produit');
Route::get('create-prod','ProduitController@create')->name('create-prod');
Route::post('save-prod','ProduitController@store')->name('save-prod');

Route::get('stock','StockController@create')->name('stock');
Route::post('save-stock','StockController@store')->name('save-stock');

Route::get('entrer','EntrerController@create')->name('entrer');
Route::post('save-entrer','EntrerController@store')->name('save-entrer');

Route::get('sortier','SortierController@create')->name('sortier');
Route::post('save-sortier','SortierController@store')->name('save-sortier');
