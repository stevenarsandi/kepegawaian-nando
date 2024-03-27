<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Izin;
use Illuminate\Support\Facades\Auth;

class ApproveIzinController extends Controller
{
    public function index(Request $request)
    {
        $query = Izin::query();

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
        return view('pages.master.approveizin.index', ['data' => $data]);
    }
    
    public function edit($id)
    {
        $approveizin = Izin::findOrFail($id);
        return view('pages.master.approveizin.edit', compact('approveizin'));
    }

    public function update(Request $request, $id)
    {
        $approveizin = Izin::findOrFail($id);
        
        $approveizin->update([
            'status' => $request->status,
            'updated_by' => $request->updated_by
        ]);
        return redirect()->route('approveizin')->with('succes', 'Berhasil Approve Karyawan!');
    }
  
}
