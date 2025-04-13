@extends('template.layouts')
@section('title', 'Detail Data Kelas')
@section('konten')

<div class="card">
  <div class="card-body">
    <h4 class="card-title">Detail Data Kelas</h4>
    
    <div class="forms-sample">
      <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" id="nama" class="form-control" value="{{ $lokal->nama }}" readonly>
      </div>
      <div class="form-group">
        <label for="nama">Nama Guru</label>
        <input type="text" id="nama" class="form-control" value="{{ $lokal->guru ? $lokal->guru->nama : 'Tidak ada data' }}" readonly>
      </div>
      <div class="form-group">
        <label for="nama">Nama Jurusan</label>
        <input type="text" id="nama" class="form-control" value="{{ $lokal->jurusan ? $lokal->jurusan->nama : 'Tidak ada data' }}" readonly>
      </div>

      <a href="{{ route('lokal.index') }}" class="btn btn-dark">Kembali</a>
    </div>
  </div>
</div>

@endsection
