@extends('Layouts.ClientLayouts.MainLayout')
@section('ClientContent')
@push('parents-client-css')
<link rel="stylesheet" href="{{ asset('/dist/css/adminlte.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .textTrunc {
        /**Major Properties**/
        overflow: hidden;
        line-height: 2rem;
        max-height: 8rem;
        -webkit-box-orient: vertical;
        display: block;
        display: -webkit-box;
        overflow: hidden !important;
        text-overflow: ellipsis;
        -webkit-line-clamp: 4;
    }
</style>
@endpush
<main id="main">
    <div class="breadcrumbs">
        <nav>
            <div class="container">
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="">{{ $aucation->item->category->category }}</a></li>
                    <li>Detail barang {{ $aucation->item->item_name }}</li>
                </ol>
            </div>
        </nav>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog px-4 modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('setBid', $aucation->aucation_id) }}" method="post">
                    @csrf
                <div class="modal-body">
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> 
                        </div>
                        <h3 class="fw-bold">Bid barang</h3>
                        <div class="body py-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="fw-normal text-muted">Masukan harga bid</label>
                                <input type="number" name="bid" value="{{ $aucation->final_price != null ? $aucation->final_price : $aucation->initial_price }}" class="form-control border border-success" id="inputt"
                                    aria-describedby="emailHelp">
                                <small class="text-danger d-none">Harga bid harus sesuai dengan kelipatan bid</small>
                            </div>
                            <div class="btn btn-sm btn-danger fw-bold" id="closeMod">Reset</div>
                            <div class="btn btn-sm btn-success fw-bold" id="addVal">+{{ number_format($aucation->multiple_bid, 0, "", ". ") }}</div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-dark fw-bold rounded-3" style="width:100px">Bid</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <div class="row mt-4">
            <div class="col-12 col-sm-5" style="margin-bottom: 20px">
                <h3 class="d-inline-block d-sm-none text-uppercase">{{ $aucation->item->item_name }} </h3>
                <div class="col-12">
                    <img src="{{ asset($aucation->item->item_main_image) }}" class="product-image" alt="Product Image">
                </div>
                <div class="col-12 product-image-thumbs">
                    <div class="product-image-thumb active"><img src="{{ asset($aucation->item->item_main_image) }}"
                            alt="Product Image"></div>
                    @foreach ($aucation->item->images as $image)
                    <div class="product-image-thumb"><img src="{{ asset($image->image_path) }}" alt="Product Image">
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <h2 class="d-none d-md-block text-uppercase">{{ $aucation->item->item_name }}</h2>
                    <div class="row ">
                        <hr>
                        <div class="col-12">
                            <div class="">
                                <small style="color: #757575">Chipset</small>
                                <h5 class="mb-0">
                                    <i class="bi bi-cpu-fill"></i>
                                    <span style="color: #414141">
                                        {{ $aucation->item->itemDetail->chipset }}
                                    </span>
                                </h5>
                            </div>
                            <div class="mt-2">
                                <div class="">
                                    <small style="color: #757575">Ram / Penyimpanan</small>
                                    <h5 class="mb-0">
                                        <i class="bi bi-memory"></i>
                                        <span style="color: #414141">
                                            {{ $aucation->item->itemDetail->storage }}
                                        </span>
                                    </h5>
                                </div>
                            </div>
                            <div class="mt-2">
                                <div class="">
                                    <small style="color: #757575">Kualitas Layar</small>
                                    <h5 class="mb-0">
                                        <i class="bi bi-{{ $aucation->item->category->category == "Smartphone" ? "phone" : "display" }}"></i>
                                        <span style="color: #414141">
                                            FHD+ IPS Panel
                                        </span>
                                    </h5>
                                </div>
                            </div>
                            <div class="mt-2">
                                <small style="color: #757575">Spesifikasi Kamera</small>
                                <h5 class="mb-0">
                                    <i class="bi bi-camera-fill"></i>
                                    <span style="color: #414141">
                                        Triple Camera 64mp
                                    </span>
                                </h5>
                            </div>
                            <div class="mt-2">
                                <small style="color: #757575">Kapasitas Batrai</small>
                                <h5 class="mb-0">
                                    <i class="bi bi-battery-full"></i>
                                    <span style="color: #414141">
                                        {{ $aucation->item->category->category == 'Laptop' ?  $aucation->item->itemDetail->battery . 'Wh' : $aucation->item->itemDetail->battery .  "mAh" }}
                                    </span>
                                </h5>
                            </div>
                            <div class="mt-2">
                                <small style="color: #757575">Kondisi Barang</small>
                                <h5 class="mb-0">
                                    <h5 class="mb-0">
                                        <span class="badge bg-success rounded-lg btn-success mt-2">BARU</span>
                                    </h5>
                                </h5>
                            </div>
                        </div>
                        <hr class="mt-4">
                        <div class="col-12">
                            <h5>Deskripsi Produk</h5>
                            <div id="descItem" class="textTrunc">
                                {!! $aucation->item->description !!}
                            </div>
                            <a href="javascript:void(0)" id="unTruncate" class="text-primary">Lihat lebih banyak</a>
                            <a href="javascript:void(0)" id="TruncateText" class="d-none text-primary">Lihat lebih
                                sedikit</a>
                        </div>
                    </div>
                    
            </div>
            <div class="col-12 col-sm-3">
                <div class="card position-relative shadow border border-white">
                    <div class="card-body">
                        <h5 class="mt-2" style="font-weight:650">Keterangan lelang</h5>
                        <hr>
                        <div class="mt-3">
                            <span class="text-muted">Setatus lelang</span>
                            <h6 style="font-weight:650"><i class="bi bi-door-{{ $aucation->status == "opened" ? "open": "closed" }} mr-2"></i>{{ $aucation->status == "opened" ? "Di buka": "Di tutup" }}</h6>
                        </div>
                        <div class="mt-3">
                            <span class="text-muted">Tanggal di buka</span>
                            <h6 style="font-weight:650"><i class="bi bi-calendar-event mr-2"></i>{{ $aucation->aucation_date }}</h6>
                        </div>
                        <div class="mt-3">
                            <span class="text-muted">Harga dasar</span>
                            <h6 style="font-weight:650">Rp {{ number_format($aucation->initial_price, 0, "", ". ") }}</h6>
                        </div>
                        <div class="mt-3">
                            <span class="text-muted">Kelipatan bid</span>
                            <h6 style="font-weight:650">Rp {{ number_format($aucation->multiple_bid, 0, "", ". ") }}</h6>
                        </div>
                        <div class="mt-3">
                            @if ($aucation->final_price == null || '')
                                <span class="text-muted">Keterangan</span>
                                <h6 style="font-weight:650">Belum ada yang melakukan bid</h6>
                            @else
                                <span class="text-muted">{{ $aucation->status == "opened" ?'Nilai bid saat ini':'BID terakhir' }}</span>
                                <h6 style="font-weight:650">Rp {{ number_format($aucation->final_price, 0, "", ". ") }} <small style="font-size:12" class="text-muted">By {{ $aucation->user->name }}</small></h6>
                            @endif
                        </div>
                        <hr>
                        <button class="w-100 btn btn-success {{ isset(Auth()->user()->name) && $aucation->status == 'opened' ? '' : 'disabled'  }} fw-bold rounded-3" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">Bid barang</button>
                            <div class="mt-2">
                                <a href="" class="text-black" style="font-weight:650; font-size:12px">
                                    <i class="bi bi-bookmark mr-1"></i>
                                    Tandai lelang 
                                </a>
                            </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="col-12 col-sm-9">
                <div class="container">
                    <h2 class="">BID tertinggi</h2>
                    @forelse ($aucation_histories as $history)
                        <div class="card">
                            <div class="card-body py-2">
                                <div class="d-flex justify-content-between">
                                    <h3>Oleh <a href="" class="text-success" style="font-weight:">{{ $history->user->name }}</a></h3>
                                        <small style="font-size:14px">{{ $history->created_at->diffForHumans() }}</small>
                                    
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h6 class="mt-2">Jumlah bid </h6>
                                    <h4>
                                        Rp {{ number_format($history->price_quotaion, 0, '', '. ') }}
                                    </h4>
                                </div>
                            </div>
                        </div>
                    @empty
                        <h6 class="text-center">Hallo</h6>
                    @endforelse
                </div>
            </div>
            <hr>
            <div class="row mt-2">
                <h2 class="py-2">Barang lelang lainya <a href="{{ route('barangLelang') }}" class="text-success" style="font-size:13px; font-weight:650">Lihat semua</a></h3>
                @forelse ($another_aucations as $another_aucation)
                <div class="col-6 col-sm-3 py-3">
                    <div class="card rounded-4 border-white shadow">
                        <a href="{{ asset($another_aucation->item->item_main_image) }}"
                            data-gallery="portfolio-gallery-app" class="glightbox">
                            <img src="{{ asset($another_aucation->item->item_main_image) }}" class="img-fluid" style="max-width: 100%" alt="">
                        </a>
                            <div class="card-body">
                                <h6><a class="text-success" href="{{ route('lelangDetail', $another_aucation->aucation_id) }}">{{ $another_aucation->item->item_name }}</a> | {{ $another_aucation->status == 'closed' ? 'Tutup' : 'Buka' }}</h6>
                                <h6 class="card-title fw-bold">
                                    Rp {{ number_format($another_aucation->initial_price, 0, '', '. ') }}
                                </h6>
                            </div>
                    </div>
                </div>
                @empty
                    
                @endforelse
            </div>
        </div>
    </div>
</main>
@push('parents-client-js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@if (Session::has('error'))
<script>
    toastr.error("{{ session('error') }}")
</script>
@endif
@if (Session::has('success'))
<script>
    toastr.success("{{ session('success') }}")
</script>
@endif

<script>
    $(document).ready(function () {
        let aucationFinal = {{ !$aucation->final_price ? $aucation->initial_price : $aucation->final_price  }}
        $('#addVal').click(function(){
            aucationFinal += {{ $aucation->multiple_bid }}
            $('#inputt').val(aucationFinal)
            // console.log(aucationFinal);
        })

        $('#closeMod').click(function(){
            aucationFinal = {{ !$aucation->final_price ? $aucation->initial_price : $aucation->final_price }}
            $('#inputt').val(aucationFinal)
        })

        $('.product-image-thumb').on('click', function () {
            var $image_element = $(this).find('img')
            $('.product-image').prop('src', $image_element.attr('src'))
            $('.product-image-thumb.active').removeClass('active')
            $(this).addClass('active')
        });

        $('#unTruncate').click(function () {
            $('#descItem').removeClass('textTrunc')
            $('#TruncateText').removeClass('d-none')
            $(this).addClass('d-none')
        })
        $('#TruncateText').click(function () {
            $('#descItem').addClass('textTrunc')
            $('#unTruncate').removeClass('d-none')
            $(this).addClass('d-none')
        });
    })
</script>
@endpush
@endsection