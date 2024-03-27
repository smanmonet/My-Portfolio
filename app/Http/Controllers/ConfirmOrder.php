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

        $data = [
            'productID' => $request->productID,
            'name' => $request->name,
            'quantity' => $request->quantity,

        ];
        
    
        $orderData = [
            'date' => now(),
            'memberID' => 1015,
            'status' => 'รอตรวจสอบ',
            'empID' => 1,
            'image' => null
        ];


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