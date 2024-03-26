<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromQuery;
use App\Models\Cuti;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CutiExport implements FromQuery, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $startDate;
    protected $endDate;

    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }
    public function query()
    {
        $query = Cuti::query();
        if (!empty($this->startDate) && !empty($this->endDate)) {
            $query->whereBetween('tanggal', [$this->startDate, $this->endDate]);
        }
        $query->select('nama', 'keterangan', 'tanggal', 'lama');
        
        return $query;
    }
    public function headings(): array
    {
        return [
            'Nama',
            'Keterangan',
            'Tanggal',
            'Lama Hari/Jam'
        ];
    }
}
