<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductController extends Controller

{
    public function index()
    {
        $products = DB::table('product')->get();
        return view('product', compact('products'));
    }
    public function addProduct($productID)
    {
        /*$list = session()->get('list', []);
        session()->forget('list');
        $list[] = $productID;
        return view('cart', compact('list'));*/

        $list = session()->get('list', []);
        
        if (isset($list[$productID])) {
            $list[$productID] += 1;
        } else {
            $list[$productID] = 1;
        }
        
        session(['list' => $list]);

        return view('cart', compact('list'));
    }
}
