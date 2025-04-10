<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Absensi Siswa</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('dist/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/assets/vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('dist/assets/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('dist/assets/vendors/font-awesome/css/font-awesome.min.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('dist/assets/vendors/jvectormap/jquery-jvectormap.css')}}">
    <link rel="stylesheet" href="{{asset('dist/assets/vendors/flag-icon-css/css/flag-icons.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/assets/vendors/owl-carousel-2/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/assets/vendors/owl-carousel-2/owl.theme.default.min.css')}}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('dist/assets/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('dist/assets/images/favicon.png')}}">
    @yield('css')
  </head>

  <body>
    <div class="container-scroller">
        @include('template.sidebar')
        <div class="container-fluid page-body-wrapper">
            @include('template.navbar')

            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('konten')
                    <footer class="footer">
                        <div class="d-sm-flex justify-content-center justify-content-sm-between">
                            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2024 <a href="https://www.bootstrapdash.com/" target="_blank">BootstrapDash</a>. All rights reserved.</span>
                            <span class="text-muted float-none float-sm-end d-block mt-1 mt-sm-0 text-center"> <span class="text-muted float-none float-sm-end d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span> <i class="mdi mdi-heart text-danger"></i></span>              
                        </div>
                    </footer>
                </div>
            </div>
        </div>
    
    
    <!-- partial:partials/_footer.html -->
    


    <script src="{{asset('dist/assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{asset('dist/assets/vendors/chart.js/chart.umd.js')}}"></script>
    <script src="{{asset('dist/assets/vendors/progressbar.js/progressbar.min.js')}}"></script>
    <script src="{{asset('dist/assets/vendors/jvectormap/jquery-jvectormap.min.js')}}"></script>
    <script src="{{asset('dist/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{asset('dist/assets/vendors/owl-carousel-2/owl.carousel.min.js')}}"></script>
    <script src="{{asset('dist/assets/js/jquery.cookie.js')}}" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('dist/assets/js/off-canvas.js')}}"></script>
    <script src="{{asset('dist/assets/js/misc.js')}}"></script>
    <script src="{{asset('dist/assets/js/settings.js')}}"></script>
    <script src="{{asset('dist/assets/js/todolist.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{asset('dist/assets/js/proBanner.js')}}"></script>
    <script src="{{asset('dist/assets/js/dashboard.js')}}"></script>
    <!-- End custom js for this page -->
     @yield('script')
  </body>
</html>
