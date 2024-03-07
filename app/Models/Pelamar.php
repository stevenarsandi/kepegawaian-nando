<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelamar extends Model
{
    use HasFactory;
    protected $table = "pelamars";
    protected $fillable = ['id', 'nama', 'divisi', 'jabatan', 'jeniskelamin', 'alamat', 'tanggallahir', 'notelepon', 'nik', 'email', 'file', 'created_by', 'updated_by'];
}
