@extends('templateguru.layouts')
@section('css')
    <link href="{{ asset('dist/assets/css/absen.css') }}" rel="stylesheet">
@endsection

@section('konten')
    <div class="absen-container w-full">
    <!-- Notifikasi sukses -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Header -->
    <div class="card-header">
        <h4 class="card-title">Absensi Siswa</h4>
        <p class="card-text">Silahkan pilih kelas untuk menampilkan data siswa.</p>
    </div>

    <!-- Form Pilih Kelas -->
    <form method="GET" action="{{ route('absen.create') }}" class="form-inline">
        <label for="kelas" class="form-label">Pilih Kelas:</label>
        <select name="kelas" id="kelas" class="form-control" required>
            <option value="">Pilih Kelas</option>
            @foreach($lokals as $lokal)
                <option value="{{ $lokal->id }}" {{ request('kelas') == $lokal->id ? 'selected' : '' }}>
                    {{ $lokal->nama }} - {{ $lokal->jurusan->nama }}
                </option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-search"></i> Tampilkan Siswa
        </button>
        <a href="{{ route('gurumurid.index') }}" class="btn btn-secondary me-2">
                <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </form>


    @if(request()->has('kelas') && $datasiswa->count())
    <!-- Form Absensi -->
    <form method="POST" action="{{ route('absen.updateStatus') }}">
        @csrf
        <div class="table-responsive">
            <table id="dataTable" class="table table-bordered table-striped table-hover absen-table">
                <thead class="table-info">
                    <tr>
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>NISN</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($datasiswa as $index => $siswa)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $siswa->nama }}</td>
                            <td>{{ $siswa->nisn }}</td>
                            <td>
                                @if($siswa->sudah_absen ?? false)
                                    <span class="text-muted">Siswa sudah di absen</span>
                                @else
                                    <label><input type="radio" name="status[{{ $siswa->id }}]" value="hadir" {{ old("status.$siswa->id") == 'hadir' ? 'checked' : '' }}> Hadir</label>
                                    <label><input type="radio" name="status[{{ $siswa->id }}]" value="izin" {{ old("status.$siswa->id") == 'izin' ? 'checked' : '' }}> Izin</label>
                                    <label><input type="radio" name="status[{{ $siswa->id }}]" value="sakit" {{ old("status.$siswa->id") == 'sakit' ? 'checked' : '' }}> Sakit</label>
                                    <label><input type="radio" name="status[{{ $siswa->id }}]" value="alpa" {{ old("status.$siswa->id") == 'alpa' ? 'checked' : '' }}> Alpa</label>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Tombol Aksi -->
        <div class="text-end">
            <button type="submit" class="btn btn-success">
                <i class="fa fa-save"></i> Simpan
            </button>
        </div>
    </form>
@endif

</div>
@endsection

