<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \resources\images;
class PromotionController extends Controller
{
    function promotion(){
        $promotion=DB::table('promotion')->get();
        $value = session()->get("id");
        $member = DB::table('member')->where('memberID', $value)->first();
        $ses = session()->all();
        return view('promotion',compact('promotion','member','ses'));
    }
    
}
