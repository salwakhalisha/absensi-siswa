<?php

namespace App\Http\Controllers;

use App\Models\guru;
use App\Models\lokal;
use App\Models\jurusan;
use Illuminate\Http\Request;

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
        $jurusan = Jurusan::all();
        $guru = Guru::all();

        // Ambil ID wali kelas yang sudah digunakan
        $guru_terpakai = Lokal::pluck('guru_id')->toArray();

        return view('admin.lokal.create', [
            'menu' => 'lokal',
            'title' => 'Tambah Data Kelas',
            'jurusan' => $jurusan,
            'guru' => $guru,
            'guru_terpakai' => $guru_terpakai // Kirim data guru yang sudah dipakai
        ]);
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama' => 'required', // Nama kelas
            'jurusan_id' => 'required',
            'guru_id' => 'required'
        ], [
            'nama.required' => 'Nama kelas harus diisi',
            'jurusan_id.required' => 'Jurusan harus dipilih',
            'guru_id.required' => 'Wali kelas harus dipilih'
        ]);

        // Simpan data ke database
        $lokal = new Lokal();
        $lokal->nama = $validasi['nama'];
        $lokal->jurusan_id = $validasi['jurusan_id'];
        $lokal->guru_id = $validasi['guru_id'];
        $lokal->save();

        return redirect(route('lokal.index'));
    }

    public function show($id)
    {
        $lokal = Lokal::with('jurusan', 'guru')->find($id);

        // Ambil ID wali kelas yang sudah digunakan
        $guru_terpakai = Lokal::pluck('guru_id')->toArray();

        return view('admin.lokal.view', [
            'menu' => 'lokal',
            'title' => 'Tambah Data Kelas',
            
            'lokal' => $lokal,
            'guru_terpakai' => $guru_terpakai // Kirim data guru yang sudah dipakai
        ]);
    }

    public function edit($id)
    {
        $lokal = Lokal::with('jurusan', 'guru')->find($id);
        $gurus = Guru::all(); // Ambil semua guru
        $jurusan = Jurusan::all();
        $guru_terpakai = Lokal::pluck('guru_id')->toArray();

        return view('admin.lokal.edit', [
            'menu' => 'lokal',
            'title' => 'Edit Data Siswa',
            'lokal' => $lokal,
            'jurusan' => $jurusan,
            'guru' => $gurus, // Kirim variabel $gurus
            'guru_terpakai' => $guru_terpakai
        ]);
    }

    public function update(Request $request, $id)
    {
        $validasi = $request->validate([
            'nama' => 'required', // Nama kelas
            'jurusan_id' => 'required',
            'guru_id' => 'required'
        ], [
            'nama.required' => 'Nama kelas harus diisi',
            'jurusan_id.required' => 'Jurusan harus dipilih',
            'guru_id.required' => 'Wali kelas harus dipilih'
        ]);

        // Ambil data kelas berdasarkan id
        $lokal = Lokal::find($id);
        if (!$lokal) {
            return back()->withErrors(['error' => 'Data tidak ditemukan']);
        }

        // Update data di database
        $lokal->nama = $validasi['nama'];
        $lokal->jurusan_id = $validasi['jurusan_id'];
        $lokal->guru_id = $validasi['guru_id'];
        $lokal->save();

        return redirect(route('lokal.index'))->with('success', 'Data kelas berhasil diperbarui');
    }

    public function destroy($id)
    {
        $lokal = Lokal::find($id);
        $lokal->delete();
        return redirect(route('lokal.index'));
    }
}
