<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Absen;
use App\Models\Lokal;
use App\Models\Siswa;
use App\Models\Pengajuan;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengajuanController extends Controller
{
    public function index()
    {
        $siswa = Siswa::where('username', Auth::user()->username)->firstOrFail();
        $pengajuans = Pengajuan::where('siswa_id', $siswa->id)->get();

        return view('siswaa.pengajuan.index', [
            'menu' => 'pengajuan',
            'title' => 'Pengajuan ' . $siswa->nama,
            'siswa' => $siswa,
            'pengajuans' => $pengajuans
        ]);
    }

    public function create()
    {
        return view('siswaa.pengajuan.create', [
            'menu' => 'pengajuan',
            'title' => 'Pengajuan Baru'
        ]);
    }

    public function store(Request $request)
{
    $request->validate([
        'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        'keterangan' => 'required|string',
    ]);

    $currentDate = now()->toDateString();
    $currentTime = now()->toTimeString();

    $nm = $request->file('foto');
    $namaFile = time() . '_' . $nm->getClientOriginalName();

    $siswa = Siswa::where('username', Auth::user()->username)->firstOrFail();
    $lokal = Lokal::findOrFail($siswa->lokal_id); // pakai lowercase jika memang begitu di DB
    $guru_id = $lokal->guru_id;

    $pengajuan = new Pengajuan();
    $pengajuan->keterangan = $request->keterangan;
    $pengajuan->tanggal = $currentDate;
    $pengajuan->jam_absen = $currentTime;
    $pengajuan->status = 'menunggu';
    $pengajuan->foto = $namaFile;
    $pengajuan->siswa_id = $siswa->id;
    $pengajuan->guru_id = $guru_id;

    $nm->move(public_path('/foto'), $namaFile);
    $pengajuan->save();

    Notification::create([
        'title' => 'Pengajuan Baru',
        'message' => 'Pengajuan baru dari ' . $siswa->nama,
        'id_pengajuan' => $pengajuan->id,
        'guru_id' => $guru_id,
        'is_read' => false,
    ]);

    return redirect()->route('pengajuan.index')->with('success', 'Pengajuan berhasil disimpan.');
}


    public function index3()
    {
        $guru = Guru::where('username', Auth::user()->username)->firstOrFail();
        $pengajuans = Pengajuan::where('guru_id', $guru->id)
            ->where('status', 'menunggu') // Hanya ambil pengajuan yang belum diproses
            ->with('siswa.Lokal;')
            ->get();

        return view('walikelas.pengajuan.index', [
            'menu' => 'pengajuan',
            'title' => 'Pengajuan untuk ' . $guru->nama,
            'guru' => $guru,
            'pengajuans' => $pengajuans
        ]);
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:diterima,ditolak',
        ]);

        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->status = $request->status;
        $pengajuan->save();

        // Determine the status for the absen table
        $absenStatus = $request->status == 'diterima' ? 'sakit' : 'alpa';

        // Check if the record already exists in the absen table
        $absen = Absen::where('siswa_id', $pengajuan->siswa_id)
            ->where('tanggal', $pengajuan->tanggal)
            ->first();

        if ($absen) {
            // Update the existing record
            $absen->update([
                'jam_absen' => $pengajuan->jam_absen,
                'status' => $absenStatus,
                'guru_id' => $pengajuan->guru_id,
            ]);
        } else {
            // Create a new record
            Absen::create([
                'tanggal' => $pengajuan->tanggal,
                'jam_absen' => $pengajuan->jam_absen,
                'status' => $absenStatus,
                'siswa_id' => $pengajuan->siswa_id,
                'guru_id' => $pengajuan->guru_id,
            ]);
        }

        // Mark the related notification as read
        Notification::where('id_pengajuan', $id)->update(['is_read' => true]);

        return redirect()->route('dashboard.walikelas')->with('success', 'Status pengajuan berhasil diperbarui, data absen disimpan, dan notifikasi dihapus.');
    }

    public function indexAdmin()
    {
        $pengajuans = Pengajuan::with('siswa.Lokal;')->get();

        return view('admin.pengajuan.index', [
            'menu' => 'pengajuan',
            'title' => 'Pengajuan',
            'pengajuans' => $pengajuans
        ]);
    }
}