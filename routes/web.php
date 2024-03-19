<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Models\Product;

Route::get('/', function () {
    return view('welcome');
});

Route::get('product',[ProductController::class,'index'])->name('product');
Route::get('cart/{productID}',[ProductController::class,'addToCart'])->name('cartadd');
Route::get('cart',[ProductController::class,'addProduct'])->name('cart');
Route::get('deleteCart/{productID}',[ProductController::class,'deleteCart'])->name('deletecart');


