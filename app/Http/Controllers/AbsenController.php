<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use App\Models\Absen;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AbsenController extends Controller
{
    public function index()
    {
        $data = Absen::all();
        $data = Absen::simplePaginate(5);
        return view('pages.master.absen.index', ['data' => $data]);
    }
    public function create()
    {
        $sekarang = Carbon::now('Asia/Jakarta');
        $tanggal = $sekarang->toDateString();
        $jam= $sekarang->toTimeString();
        return view('pages.master.absen.add', compact('jam', 'tanggal'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,svg',
        ], [
            'foto.required' => 'Foto wajib diupload!',
            'foto.image' => 'Foto yang diupload harus berupa gambar!',
            'foto.mimes' => 'Format gambar yang diizinkan adalah: jpeg, png, jpg, svg.',
        ]);
    
        $file = $request->file('foto');
        $fileName = $file->getClientOriginalName();
        $filePath = $file->storeAs('public/fotoabsen', $fileName);
        // $imageName = uniqid() . '.' . $request->file('foto')->extension();
        // $fotoPath = $request->file('foto')->storeAs('public/fotoabsen', $imageName);
        // if ($request->hasFile('foto')) {
        //     $foto = $request->file('foto');
        //     $fileName = time() . '.' . $foto->getClientOriginalExtension();
        //     $foto->storeAs('public/foto', $fileName);

            Absen::create([
                'nama' => $request->nama,
                'status' => $request->status,
                'jam' => $request->jam,
                'tanggal' => $request->tanggal,
                'foto' => $fileName,
                'created_by' => $request->created_by
            ]);
        return redirect()->route('absen')->with('succes', 'Absensi berhasil disimpan');
     }

     public function destroy($id)
     {
         $absen = Absen::findOrFail($id);
         $absen->delete();
         return redirect()->route('absen')->with('succes', 'Data berhasil di Hapus!');
     }
}
