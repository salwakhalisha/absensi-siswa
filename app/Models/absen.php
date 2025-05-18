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

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($absen) {
            if (empty($absen->jam_absen)) {
                $absen->jam_absen = now()->toTimeString();
            }
        });
    }
}
