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

        $orders = DB::table('orders')->get();
        return view('order', compact('orders', 'sum'));
    }
}
