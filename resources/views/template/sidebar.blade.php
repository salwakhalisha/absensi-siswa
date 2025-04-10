
<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="{{asset('dist/assets/images/logo.svg')}}"><img src="{{asset('dist/assets/images/logo.svg')}}" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini" href="{{asset('dist/assets/images/logo-mini.svg')}}"><img src="{{asset('dist/assets/images/logo-mini.svg')}}" alt="logo" /></a>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
        <div class="profile-desc">
          <div class="profile-pic">
            <div class="count-indicator">
          <img class="img-xs rounded-circle " src="{{asset('dist/assets/images/faces/salwa.jpg')}}" alt="">
          <span class="count bg-success"></span>
            </div>
            <div class="profile-name">
          <h5 class="mb-0 font-weight-normal">Salwa Khalisha</h5>
          <span>Admin</span>
            </div>
          </div>
          <a href="#" id="profile-dropdown" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
          <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
            <a href="#" class="dropdown-item preview-item">
          <div class="preview-thumbnail">
            <div class="preview-icon bg-dark rounded-circle">
              <i class="mdi mdi-cog text-primary"></i>
            </div>
          </div>
          <div class="preview-item-content">
            <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
          </div>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item preview-item">
          <div class="preview-thumbnail">
            <div class="preview-icon bg-dark rounded-circle">
              <i class="mdi mdi-onepassword  text-info"></i>
            </div>
          </div>
          <div class="preview-item-content">
            <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
          </div>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item preview-item">
          <div class="preview-thumbnail">
            <div class="preview-icon bg-dark rounded-circle">
              <i class="mdi mdi-calendar-today text-success"></i>
            </div>
          </div>
          <div class="preview-item-content">
            <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
          </div>
            </a>
          </div>
        </div>
          </li>
          <li class="nav-item nav-category">
        <span class="nav-link">Navigation</span>
          </li>
          <li class="nav-item menu-items">
        <a class="nav-link" href="{{route('index')}}">
          <span class="menu-icon">
            <i class="mdi mdi-speedometer"></i>
          </span>
          <span class="menu-title">Dashboard</span>
        </a>
          </li>
          <li class="nav-item menu-items">
        <a class="nav-link" href="#">
          <span class="menu-icon">
            <i class="mdi mdi-playlist-play"></i>
          </span>
          <span class="menu-title">Data Siswa</span>
          <i class="menu-arrow"></i>
        </a>
          </li>
          <li class="nav-item menu-items">
        <a class="nav-link" href="#">
          <span class="menu-icon">
            <i class="mdi mdi-table-large"></i>
          </span>
          <span class="menu-title">Data Guru</span>
          <i class="menu-arrow"></i>
        </a>
          </li>
          <li class="nav-item menu-items">
        <a class="nav-link" href="#">
          <span class="menu-icon">
            <i class="mdi mdi-chart-bar"></i>
          </span>
          <span class="menu-title">Data Kelas</span>
          <i class="menu-arrow"></i>
        </a>
          </li>
          <li class="nav-item menu-items">
        <a class="nav-link" href="#">
          <span class="menu-icon">
          <i class="mdi mdi-laptop"></i>
          </span>
          <span class="menu-title">Data Jurusan</span>
          <i class="menu-arrow"></i>
        </a>
          </li>
        </ul>
      </nav>
