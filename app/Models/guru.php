<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Jika Guru bisa login
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $table = 'gurus';

    protected $fillable = [
        'nip',
        'nama',
        'alamat',
        'telp',
        'jk',
        'username',
        'password',
        'user_id',
    ];

    protected $hidden = [
        'password',
    ];

    // Relasi: Guru dimiliki oleh 1 User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
