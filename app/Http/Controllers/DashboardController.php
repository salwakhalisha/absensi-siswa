<?php

namespace App\Http\Controllers;

use App\Models\guru;
use App\Models\lokal;
use App\Models\siswa;
use App\Models\jurusan;
use Illuminate\Http\Request;

class dashboardcontroller extends Controller
{
    public function dashboardadmin()
    {
        $jumlahsiswa = siswa::count(); // Menghitung jumlah siswa
        $jumlahguru = guru::count(); // Menghitung jumlah guru
        $jumlahkelas = lokal::count(); // Menghitung jumlah lokal
        $jumlahjurusan = jurusan::count(); // Menghitung jumlah jurusan

        return view('admin.index', [
            'menu' => 'home',
            'jumlahsiswa' => $jumlahsiswa,
            'jumlahguru' => $jumlahguru,
            'jumlahkelas' => $jumlahkelas,
            'jumlahjurusan' => $jumlahjurusan
        ]);
    }
    // public function dashboardGuru()
    // {
    //     $jumlahsiswa = siswa::count(); // Menghitung jumlah siswa
    //     $jumlahguru = guru::count(); // Menghitung jumlah guru
    //     $jumlahlokal = lokal::count(); // Menghitung jumlah lokal
    //     $jumlahjurusan = jurusan::count(); // Menghitung jumlah jurusan

    //     return view('guru.index', [
    //         'menu' => 'dashboardGuru',
    //         'jumlahsiswa' => $jumlahsiswa,
    //         'jumlahguru' => $jumlahguru,
    //         'jumlahlokal' => $jumlahlokal,
    //         'jumlahjurusan' => $jumlahjurusan
    //     ]);
    // }
}