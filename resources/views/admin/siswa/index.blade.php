@extends('template.layouts')
@section('title', 'Data Siswa')
@section('konten')

<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Data Siswa</h4>

      <a href="{{ route('siswa.create') }}" class="btn btn-danger btn-icon-text">
        <i class="mdi mdi-upload btn-icon-prepend"></i> Upload
      </a>

      <div class="table-responsive pt-3">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>NISN</th>
              <th>Kelas</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($datasiswa as $dts)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $dts['nisn'] }}</td>
                <td>{{ $dts['nama'] }}</td>
                <td>{{ $dts->lokal ? $dts->lokal->nama : 'Data tidak ditemukan' }}</td>
                <td>
                  <a href="{{ route('siswa.edit', $dts['id']) }}" class="btn btn-warning btn-sm">Edit</a>
                  <a href="{{ route('siswa.show', $dts['id']) }}" class="btn btn-primary btn-sm">Detail</a>
                  <form action="{{ route('siswa.delete', $dts['id']) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection