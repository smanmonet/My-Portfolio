<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
   
    public function addToCart($productID)
    {
        $products=DB::table('product')->where('productID',$productID)->first();
        $cart = session()->get('cart',[]);
        
        if(isset($cart[$productID])){
            $cart[$productID]['quantity']++;
        }
        else{
            $cart[$productID]=[
                "productID" => $products->productID,
                "name" => $products->productname,
                "price" => $products->price,
                "PV" => $products->PVPercent,
                "quantity" => 1
            ];
        }
        session()->put('cart',$cart);
        return redirect()->back()->with('success','product has been added to cart');
    }
    public function index(Request $request){
        $sumP = 0;
        $sumQty = 0;
        //$request->session()->flush();
        return view('cart',compact('sumP','sumQty'));
    }
    public function deleteCart(Request $request){
        if($request->productID) {
            $cart = session()->get('cart');
            if(isset($cart[$request->productID]) && $cart[$request->productID]['quantity']> 1) {
                $cart[$request->productID]['quantity']--;
                session()->put('cart', $cart);
            }else{
                unset($cart[$request->productID]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully deleted.');
            
        }
        return redirect('cart');
    }
    public function deletepd(Request $request){
        if($request->productID) {
            $cart = session()->get('cart');
            if(isset($cart[$request->productID]) ) {
                unset($cart[$request->productID]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully deleted.');
        }
        return redirect('cart');
    }
    public function clearCart(Request $request){
        $request->session()->flush();
        return view('cart');
    }
    
}
