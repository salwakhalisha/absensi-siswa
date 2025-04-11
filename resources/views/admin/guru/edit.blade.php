@extends('template.layouts')
@section('title', 'Detail Data Guru')
@section('konten')

<div class="card">
  <div class="card-body">
    <h4 class="card-title">Data Guru</h4>
    
    <div class="forms-sample">
      <div class="form-group">
        <label for="nip">NIP</label>
        <input type="text" id="nip" class="form-control" value="{{ $guru->nip }}" readonly>
      </div>
      <div class="form-group">
        <label for="nama">Nama Guru</label>
        <input type="text" id="nama" class="form-control" value="{{ $guru->nama }}" readonly>
      </div>
      <div class="form-group">
        <label for="alamat">Alamat</label>
        <input type="text" id="alamat" class="form-control" value="{{ $guru->alamat }}" readonly>
      </div>
      <div class="form-group">
        <label for="telp">No Telepon</label>
        <input type="text" id="telp" class="form-control" value="{{ $guru->telp }}" readonly>
      </div>
      <div class="form-group">
        <label for="jk">Jenis Kelamin</label>
        <input type="text" id="jk" class="form-control" value="{{ $guru->jk }}" readonly>
      </div>

      <a href="{{ route('guru.index') }}" class="btn btn-dark">Kembali</a>
    </div>
  </div>
</div>

@endsection
