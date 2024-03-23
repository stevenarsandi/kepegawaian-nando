<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuti;
use App\Models\Karyawan;
use Illuminate\Support\Facades\Auth;

class CutiController extends Controller
{
    public function index()
    {
        $username = Auth::user()->username;

        $data = Cuti::where('nama', $username)
                    ->simplePaginate(5);
        return view('pages.master.cuti.index', ['data' => $data]);
    }

    public function create()
    {
        $karyawan = Karyawan::select("id", "nama", "divisi", "jabatan")->get();
        return view('pages.master.cuti.add', ["karyawan" => $karyawan]);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);
        
        Cuti::create([
            // 'karyawan_id' => $request->karyawan_id,
            'nama' => $request->nama,
            // 'divisi' => $request->divisi,
            // 'jabatan' => $request->jabatan,
            'keterangan' => $request->keterangan,
            'tanggal' => $request->tanggal,
            'lama' => $request->lama,
            'acc' => $request->acc,
            'created_by' => $request->created_by
        ]);
        return redirect()->route('cuti')->with('succes', 'Data berhasil ditambahkan!');
    }
    public function edit($id)
    {
        $cuti = Cuti::findOrFail($id);
        return view('pages.master.cuti.edit', compact('cuti'));
    }
    
    public function update(Request $request, $id)
    {
        $cuti = Cuti::findOrFail($id);

        $request->validate([
            'nama' => 'required',
        ]);
        
        $cuti->update([
            'nama' => $request->nama,
            // 'divisi' => $request->divisi,
            // 'jabatan' => $request->jabatan,
            'keterangan' => $request->keterangan,
            'tanggal' => $request->tanggal,
            'lama' => $request->lama,
            'acc' => $request->acc,
            'updated_by' => $request->updated_by
        ]);
        return redirect()->route('cuti')->with('succes', 'Data berhasil di Ubah!');
    }
    
    public function destroy($id)
    {
        $cuti = Cuti::findOrFail($id);
        $cuti->delete();
        return redirect()->route('cuti')->with('succes', 'Data berhasil di Hapus!');
    }

    // public function getdata($id)
    // {
    //     $data = Karyawan::find($id);
    //     return response()->json($data);
    // }
}
