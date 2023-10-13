<?php

use App\Http\Controllers\ProfileController;
//use App\Http\Controllers\livre;
use Illuminate\Support\Facades\Route;


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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//****************** Route admin ************************************************

Route::get('/index', [App\Http\Controllers\Livre::class, 'index']
	)->middleware(['auth', 'verified'])->name('home');
Route::get('/utilisateurs', function () {
    return view('Admin.users');
	});
Route::get('/ajout', function () {
    return view('Admin.ajoutLivre');
	});
	Route::get('/home', [App\Http\Controllers\livre::class, 'index']
	)->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {

	Route::get('/ajout-livre', function () {
    return view('Admin.add-livres');
	});
	Route::post('/add-books', [App\Http\Controllers\livre::class, 'store']);
	Route::get('modif_page{id}',[App\Http\Controllers\livre::class, 'edit']);
	Route::post('modif',[App\Http\Controllers\livre::class, 'update']);
	Route::get('delete{id}',[App\Http\Controllers\livre::class, 'destroy']);

	Route::get('/pret',[App\Http\Controllers\livre::class, 'livre_en_pret']);
	Route::get('/disponible',[App\Http\Controllers\livre::class, 'livre_disponible']);

});

//****************** Route user ************************************************
Route::middleware('auth')->group(function () {
	Route::get('/user/index',[App\Http\Controllers\livre::class, 'afficher_livre']);
	Route::get('/user/pageloan{id}',[App\Http\Controllers\livre::class, 'editEmprunt']);
	Route::get('/user/pageprolong{id}',[App\Http\Controllers\livre::class, 'editProlongation']);
	Route::get('/emprunt', [App\Http\Controllers\livre::class, 'ajout_emprunt']);
	Route::post('/prolongation', [App\Http\Controllers\livre::class, 'ajout_prolongation']);
	Route::post('/user/rendre_livre', [App\Http\Controllers\livre::class, 'rendre_emprunt']);
	Route::get('/user/detail_emprunt', [App\Http\Controllers\livre::class, 'total_emprunt']);
	Route::get('/user/ajout_panier{idLivre}', [App\Http\Controllers\livre::class, 'ajouterAuPanier']);
	Route::post('/modif_panier', [App\Http\Controllers\livre::class, 'mettreAJourDate']);
	Route::get('/user/delete{idLivre}', [App\Http\Controllers\livre::class, 'supprimerDuPanier']);
	Route::get('/user/panier', [App\Http\Controllers\livre::class, 'afficherPanier']);
});
Route::get('/user/shop', function () {
	return view('users.shop');
	});

Route::get('/user/shop-details', function () {
	return view('users.shop-details');
	});

Route::get('/user/shopping-cart', function () {
	return view('users.shopping-cart');
	});

Route::get('/user/blog', function () {
	return view('users.blog');
	});


	
//****************** Route par défaut ************************************************
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
