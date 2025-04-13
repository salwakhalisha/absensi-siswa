<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    { 
        $datasiswa = Siswa::all();
        return view('admin.siswa.index', [
            "menu" => "siswa",
            'title' => 'Data Guru',
            'datasiswa' => $datasiswa
        ]);
    }
}
