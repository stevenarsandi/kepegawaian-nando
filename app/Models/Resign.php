<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resign extends Model
{
    use HasFactory;
    protected $table = "resigns";
    protected $fillable = ['id', 'karyawan_id', 'nama', 'divisi', 'jabatan', 'tanggal', 'keterangan', 'created_by', 'updated_by'];
}
