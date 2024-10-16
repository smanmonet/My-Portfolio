<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Book;
class BookController extends Controller
{
    public function book()
    {
        $books = Book::all();

        return view('borrow', compact('books'));


    }
    public function index()
    {
        $books = DB::table('book')->where('type', 'book')->get();
        // ตั้งค่า member_id ใน session

        return view('books.index', compact('books'));
    }



    // ฟังก์ชันแสดงฟอร์มสร้างหนังสือใหม่
    public function create()
    {
        return view('books.create');
    }

    // ฟังก์ชันบันทึกหนังสือใหม่
    public function store(Request $request)
    {
        $validated = $request->validate([
            'book_name' => 'required|string|max:255',
            'description' => 'required|string',
            'max' => 'required|integer|min:1',
            'type' => 'required|in:book,equipment',
        ]);

        // บันทึกหนังสือใหม่
        Book::create($validated);

        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

    // ฟังก์ชันแสดงข้อมูลหนังสือแต่ละเล่ม
    public function show($id)
    {
        $book = DB::table('book')->where('id', $id)->first();
        // ดึง member_id จาก session
        $members = DB::table('member')->get();
        $borrowedBooksCount = DB::table('borrow')
            ->join('return', 'borrow.id', '=', 'return.borrow_id')
            ->where('borrow.book_id', $id)
            ->where('borrow.date_borrow', '<', now())
            ->whereNull('return.date_return')
            ->count();

        // คำนวณจำนวนหนังสือที่พร้อมให้ยืม
        $availableBooks = $book->max - $borrowedBooksCount;

        // ส่งข้อมูลไปยัง view
        return view('books.show', compact('book', 'availableBooks', 'members'));
    }
    // ฟังก์ชันแสดงฟอร์มแก้ไขหนังสือ
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }

    // ฟังก์ชันอัปเดตข้อมูลหนังสือ
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'book_name' => 'required|string|max:255',
            'description' => 'required|string',
            'max' => 'required|integer|min:1',
            'type' => 'required|in:book,equipment',
        ]);

        $book = Book::findOrFail($id);
        $book->update($validated);

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    // ฟังก์ชันลบหนังสือ
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
    public function search(Request $request)
    {
        $request->validate([
            'query' => 'required|string|min:1',
        ]);

        $query = $request->input('query');

        // ค้นหาหนังสือที่มีชื่อหรือรายละเอียดตรงกับคำค้น
        $books = DB::table('book')
            ->where('book_name', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->where('type', 'book')
            ->get();

        return view('books.index', compact('books'));
    }
}