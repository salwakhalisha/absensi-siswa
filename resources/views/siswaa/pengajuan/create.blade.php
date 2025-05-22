<!-- @if(auth()->user()->role != 'siswa')
    <script>
        window.location.href = "{{ route('dilarang') }}";
    </script>
@endif  -->
@extends('templatesiswa.layouts')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link href="{{ asset('dist/assets/css/pengajuancreate.css') }}" rel="stylesheet">
@endsection

@section('konten')
<div class="form-container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-center">Form Pengajuan</h5>

            <!-- Vertical Form -->
            <form method="POST" action="{{ route('pengajuan.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Masukkan keterangan" rows="4" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" class="form-control" id="foto" name="foto" required>
                </div>

                <div class="btn-group mt-4">
                    <a href="{{ route('pengajuan.index') }}" class="btn btn-primary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                    <button type="reset" class="btn btn-warning">
                        <i class="fas fa-sync-alt"></i> Reset
                    </button>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                </div>
            </form>
            <!-- Vertical Form -->

        </div>
    </div>
</div>
@endsection
