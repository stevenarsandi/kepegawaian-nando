<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Phk;

class PhkController extends Controller
{
    public function index()
    {
        $data = Phk::all();
        $data = Phk::simplePaginate(5);
        return view('pages.master.phk.index', ['data' => $data]);
    }
    
    public function create()
    {
        return view('pages.master.phk.add');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);
        
        Phk::create([
            'nama' => $request->nama,
            'divisi' => $request->divisi,
            'jabatan' => $request->jabatan,
            'jenis' => $request->jenis,
            'keterangan' => $request->keterangan,
            'tanggal' => $request->tanggal,
            'created_by' => $request->created_by
        ]);
        return redirect()->route('phk')->with('succes', 'Data berhasil ditambahkan!');
    }
    
    public function edit($id)
    {
        $phk = Phk::findOrFail($id);
        return view('pages.master.phk.edit', compact('phk'));
    }
    
    public function update(Request $request, $id)
    {
        $phk = Phk::findOrFail($id);

        $request->validate([
            'nama' => 'required',
        ]);
        
        $phk->update([
            'nama' => $request->nama,
            'divisi' => $request->divisi,
            'jabatan' => $request->jabatan,
            'jenis' => $request->jenis,
            'keterangan' => $request->keterangan,
            'tanggal' => $request->tanggal,
            'updated_by' => $request->updated_by
        ]);
        return redirect()->route('phk')->with('succes', 'Data berhasil di Ubah!');
    }
    
    public function destroy($id)
    {
        $phk = Phk::findOrFail($id);
        $phk->delete();
        return redirect()->route('phk')->with('succes', 'Data berhasil di Hapus!');
    }
}
