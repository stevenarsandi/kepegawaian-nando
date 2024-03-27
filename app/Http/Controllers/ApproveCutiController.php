<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuti;
use Illuminate\Support\Facades\Auth;

class ApproveCutiController extends Controller
{
    public function index(Request $request)
    {
        $query = Cuti::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('nama', 'like', '%'.$search.'%') 
                  ->orWhere('tanggal', 'like', '%'.$search.'%')
                  ->orWhere('status', 'like', '%'.$search.'%')
                  ->orWhere('keterangan', 'like', '%'.$search.'%');
        }
        $query->orderByRaw('CASE WHEN status IS NULL OR status = "" THEN 0 ELSE 1 END')
              ->orderBy('status', 'asc');
    
        $data = $query->simplePaginate(5);
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
