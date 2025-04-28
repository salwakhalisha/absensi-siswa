<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Siswa;
use App\Models\Guru;
use Illuminate\Http\Request;

class AbsensController extends Controller
{
    public function index()
    {
        $absens = \App\Models\Absen::with(['siswa', 'guru'])->latest()->get();
        return view('siswa.absen.index', compact('absen'));
    }
    // Menampilkan form create
    public function create()
    {
        $siswas = Siswa::all();
        $gurus = Guru::all();
        return view('siswa.absen.create', compact('siswas', 'gurus'));
    }

    // Menyimpan data absensi
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jam_masuk' => 'required',
            'jam_pulang' => 'required',
            'status' => 'required|in:Hadir,Sakit,Izin,Alpa',
            'siswa_id' => 'required|exists:siswas,id',
            'guru_id' => 'required|exists:gurus,id',
        ]);

        Absen::create([
            'tanggal' => $request->tanggal,
            'jam_masuk' => $request->jam_masuk,
            'jam_pulang' => $request->jam_pulang,
            'status' => $request->status,
            'siswa_id' => $request->siswa_id,
            'guru_id' => $request->guru_id,
        ]);

        return redirect()->route('siswa.index')->with('success', 'Absensi berhasil disimpan!');
    }
}
