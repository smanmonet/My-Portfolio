<?php

namespace App\Http\Controllers;

use App\Models\ProductRealModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class ConfirmOrder extends Controller
{

    public function confirm(Request $request)
    {   
        $value = session()->get("id");
        $member = DB::table('member')->where('memberID', $value)->first();

        $data = [
            'productID' => $request->productID,
            'name' => $request->name,
            'quantity' => $request->quantity,

        ];
        
    
        $orderData = [
            'date' => rand(100000,999999),
            'memberID' => $member->memberID,
            'status' => 'รอตรวจสอบ',
            'empID' => 1,
            'image' => null
        ];

        dd($orderData);
        $orderId = DB::table('orders')->insertGetId($orderData);


        $orderProducts = [];
        foreach ($request->productID as $index => $productId) {
            $orderProducts[] = [
                'orderID' => $orderId,
                'productID' => $productId,
                'quantity' => $request->quantity[$index]
            ];
        }

        DB::table('orderproduct')->insert($orderProducts);
       
        return redirect('/product');
    }

}