<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employee;


class EmployeeController extends Controller
{
    public function employee(Request $request)
    {
        // ดึงข้อมูลเฉพาะสมาชิกที่มีสถานะ admin
        $members = Employee::where('type', 'admin')->get();
    
        return view('employee', compact('members'));
    }
    
}