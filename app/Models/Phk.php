<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phk extends Model
{
    use HasFactory;
    protected $table = "phks";
    protected $fillable = ['id', 'nama', 'divisi', 'jabatan','jenis',  'keterangan', 'tanggal', 'created_by', 'updated_by'];
}
