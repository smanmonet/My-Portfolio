<?php 

namespace App\Http\Controllers;

use App\Models\ProductRealModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class Promotion extends Controller
{
    public function index()
    {
        dd(session()->all());
        $emp = DB::table('promotion')->get();
        //dd($emp);
        return view('show_promotion',compact('emp'));
    }
    
    function delete($id){
        DB::table('promotion')->where('proID',$id)->delete();
        return redirect('/Promotion');
    }
    function info($id){
        $PromoInfo=DB::table('promotion')->where('proID',$id)->first();
        $PdInfo=DB::table('infodetail')->where('promotionID',$id)->get();
        //dd($PdInfo);
        return view('infoPromotion',compact('PromoInfo','PdInfo'));
    }
}
