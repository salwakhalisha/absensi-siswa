@extends('template.layouts')
@section('konten')

<form action="{{ route('absens.store') }}" method="POST">
    @csrf

    <div class="card">
        <h2>Absensi Siswa</h2>

        {{-- Nama Siswa --}}
        <label for="siswa_id">Nama Siswa</label>
        <select name="siswa_id" id="siswa_id" required>
            @foreach ($siswas as $siswa)
                <option value="{{ $siswa->id }}">{{ $siswa->nama }}</option>
            @endforeach
        </select>

        {{-- Nama Guru --}}
        <label for="guru_id">Nama Guru</label>
        <select name="guru_id" id="guru_id" required>
            @foreach ($gurus as $guru)
                <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
            @endforeach
        </select>

        {{-- Tanggal --}}
        <label for="tanggal">Tanggal</label>
        <input type="date" name="tanggal" id="tanggal" value="{{ date('Y-m-d') }}" required>

        {{-- Jam Masuk --}}
        <label for="jam_masuk">Jam Masuk</label>
        <input type="time" name="jam_masuk" id="jam_masuk" required>

        {{-- Jam Pulang --}}
        <label for="jam_pulang">Jam Pulang</label>
        <input type="time" name="jam_pulang" id="jam_pulang" required>

        {{-- Status --}}
        <label>Status</label>
        <div class="status-options">
            <label><input type="radio" name="status" value="Hadir" checked> Hadir</label>
            <label><input type="radio" name="status" value="Sakit"> Sakit</label>
            <label><input type="radio" name="status" value="Izin"> Izin</label>
            <label><input type="radio" name="status" value="Alpa"> Alpa</label>
        </div>

        {{-- Tombol Simpan --}}
        <button type="submit">Simpan</button>
    </div>
</form>

@endsection