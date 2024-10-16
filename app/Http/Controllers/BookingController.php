<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Borrow;
use App\Models\Room;
use App\Models\booking;
use App\Models\member;

class BookingController extends Controller
{
    public function index()
    {
        return view('/booking');
    }

    /*public function bookingForm(Request $request)
    {
        $rooms = Room::all(); // ดึงข้อมูลห้องทั้งหมด
        return view('/booking/create', compact('rooms'));
    }*/
    public function create($ID)
    {
        // ดึงข้อมูลห้องทั้งหมดจากตาราง rooms เพื่อนำมาใช้ใน dropdown ของแบบฟอร์ม
        $rooms = DB::table('room')->where('ID',$ID)->first();
        $members = Member::all();
        return view('/create', compact('rooms','members'));
    }
    public function store(Request $request)
    {
        // Validate inputs
        $request->validate([
            'room_id' => 'required|exists:room,ID',
            'member_id' => 'required|exists:member,ID',
            'date' => 'required|date|after_or_equal:today',
        ]);
    
        // Check if the room is already booked for the selected date
        $existingBooking = DB::table('booking')
            ->where('room_id', $request->room_id)
            ->where('date', $request->date)
            ->first();
    
        if ($existingBooking) {
            return back()->withErrors(['date' => 'This room is already booked for the selected date.']);
        }
    
        // If the room is not booked, proceed to create the booking
        DB::table('booking')->insert([
            'room_id' => $request->room_id,
            'member_id' => $request->member_id,
            'date' => $request->date,
        ]);
    
        return redirect()->route('index')->with('success', 'การยืมสำเร็จแล้ว');
    }
    
}



