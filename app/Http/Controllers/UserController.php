<?php

namespace App\Http\Controllers;

use App\Models\User;


class UserController extends Controller
{
    public function user()
{
    $user = User::all();

    // Debugging: Cek data yang diambil
    if ($user->isEmpty()) {
        return "Data user tidak ditemukan.";
    }

    return view('admin.user.index', [
        'menu' => 'user',
        'title' => 'Daftar User',
        'user' => $user
    ]);
}

}
