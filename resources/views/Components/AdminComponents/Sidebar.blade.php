<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ route('Dashboard') }}" class="brand-link">
    <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="{{ route('profilPegawai', Auth()->guard('officer')->user()->officer_id ) }}" class="d-block">{{ Auth()->guard('officer')->user()->officer_name }}</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
          <a href="#" class="nav-link {{ $title == "Dashboard" ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('Dashboard') }}" class="nav-link {{ $page_title == "Dashboard" ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item menu-open">
          <a href="#" class="nav-link {{ $title == "Lelang" ? 'active' : '' }}">
            <i class="nav-icon fas fa-flag"></i>
            <p>
              Lelang
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('listLelang') }}" class="nav-link {{ $page_title == "List Lelang" ? 'active' : '' }}">
                <i class="fas fa-table nav-icon"></i>
                <p>List Lelang</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('tambahLelang') }}" class="nav-link {{ $page_title == "Tambah Lelang" ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Tambah Lelang</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('riwayatLelang') }}" class="nav-link {{ $page_title == "Riwayat Lelang" ? 'active' : '' }}">
                <i class="fas fa-history nav-icon"></i>
                <p>Riwayat Lelang</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item menu-open">
          <a href="#" class="nav-link {{ $title == "Barang" ? 'active' : '' }}">
            <i class="nav-icon fas fa-boxes"></i>
            <p>
              Barang
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('listBarang') }}" class="nav-link {{ $page_title == "List Barang" ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>List Barang</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('tambahBarang') }}" class="nav-link {{ $page_title == "Tambah Barang" ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Tambah Barang</p>
              </a>
            </li>
          </ul>
        </li>
        @if (Auth()->guard('officer')->user()->level->level == "Administrator")
        <li class="nav-item menu-open">
          <a href="#" class="nav-link {{ $title == "Pegawai" ? 'active' : '' }}">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Pegawai
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('listPegawai') }}" class="nav-link {{ $page_title == "List Pegawai" ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>List Pegawai</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('tambahPegawai') }}" class="nav-link {{ $page_title == "Tambah Pegawai" ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Tambah Pegawai</p>
              </a>
            </li>
          </ul>
        </li>
        @endif
        <li class="nav-item menu-open">
          <a href="#" class="nav-link {{ $title == "Kategori" ? 'active' : '' }}">
            <i class="nav-icon fas fa-box"></i>
            <p>
              Kategori
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('listKategori') }}" class="nav-link {{ $page_title == "List Kategori" ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>List Kategori</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('tambahKategori') }}" class="nav-link {{ $page_title == "Tambah Kategori" ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Tambah Kategori</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item menu-open">
          <a href="#" class="nav-link {{ $title == "Merek" ? 'active' : '' }}">
            <i class="nav-icon fas fa-box"></i>
            <p>
              Merek
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('listMerek') }}" class="nav-link {{ $page_title == "List Merek" ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>List Merek</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('tambahMerek') }}" class="nav-link {{ $page_title == "Tambah Merek" ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Tambah Merek</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="pages/widgets.html" class="nav-link ">
            <i class="nav-icon fas fa-envelope"></i>
            <p>
              Pesan
              <span class="right badge badge-danger">New</span>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('adminLogout') }}" class="nav-link ">
            <i class="nav-icon fas"></i>
            <p>
              Logout
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>