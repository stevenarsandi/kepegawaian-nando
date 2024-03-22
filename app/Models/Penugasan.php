<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penugasan extends Model
{
    use HasFactory;
    protected $table = "penugasans";
    protected $fillable = ['id', 'nama', 'divisi','tanggal', 'tujuan', 'keterangan', 'created_by', 'updated_by'];
}
