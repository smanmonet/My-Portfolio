<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use Illuminate\Support\Facades\DB;

class DetailsController extends Controller
{
    public function details($ID)
    {
        $rooms = DB::table('room')->where('ID',$ID)->first();

        return view('details', compact('rooms'));
    }

    
}
