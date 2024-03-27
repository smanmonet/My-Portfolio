<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\History;

class HistoryController extends Controller
{
    public function index()
    {
        $His_sec = session()->get('id');
        $memID = $His_sec;

        $historyhead = DB::table('orders')
            ->select('orders.orderID', 'orders.date', 'orders.memberID', 'orders.status', 'member.Address')
            ->join('member', 'orders.memberID', '=', 'member.memberID')
            ->where('orders.memberID',$memID)
            ->get();
        
        //$od = DB::table
         //dd($pd);
        $historybody = DB::table('orderproduct')
            ->select('product.productname', 'product.price', 'orderproduct.Quantity')
            ->join('product', 'product.productID', '=', 'orderproduct.productID')
            //->where('order.orderID',$historyhead['orderID'])
            //->where('member.memberID',$request->memID)
            ->get();
            //$historybody['orderID'] = 
            
        // dd($historyhead);
        
        return view('History', compact('historyhead', 'memID', 'historybody','His_sec'));
    }

}
