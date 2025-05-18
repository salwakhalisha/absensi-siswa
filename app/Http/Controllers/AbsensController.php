<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Absen;
use App\Models\Lokal;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsensController extends Controller
{
    public function index(Request $request)
    {
        $query = Absen::with(['siswa', 'guru']);

        if ($request->has('nama') && $request->nama != '') {
            $query->whereHas('siswa', function ($q) use ($request) {
                $q->where('lokal_id', $request->nama);
            });
        }

        if ($request->has('tanggal') && $request->tanggal != '') {
            $query->whereDate('tanggal', $request->tanggal);
        }

        $datasiswa = $query->paginate(10); // Adjust the number of items per page as needed
        $lokals = Lokal::all();

        return view('gurumurid.absen.index', [
            'menu' => 'absen',
            'title' => 'Data Absen',
            'datasiswa' => $datasiswa,
            'lokals' => $lokals
        ]);
    }
    public function store(Request $request)
    {
        foreach ($request->status as $siswa_id => $status) {
            Absen::where('id', $siswa_id)->update(['status' => $status]);
        }

        return redirect()->route('absen.riwayat')->with('success', 'Absen berhasil disimpan.');
    }

    public function create(Request $request)
    {
        $lokals = Lokal::all();

        $currentDate = now()->toDateString();

        $datasiswa = Siswa::with('lokal')
            ->when($request->kelas, function ($query) use ($request) {
                $query->where('lokal_id', $request->kelas);
            })
            ->get()
            ->map(function ($siswa) use ($currentDate) {
                $siswa->sudah_absen = $siswa->absens()->whereDate('tanggal', $currentDate)->exists();
                return $siswa;
            });

        return view('gurumurid.absen.index', [
            'lokals' => $lokals,
            'datasiswa' => $datasiswa,
        ]);
    }


    public function riwayat(Request $request)
{
    // Ambil semua kelas/lokal untuk dropdown filter
    $lokals = Lokal::all();

    $query = Absen::with(['siswa.lokal.jurusan']);

    // Jika ada filter kelas dari request
    if ($request->has('kelas') && $request->kelas != '') {
        $kelas = $request->kelas;

        $query->whereHas('siswa', function($q) use ($kelas) {
            $q->where('lokal_id', $kelas);
        });
    }

    // Bisa juga tambah filter tanggal jika perlu
    if ($request->has('tanggal') && $request->tanggal != '') {
        $query->whereDate('tanggal', $request->tanggal);
    }

    $riwayats = $query->paginate(10);

    return view('gurumurid.absen.riwayat', compact('riwayats', 'lokals'));
}

    
    public function updateStatus(Request $request)
{
    $request->validate([
        'status' => 'required|array',
        'status.*' => 'in:hadir,izin,sakit,alpa',
    ]);

    $statuses = $request->input('status', []);
    $currentDate = now()->toDateString();
    $currentTime = now()->toTimeString();
    $guru = Guru::where('username', Auth::user()->username)->firstOrFail();

    foreach ($statuses as $siswaId => $status) {
        // Cek apakah siswa sudah diabsen hari ini
        $sudahAbsen = Absen::where('siswa_id', $siswaId)
            ->whereDate('tanggal', $currentDate)
            ->exists();

        if (!$sudahAbsen) {
            Absen::create([
                'siswa_id' => $siswaId,
                'guru_id' => $guru->id,
                'tanggal' => $currentDate,
                'jam_absen' => $currentTime,
                'status' => $status,
            ]);
        }
    }

    return redirect()->route('absen.index')->with('success', 'Siswa berhasil diabsen.');

}

    public function edit($id)
    {
        $absen = absen::with('siswa.Lokal')->findOrFail($id);
        return view('gurumurid.absen.ubah', [
            'menu' => 'absen',
            'title' => 'Edit Absen',
            'absen' => $absen
        ]);
    }

    public function update(Request $request, $id)
    {
        $validasi = $request->validate([
            'status' => 'required',
        ], [
            'status.required' => 'Status harus diisi',
        ]);

        $absen = absen::findOrFail($id);
        $absen->status = $validasi['status'];
        $absen->save();

        

        return redirect(route('absen.riwayat'))->with('success', 'Status siswa berhasil diperbarui.');
    }

    public function indexWalikelas(Request $request)
    {
        $query = absen::with(['siswa', 'guru']);

        if ($request->has('nama') && $request->nama != '') {
            $query->whereHas('siswa', function ($q) use ($request) {
                $q->where('lokal_id', $request->nama);
            });
        }

        if ($request->has('tanggal') && $request->tanggal != '') {
            $query->whereDate('tanggal', $request->tanggal);
        }

        $datasiswa = $query->get();
        $Lokals = Lokal::all();

        return view('walikelas.absen.index', [
            'menu' => 'absen',
            'title' => 'Data Absen',
            'datasiswa' => $datasiswa,
            'Lokals' => $Lokals
        ]);
    }

    public function createWalikelas(Request $request)
    {
        $query = Siswa::with('Lokal');

        if ($request->has('nama') && $request->nama != '') {
            $query->where('lokal_id', $request->nama);
        }

        $datasiswa = $query->get();
        $Lokals = Lokal::all();

        return view('walikelas.absen.create', [
            'menu' => 'absen',
            'title' => 'Absen Siswa',
            'datasiswa' => $datasiswa,
            'Lokals' => $Lokals
        ]);
    }

    public function membuat(Request $request)
    {
        $request->validate([
            'status' => 'required|array',
            'status.*' => 'in:hadir,izin,sakit,alpa',
        ]);

        $statuses = $request->input('status', []);
        $currentDate = now()->toDateString();
        $currentTime = now()->toTimeString();
        $guru = Guru::where('id_user', Auth::id())->first();
        // Get the logged-in guru

        foreach ($statuses as $id => $status) {
            $siswa = Siswa::findOrFail($id);

            // Update status in siswa table
            $siswa->status = $status;
            $siswa->save();

            // Create a new record in absens table
            absen::create([
                'tanggal' => $currentDate,
                'jam_absen' => $currentTime,
                'status' => $status,
                'guru_id' => $guru->id,
                'siswa_id' => $id,
            ]);
            
        }

        return redirect()->route('absenWalikelas.index');
    }

    public function editWalikelas($id)
    {
        $absen = absen::with('siswa.Lokal')->findOrFail($id);
        return view('walikelas.absen.ubah', [
            'menu' => 'absen',
            'title' => 'Edit Absen',
            'absen' => $absen
        ]);
    }

    public function updateWalikelas(Request $request, $id)
    {
        $validasi = $request->validate([
            'status' => 'required',
        ], [
            'status.required' => 'Status harus diisi',
        ]);

        $absen = absen::findOrFail($id);
        $absen->status = $validasi['status'];
        $absen->save();

        $siswa = Siswa::findOrFail($absen->siswa_id);
        $siswa->status = $validasi['status'];
        $siswa->save();

        return redirect(route('absenWalikelas.index'))->with('success', 'Status siswa berhasil diperbarui.');
    }
    public function indexSiswa(Request $request)
    {
        $query = absen::with(['siswa', 'guru']);

        if ($request->has('nama') && $request->nama != '') {
            $query->whereHas('siswa', function ($q) use ($request) {
                $q->where('lokal_id', $request->nama);
            });
        }

        if ($request->has('tanggal') && $request->tanggal != '') {
            $query->whereDate('tanggal', $request->tanggal);
        }

        $datasiswa = $query->get();
        $Lokals = Lokal::all();

        return view('admin.absen.index', [
            'menu' => 'absen',
            'title' => 'Data Absen',
            'datasiswa' => $datasiswa,
            'Lokals' => $Lokals
        ]);
    }
}