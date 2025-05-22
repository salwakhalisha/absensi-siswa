<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
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

    /**
     * Relasi: Guru dimiliki oleh 1 User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi: Guru memiliki banyak notifikasi
     */
    public function notifications()
    {
        return $this->hasMany(Notification::class, 'guru_id');
    }
}
