<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    use HasFactory;
    protected $table = "absensis";
    protected $fillable = ['id', 'nama', 'checkin', 'checkout', 'tanggal', 'created_by', 'updated_by'];
}
