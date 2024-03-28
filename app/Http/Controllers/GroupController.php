<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \resources\images;
class GroupController extends Controller
{
    function group(Request $request){
        
        $value = session()->get("id");
        $member = DB::table('member')->where('memberID', $value)->first();
        //dd($member);
        $ses = session()->all();

        $ordinal = -1;
        $allpv = 0;
        $cte = "(SELECT memberID, Name, Surname, Address, rank, loginID, loginPass, PV, upline, 1 AS level
        FROM member
        WHERE memberID = $value
        
        UNION ALL
        
        SELECT m.memberID, m.Name, m.Surname, m.Address, m.rank, m.loginID, m.loginPass, m.PV, m.upline, mh.level + 1
        FROM member AS m
        JOIN MemberHierarchy AS mh ON m.upline = mh.memberID)";

        // สร้าง query หลักโดยใช้ CTE expression
        $alldownline = DB::select("
            WITH RECURSIVE MemberHierarchy AS $cte
            SELECT * FROM MemberHierarchy;");

        // แสดงผลลัพธ์
        //dd($alldownline);
        return view('group',compact('alldownline','allpv','ordinal','member','ses'));
    }
    function refresh(Request $request){
        $allpv = json_decode($request->allpv);
        $mempv = json_decode($request->mempv);
        $downPV = $allpv - $mempv;
        $value = session()->get("id");
        $member = DB::table('member')->where('memberID', $value)->first();
        $date = now()->toDateString();
        //dd($allpv);
        $datahistory=[
            'memID'=>$member->memberID,
            'PV'=>$allpv,
            'Date'=>$date,
            'PV_down'=>$downPV,
            'rank'=>$member->rank
        ];
        DB::table('pv_history')->insert($datahistory);
        DB::table('member')->update(['PV' => 0]);
        return redirect('promotions');
    }
    
}
