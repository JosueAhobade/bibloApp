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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
//Controlleur du projet
	Route::get('/home', [App\Http\Controllers\livre::class, 'index']
	)->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {

	Route::get('/ajout-livre', function () {
    return view('Admin.add-livres');
	});
	Route::post('/add-books', [App\Http\Controllers\livre::class, 'store']);

	
//Controller par défaut
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
