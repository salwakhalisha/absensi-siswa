<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable = [
        'nama',
        'lokal_id',
        'jurusan_id',
    ];

    // Relasi ke model Lokal (kelas)
    public function lokal()
    {
        return $this->belongsTo(Lokal::class, 'lokal_id');
    }

    // Relasi ke model Jurusan
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }

    public function absens()
    {
        return $this->hasMany(Absen::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}