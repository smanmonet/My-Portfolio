<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member; // เรียกใช้โมเดล Member

class MemberController extends Controller
{
    // แสดงฟอร์มสำหรับการเพิ่มสมาชิกใหม่
    public function create()
    {
        return view('members.create');
    }

    // บันทึกข้อมูลสมาชิกใหม่ลงในฐานข้อมูล
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    // สุ่ม member_code 10 หลักที่ไม่ซ้ำกัน
    do {
        $member_code = random_int(1000000000, 9999999999); // สุ่ม 10 หลัก
    } while (Member::where('member_code', $member_code)->exists());

    // สร้างสมาชิกใหม่ในฐานข้อมูล
    Member::create([
        'name' => $request->name,
        'type' => 'member', // ล็อคค่า type เป็น "member"
        'member_code' => $member_code,
    ]);

    // ส่งต่อไปยังหน้าสำหรับแสดงผลลัพธ์
    return redirect()->route('members.success', [
        'member_code' => $member_code,
        'name' => $request->name,
    ]);
}
public function success(Request $request)
{
    $member_code = $request->get('member_code');
    $name = $request->get('name');

    return view('members.success', compact('member_code', 'name'));
}



}
