<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Izin extends Model
{
    use HasFactory;
    protected $table = "izins";
    protected $fillable = ['id', 'nama', 'keterangan', 'tanggal', 'lama', 'acc', 'created_by', 'updated_by'];
}
