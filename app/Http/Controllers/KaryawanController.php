<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;

class KaryawanController extends Controller
{
    public function index()
    {
        return view('pages.master.karyawan.index');
    }
    
    public function create()
    {
        return view('pages.master.karyawan.add');
    }
    
    public function store(Request $request)
    {
        Karyawan::create($request->all());
        return redirect()->route('karyawan.index');
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
