@extends('template.layouts')
@section('title', 'Detail Data Siswa')
@section('konten')

<div class="card">
  <div class="card-body">
    <h4 class="card-title">Data Siswa</h4>
    
    <div class="forms-sample">
      <div class="form-group">
        <label for="nisn">NISN</label>
        <input type="text" id="nisn" class="form-control" value="{{ $siswa->nisn }}" readonly>
      </div>
      <div class="form-group">
        <label for="nama">Nama siswa</label>
        <input type="text" id="nama" class="form-control" value="{{ $siswa->nama }}" readonly>
      </div>
      <div class="form-group">
        <label for="alamat">Alamat</label>
        <input type="text" id="alamat" class="form-control" value="{{ $siswa->alamat }}" readonly>
      </div>
      <div class="form-group">
        <label for="telp">No Telepon</label>
        <input type="text" id="telp" class="form-control" value="{{ $siswa->telp }}" readonly>
      </div>
      <div class="form-group">
        <label for="jk">Jenis Kelamin</label>
        <input type="text" id="jk" class="form-control" value="{{ $siswa->jk }}" readonly>
      </div>
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" class="form-control" value="{{ $siswa->username }}" readonly>
      </div>

      <a href="{{ route('siswa.index') }}" class="btn btn-dark">Kembali</a>
    </div>
  </div>
</div>

@endsection
