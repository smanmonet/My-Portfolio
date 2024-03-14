<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductController extends Controller

{
    function index()
    {
        $products = DB::table('product')->get();
        return view('product', compact('products'));
    }

}
