<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Models\Cart;
use App\Models\Product;

Route::get('/', function () {
    return view('welcome');
});

Route::get('product',[ProductController::class,'index'])->name('product');
Route::get('cart/{productID}',[CartController::class,'addToCart'])->name('cartadd');
Route::get('cart',[CartController::class,'index'])->name('cart');
Route::get('deleteCart/{productID}',[CartController::class,'deleteCart'])->name('deletecart');
Route::get('deletepd/{productID}',[CartController::class,'deletepd'])->name('deletepd');
//Route kuy  per



