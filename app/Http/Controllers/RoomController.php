<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrow;
use App\Models\Book;
use App\Models\Room;

class RoomController extends Controller
{
    public function index()
    {   
        $rooms = Room::all();

        return view('room',compact('rooms'));
    }
   
}