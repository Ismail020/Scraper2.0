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

Auth::routes();

Route::get('/update', [App\Http\Controllers\HomeController::class, 'update'])->name('update');
Route::get('/save', [App\Http\Controllers\HomeController::class, 'save'])->name('save');

Route::get('/category/{id}', [App\Http\Controllers\HomeController::class, 'show'])->name('show');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/add-product', [App\Http\Controllers\ProductController::class, 'create'])->name('add-product');
    Route::post('/add-product', [App\Http\Controllers\ProductController::class, 'store'])->name('store-product');
    Route::post('/add-category', [App\Http\Controllers\CategoryController::class, 'store'])->name('store-category');
});
