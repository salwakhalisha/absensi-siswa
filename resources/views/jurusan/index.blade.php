@extends ('template.layouts')
@section ('title', 'Jurusan')
@section ('konten')

<div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Data Jurusan</h4>

                    
                        <a href="{{route('jurusan.create')}}" class="btn btn-danger btn-icon-text">
                        <i class="mdi mdi-upload btn-icon-prepend"></i> Upload</a>
                    
                    
                    <div class="table-responsive pt-3">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th> No</th>
                            <th> Nama </th>
                            <th> Tindakan </th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($jurusan as $j)
                          <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$j['nama']}}</td>
                          <td>
                            <a href="{{route('jurusan.edit',$j['id'])}}" class="btn btn-warning btn-sm">Edit</a>
                            <!-- <form action="{{route('jurusan.delete',$j['id'])}}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form> -->
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