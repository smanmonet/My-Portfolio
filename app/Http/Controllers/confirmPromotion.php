<?php 

namespace App\Http\Controllers;

use App\Models\ProductRealModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class confirmPromotion extends Controller
{
    
    public function index()
    {
        $emp = DB::table('product')->get();
        return view('confirmPromotion',compact('emp'));
    }
    public function confirmkub(Request $request)
    {
        $data = [
            'proID' => $request->PromotionID,
            'promotionname' => $request->PromotionName,
            'pv' => $request->PV,
            'price_pro'=>$request->Price,
            'startDate'=>$request->pro_start,
            'endDate'=>$request->pro_end,
            'image'=>null
        ];
        $productIDs = $request->productID;
        
        
        //dd($productIDs);
        DB::table('promotion')->insert($data);
        foreach ($productIDs as $product) {
            $product = [
                'productID' => $product,
                'promotionID' =>$request->PromotionID
            ];
            DB::table('promotiondetail')->insert($product);
        }
        return redirect('/Promotion');
    }
}
