<?php

use App\Http\Controllers\PaiementController;
use App\Models\Produit;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/index', function (Request $request) {
    $search = $request->input('search');
    $produits = Produit::query()
        ->where('label', 'like', "%$search%")
        ->get();
    return view('boutique.index', compact('produits'));
})->middleware(['auth', 'verified'])->name('index');

Route::get('/produit/{produit}', [ProduitController::class, 'show'])->name('produit.show');

Route::get('/panier', [PanierController::class, 'index'])->name('panier.index');
Route::post('/panier/{produit}', [PanierController::class, 'add'])->name('panier.add');
Route::delete('/panier/{produit}', [PanierController::class, 'delete'])->name('panier.delete');
Route::delete('/panier', [PanierController::class, 'empty'])->name('panier.empty');

Route::get('/information_paiement', [PaiementController::class, 'info'])->name('paiement.info');
Route::post('/coordonnees', [PaiementController::class,'coordonnees'])->name('paiement.coordonnees');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
