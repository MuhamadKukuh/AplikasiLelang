@extends('Layouts.ClientLayouts.MainLayout')
@section('ClientContent')
<section class="aucationHero">
    <div class="container">
        <div class="row d-block d-sm-none">
            <form action="" class="form-group">
                <h4 class="text-center">Cari barang</h4>
                <div class="d-flex">
                    <input type="text" name="search" style="border-radius: 15px 0px 0px 15px;
                   " class="form-control">
                    <button class="text-white border-0 px-4 rounded-right" style=" border-radius: 0px 15px 15px 0px;
                    background: rgb(0, 174, 23);;"><i class="bi bi-search"></i></button>
                </div>
            </form>
        </div>
        <div class="row d-sm-block d-none">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators d-flex justify-content-start">
                    @foreach ($categories as $category)
                    <button type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide-to="{{ $loop->iteration - 1 }}" class="active" aria-current="true"
                        aria-label="Slide"></button>
                    @endforeach
                </div>
                <div class="carousel-inner rounded-4" style="max-height:375px">
                    @foreach ($categories as $category)
                    <a href="" class="carousel-item {{ $loop->iteration == 1 ? 'active' : '' }}">
                        <img src="{{ asset('imagesAsset/croppedLap.jpg') }}" style="height: 375px" class="d-block w-100"
                            alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h1 class="text-start fw-bold">{{ $category->category }}</h1>
                            <p class="text-start">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus,
                                aut!.</p>
                        </div>
                    </a>
                    @endforeach
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="container mt-5 d-sm-block d-none">
            <div class="row boreder-white shadow rounded-4">
                <div class="col-12 col-sm-6 px-4 py-4 ">
                    <h4 class="fw-bold">Cari Lelang</h4>
                    <form action="" method="GET">
                        <div class="row py-5">
                            @foreach ($categories as $listCategory)
                            <div class="col-6">
                                <div class="card border-white shadow">
                                    {{--  --}}
                                    <div class="card-body"
                                        style="background-image: url({{ $listCategory->category == "Laptop" ? asset('/imagesAsset/lapotpC.png') : asset('imagesAsset/phonePNG.png') }}); background-size: cover; height:200px">
                                        <input class="form-check-input"
                                            {{ isset($_GET['category']) && $_GET['category'] == $listCategory->category_id ? 'checked' : '' }}
                                            type="radio" value="{{ $listCategory->category_id }}" name="category">
                                    </div>
                                    <div class="card-footer border-white bg-white d-flex justify-content-center">
                                        <small class="fw-bold">{{ $listCategory->category }}</small>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="row ">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="" class="text-muted">Urut berdasarkan</label>
                                    <select name="status" class="form-control" id="">
                                        <option value="opened" {{ isset($_GET['status']) && $_GET['status'] == "opened" ? 'selected' : '' }}>Buka</option>
                                        <option value="closed" {{ isset($_GET['status']) && $_GET['status'] == "closed" ? 'selected' : '' }}>Tutup</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="" class="text-muted">Urut berdasarkan</label>
                                    <select name="orderBy" class="form-control" id="">
                                        <option value="DESC"
                                            {{ isset($_GET['orderBy']) && $_GET['orderBy'] == "DESC" ? 'selected' : '' }}>
                                            Terbaru</option>
                                        <option
                                            {{ isset($_GET['orderBy']) && $_GET['orderBy'] == "ASC" ? 'selected' : '' }}
                                            value="ASC">Terlama</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-2 mt-4">
                                <div class="form-group">
                                    <button class="btn text-white form-control" style="background-color: #f85a40"><i class="bi bi-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-12 col-sm-6 px-4 py-4 ">
                    <div id="portfolio" class="portfolio">
                        <div class="container" data-aos="fade-up">
                            <div class="d-flex justify-content-between">
                                <h4 class="fw-bold ">Lelang hari ini</h4>
                                <h4>
                                    <a class="text-finish fw-bold"  style="font-size:14px; color: rgb(0, 174, 23)" href="{{ route("aucationDate") }}">Lihat semua</a>
                                </h4>
                            </div>
                            <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
                                data-portfolio-sort="original-order" data-aos="fade-up" data-aos-delay="100">
                                <div>
                                    <ul class="portfolio-flters d-flex justify-content-start">
                                        <li data-filter="*" class="filter-active" >Semua</li>
                                        @foreach ($categories as $category)
                                            <li data-filter=".filter-{{ $category->category }}">{{ $category->category }}</li>
                                        @endforeach
                                    </ul><!-- End Portfolio Filters -->
                                </div>
                                <div class="row gy-4 portfolio-container">
                                    @foreach ($aucation_today as $now)
                
                                    <div class="col-12 col-sm-4 mb-3 portfolio-item filter-{{ $now->item->category->category }}">
                                        <div class="card rounded-4 border-white shadow">
                                            <a href="{{ asset($now->item->item_main_image) }}"
                                                data-gallery="portfolio-gallery-app" class="glightbox">
                                                <img src="{{ asset($now->item->item_main_image) }}" class="img-fluid"
                                                    style="max-width: 100%; max-height:300px" alt="">
                                            </a>
                                            <div class="card-body">
                                                <h6><a
                                                        href="{{ route('lelangDetail', $now->aucation_id) }}">{{ ucfirst($now->item->item_name) }} </a>
                                                    | {{ $now->status == 'closed' ? 'Tutup' : 'Buka' }}</h6>
                                                <h6 class="card-title fw-bold">
                                                    Rp {{ !$now->final_price ? number_format($now->initial_price, 0, '', '. ') : number_format($now->final_price, 0, '', '. ') }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div><!-- End Portfolio Item -->
                
                                    @endforeach
                                </div><!-- End Portfolio Container -->
                
                            </div>
                
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (false)
        <!--<hr class="my-4">
         <div class="container">
            <div class="row py-2">
                <h4 class="fw-bold">Barang yang dimenangkan</h4>
            </div>
            <div class="mt-3">
                <div class="row">
                    @foreach ($wins as $win)
                        <div class="col-6">
                            <div class="card border-white shadow py-2">
                                <div class="card-body">
                                    <span class="badge bg-success">Menang</span>
                                    <div class="card-title mt-3">
                                        <div class="justify-content-between d-flex">
                                            <h5  class="fw-bold">
                                                Anda melakuakan bid pada barang
                                            </h5>
                                            <p class="d-none d-lg-block">Pada tanggal {{ substr($win->created_at, 0, 10) }}</p>
                                        </div>
                                    </div>
                                    <div class="card-subtitle justify-content-between d-flex">
                                        <a href="{{ route('lelangDetail', $win->aucation->aucation_id) }}" class="fw-bold display-6">{{ $win->aucation->item->item_name }}</a>
                                        <p class="d-lg-none">{{ substr($win->created_at, 0, 10) }}</p>
                                    </div>
                                    <div class="py-3">
                                        <label for="" title="Jumlah bid yang anda masukan">Nilai <span class="text-success">lelang</span> saat ini : </label> 
                                        <label for="" class="text-success">Rp {{ number_format($win->aucation->final_price, 0, "", ". ") }}</label>
                                        <div class="justify-content-between d-flex mt-2">
                                            <p>Nilai yang anda tawarkan :</p>
                                            <h1 class="d-none d-lg-block">Rp {{ number_format($win->price_quotaion, 0, "", ". ") }}</h1>
                                            <h6 class="d-lg-none">Rp {{ number_format($win->price_quotaion, 0, "", ". ") }}</h6>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        {{-- <button class="btn btn-dark">Unduh PDF</button> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div> -->
        @endif
        <hr class="my-4">
        <div class="container">
            <div class="row py-2">
                <div class="d-flex justify-content-start">
                    <h4 class="fw-bold">Barang Lelang</h4>
                </div>
                <div class="mt-3">
                    <div class="row">
                        @foreach ($aucations as $aucation)
                        <div class="col-12 col-sm-3 mb-3">
                            <div class="card rounded-4 border-white shadow">
                                <a href="{{ asset($aucation->item->item_main_image) }}"
                                    data-gallery="portfolio-gallery-app" class="glightbox">
                                    <img src="{{ asset($aucation->item->item_main_image) }}" class="img-fluid"
                                        style="max-width: 100%; max-height:300px" alt="">
                                </a>
                                <div class="card-body">
                                    <h6><a
                                            href="{{ route('lelangDetail', $aucation->aucation_id) }}">{{ ucfirst($aucation->item->item_name) }}</a>
                                        | {{ $aucation->status == 'closed' ? 'Tutup' : 'Buka' }}</h6>
                                    <h6 class="card-title fw-bold">
                                        Rp {{ number_format($aucation->initial_price, 0, '', '. ') }}
                                    </h6>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    {{ $aucations->withQueryString()->links() }}
                </div>
                
            </div>
        </div>
</section>



@endsection