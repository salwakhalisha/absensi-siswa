@extends ('template.layouts')
@section ('title', ' Daftar User')
@section ('konten')

<div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Daftar User</h4>
                    
                    <div class="table-responsive pt-3">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th> No</th>
                            <th> Username </th>
                            <th> Email </th>
                            <th> Kategori </th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $us)
                          <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$us['username']}}</td>
                          <td>{{$us['email']}}</td>
                          <td>{{$us['level']}}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              @endsection