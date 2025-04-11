@extends('template.layouts')
@section('title', 'data jurusan')
@section('konten')

                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Data Jurusan</h4>
                    <form action="{{route('jurusan.update', $jurusan->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{$jurusan->id}}">
                    <div class="forms-sample">
                      <div class="form-group">
                        <label for="nama">Nama Jurusan</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Jurusan" value="{{$jurusan->nama}}">
                      </div>
                      <button type="submit" class="btn btn-primary me-2">Submit</button>
                      
                      <a href="{{route('jurusan.index')}}">
                        <button type="button" class="btn btn-dark">Cancel</button>
                      </a>
                      
                    </form>
                    </div>
                  </div>
                </div>
        
@endsection