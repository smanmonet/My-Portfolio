<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthUserController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function loginPost(Request $request)
    {
        //dd($request->all());
        
        //dd($request->session()->all());
        $this->validate($request, [
            'loginID' => 'required|email',
            'loginPass' => 'required'
        ]);

        $credentials = [
            'email' => $request->loginID,
        ];

        //$member = Member::where('loginID', $credentials['email'])->first();
        $member = DB::table('member')->where('loginID', $credentials['email'])->first();
        $members = DB::table('member')->where('loginID', $request->loginID)->first(); //เอาข้อมูลส่งผ่านไป
        //dd($member);
        session(['id'=>$member->memberID]);
        session(['name'=>$member->Name]);
        $value = session()->get("id");
        
        dd($value);
        //dd($members);
        if ($member === null) {
            return redirect('/login')->with('error', 'Invalid member credentials.');
        }

        if ($request->loginPass === $member->loginPass) {
        //dd($members);
            return view ('welcome', compact('members'))->with('success', 'Login berhasil!');
        } else {
            return redirect('/login')->with('error', 'Invalid password.');
        }  
    }
  
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}