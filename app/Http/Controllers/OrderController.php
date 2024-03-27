<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\order;

class OrderController extends Controller
{
    /*public function memBer($memberID)
    {
        $members = DB::table('member')->where('memberID', $memberID)->first();

        $mems[$memberID] = [
            "memberID" => $members->memberID,
            "name" => $members->Name,
            "address" => $members->Address
        ];
        return view('order', compact('mems'));



    }*/
    public function index(Request $request)
    {
        $sum = 0;
        $ses = session()->all();

        $value = session()->get("id");
        $member = DB::table('member')->where('memberID', $value)->first();

        

        $values = session()->get("id");
        $orders = DB::table('orders')->where('orderID', $values)->first();
        //dd($member);
        return view('order', compact('orders', 'sum','ses','member'));
        
    }
}
