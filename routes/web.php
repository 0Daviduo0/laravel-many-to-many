<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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

//Home
Route::get('/', [MainController::class, 'home'])->name('home');

//Show products
Route::get('/product', [MainController::class, 'products'])->name('product.home');

//Create products
Route::get('/product/create', [MainController::class, 'productCreate'])->name('product.create');
//Store the created products
Route::post('/product/create', [MainController::class, 'productStore'])->name('product.store');

//Edit products
Route::get('/product/edit/{product}', [MainController::class, 'productEdit'])-> name('product.edit');
//Update the edited products
Route::post('/product/edit/{product}', [MainController::class, 'productUpdate'])-> name('product.update');

//Delete products
Route::get('/product/delete/{product}', [MainController::class, 'productDelete'])-> name('product.delete');