<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class pengajuan extends Model
{
    use HasFactory;
    protected $fillable = [
        'keterangan',
        'tanggal',
        'jam_absen',
        'status',
        'foto',
        'siswa_id',
        'guru_id',
    ];

    // Relasi ke tabel siswa
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }

    // Relasi ke tabel guru
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }
}