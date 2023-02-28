<header id="header" class="header d-flex align-items-center">

    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">
            <h1>Legit<span>.</span></h1>
        </a>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="{{ route('home') }}" class="{{ $page_title == "Home" ? "active" : '' }}">Home</a></li>
                <li class="dropdown"><a href="{{ route('barangLelang') }}" class="{{ $page_title == "Lelang" ? "active" : '' }}">Lelang</span></a>
                    <ul>
                        {{-- <li><a href="#">Jadwal Lelang</a></li> --}}
                        <li><a href="{{ route('barangLelang') }}">Barang Lelang</a></li>
                    </ul>
                </li>
                @auth
                <li><a href="{{ route('historyLelang') }}" class="{{ $page_title == "Riwayat Lelang" ? "active" : '' }}">Riwayat Lelang</a></li>
                <li class="dropdown"><a href="#"><span><img src="{{ asset('dist/img/avatar.png') }}" class="rounded-circle"
                    style="max-width: 50px; max-height:50px" alt=""></span></a>
                    <ul>
                        {{-- <li><a href="{{ route('profileClients', Auth()->user()->user_id) }}">Profile</a></li> --}}
                        <li><a href="{{ route('userLogout') }}">Logout</a></li>
                    </ul>
                </li>
                @else
                <li><a href="{{ route('loginIndex') }}">Masuk</a></li>
                @endauth
            </ul>
        </nav><!-- .navbar -->

        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
</header><!-- End Header -->
<!-- End Header -->
<!-- Vertically centered modal -->
