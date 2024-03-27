<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sanksi;

class SanksiController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $data = Sanksi::where('nama', 'like', '%'.$search.'%') 
        ->orWhere('divisi', 'like', '%'.$search.'%')
        ->orWhere('sanksi', 'like', '%'.$search.'%')->simplePaginate(5);
        return view('pages.master.sanksi.index', ['data' => $data]);
    }
    
    public function create()
    {
        return view('pages.master.sanksi.add');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);
        
        Sanksi::create([
            'nama' => $request->nama,
            'divisi' => $request->divisi,
            'jabatan' => $request->jabatan,
            'sanksi' => $request->sanksi,
            'keterangan' => $request->keterangan,
            'tanggal' => $request->tanggal,
            'created_by' => $request->created_by
        ]);
        return redirect()->route('sanksi')->with('succes', 'Data berhasil ditambahkan!');
    }
    
    public function edit($id)
    {
        $sanksi = Sanksi::findOrFail($id);
        return view('pages.master.sanksi.edit', compact('sanksi'));
    }
    
    public function update(Request $request, $id)
    {
        $sanksi = Sanksi::findOrFail($id);

        $request->validate([
            'nama' => 'required',
        ]);
        
        $sanksi->update([
            'nama' => $request->nama,
            'divisi' => $request->divisi,
            'jabatan' => $request->jabatan,
            'sanksi' => $request->sanksi,
            'keterangan' => $request->keterangan,
            'tanggal' => $request->tanggal,
            'updated_by' => $request->updated_by
        ]);
        return redirect()->route('sanksi')->with('succes', 'Data berhasil di Ubah!');
    }
    
    public function destroy($id)
    {
        $sanksi = Sanksi::findOrFail($id);
        $sanksi->delete();
        return redirect()->route('sanksi')->with('succes', 'Data berhasil di Hapus!');
    }
}
