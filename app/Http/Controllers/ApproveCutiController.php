<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuti;
use Illuminate\Support\Facades\Auth;

class ApproveCutiController extends Controller
{
    public function index()
    {
        $data = Cuti::simplePaginate(5);
        return view('pages.master.approvecuti.index', ['data' => $data]);
    }
    public function edit($id)
    {
        $approvecuti = Cuti::findOrFail($id);
        return view('pages.master.approvecuti.edit', compact('approvecuti'));
    }

    public function update(Request $request, $id)
    {
        $approvecuti = Cuti::findOrFail($id);
        
        $approvecuti->update([
            'status' => $request->status,
            'updated_by' => $request->updated_by
        ]);
        return redirect()->route('approvecuti')->with('succes', 'Berhasil Approve Karyawan!');
    }
}
