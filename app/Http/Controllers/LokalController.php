<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lokal;
use App\Models\Jurusan;

class LokalController extends Controller
{
    public function index()
    {
        $lokal = Lokal::with('guru')->get(); // Mengambil data dengan relasi
        $jurusan = Jurusan::all();

        return view('admin.lokal.index', [
            'menu' => 'lokal',
            'title' => 'Data Kelas',
            'lokal' => $lokal,
            'jurusan' => $jurusan
        ]);
    }

    public function create()
    {
        return view('admin.lokal.create', [
            'menu' => 'lokal',
            'title' => 'Tambah Data Lokal'
        ]);
    }

    public function store(Request $request)
    {
        // Implement your store logic here
    }

    public function edit($id)
    {
        // Implement your edit logic here
    }

    public function update(Request $request, $id)
    {
        // Implement your update logic here
    }

    public function destroy($id)
    {
        // Implement your destroy logic here
    }
}
