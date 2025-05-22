@extends('templateguru.layouts')

@section('css')
<link href="{{ asset('dist/assets/css/riwayat.css') }}" rel="stylesheet">
@endsection

@section('konten')
<div class="container">
    <div class="card shadow">
        <div class="card-header">
            Riwayat Absensi Siswa
        </div>
        <div class="card-body">
            <div class="mb-3" id="exportButtons"></div>
            @php
                $kelas = request('kelas');
                $bulan = request('bulan') ?? now()->month;
                $tahun = request('tahun') ?? now()->year;
            @endphp

            <form class="form-inline mb-4" method="GET">
                <label class="form-label me-2">Kelas</label>
                <select name="kelas" class="form-control me-3">
                    <option value=""> Pilih Kelas</option>
                    @foreach($lokals as $lokal)
                        <option value="{{ $lokal->id }}" {{ (request('kelas', $kelas) == $lokal->id) ? 'selected' : '' }}>
                            {{ $lokal->nama }}
                        </option>
                    @endforeach
                </select>

                <label class="form-label me-2">Bulan</label>
                <select name="bulan" class="form-control me-3">
                    @for($m = 1; $m <= 12; $m++)
                        <option value="{{ $m }}" {{ ($bulan == $m) ? 'selected' : '' }}>
                            {{ \Carbon\Carbon::create()->month($m)->locale('id')->isoFormat('MMMM') }}
                        </option>
                    @endfor
                </select>

                <label class="form-label me-2">Tahun</label>
                <select name="tahun" class="form-control me-3">
                    @for($y = now()->year; $y >= 2020; $y--)
                        <option value="{{ $y }}" {{ ($tahun == $y) ? 'selected' : '' }}>{{ $y }}</option>
                    @endfor
                </select>

                <button type="submit" class="btn btn-primary me-2">Filter</button>
                <a href="{{ route('gurumurid.index') }}" class="btn btn-primary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </form>

            @if(empty($kelas))
                <div class="alert alert-info text-center fw-bold mt-4">
                    Silakan pilih kelas terlebih dahulu untuk melihat riwayat absensi.
                </div>
            @elseif(count($data) > 0)
                <div class="table-responsive">
                    <table id="dataTable" class="table table-bordered table-sm nowrap" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th rowspan="2">Nama</th>
                                <th rowspan="2">NISN</th>
                                <th rowspan="2">Kelas</th>
                                <th colspan="{{ count($tanggalDalamBulan) }}">Tanggal</th>
                                <th rowspan="2">Hadir</th>
                                <th rowspan="2">Sakit</th>
                                <th rowspan="2">Izin</th>
                                <th rowspan="2">Alpa</th>
                            </tr>
                            <tr>
                                @foreach($tanggalDalamBulan as $tanggal)
                                    <th>{{ \Carbon\Carbon::parse($tanggal)->format('d') }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $row)
                                <tr>
                                    <td>{{ $row['siswa']->nama }}</td>
                                    <td>{{ $row['siswa']->nisn }}</td>
                                    <td>{{ $row['siswa']->lokal->nama }}</td>
                                    @foreach($tanggalDalamBulan as $tgl)
                                        @php
                                            $tanggal = \Carbon\Carbon::parse($tgl)->format('Y-m-d'); 
                                            $status = $row['absen'][$tanggal] ?? '-';
                                            $class = match(strtolower($status)) {
                                                'hadir' => 'bg-success text-black',
                                                'sakit' => 'bg-warning',
                                                'izin'  => 'bg-info text-white',
                                                'alpa'  => 'bg-danger text-white',
                                                default => ''
                                            };
                                        @endphp
                                        <td class="text-center {{ $class }}">
                                            {{ $status == '-' ? '-' : strtoupper(substr($status, 0, 1)) }}
                                        </td>
                                    @endforeach

                                    <td class="text-center">{{ $row['rekap']['hadir'] }}</td>
                                    <td class="text-center">{{ $row['rekap']['sakit'] }}</td>
                                    <td class="text-center">{{ $row['rekap']['izin'] }}</td>
                                    <td class="text-center">{{ $row['rekap']['alpa'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive m-3">
            <table id="dataAbsensi" class="table table-bordered table-sm nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Nama Siswa</th>
                        <th>NISN</th>
                        <th>Kelas</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($riwayats as $absen)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($absen->tanggal)->format('d M Y') }}</td>
                            <td>{{ $absen->siswa->nama ?? '-' }}</td>
                            <td>{{ $absen->siswa->nisn ?? '-' }}</td>
                            <td>{{ $absen->siswa->lokal->nama ?? '-' }}</td>
                            <td>
                                @php
                                    $badgeClass = match(strtolower($absen->status)) {
                                        'hadir' => 'bg-success',
                                        'izin'  => 'bg-warning',
                                        'sakit' => 'bg-info',
                                        'alpa'  => 'bg-danger',
                                        default => 'bg-secondary'
                                    };
                                @endphp
                                <span class="badge {{ $badgeClass }}">
                                    {{ ucfirst($absen->status) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('absen.edit', $absen->id) }}" class="btn btn-primary btn-kecil">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data absensi.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @else
                <div class="alert alert-info text-center fw-bold mt-4">
                    Tidak ada data absensi untuk filter yang dipilih.
                </div>
            @endif
    </div>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>

<!-- DataTables Init -->
<script>
$(document).ready(function () {
    // Inisialisasi DataTable untuk tabel rekap (yang pakai export Excel)
    var table = $('#dataTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excel',
                className: 'btn-sm btn-success'
            },
        ],
        order: [[0, 'asc']]
    });

    // Pindahkan tombol export ke div #exportButtons
    table.buttons().container().appendTo('#exportButtons');

    // Inisialisasi DataTable untuk tabel riwayat absensi (hanya search)
    $('#dataAbsensi').DataTable({
        dom: '<"top"f>rt<"bottom"lip><"clear">'
    });
});
</script>