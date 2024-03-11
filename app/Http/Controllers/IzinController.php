<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Izin;
use App\Models\Karyawan;

class IzinController extends Controller
{
    public function index()
    {
        $data = Izin::all();
        return view('pages.master.izin.index', ['data' => $data]);
    }

    public function create()
    {
        $karyawan = Karyawan::select("id", "nama", "divisi", "jabatan")->get();
        return view('pages.master.izin.add', ["karyawan" => $karyawan]);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);
        
        Izin::create([
            // 'karyawan_id' => $request->karyawan_id,
            'nama' => $request->nama,
            'divisi' => $request->divisi,
            'jabatan' => $request->jabatan,
            'keterangan' => $request->keterangan,
            'tanggal' => $request->tanggal,
            'lama' => $request->lama,
            'acc' => $request->acc,
            'created_by' => $request->created_by
        ]);
        return redirect()->route('izin')->with('succes', 'Data berhasil ditambahkan!');
    }
    public function edit($id)
    {
        $izin = Izin::findOrFail($id);
        return view('pages.master.izin.edit', compact('izin'));
    }
    
    public function update(Request $request, $id)
    {
        $izin = Izin::findOrFail($id);

        $request->validate([
            'nama' => 'required',
        ]);
        
        $izin->update([
            'nama' => $request->nama,
            'divisi' => $request->divisi,
            'jabatan' => $request->jabatan,
            'keterangan' => $request->keterangan,
            'tanggal' => $request->tanggal,
            'lama' => $request->lama,
            'acc' => $request->acc,
            'updated_by' => $request->updated_by
        ]);
        return redirect()->route('izin')->with('succes', 'Data berhasil di Ubah!');
    }
    
    public function destroy($id)
    {
        $izin = Izin::findOrFail($id);
        $izin->delete();
        return redirect()->route('izin')->with('succes', 'Data berhasil di Hapus!');
    }

    // public function getdata($id)
    // {
    //     $data = Karyawan::find($id);
    //     return response()->json($data);
    // }
}
