<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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


// Route::get('/admin', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('admin');

Route::prefix('/')->group(function () {
    Route::match(['get', 'post'], '/admin', [ProductController::class, 'produit'])->name('admin');
    Route::get('/admin/catégories', [ProductController::class, 'categories'])->name('categories');
    Route::match(['get', 'post'], '/admin/create', [ProductController::class, 'create'])->name('create');
    Route::match(['get', 'post'], '/admin/edit/{id}', [ProductController::class, 'edit'])->name('edit');
    // Route::match(['get', 'post'], '/admin/create/', [ProductController::class, 'store'])->name('create');
    // Route::post('/admin/create/store', [ProductController::class, 'store'])->name('store');

    Route::post('/admin/create', [ProductController::class, 'store'])->name('store');
    Route::post('/admin/edit/{id}', [ProductController::class, 'update'])->name('update');
    Route::delete('/admin/delete/{id}', [ProductController::class, 'destroy'])->name('destroy');
})->middleware(['auth', 'verified']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// Route::get('/solde', function () {
//     return view('we-fashion.solde.index');
// });

Route::prefix('/')->group(function () {
    Route::get('/solde', [ProductController::class, 'solde'])->name('solde');
    Route::get('/homme', [ProductController::class, 'homme'])->name('homme');
    Route::get('/femme', [ProductController::class, 'femme'])->name('femme');
    Route::match(['get', 'post'], '/{id}', [ProductController::class, 'show'])->name('show');
});


// Route::prefix('/')->group(function () {
//     Route::get('/admin', [ProductController::class, 'produit'])->name('produit');
// })->middleware(['auth', 'verified'])->name('admin');

