@extends('template.layouts')
@section('title', 'Tambah Data Guru')
@section('konten')

                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Data Guru</h4>
                    <form action="{{route('guru.store')}}" method="post">
                        @csrf
                    <div class="forms-sample">
                      <div class="form-group">
                        <label for="nip">NIP</label>
                        <input type="text" class="form-control" id="nip" name="nip" placeholder="Masukkan NIP" required>
                      </div>
                      <div class="form-group">
                        <label for="nama">Nama Guru</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Guru" required>
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
                        <label for="nama">Jenis Kelamin</label>
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
                      <a href="{{route('guru.index')}}">
                      <button class="btn btn-dark">Cancel</button>
                      </a>
                    </form>
                    </div>
                  </div>
                </div>
        
@endsection