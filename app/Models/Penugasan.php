<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penugasan extends Model
{
    use HasFactory;
    protected $table = "penugasans";
    protected $fillable = ['id', 'nama', 'divisi', 'jabatan', 'tanggal', 'created_by', 'updated_by'];
}
