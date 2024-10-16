<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // ตรวจสอบว่าชื่อ model ถูกต้อง
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // ฟังก์ชันสำหรับแสดงหน้าเข้าสู่ระบบ
    public function showLoginForm()
    {
        return view('login'); // ให้ชื่อตามไฟล์ที่คุณสร้าง
    }

    // ฟังก์ชันสำหรับการล็อกอิน
    public function login(Request $request)
{
    $request->validate([
        'user_name' => 'required',
        'password' => 'required|integer',
    ]);

    $user = User::where('user_name', $request->user_name)->first();

    if ($user && $user->password == $request->password) {
        // ถ้ารหัสผ่านตรง ให้เข้าสู่ระบบ
        Auth::login($user);
        return redirect()->route('books.index'); // ปรับเส้นทางไปที่หน้า dashboard ของคุณ
    }

    return back()->withErrors(['user_name' => 'ข้อมูลการเข้าสู่ระบบไม่ถูกต้อง']);
}

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'ออกจากระบบเรียบร้อย');
    }
}
