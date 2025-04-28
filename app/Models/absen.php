<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class absen extends Model
{
    protected $fillable = [
        'tanggal',
        'jam_masuk',
        'jam_pulang',
        'status',
        'siswa_id',
        'guru_id',
    ];
    
}
