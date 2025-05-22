@extends('templatesiswa.layouts')

@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<link href="{{ asset('dist/assets/css/pengajuanindex.css') }}" rel="stylesheet">
@endsection

@section('konten')
<div class="container">
    <div class="card">
        <div class="card-header">
            Pengajuan {{ $siswa->nama }}
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-primary text-center">
                    <tr>
                        <th>No</th>
                        <th>Keterangan</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Status</th>
                        <th>Bukti Foto</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse($pengajuans as $pengajuan)
                    <tr class="text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td class="text-start">{{ $pengajuan->keterangan }}</td>
                        <td>{{ \Carbon\Carbon::parse($pengajuan->tanggal_pengajuan)->format('d M Y') }}</td>
                        <td>
                            <span class="badge 
                                {{ $pengajuan->status === 'Disetujui' ? 'bg-success' : ($pengajuan->status === 'Ditolak' ? 'bg-danger' : 'bg-secondary') }}">
                                {{ $pengajuan->status }}
                            </span>
                        </td>
                        <td>
                            <img src="{{ asset('foto/'.$pengajuan->foto) }}" alt="Foto" class="img-thumbnail">
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">Belum ada pengajuan.</td>
                    </tr>
                    @endforelse
                </tbody>

                <tr>
                        <td colspan="5" class="text-start">
                            <a href="{{ route('pengajuan.create') }}" class="btn btn-success me-2">
                                <i class="fas fa-plus"></i> Ajukan
                            </a>
                            <a href="{{ route('siswaa.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                        </td>
                    </tr>
            </table>
        </div>
    </div>
</div>
@endsection
