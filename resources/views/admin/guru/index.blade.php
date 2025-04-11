@extends ('template.layouts')
@section ('title', ' Data Guru')
@section ('konten')

<div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Data Guru</h4>

                    
                        <a href="{{route('guru.create')}}" class="btn btn-danger btn-icon-text">
                        <i class="mdi mdi-upload btn-icon-prepend"></i> Upload</a>
                    
                    
                    <div class="table-responsive pt-3">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th> No</th>
                            <th> NIP </th>
                            <th> Nama </th>
                            <th> Aksi </th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataguru as $g)
                          <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$g['nip']}}</td>
                          <td>{{$g['nama']}}</td>
                          <td>
                          <a href="{{route('guru.edit',$g['id'])}}" class="btn btn-warning btn-sm">Edit</a>

                          <a href="{{route('guru.show',$g['id'])}}" class="btn btn-primary btn-sm">Detail</a>
                          
                            <form action="{{route('guru.delete',$g['id'])}}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                          </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              @endsection