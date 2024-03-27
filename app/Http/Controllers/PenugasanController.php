<?php

namespace App\Http\Controllers;

use App\Models\Penugasan;
use Illuminate\Http\Request;

class PenugasanController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $data = Penugasan::where('nama', 'like', '%'.$search.'%') 
        ->orWhere('tanggal', 'like', '%'.$search.'%')
        ->orWhere('tujuan', 'like', '%'.$search.'%')
        ->orWhere('keterangan', 'like', '%'.$search.'%')->simplePaginate(5);
        return view('pages.master.penugasan.index', ['data' => $data]);
    }
    
    public function create()
    {
        return view('pages.master.penugasan.add');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'surattugas' => 'required',
        ], [
            'surattugas.required' => 'Surat Tugas Harus Ada!'
        ]);

        $file = $request->file('surattugas');
        $fileName = $file->getClientOriginalName();
        $filePath = $file->storeAs('public/surattugas', $fileName);

        Penugasan::create([
            'nama' => $request->nama,
            'divisi' => $request->divisi,
            'tanggal' => $request->tanggal,
            'tujuan' => $request->tujuan,
            'surattugas' => $fileName,
            'keterangan' => $request->keterangan,
            'created_by' => $request->created_by
        ]);
        return redirect()->route('penugasan')->with('succes', 'Data berhasil ditambahkan!');
    }
    
    public function edit($id)
    {
        $penugasan = Penugasan::findOrFail($id);
        return view('pages.master.penugasan.edit', compact('penugasan'));
    }
    
    public function update(Request $request, $id)
    {
        $penugasan = Penugasan::findOrFail($id);

        $request->validate([
            'nama' => 'required',
        ]);
        
        if ($request->hasFile('surattugas')) {
            $file = $request->file('surattugas');
            $fileName = $file->getClientOriginalName();
            $filePath = $file->storeAs('public/surattugas', $fileName);
            $penugasan->surattugas = $fileName;
        }

        $penugasan->update([
            'nama' => $request->nama,
            'divisi' => $request->divisi,
            'tanggal' => $request->tanggal,
            'tujuan' => $request->tujuan,
            'keterangan' => $request->keterangan,
            'updated_by' => $request->updated_by
        ]);
        return redirect()->route('penugasan')->with('succes', 'Data berhasil di Ubah!');
    }
    
    public function destroy($id)
    {
        $penugasan = Penugasan::findOrFail($id);
        $penugasan->delete();
        return redirect()->route('penugasan')->with('succes', 'Data berhasil di Hapus!');
    }
}
