<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reward;

class RewardController extends Controller
{
    public function index()
    {
        $data = Reward::all();
        $data = Reward::simplePaginate(5);
        return view('pages.master.reward.index', ['data' => $data]);
    }
    
    public function create()
    {
        return view('pages.master.reward.add');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);
        
        Reward::create([
            'nama' => $request->nama,
            'divisi' => $request->divisi,
            'jabatan' => $request->jabatan,
            'reward' => $request->reward,
            'tanggal' => $request->tanggal,
            'created_by' => $request->created_by
        ]);
        return redirect()->route('reward')->with('succes', 'Data berhasil ditambahkan!');
    }
    
    public function edit($id)
    {
        $reward = Reward::findOrFail($id);
        return view('pages.master.reward.edit', compact('reward'));
    }
    
    public function update(Request $request, $id)
    {
        $reward = Reward::findOrFail($id);

        $request->validate([
            'nama' => 'required',
        ]);
        
        $reward->update([
            'nama' => $request->nama,
            'divisi' => $request->divisi,
            'jabatan' => $request->jabatan,
            'reward' => $request->reward,
            'tanggal' => $request->tanggal,
            'updated_by' => $request->updated_by
        ]);
        return redirect()->route('reward')->with('succes', 'Data berhasil di Ubah!');
    }
    
    public function destroy($id)
    {
        $reward = Reward::findOrFail($id);
        $reward->delete();
        return redirect()->route('reward')->with('succes', 'Data berhasil di Hapus!');
    }
}
