<?php

use App\Http\Controllers\ConfirmOrder;
use App\Http\Controllers\confirmPromotion;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Promotion;
use App\Http\Controllers\addPromotion;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});
//ProductMem,Cart
Route::get('product',[ProductController::class,'index'])->name('product');
Route::get('cart/{productID}',[CartController::class,'addToCart'])->name('cartAdd');
Route::get('cart',[CartController::class,'index'])->name('cart');
Route::get('deleteCart/{productID}',[CartController::class,'deleteCart'])->name('deleteCart');
Route::get('deletePd/{productID}',[CartController::class,'deletePd'])->name('deletePd');
Route::get('clearCart/{productID}',[CartController::class,'clearCart'])->name('clearCart');
//KUY RAI PROMOTION KUB
Route::get('/Promotion',[Promotion::class,'index'])->name('Promotion');
Route::get('/Promotion/add',[addPromotion::class,'index'])->name('addPromotion');
Route::get('/Promotion/confirm',[confirmPromotion::class,'index']);
Route::get('/Promotion/confirmReal',[confirmPromotion::class,'index']);
Route::get('/DeletePromotion', function () {
    return "<h1>Edit Pro</h1>";
});
Route::get('/Promotion/delete/{id}',[Promotion::class,'delete'])->name('delete');//kuy
Route::get('/Promotion/info/{id}',[Promotion::class,'info'])->name('info');
Route::post('/Promotion/confirm',[addPromotion::class,'confirm'])->name('submit.form');
Route::post('/Promotion/confirmReal',[confirmPromotion::class,'confirmkub'])->name('confirm.form');
//Order
Route::get('order',[OrderController::class,'index'])->name('order');
Route::post('confirmOrder',[ConfirmOrder::class,'confirm'])->name('confirm'); 
