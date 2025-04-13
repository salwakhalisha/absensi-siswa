<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokal extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'jurusan_id',
        'guru_id'
    ];

    // Define the relationship with the Guru model
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }
}