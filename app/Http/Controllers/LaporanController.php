<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use App\Exports\AbsenExport; 
use App\Exports\IzinExport; 
use App\Exports\CutiExport; 
use App\Exports\KaryawanExport;

class LaporanController extends Controller
{
    public function index()
    {
        return view('pages.master.laporan.index');
    }
    public function export(Request $request)
    {
        $report_type = $request->report_type;
        
        switch ($report_type) {
            case 'Izin':
                $startDate = $request->input('start_date');
                $endDate = $request->input('end_date');
                return Excel::download(new IzinExport($startDate, $endDate), 'laporan_izin.xlsx');
            case 'Cuti':
                $startDate = $request->input('start_date');
                $endDate = $request->input('end_date');
                return Excel::download(new CutiExport($startDate, $endDate), 'laporan_cuti.xlsx');
            case 'Absensi':
                $startDate = $request->input('start_date');
                $endDate = $request->input('end_date');
                return Excel::download(new AbsenExport($startDate, $endDate), 'laporan_absensi.xlsx');
            case 'Data Karyawan':
                $startDate = $request->input('start_date');
                $endDate = $request->input('end_date');
                return Excel::download(new KaryawanExport($startDate, $endDate), 'laporan_karyawan.xlsx');
            default:
            return redirect()->route('laporan')->with('error', 'Gagal Export Data, Harap Pilih Laporan Yang Mau Di Export!');
        }
    }
}
