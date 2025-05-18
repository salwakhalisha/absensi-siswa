<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Riwayat Absensi Siswa</title>
    
    <!-- CSS DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />


    <style>
       /* ===== CSS Formal dengan Warna Biru Toska Kalem ===== */

body {
    background-color: #1a004d; /* warna dasar gelap */
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: #222222; /* teks gelap agar kontras dengan card putih */
    margin: 0;
    padding: 0;
}

.container {
    max-width: 900px;
    margin: 80px auto;
    padding: 0 20px;
}

.card {
    background-color: #ffffff;
    border-radius: 16px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    overflow: hidden;
    border: 1px solid #ccc;
}

.card-header {
    background-color: #39f9d6; /* biru toska cerah */
    color: #0d0d0d; /* hitam pekat */
    font-weight: 700;
    text-align: center;
    padding: 20px;
    font-size: 24px;
    letter-spacing: 0.05em;
    text-transform: uppercase;
}

.card-body {
    padding: 25px 30px;
}

/* Header tabel */
table.dataTable thead th {
    background-color: #e3f9f6;
    color: #0d0d0d;
    text-align: center;
    padding: 12px 10px;
    border-bottom: 2px solid #39f9d6;
    font-weight: 600;
    font-size: 15px;
}

/* Isi tabel */
table.dataTable tbody td {
    text-align: center;
    vertical-align: middle;
    padding: 10px 8px;
    color: #333;
    font-size: 14px;
}

/* Badge status */
.badge {
    font-size: 0.9rem;
    padding: 6px 14px;
    border-radius: 12px;
    text-transform: capitalize;
    font-weight: 600;
    display: inline-block;
}

.bg-success { background-color: #28a745 !important; color: white !important; }
.bg-warning { background-color: #ffc107 !important; color: black !important; }
.bg-info    { background-color: #17a2b8 !important; color: white !important; }
.bg-danger  { background-color: #dc3545 !important; color: white !important; }

/* Tombol utama */
.btn-primary {
    background-color: #39f9d6;
    border: none;
    color: #000;
    font-weight: 700;
    padding: 10px 20px;
    border-radius: 10px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    text-decoration: none;
    font-size: 16px;
}

.btn-primary:hover,
.btn-primary:focus {
    background-color: #2dd0b1;
    outline: none;
    box-shadow: 0 0 8px rgba(45, 208, 177, 0.6);
}

/* Alert sukses */
.alert-success {
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
    padding: 15px 20px;
    margin-bottom: 25px;
    border-radius: 8px;
    font-weight: 600;
    box-shadow: 0 2px 6px rgba(21, 87, 36, 0.2);
}

/* Tombol DataTables */
.dt-button {
    background-color: #39f9d6 !important;
    color: black !important;
    border: none !important;
    border-radius: 8px !important;
    padding: 5px 12px !important;    /* padding lebih kecil */
    margin-right: 6px;
    font-weight: 600;
    cursor: pointer;
    font-size: 12px;                 /* font size diperkecil */
    min-width: 80px;                /* lebar minimum agar tombol tidak terlalu lebar */
    text-align: center;
    transition: background-color 0.3s ease;
}

.dt-button:hover,
.dt-button:focus {
    background-color: #2dd0b1 !important;
    outline: none;
    box-shadow: 0 0 10px rgba(45, 208, 177, 0.7);
}

.form-inline {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        align-items: center;
        margin-bottom: 30px;
    }

    .form-label {
        font-weight: 500;
        color: #333;
        margin-right: 10px;
    }

    select.form-control {
        padding: 8px 12px;
        border-radius: 10px;
        border: 1px solid #ccc;
        min-width: 220px;
    }

    .form-control:focus {
        outline: none;
        border-color: #2efcd7;
        box-shadow: 0 0 6px #2efcd7;
    }



/* Responsif */
@media (max-width: 600px) {
    .container {
        margin: 40px 10px;
        padding: 0 10px;
    }
    .card-header {
        font-size: 20px;
        padding: 15px;
    }
    .btn-primary, .dt-button {
        padding: 8px 14px !important;
        font-size: 14px;
    }
    table.dataTable thead th,
    table.dataTable tbody td {
        padding: 8px 6px;
        font-size: 13px;
    }
}

    </style>
</head>
<body>
    <div class="container">
        <div class="card shadow">
            <div class="card-header">
                Riwayat Absensi Siswa
            </div>
            <div class="card-body">
                <form method="GET" action="{{ route('absen.riwayat') }}" class="form-inline">
                    <div class="col-auto">
                        <label class="form-label mb-0" for="kelas">Kelas</label>
                        <select name="kelas" id="kelas" class="form-control w-auto">
                            <option value="">-- Pilih Kelas --</option>
                            @foreach ($lokals as $lokal)
                                <option value="{{ $lokal->id }}" {{ request('kelas') == $lokal->id ? 'selected' : '' }}>
                                    {{ $lokal->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-auto">
                        <label class="form-label mb-0" for="tanggal">Tanggal</label>
                        <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ request('tanggal') }}">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="dt-button btn-primary">Filter</button>
                    </div>
                </form>

                <a href="{{ route('gurumurid.index') }}" class="dt-button btn-primary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <table id="dataTable" class="display table table-bordered table-striped table-hover" style="width:100%">
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
                                <td>{{ $absen->siswa->nama }}</td>
                                <td>{{ $absen->siswa->nisn }}</td>
                                <td>
                                    {{ $absen->siswa->lokal->nama }} - 
                                    {{ $absen->siswa->lokal->jurusan->nama }}
                                </td>
                                <td>
                                    <span class="badge 
                                        @if($absen->status == 'hadir') bg-success 
                                        @elseif($absen->status == 'izin') bg-warning 
                                        @elseif($absen->status == 'sakit') bg-info 
                                        @else bg-danger 
                                        @endif">
                                        {{ ucfirst($absen->status) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('absen.edit', $absen->id) }}" class="btn btn-primary btn-sm">
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
        </div>
    </div>
</body>

    <!-- JS dependencies -->
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
        $(document).ready(function() {
            $('#dataTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'excel', 'pdf', 'print'
                ],
                order: [[0, 'desc']]
            });
        });
    </script>
</body>
</html>
