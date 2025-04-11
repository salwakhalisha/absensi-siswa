@extends('template.layouts')
@section('title', 'Data Kelas')
@section('konten')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Jurusan</h4>

            <a href="{{ route('jurusan.create') }}" class="btn btn-danger btn-icon-text">
                <i class="mdi mdi-upload btn-icon-prepend"></i> Upload
            </a>

            <div class="table-responsive pt-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kelas</th>
                            <th>Wali Kelas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lokal as $lk)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $lk['nama'] }}</td>
                                <td>{{ $lk->guru ? $lk->guru->nama : 'Guru tidak ditemukan' }}</td>
                                <td>
                                    <a href="{{ route('guru.edit', $lk['id']) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="{{ route('guru.show', $lk['id']) }}" class="btn btn-primary btn-sm">Detail</a>
                                    <form action="{{ route('guru.delete', $lk['id']) }}" method="POST" class="d-inline">
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
