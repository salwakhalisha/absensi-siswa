@extends('template.layouts')
@section('title', 'Detail Data Guru')
@section('konten')

<div class="card">
  <div class="card-body">
    <h4 class="card-title">Data Guru</h4>
    <form action="{{ route('guru.update', $guru->id) }}" method="post" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <input type="hidden" name="id" value="{{ $guru->id }}">
      <div class="forms-sample">
        <div class="form-group">
          <label for="nip">NIP</label>
          <input type="text" id="nip" name="nip" class="form-control" value="{{ $guru->nip }}">
        </div>
        <div class="form-group">
          <label for="nama">Nama Guru</label>
          <input type="text" id="nama" name="nama" class="form-control" value="{{ $guru->nama }}">
        </div>
        <div class="form-group">
          <label for="alamat">Alamat</label>
          <input type="text" id="alamat" name="alamat" class="form-control" value="{{ $guru->alamat }}">
        </div>
        <div class="form-group">
          <label for="telp">No Telepon</label>
          <input type="text" id="telp" name="telp" class="form-control" value="{{ $guru->telp }}">
        </div>
        <div class="form-group">
          <label for="jk">Jenis Kelamin</label>
          <select name="jk" id="jk" class="form-control" required>
            <option disabled selected value="{{ $guru->jk }}">Pilih Jenis Kelamin</option>
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary me-2">Submit</button>
        <a href="{{ route('guru.index') }}" class="btn btn-dark">Kembali</a>
      </div>
    </form>
  </div>
</div>

@endsection
