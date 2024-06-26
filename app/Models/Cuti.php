<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    use HasFactory;
    protected $table = "cutis";
    protected $fillable = ['id', 'nama', 'keterangan', 'tanggal', 'lama', 'status', 'created_by', 'updated_by'];
}
