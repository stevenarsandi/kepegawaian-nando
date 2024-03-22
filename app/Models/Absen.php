<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    use HasFactory;
    protected $table = "absensis";
    protected $fillable = ['id', 'nama', 'status', 'jam', 'tanggal', 'foto', 'created_by', 'updated_by'];
}
