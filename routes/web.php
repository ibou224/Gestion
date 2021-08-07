<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('accueil');
Route::get('categorie','CategorieController@index')->name('categorie');
Route::post('save-categorie','CategorieController@store')->name('save-categorie');
