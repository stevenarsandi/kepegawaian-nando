<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;

class KaryawanController extends Controller
{
    public function index()
    {
        $data = Karyawan::all();
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

        // Proses input
        
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
            'created_by' => $request->created_by
        ]);
        return redirect()->route('karyawan')->with('succes', 'Data berhasil ditambahkan');
    }
    
    public function edit(Karyawan $karyawan)
    {
        return view('karyawan.edit', compact('karyawan'));
    }
    
    public function update(Request $request, Karyawan $karyawan)
    {
        $karyawan->update($request->all());
        return redirect()->route('karyawan.index');
    }
    
    public function destroy(Karyawan $karyawan)
    {
        $karyawan->delete();
        return redirect()->route('karyawan.index');
    }
}
