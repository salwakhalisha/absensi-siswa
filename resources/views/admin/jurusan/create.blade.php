@extends('template.layouts')
@section('title', 'data jurusan')
@section('konten')

                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Data Jurusan</h4>
                    <form action="{{route('jurusan.store')}}" method="post">
                        @csrf
                    <div class="forms-sample">
                      <div class="form-group">
                        <label for="nama">Nama Jurusan</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Jurusan">
                      </div>
                      <button type="submit" class="btn btn-primary me-2">Submit</button>
                      <a href="{{route('jurusan.index')}}">
                        <button class="btn btn-dark">Cancel</button>
                      </a>
                    </form>
                    </div>
                  </div>
                </div>
        
@endsection