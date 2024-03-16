<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use App\Models\Absen;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    public function index()
    {
        $data = Absen::all();
        return view('pages.master.absen.index', ['data' => $data]);
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls|max:2048'
        ]);

            // Excel::import(new AbsenImport(), $request->file('file'));
     }
}
