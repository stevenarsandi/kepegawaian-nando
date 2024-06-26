<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    protected $table = "karyawans";
    protected $fillable = ['id','nama', 'divisi', 'jabatan', 'jeniskelamin', 'alamat', 'tanggallahir', 'notelepon', 'nik', 'ktp', 'email', 'status', 'created_by', 'updated_by'];
}
