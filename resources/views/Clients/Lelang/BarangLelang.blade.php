@extends('Layouts.ClientLayouts.MainLayout')
@section('ClientContent')
<section class="aucationHero">
    <div class="container">
        <div class="row">
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

        <div class="container mt-5">
            <div class="row boreder-white shadow rounded-4">
                <div class="col-12 col-sm-6 px-4 py-4 ">
                    <h4 class="fw-bold">Cari Lelang</h4>
                    <form action="" method="GET">
                    <div class="row py-5">
                        @foreach ($categories as $listCategory)
                        <div class="col-3">
                            <div class="card border-white shadow">
                                {{--  --}}
                                <div class="card-body"
                                    style="background-image: url({{ asset('/imagesAsset/lapotpC.png') }}); background-size: cover; height:100px">
                                    <input {{ isset($_GET['category']) && $_GET['category'] == $listCategory->category_id ? 'checked' : '' }} type="radio" value="{{ $listCategory->category_id }}" name="category">
                                </div>
                                <div class="card-footer border-white bg-white d-flex justify-content-center">
                                    <small class="fw-bold">{{ $listCategory->category }}</small>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="row ">
                        <div class="col-8 mt-2">
                            <div class="form-group" style="font-size:12px">
                                <label for="" class="text-muted">Urut berdasarkan</label>
                                <select name="orderBy" class="form-control" id="">
                                    <option value="DESC" {{ isset($_GET['orderBy']) && $_GET['orderBy'] == "DESC" ? 'selected' : '' }}>Terbaru</option>
                                    <option {{ isset($_GET['orderBy']) && $_GET['orderBy'] == "ASC" ? 'selected' : '' }} value="ASC">Terlama</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4 mt-4">
                            <div class="form-group">
                                <button class="btn btn-dark form-control">Cari</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="col-12 col-sm-6 px-4 py-4 ">
                    <div class="d-flex justify-content-between">
                        <h4 class="fw-bold ">Jadwal lelang hari ini </h4>
                        <h4>
                            <a class="text-finish fw-bold" style="font-size:16px" href="">Lihat semua</a>
                        </h4>
                    </div>
                    @forelse ($aucation_today as $aucationNow)
                    <div id="port-folio" class="portfolio">
                        <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
                            data-portfolio-sort="original-order" data-aos="fade-up" data-aos-delay="100">

                            <div class="">
                                <ul class="d-flex justify-content-start portfolio-flters">
                                    <li data-filter="*" class="filter-active">Semua</li>
                                    @foreach ($categories as $category)
                                    <li data-filter=".filter-{{ $category->category }}">{{ $category->category }}</li>
                                    @endforeach
                                </ul><!-- End Portfolio Filters -->
                            </div>

                            <div class="row gy-4 portfolio-container">
                                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner" style="height:100%">
                                        <div class="carausel-item {{ $loop->iteration == 1 ? 'active' : '' }} col-xl-3 col-md-6 portfolio-item border rounded-4 filter-{{ $aucationNow->item->category->category }}"
                                            style="height: fit-content">
                                            <div class="portfolio-wrap">
                                                <a href="{{ asset($aucationNow->item->item_main_image) }}"
                                                    data-gallery="portfolio-gallery-app" class="glightbox"><img
                                                        src="{{ asset($aucationNow->item->item_main_image) }}"
                                                        class="img-fluid" alt=""></a>
                                                <div class="portfolio-info">
                                                    <h4>
                                                        <a href="{{ route('lelangDetail', $aucationNow->aucation_id) }}"
                                                            title="Detail barang">{{ $aucationNow->item->item_name }}</a>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div><!-- End Portfolio Item -->
                                    </div>
                                    <button class="carousel-control-prev " type="button"
                                        data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Sebelumnya</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Selanjutnya</span>
                                    </button>
                                </div>
                            </div><!-- End Portfolio Container -->

                        </div>
                    </div>
                    @empty
                        <h4 class="fw-bold text-center" style="margin-top: 100px">Tidak ada barang <br> yang sedang di lelang hari ini <br>...</h4>
                    @endforelse
                </div>
            </div>
        </div>
        <hr class="my-4">
        <div class="container">
            <div class="row py-2">
                <div class="d-flex justify-content-start">
                    <h4 class="fw-bold">Barang Lelang</h4>
                </div>
                <div class="mt-3">
                    <div class="row">
                        @foreach ($aucations as $aucation)
                        <div class="col-3">
                            <div class="card rounded-4 border-white shadow">
                                <a href="{{ asset($aucation->item->item_main_image) }}"
                                    data-gallery="portfolio-gallery-app" class="glightbox">
                                    <img src="{{ asset($aucation->item->item_main_image) }}" class="img-fluid" style="max-width: 100%" alt="">
                                </a>
                                    <div class="card-body">
                                        <h6><a href="{{ route('lelangDetail', $aucation->aucation_id) }}">{{ $aucation->item->item_name }}</a> | {{ $aucation->status == 'closed' ? 'Tutup' : 'Buka' }}</h6>
                                        <h6 class="card-title fw-bold">
                                            Rp {{ number_format($aucation->initial_price, 0, '', '. ') }}
                                        </h6>
                                    </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                    </ul>
                </nav>
                {{ $aucations->withQueryString()->links() }}
            </div>
        </div>
</section>



@endsection