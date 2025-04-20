@extends('template.layouts')
@section('title', 'Tambah Data Siswa')
@section('konten')

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Data Siswa</h4>
        <form action="{{ route('siswa.update', $siswa->id) }}" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $siswa->id }}">
            <div class="forms-sample">
                <div class="form-group">
                    <label for="nisn">NISN</label>
                    <input type="text" class="form-control" id="nisn" name="nisn" value="{{$siswa->nisn}}">
                </div>
                <div class="form-group">
                    <label for="nama">Nama Siswa</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{$siswa->nama}}">
                </div>
                <div class="form-group">
                    <label for="lokal_id" class="form-label">Jurusan</label>
                    <select name="lokal_id" id="lokal_id" class="form-control">
                        <option disabled selected value="{{$siswa->lokal->nama}}">Pilih Kelas</option>
                        @foreach ($lokal as $lk)
                            <option value="{{ $lk['id'] }}">{{ $lk['nama'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{$siswa->alamat}}">
                </div>
                <div class="form-group">
                    <label for="telp">No Telpon</label>
                    <input type="text" class="form-control" id="telp" name="telp" value="{{$siswa->telp}}">
                </div>
                <div class="form-group">
                    <label for="jk">Jenis Kelamin</label>
                    <select name="jk" id="jk" class="form-control">
                        <option disabled selected value="{{$siswa->jk}}">Pilih Jenis Kelamin</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary me-2">Submit</button>
                <a href="{{ route('siswa.index') }}" class="btn btn-dark">Cancel</a>
            </div>
        </form>
    </div>
</div>

@endsection
