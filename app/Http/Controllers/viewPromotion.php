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
        $emp = DB::table('promotion')->get();
        return view('show_promotion',compact('emp'));
    }
    
    function delete($id){
        DB::table('promotion')->where('proID',$id)->delete();
        return redirect('/Promotion');
    }
}
