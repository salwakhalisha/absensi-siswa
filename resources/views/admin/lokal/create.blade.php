@extends('template.layouts')
@section('title', 'Tambah Data Kelas')
@section('konten')

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Data Kelas</h4>
        <form action="{{ route('lokal.store') }}" method="post">
            @csrf
            <div class="forms-sample">
                <div class="form-group">
                    <label for="nama">Nama Kelas</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Kelas" required>
                </div>
                <div class="form-group">
                    <label for="guru_id">Wali Kelas</label>
                    <select name="guru_id" id="guru_id" class="form-control" required>
                        <option disabled selected value="">Pilih Wali Kelas</option>
                        @foreach ($guru as $g)
                            <option value="{{ $g->id }}" @if (in_array($g->id, $guru_terpakai)) disabled @endif>
                                {{ $g->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="jurusan_id" class="form-label">Jurusan</label>
                    <select name="jurusan_id" id="jurusan_id" class="form-control" required>
                        <option disabled selected value="">Pilih Jurusan</option>
                        @foreach ($jurusan as $j)
                            <option value="{{ $j['id'] }}">{{ $j['nama'] }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary me-2">Submit</button>
                <a href="{{ route('lokal.index') }}" class="btn btn-dark">Cancel</a>
            </div>
        </form>
    </div>
</div>

@endsection
