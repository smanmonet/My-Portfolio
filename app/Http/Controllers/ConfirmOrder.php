<?php

namespace App\Http\Controllers;

use App\Models\ProductRealModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
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
            'image' =>$request->image
        ];

        $validator = Validator::make($data, [
            'productID' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            // Add more validation rules as per your requirements
        ]);
    
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('image'), $imageName); // Save image in image folder
        } 
        else {
            return redirect()->back()->withErrors(['image' => 'กรุณาแนบรูปภาพ'])->withInput();
        }
        $orderData = [
            'orderID' => rand(100000,999999),
            'date' => now(),
            'memberID' => $member->memberID,
            'status' => 'รอตรวจสอบ',
            'empID' => 1,
            'image' =>$imageName
        ];
        $orderId = DB::table('orders')->insertGetId($orderData);


        $orderProducts = [];
        foreach ($request->productID as $index => $productId) {
            $orderProduct = [
                'orderID' => $orderId,
                'productID' => $productId,
                'quantity' => $request->quantity[$index],
            ];
    

    
            $orderProducts[] = $orderProduct;
        }
        
        DB::table('orderproduct')->insert($orderProducts);
       
        return redirect('/product');
    }

}