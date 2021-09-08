<?php

use App\Http\Livewire\Utilisateurs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('accueil');

//le groupe des routes relatives au administrateurs uniquement
Route::group([
    "middlewate"=>["auth","auth.admin"],
    "as"=>"admin."
], function(){
    Route::group([
        "prefix"=>"habilitations",
        "as"=>"habilitations."
    ], function(){
        //Route::get("/utilisateurs",[UserController::class,"index"])->name("users.index");
        Route::get("/utilisateurs",Utilisateurs::class)->name("users.index");
    });
});


Route::get('/categorie', [App\Http\Controllers\CategorieController::class, 'index'])->name('categorie');
Route::post('/save-categorie', [App\Http\Controllers\CategorieController::class, 'store'])->name('save-categorie');

Route::get('/fournisseur', [App\Http\Controllers\FournisseurController::class, 'index'])->name('fournisseur');
Route::get('/create-fourn', [App\Http\Controllers\FournisseurController::class, 'create'])->name('create-fourn');
Route::post('/save-fourn', [App\Http\Controllers\FournisseurController::class, 'store'])->name('save-fourn');

Route::get('/produit', [App\Http\Controllers\ProduitController::class, 'index'])->name('produit');
Route::get('/create-prod', [App\Http\Controllers\ProduitController::class, 'create'])->name('create-prod');
Route::post('/save-prod', [App\Http\Controllers\ProduitController::class, 'store'])->name('save-prod');

Route::get('/stock', [App\Http\Controllers\StockController::class, 'index'])->name('stock');
Route::get('/create-stock', [App\Http\Controllers\StockController::class, 'create'])->name('create-stock');
Route::post('/save-stock', [App\Http\Controllers\StockController::class, 'store'])->name('save-stock');

Route::get('/create-entrer', [App\Http\Controllers\EntrerController::class, 'index'])->name('create-entrer');
Route::get('/entrer', [App\Http\Controllers\EntrerController::class, 'create'])->name('entrer');
Route::post('/save-entrer', [App\Http\Controllers\EntrerController::class, 'store'])->name('save-entrer');

Route::get('/create-sortie', [App\Http\Controllers\SortierController::class, 'create'])->name('create-sortie');
Route::get('/sortier', [App\Http\Controllers\SortierController::class, 'index'])->name('sortier');
Route::post('/save-sortier', [App\Http\Controllers\SortierController::class, 'store'])->name('save-sortier');
Route::get('/show-vente/{id}', [App\Http\Controllers\SortierController::class, 'show_vente'])->name('show-vente');
Route::get('/show-print/{id}', [App\Http\Controllers\SortierController::class, 'show_print'])->name('show-print');

Route::get('/commande', [App\Http\Controllers\CommandeController::class, 'index'])->name('commande');
Route::post('/commande-store', [App\Http\Controllers\CommandeController::class, 'store'])->name('commande-store');
Route::post('/detailComd', [App\Http\Controllers\CommandeController::class, 'detailComd'])->name('detailComd');

