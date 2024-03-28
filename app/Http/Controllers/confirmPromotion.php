<?php 

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\ProductRealModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
class confirmPromotion extends Controller
{
    
    public function index()
    {
        $emp = DB::table('product')->get();
        return view('confirmPromotion',compact('emp'));
    }
    public function confirmkub(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            // Add more validation rules as per your requirements
        ]);
        if ($validator->fails()) {
            Session::flash('popup_message', 'Create fail ! fill in information');
    
            // Redirect back to the view
            return redirect()->back();
        }
    
        
        $data = [
            'proID' => $request->PromotionID,
            'promotionname' => $request->PromotionName,
            'pv' => $request->PV,
            'price_pro'=>$request->Price,
            'startDate'=>$request->pro_start,
            'endDate'=>$request->pro_end,
            'image'=>$request->image,
        ];
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName); // Save image in image folder
            $data['image'] = $imageName;
        }
        else {
            // If no image is uploaded, set a default image name
            $data['image'] = 'no-image.png';
        }
       
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
