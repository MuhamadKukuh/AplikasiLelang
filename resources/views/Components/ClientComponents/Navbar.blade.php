<header id="header" class="header bg-white d-flex align-items-center">

    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
        <a href="{{ route('home') }}" class="logo d-flex align-items-center">
            <h1 style="color:rgb(0, 174, 23)">Legit<span>.</span></h1>
        </a>
        <div class="col-6 d-none d-sm-block">
            <form action="/daftar-barang-lelang">
                <div class="">
                    <input name="search" value="{{ isset($_GET['search']) ? $_GET['search'] : '' }}" type="text" class="form-control rounded-3 border-muted custom-control" placeholder="Cari barang">
                </div>
            </form>
        </div>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a style="color: rgb(0, 174, 23)" href="{{ route('aucationDate') }}" class="{{ $page_title == "Jadwal Lelang" ? "active" : '' }}">Jadwal lelang</a></li> 
                @auth
                <li><a style="color: rgb(0, 174, 23)" href="{{ route('historyLelang') }}" class="{{ $page_title == "Riwayat Lelang" ? "active" : '' }}">Riwayat Lelang</a></li>
                <li class="dropdown"><a href="{{ route('profileClients') }}"><span><img src="{{ asset('dist/img/avatar.png') }}" class="rounded-circle"
                    style="max-width: 50px; max-height:50px" alt=""></span></a>
                    <ul>
                        <li><a style="color: rgb(0, 174, 23)" href="{{ route('userLogout') }}">Logout</a></li>
                    </ul>
                </li>
                @else
                <li><a style="color: rgb(0, 174, 23)" href="{{ route('loginIndex') }}">Masuk</a></li>
                @endauth
            </ul>
        </nav><!-- .navbar -->

        <i class="mobile-nav-toggle mobile-nav-show bi bi-list " style="color: rgb(0, 174, 23)"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x " style="color: rgb(0, 174, 23)"></i>

    </div>
</header>
{{-- <div class="">dsada</div> --}}
<!-- End Header -->
<!-- End Header -->
<!-- Vertically centered modal -->
