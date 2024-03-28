<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        //dd(session()->all());
        //dd($request->session()->all());
        $ses = session()->all();
        $promo = DB::table('promotion')->get();
        return view('welcome', compact('promo','ses'));
    }
}
