<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoryDetailController extends Controller
{
    public function index($orderID)
    {
        $HisInfo_name = session()->all();
        //$members = json_decode($request->members);
        //dd($orderID);
        $historyhead = DB::table('orders')
            ->select('orders.orderID', 'orders.date', 'orders.memberID', 'orders.status', 'member.Address')
            ->join('member', 'orders.memberID', '=', 'member.memberID')
            ->where('orders.orderID', $orderID)
            ->first();
        
        //$od = DB::table
        //dd($historyhead);
        $historybody = DB::table('pd1')
            ->select('productname', 'price', 'Quantity','SUM')
            //->join('product', 'product.productID', '=', 'orderProduct.productID')
            ->where('orderID',$orderID)
            //->where('member.memberID',$request->memID)
            ->get();
            //$historybody['orderID'] =  
            //dd($historybody);
        
        $historybottom = DB::table('pd2')->where('orderID',$orderID)->first();
            
        return view('Historyinfo', compact('historyhead', 'historybody','orderID','historybottom','HisInfo_name'));
    }
}
