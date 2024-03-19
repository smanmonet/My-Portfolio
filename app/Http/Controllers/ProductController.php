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
    public function addToCart($productID)
    {
        $products=DB::table('product')->where('productID',$productID)->first();
        //$products = DB::table('product')->find($productID);
        //$products=Product::findOrFail($productID);
        $cart = session()->get('cart',[]);
        
        if(isset($cart[$productID])){
            $cart[$productID]['quantity']++;
        }
        else{
            $cart[$productID]=[
                "productID" => $products->productID,
                "name" => $products->name,
                "price" => $products->price,
                "PV" => $products->PVPercent,
                "quantity" => 1
            ];
        }
        session()->put('cart',$cart);
        // dd($cart);
        
        return redirect()->back()->with('success','product has been added to cart');
    }
    public function addProduct(Request $request){
        //$request->session()->flush();
        return view('cart');
    }
    public function deleteCart(Request $request){
        if($request->productID) {
            $cart = session()->get('cart');
            if(isset($cart[$request->productID])) {
                unset($cart[$request->productID]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully deleted.');
            
        }
        return view('cart');

    }
}
