<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotiController extends Controller
{

    public function noti()
    {
        $noti_name = session()->all();
        $value = session()->get("id");
        $percent = 0;

        $noti_pv = DB::table('pv_history')->get('PV_down');
        $noti = DB::table('pv_history')->get();

        
        $noti_money_int = $noti_pv->map(function ($item) {
            return (int)$item->PV_down;
        });

        foreach ($noti_money_int as $item) {
            if ($item > 5000 && $item < 14999) {
                $percent = 0.06;
            } elseif ($item > 15000 && $item < 29999) {
                $percent = 0.09;
            } elseif ($item > 30000 && $item < 54999) {
                $percent = 0.12;
            } elseif ($item > 55000 && $item < 89999) {
                $percent = 0.15;
            } elseif ($item > 90000 && $item < 149999) {
                $percent = 0.18;
            } elseif ($item > 150000) {
                $percent = 0.21;
            }
        }
        //dd($noti_date);
        $money = $percent * $item * 3;
        
        return view('Notification', compact('money', 'noti_name','noti_pv','noti'));
    }

}

