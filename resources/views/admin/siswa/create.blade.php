@extends('template.layouts')
@section('title', 'Tambah Data Siswa')
@section('konten')

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Data Siswa</h4>
        <form action="{{ route('siswa.store') }}" method="post">
            @csrf
            <div class="forms-sample">
                <div class="form-group">
                    <label for="nisn">NISN</label>
                    <input type="text" class="form-control" id="nisn" name="nisn" placeholder="Masukkan NISN" required>
                </div>
                <div class="form-group">
                    <label for="nama">Nama Siswa</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Siswa" required>
                </div>
                <div class="form-group">
                    <label for="lokal_id" class="form-label">Kelas</label>
                    <select name="lokal_id" id="lokal_id" class="form-control" required>
                        <option disabled selected value="">Pilih Kelas</option>
                        @foreach ($lokal as $lk)
                            <option value="{{ $lk['id'] }}">{{ $lk['nama'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" required>
                </div>
                <div class="form-group">
                    <label for="telp">No Telpon</label>
                    <input type="text" class="form-control" id="telp" name="telp" placeholder="Masukkan No Telepon" required>
                </div>
                <div class="form-group">
                    <label for="jk">Jenis Kelamin</label>
                    <select name="jk" id="jk" class="form-control" required>
                        <option disabled selected value="">Pilih Jenis Kelamin</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan Email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
                </div>
                <button type="submit" class="btn btn-primary me-2">Submit</button>
                <a href="{{ route('siswa.index') }}" class="btn btn-dark">Cancel</a>
            </div>
        </form>
    </div>
</div>

@endsection
