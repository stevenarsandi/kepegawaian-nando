<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromQuery;
use App\Models\Absen;
use App\Models\Karyawan;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KaryawanExport implements FromQuery, WithHeadings
{
    protected $startDate;
    protected $endDate;

    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }
    public function query()
    {
        $query = Karyawan::query();
        if (!empty($this->startDate) && !empty($this->endDate)) {
            $query->whereBetween('tanggal', [$this->startDate, $this->endDate]);
        }
        $query->select('nama', 'divisi', 'jabatan', 'jeniskelamin', 'alamat', 'tanggallahir', 'notelepon', 'email', 'status');
        
        return $query;
    }
    public function headings(): array
    {
        return [
            'Nama',
            'Divisi',
            'Jabatan',
            'Jenis Kelamin',
            'Alamat',
            'Tanggal Lahir',
            'Nomor Telepon',
            'Email',
            'Status Pegawai'
        ];
    }
}
