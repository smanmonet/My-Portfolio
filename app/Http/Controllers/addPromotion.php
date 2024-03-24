<?php 

namespace App\Http\Controllers;

use App\Models\ProductRealModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class addPromotion extends Controller
{
    public function index()
    {
        $emp = DB::table('product')->get();
        return view('addPromotion',compact('emp'));
    }
    public function confirm(Request $request)
    {
        $request->validate([
            'PromotionName'=>'required|max:50',
            'Price'=>'required',
            'PV'=>'required',
            'pro-start'=>'required',
            'pro-end'=>'required',
            'product' => 'required|array|min:2',
        ]);
        $productIDs =[];
        $productNames=[];
        $products = $request->product; // รับค่า productName และ productID ทั้งหมดเป็น Array
        foreach ($products as $product) {
            $productData = explode("|", $product);
            $productIDinput = $productData[1]; // productID
            $productNameinput = $productData[0];
            array_push($productIDs, $productIDinput);
            array_push($productNames, $productNameinput);
        }
        // $ew =[
        //     "PromotionID" => $request->PromotionID,
        //     "PromotionName" => $request->PromotionName,
        //     "Price" => $request->Price,
        //     "PV" => $request->PV,
        //     "pro-start" => $request->pro_start,
        //     "pro-end" => $request->pro_end,
        //     "productName" => $request->product,
        //     "product" => $productID,
        // ];
        // $data = [
        //     'pro_name' => $request->PromotionName,
        //     'pv' => $request->PV,
        //     'price_pro'=>$request->Price,
        //     'startDate'=>$request->pro_start,
        //     'endDate'=>$request->pro_end,
        // ];
        $data = $request->all();
        $data['productIDs'] = $productIDs;
        $data['productNames'] = $productNames;
        //dd($data);
        return view('confirmPromotion')->with([
            'formData'=> $data,
    ]);
    }
}
