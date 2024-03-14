<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    public function index()
    {
        $data = Absen::all();
        return view('pages.master.absen.index', ['data' => $data]);
    }
}
