@extends('template.layouts') 
@section('konten')
<div class="card">
    <h2>Riwayat Absensi</h2>

    <table>
        <thead>
            <tr>
                <th>Nama Siswa</th>
                <th>Tanggal</th>
                <th>Jam Masuk</th>
                <th>Jam Pulang</th>
                <th>Status</th>
                <th>Guru</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($absens as $absen)
                <tr>
                    <td>{{ $absen->siswa->nama }}</td>
                    <td>{{ $absen->tanggal }}</td>
                    <td>{{ $absen->jam_masuk }}</td>
                    <td>{{ $absen->jam_pulang }}</td>
                    <td class="
                        @if($absen->status == 'Hadir') status-hadir
                        @elseif($absen->status == 'Izin') status-izin
                        @elseif($absen->status == 'Sakit') status-sakit
                        @elseif($absen->status == 'Alpa') status-alpha
                        @endif">
                        {{ $absen->status }}
                    </td>
                    <td>{{ $absen->guru->nama }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
