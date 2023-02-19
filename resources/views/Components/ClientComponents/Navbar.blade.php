<!-- ======= Header ======= -->
<section id="topbar" class="topbar d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
            <i class="bi bi-envelope d-flex align-items-center"><a
                    href="mailto:contact@example.com">contact@example.com</a></i>
            <i class="bi bi-phone d-flex align-items-center ms-4"><span>+1 5589 55488 55</span></i>
        </div>
        <div class="social-links d-none d-md-flex align-items-center">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
        </div>
    </div>
</section><!-- End Top Bar -->

<header id="header" class="header d-flex align-items-center">

    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">
            <h1>Legit<span>.</span></h1>
        </a>
        <nav id="navbar" class="navbar">
            <ul>
                @auth
                <li><a href="#hero">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#portfolio">Portfolio</a></li>
                <li><a href="#team">Team</a></li>
                <li><a href="blog.html">Blog</a></li>
                @else
                <li><button class="btn fw-bolder text-white" clicked data-bs-toggle="modal" data-bs-target="#loginModal" href="">Masuk</button></li>
                @endauth
            </ul>
        </nav><!-- .navbar -->

        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
          
    </div>
</header><!-- End Header -->
<!-- End Header -->
<!-- Vertically centered modal -->

<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered px-5">
        <div class="modal-content">
            <div class="modal-body">
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>    
                </div>
                <div class="container">
                    <div class="container py-4">
                        <div class="my-5 d-flex justify-content-between" style="align-items: center">
                                <h3 style=' display: block;
                                position: relative;
                                font-weight: 800;
                                font-size: 2rem;
                                line-height: 34px;
                                letter-spacing: -0.4px;
                                color: var(--NN950,#212121);
                                text-decoration: initial;' class="" id="exampleModalLabel">Masuk</h3>
                                <a class="" style="font-weight:600; font-size:13px" href="">Daftar</a>
                        </div>
                        <form action="{{ route('loginUser') }}" method="post">
                            @csrf
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label" style="color:#474646; font-weight:600; font-size:13px">Email atau Nomor HP</label>
                              <input type="email" class="form-control border border-success" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-4">
                              <label for="exampleInputEmail1" class="form-label" style="color:#474646; font-weight:600; font-size:13px">Kata sandi</label>
                              <input type="email" class="form-control border border-success" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="d-flex justify-content-end mb-2">
                                <a class="" style="font-weight:500; font-size:13px" href="">Lupa kata sandi?</a>
                            </div>
                            <div class="d-flex justify-content-center mb-5">
                                <button class="btn btn-success w-100 fw-bold" style="padding-top:10px; padding-bottom:10px;">Masuk</button>
                            </div>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>