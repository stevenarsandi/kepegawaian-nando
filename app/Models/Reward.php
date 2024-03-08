<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
    use HasFactory;
    protected $table = "rewards";
    protected $fillable = ['id', 'karyawan_id', 'nama', 'divisi', 'jabatan', 'reward', 'tanggal', 'created_by', 'updated_by'];
}
