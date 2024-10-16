<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Borrow;

class DetailsBorrowController extends Controller
{
    public function detailsborrow($ID)
    {
        // ดึงข้อมูลทั้งหมดจากตาราง borrow
        $books = DB::table('book')->where('ID',$ID)->first();

        // ส่งข้อมูล $borrow ไปยัง view
        return view('detailsborrow', compact('books'));
    }
}