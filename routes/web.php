<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'front'])->name('front');
Route::get('/stores', [App\Http\Controllers\HomeController::class, 'stores'])->name('stores');
Route::get('/stores/{id}', [App\Http\Controllers\HomeController::class, 'all'])->name('all');
Route::get('/product/{id}', [App\Http\Controllers\ProductController::class, 'product'])->name('product');
Route::patch('/product/{product}/patch', [App\Http\Controllers\ProductController::class, 'update'])->name('product.patch');
Route::get('/test', [App\Http\Controllers\HomeController::class, 'test'])->name('test');

Auth::routes();

Route::get('/update', [App\Http\Controllers\HomeController::class, 'update'])->name('update');
Route::get('/save', [App\Http\Controllers\HomeController::class, 'save'])->name('save');

Route::get('/category/{id}', [App\Http\Controllers\HomeController::class, 'show'])->name('show');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/add-product', [App\Http\Controllers\ProductController::class, 'create'])->name('add-product');
    Route::post('/add-product', [App\Http\Controllers\ProductController::class, 'store'])->name('store-product');
    Route::post('/add-category', [App\Http\Controllers\CategoryController::class, 'store'])->name('store-category');
    Route::post('/add-store', [App\Http\Controllers\StoreController::class, 'store'])->name('store-store');
    Route::get('/add-accessoires', [App\Http\Controllers\AccessoiresController::class, 'create'])->name('add-accessoires');
    Route::post('/add-accessoires', [App\Http\Controllers\AccessoiresController::class, 'store'])->name('store-accessoires');
});

// alternate, amazon, mobiel.nl, belsimpel, coolblue