<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;

class KaryawanController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $data = Karyawan::where('nama', 'like', '%'.$search.'%') 
        ->orWhere('divisi', 'like', '%'.$search.'%')
        ->orWhere('jabatan', 'like', '%'.$search.'%')->simplePaginate(5);
        return view('pages.master.karyawan.index', ['data' => $data]);
    }
    
    public function create()
    {
        return view('pages.master.karyawan.add');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);
        
        Karyawan::create([
            'nama' => $request->nama,
            'divisi' => $request->divisi,
            'jabatan' => $request->jabatan,
            'jeniskelamin' => $request->jeniskelamin,
            'alamat' => $request->alamat,
            'tanggallahir' => $request->tanggallahir,
            'notelepon' => $request->notelepon,
            'nik' => $request->nik,
            'email' => $request->email,
            'status' => $request->status,
            'created_by' => $request->created_by
        ]);
        return redirect()->route('karyawan')->with('succes', 'Data berhasil ditambahkan!');
    }
    
    public function edit($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        return view('pages.master.karyawan.edit', compact('karyawan'));
    }
    
    public function update(Request $request, $id)
    {
        $karyawan = Karyawan::findOrFail($id);

        $request->validate([
            'nama' => 'required',
        ]);
        
        $karyawan->update([
            'nama' => $request->nama,
            'divisi' => $request->divisi,
            'jabatan' => $request->jabatan,
            'jeniskelamin' => $request->jeniskelamin,
            'alamat' => $request->alamat,
            'tanggallahir' => $request->tanggallahir,
            'notelepon' => $request->notelepon,
            'nik' => $request->nik,
            'email' => $request->email,
            'status' => $request->status,
            'updated_by' => $request->updated_by
        ]);
        return redirect()->route('karyawan')->with('succes', 'Data berhasil di Ubah!');
    }
    
    public function destroy($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->delete();
        return redirect()->route('karyawan')->with('succes', 'Data berhasil di Hapus!');
    }
}
