<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sanksi extends Model
{
    use HasFactory;
    protected $table = "sanksis";
    protected $fillable = ['id', 'nama', 'divisi', 'jabatan', 'sanksi', 'keterangan', 'tanggal', 'created_by', 'updated_by'];
}
