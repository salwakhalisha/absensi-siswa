<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="{{ asset('dist/assets/css/absen.css') }}">

<div class="absen-container">
    <div class="card-header">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3" level="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <h4 class="card-title">Absensi Siswa</h4>
        <p class="card-text">Silahkan pilih kelas untuk menampilkan data siswa.</p>
    </div>

    <!-- Form Pilih Kelas -->
    <form method="GET" action="{{ route('absen.create') }}" class="form-inline">
        <label for="kelas" class="form-label mb-0">Pilih Kelas:</label>
        <select name="kelas" id="kelas" class="form-control w-auto" required>
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
    </form>

    <!-- Form Absensi -->
    <form method="POST" action="{{ route('absen.updateStatus') }}">
    @csrf
    <div class="table-responsive">
        <table id="dataTable" class="table table-bordered table-striped table-hover absen-table">
            <thead>
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
    <br>
        <div class="text-end">
            <a href="{{route('gurumurid.index')}}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
            <button type="submit" class="btn btn-success">
                <i class="fa fa-save"></i> Simpan
            </button>
        </div>
    </form>
</div>

