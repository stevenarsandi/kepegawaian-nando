<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Izin;

class IzinController extends Controller
{
    public function index()
    {
        $data = Izin::all();
        return view('pages.master.izin.index', ['data' => $data]);
    }
}
