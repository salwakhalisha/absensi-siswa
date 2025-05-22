@extends('templatesiswa.layouts')
@section('css')
    <link href="{{ asset('dist/assets/css/siswa.css') }}" rel="stylesheet">
@endsection
@section('konten')
<!-- Blade Content -->
 <div class="container">
<div class="header-container">
    <div class="section-title">Riwayat Absensi {{ Auth::user()->username }}</div>
    <a href="{{ route('siswaa.index') }}" class="btn">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</div>

<form action="{{ route('siswaa.absen.riwayat') }}" method="GET" class="mb-4 flex items-center gap-4">
    <label for="tanggal" class="text-white font-semibold">Filter Tanggal:</label>
    <input type="date" name="tanggal" id="tanggal" value="{{ request('tanggal') }}" class="form-control">
    <button type="submit" class="btn btn-primary">
        <i class="fas fa-filter"></i> Tampilkan
    </button>
</form>


<table class="table table-bordered">
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Jam</th>
            <th>Status</th>
            <th>Guru</th>
        </tr>
    </thead>
    <tbody>
        @forelse($riwayats as $absen)
        <tr>
            <td>{{ \Carbon\Carbon::parse($absen->tanggal)->format('d M Y') }}</td>
            <td>{{$absen->jam_absen}}</td>
            <td>{{ ucfirst($absen->status) }}</td>
            <td>{{ $absen->guru->nama ?? '-' }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="3" class="text-center">Belum ada riwayat absensi.</td>
        </tr>
        @endforelse
    </tbody>
</table>
</div>
@endsection
