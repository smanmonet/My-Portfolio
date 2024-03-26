<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserOrAdminController extends Controller
{
    public function index()
    {
        return view('UserOrAdmin');
    }
}
