<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Absensi Siswa</title>
    <!-- CSS dan plugin lainnya -->
    <link rel="stylesheet" href="dist/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="dist/assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="dist/assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="dist/assets/css/style.css">
    <link rel="shortcut icon" href="dist/assets/images/favicon.png" />
  </head>
  <body>
  @if(Auth::user())
  @if(Auth::user()->level == 'admin')
  <script>
    window.location = "{{ route('dashboard.admin') }}";
  </script>
  @elseif(Auth::user()->level == 'guru')
  <script>
    window.location = "{{ route('gurumurid.index') }}";
  </script>
  @elseif(Auth::user()->level == 'siswa')
  <script>
    window.location = "{{ route('dashboard.siswa') }}";
  </script>   
  @endif
  
  @endif

  @if(Session()->has('loginError'))
  <div class="alert alert-danger" level="alert">
    {{ Session()->get('loginError') }}
  </div>
  @endif
  
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-start mb-3">Login</h3>
                <form action="{{route('auth')}}" method="POST">
                  @csrf
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control p_inout" placeholder="username" id="username" name="username" required>
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control p_input" id="password" name="password" placeholder="Password" required>
                  </div>
                  <div class="form-group d-flex align-items-center justify-content-between">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input"> Remember me </label>
                    </div>
                  </div>
                  <div class="text-center d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
                  </div>
                  <p class="sign-up">Don't have an Account?<a href="#"> Sign Up</a></p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- JS plugins dan lainnya -->
    <script src="dist/assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="dist/assets/js/off-canvas.js"></script>
    <script src="dist/assets/js/misc.js"></script>
    <script src="dist/assets/js/settings.js"></script>
    <script src="dist/assets/js/todolist.js"></script>
  </body>
</html>
