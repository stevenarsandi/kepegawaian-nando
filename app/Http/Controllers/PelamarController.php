<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelamar;

class PelamarController extends Controller
{
    public function index()
    {
        $data = Pelamar::all();
        $data = Pelamar::simplePaginate(5);
        return view('pages.master.pelamar.index', ['data' => $data]);
    }
    
    public function create()
    {
        return view('pages.master.pelamar.add');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'file' => 'required',
        ], [
            'file.required' => 'Berkas Lamaran Wajib Diupload!'
        ]);

        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $filePath = $file->storeAs('public/pelamar', $fileName);
        
        Pelamar::create([
            'nama' => $request->nama,
            'divisi' => $request->divisi,
            'jabatan' => $request->jabatan,
            'jeniskelamin' => $request->jeniskelamin,
            'alamat' => $request->alamat,
            'tanggallahir' => $request->tanggallahir,
            'notelepon' => $request->notelepon,
            'nik' => $request->nik,
            'email' => $request->email,
            'file' => $fileName,
            'created_by' => $request->created_by
        ]);
        return redirect()->route('pelamar')->with('succes', 'Data berhasil ditambahkan!');
    }
    
    public function edit($id)
    {
        $pelamar = Pelamar::findOrFail($id);
        return view('pages.master.pelamar.edit', compact('pelamar'));
    }
    
    public function update(Request $request, $id)
    {
        $pelamar = Pelamar::findOrFail($id);

        $request->validate([
            'nama' => 'required',
        ]);
        
        $pelamar->update([
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
        return redirect()->route('pelamar')->with('succes', 'Data berhasil di Ubah!');
    }
    
    public function destroy($id)
    {
        $pelamar = Pelamar::findOrFail($id);
        $pelamar->delete();
        return redirect()->route('pelamar')->with('succes', 'Data berhasil di Hapus!');
    }
}
