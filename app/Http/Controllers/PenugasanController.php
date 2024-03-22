<?php

namespace App\Http\Controllers;

use App\Models\Penugasan;
use Illuminate\Http\Request;

class PenugasanController extends Controller
{
    public function index()
    {
        $data = Penugasan::all();
        $data = Penugasan::simplePaginate(5);
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
        ]);

        Penugasan::create([
            'nama' => $request->nama,
            'divisi' => $request->divisi,
            'tanggal' => $request->tanggal,
            'tujuan' => $request->tujuan,
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
