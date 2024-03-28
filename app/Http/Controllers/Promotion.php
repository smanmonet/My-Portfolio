<?php 

namespace App\Http\Controllers;

use App\Models\ProductRealModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Spatie\QueryBuilder\QueryBuilder;
use App\Models\Role;
class Promotion extends Controller
{
    public function index()
    {
        //dd(session()->all());
        $emp = DB::table('promotion')->get();
        $value = session()->get("id");
        $role = QueryBuilder::for(Role::class)
        ->leftJoin('roletype','role.roletypeID','=','roletype.roletypeID')
        ->where('role.empID',$value)
        ->get();
        //dd($emp);
        return view('show_promotion',compact('emp','role','value'));
    }
    
    function delete($id){
        DB::table('promotion')->where('proID',$id)->delete();
        return redirect('/Promotion');
    }
    function info($id){
        $PromoInfo=DB::table('promotion')->where('proID',$id)->first();
        $PdInfo=DB::table('infodetail')->where('promotionID',$id)->get();
        //dd($PdInfo);
        //dd($PdInfo);
        return view('infoPromotion',compact('PromoInfo','PdInfo'));
    }
}
