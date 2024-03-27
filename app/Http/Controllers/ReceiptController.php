<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use App\Models\Orders;

class ReceiptController extends Controller
{
    function receipt($proID){
        $date = now()->toDateString();//date แบบ ไม่มี time
        $orderID = hexdec(substr(uniqid(), 0, 8)); //สุ่ม int 10 ตัว
        $promotions=DB::table('promotiondetail')
        ->join('product', 'promotiondetail.productID', '=', 'product.productID')
        ->join('promotion as pro', 'promotiondetail.promotionID', '=', 'pro.proID')
        ->where('pro.proID', $proID)
        ->get();

        $promotion=DB::table('promotiondetail')
        ->join('product', 'promotiondetail.productID', '=', 'product.productID')
        ->join('promotion as pro', 'promotiondetail.promotionID', '=', 'pro.proID')
        ->where('pro.proID', $proID)
        ->first();

        $SUM=DB::table('promotiondetail')//ผลรวมราคาสินค้าใน promotion
        ->join('product', 'promotiondetail.productID', '=', 'product.productID')
        ->join('promotion as pro', 'promotiondetail.promotionID', '=', 'pro.proID')
        ->where('pro.proID', $proID)
        ->sum('product.price');

        return view('receipt',compact('promotions','promotion','SUM','orderID','date'));
    }
    public function upload(Request $request)
    {
        $request->validate(
            [
                'image'=>'required',
            ],
            [
                'image.required'=>'โปรดแนบหลักฐานการโอนเงิน!',
            ]
        );
        $orderID = json_decode($request->orderID);
        $date =  json_decode($request->date);
        $imageName = Str::random() . '.' . $request->image->getClientOriginalExtension();
        Storage::disk('public')->putFileAs('orders/image', $request->image, $imageName);
        
        $dataOrder=[
            'orderID'=>$orderID,
            'date'=>$date,
            'memberID'=>NULL,//รอระบบ authenticate
            'status'=>NULL,
            'empID'=>NULL,
            'image'=>$imageName
        ];
        DB::table('orders')->insert($dataOrder);
        $promotionID = json_decode($request->promotion);
        $dataOrderPromotion=[
            'orderID'=>$orderID,
            'promotionID'=>$promotionID->proID
        ];
        DB::table('orderpromotion')->insert($dataOrderPromotion);
        return redirect('promotion');
    }
}
