<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    use HasFactory;
    protected $table = "cutis";
    protected $fillable = ['id', 'nama', 'divisi', 'jabatan', 'keterangan', 'tanggal', 'lama', 'acc', 'created_by', 'updated_by'];
}
