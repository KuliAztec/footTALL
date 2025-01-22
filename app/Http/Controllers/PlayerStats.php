<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlayerStats extends Controller
{
    public function index()
    {
        $stats = DB::table('stats')->get();
        return view('playerstats', compact('stats'));
    }
}
