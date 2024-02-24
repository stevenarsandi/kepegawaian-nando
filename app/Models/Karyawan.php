<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    protected $table = "karyawans";
    protected $fillable = ['id', 'pelamar_id', 'nama', 'divisi', 'jeniskelamin', 'alamat', 'tanggallahir', 'notelepon', 'ktp', 'email'];
}
