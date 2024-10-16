<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Borrow;
use App\Models\Book;
use App\Models\Room;
use App\Models\member;
use App\Models\ReturnModel;
class BorrowController extends Controller
{
    public function borrow()
    {
        $books = Borrow::all();

        return view('borrow', compact('books'));

    }
    public function confirm($ID)
    {
        // ดึงข้อมูลห้องทั้งหมดจากตาราง rooms เพื่อนำมาใช้ใน dropdown ของแบบฟอร์ม
        $books = DB::table('book')->where('ID', $ID)->first();
        $members = Member::all();
        return view('/confirm', compact('books', 'members'));
    }

    public function stores(Request $request)
    {
        // Validate inputs
        $request->validate([
            'book_id' => 'required|exists:book,ID',
            'member_id' => 'required|exists:member,ID',
            'quantity' => 'required|integer|min:1',
            'date' => 'required|date',
            'return_date' => 'required|date|after_or_equal:date'
        ]);

        // Check if the member has already borrowed this book and hasn't returned it yet
        $existingBorrow = DB::table('borrow')
            ->where('member_id', $request->member_id)
            ->where('book_id', $request->book_id) // ตรวจสอบว่าผู้ใช้เคยยืมเล่มนี้ไหม
            ->whereNull('returned_at') // ตรวจสอบว่าหนังสือยังไม่ถูกคืน
            ->first();

        if ($existingBorrow) {
            return redirect()->route('index')->withErrors(['member_id' => 'สมาชิกนี้ได้ยืมหนังสือเล่มนี้ไปแล้วและยังไม่ได้คืน']);
        }
        // If the member hasn't borrowed the book, proceed to create the borrowing record
        DB::table('borrow')->insert([
            'book_id' => $request->book_id,
            'member_id' => $request->member_id,
            'amount' => $request->quantity,
            'date_borrow' => $request->date,
            'deadline' => $request->return_date,
        ]);
         // If the member hasn't borrowed the book, proceed to create the borrowing record
    $borrowId = DB::table('borrow')->insertGetId([
        'book_id' => $request->book_id,
        'member_id' => $request->member_id,
        'amount' => $request->quantity,
        'date_borrow' => $request->date,
        'deadline' => $request->return_date,
    ]);

    // Add the new entry to the 'return' table
    DB::table('return')->insert([
        'borrow_id' => $borrowId,
        'date_return' => null, // หรือใส่สถานะที่ต้องการ
        'amount' => 0, // ใส่วันที่สร้าง
    ]);

        

        return redirect()->route('index')->with('success', 'การยืมสำเร็จแล้ว');
    }
    //เฟรม
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'member_id' => 'required|integer',
            'book_id' => 'required|integer',
            'date_borrow' => 'required|date',
            'deadline' => 'required|date',
        ]);

        // Create a new borrow record
        $borrow = Borrow::create([
            'member_id' => $request->member_id,
            'book_id' => $request->book_id,
            'date_borrow' => $request->date_borrow,
            'deadline' => $request->deadline,
            'amount' => 1, // เปลี่ยนจาก 0 เป็น 1
        ]);

        // Create a new return record
        ReturnModel::create([
            'borrow_id' => $borrow->id,
            'date_return' => null, // ต้องเป็น null
            'amount' => 0, // หรือปรับตามที่ต้องการ
        ]);

        return response()->json(['success' => true, 'borrow_id' => $borrow->id]);
    }

    public function returnBooks()
    {
        $members = DB::table('member')->select('id', 'name','member_code')->get(); // ดึงค่า member_id จาก session

        $returns = DB::table('borrow')
            ->join('return', 'borrow.id', '=', 'return.borrow_id')
            ->join('book', 'borrow.book_id', '=', 'book.id')
            ->whereNull('return.date_return') // ตรวจสอบว่ายังไม่คืน
            ->select('book.book_name', 'borrow.deadline', 'borrow.id as borrow_id') // เลือกเฉพาะคอลัมน์ที่ต้องการ
            ->get();

        return view('books.return', compact('returns', 'members'));
    }

    public function check(Request $request)
    {
        // ตรวจสอบว่ามีข้อมูล member_id และ book_id หรือไม่
        $request->validate([
            'member_id' => 'required|integer',
            'book_id' => 'required|integer'
        ]);

        // ใช้การ join ตาราง borrow กับ return เพื่อตรวจสอบ date_return
        $existingBorrow = DB::table('borrow')
            ->join('return', 'borrow.id', '=', 'return.borrow_id')
            ->where('borrow.member_id', $request->member_id)
            ->where('borrow.book_id', $request->book_id)
            ->whereNull('return.date_return') // ตรวจสอบว่ายังไม่ได้คืน
            ->first();

        if ($existingBorrow) {
            // ถ้าพบว่ามีการยืมหนังสือและยังไม่คืน
            return response()->json(['success' => false, 'message' => 'ผู้ใช้นี้ได้ยืมหนังสือเล่มนี้แล้วในขณะนี้']);
        }

        // ถ้าไม่มีการยืมหนังสือหรือคืนแล้ว
        return response()->json(['success' => true]);
    }

    public function getMemberReturns($member_id)
    {
        $type = request()->query('type'); // รับประเภทจาก query string

        // ดึงข้อมูลหนังสือที่ member นี้ยืมและยังไม่คืน โดยมี book_type เป็น 'book' หรือ 'equipment'
        $returns = DB::table('borrow')
            ->join('return', 'borrow.id', '=', 'return.borrow_id')
            ->join('book', 'borrow.book_id', '=', 'book.id')
            ->where('borrow.member_id', '=', $member_id)
            ->whereNull('return.date_return') // ตรวจสอบว่ายังไม่คืน
            ->where('book.type', '=', $type) // คัดกรองตามประเภท
            ->select('book.book_name', 'borrow.deadline', 'borrow.id as borrow_id')
            ->get();

        return response()->json($returns);
    }

    public function confirmReturn(Request $request)
    {
        $borrowId = $request->input('borrow_id');
    
        // ดึงข้อมูลจากตาราง return ตาม borrow_id
        $returnRecord = DB::table('return')
            ->where('borrow_id', $borrowId)
            ->whereNull('date_return') // ตรวจสอบว่ายังไม่ได้คืน
            ->first();
    
        if ($returnRecord) {
            // อัปเดตวันที่คืนและจำนวน
            $returnRecord->date_return = now(); // หรือใช้วันที่ที่คุณต้องการ
            $returnRecord->amount = 1; // ตั้งค่า amount เป็น 1
            DB::table('return')
                ->where('borrow_id', $borrowId)
                ->update([
                    'date_return' => $returnRecord->date_return,
                    'amount' => $returnRecord->amount,
                ]);
    
            return response()->json(['success' => true, 'message' => 'การคืนสำเร็จ']);
        } else {
            return response()->json(['success' => false, 'message' => 'ไม่พบรายการยืมที่ต้องการคืน']);
        }
    }
    

}
