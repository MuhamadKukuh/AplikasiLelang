@extends('Layouts.ClientLayouts.MainLayout')
@section('ClientContent')
@push('parents-client-css')
<link rel="stylesheet" href="{{ asset('/dist/css/adminlte.min.css') }}">
<style>
.textTrunc{
  /**Major Properties**/
  overflow:hidden;
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
                    <li><a href="index.html">Home</a></li>
                    <li>Detail barang lelang</li>
                </ol>
            </div>
        </nav>
    </div>

    <!-- Modal -->
    {{-- <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="post">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Bid barang</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Masukan harga bid</label>
                        <input type="number" value="{{ $item->initial_price }}" class="form-control" id="inputt"
    aria-describedby="emailHelp">
    </div>
    <div class="btn btn-sm btn-danger" id="closeMod">Reset</div>
    <div class="btn btn-sm btn-info" id="addVal">50 000</div>
    </div>
    <div class="modal-footer">
        <div type="button" id="closeMod" class="btn btn-secondary" data-bs-dismiss="modal">Close</div>
        <button type="button" class="btn btn-primary">Bid</button>
    </div>
    </form>
    </div> --}}
    {{-- </div>
            </div> --}}

    <div class="card card-solid">
        <div class="card-body">
            <div class="container">
                <div class="row mt-4">
                    @foreach ($aucation->aucationItems as $item)
                    <div class="col-12 col-sm-5" style="margin-bottom: 20px">
                        <h3 class="d-inline-block d-sm-none text-uppercase">{{ $item->items->item_name }} <p><span
                                    class="badge badge-sm rounded"
                                    style="background-color: #008374; color:white">Smartphone</span></p>
                        </h3>
                        <div class="col-12">
                            <img src="{{ asset($item->items->item_main_image) }}" class="product-image"
                                alt="Product Image">
                        </div>
                        <div class="col-12 product-image-thumbs">
                            <div class="product-image-thumb active"><img
                                    src="{{ asset($item->items->item_main_image) }}" alt="Product Image"></div>
                            @foreach ($item->items->images as $image)
                            <div class="product-image-thumb"><img src="{{ asset($image->image_path) }}"
                                    alt="Product Image">
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-12 col-sm-4">
                        <h2 class="d-none d-md-block text-uppercase">{{ $item->items->item_name }}<p
                                class="d-none d-md-block"><span class="badge badge-sm rounded text-capitalized"
                                    style="background-color: #008374; color:white">Smartphone</span></p>
                            </h1>
                            <hr>
                            <div class="row">
                                <div class="col-12">
                                    <div class="">
                                        <small style="color: #757575">Chipset</small>
                                        <h5 class="mb-0">
                                            <i class="bi bi-cpu-fill"></i>
                                            <span style="color: #414141">
                                                QUALCOM SNAPDRAGON 860
                                            </span>
                                        </h5>
                                    </div>
                                    <div class="mt-2">
                                        <div class="">
                                            <small style="color: #757575">Ram / Penyimpanan</small>
                                            <h5 class="mb-0">
                                                <i class="bi bi-memory"></i>
                                                <span style="color: #414141">
                                                    6/128GB
                                                </span>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <div class="">
                                            <small style="color: #757575">Kualitas Layar</small>
                                            <h5 class="mb-0">
                                                <i class="bi bi-phone"></i>
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
                                                5000mAh
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
                                        {!! $item->items->description !!} 
                                    </div>
                                    <small id="unTruncate" class="text-primary">lihat lebih banyak</small>
                                </div>
                            </div>
                            <hr>
                    </div>
                    {{-- @dd($item->items) --}}
                    @if ($loop->iteration == 1)
                    <div class="col-12 col-sm-3 position-sticky " id="header">
                        <div class="card sticky-top" style="width: 18rem;">
                            <div class="card-header" style="background-color:#008374; color:white">
                                <h4>BID BARANG</h4>
                            </div>
                            <div class="card-body">
                                <div class="col-12">
                                    <div class="">
                                        <small style="color: #757575">Tanggal di tutup</small>
                                        <h5 class="mb-0">
                                            <i class="bi bi-calendar-event-fill"></i>
                                            <span style="color: #414141">
                                                {{ $aucation->aucation_date }}
                                            </span>
                                        </h5>
                                    </div>
                                    <div class="mt-2">
                                        <small style="color: #757575">Satatus</small>
                                        <h5 class="mb-0">
                                            <i class="bi bi-door-{{ $aucation->status == "closed" ? "closed" : "open" }}-fill"></i>
                                            <span style="color: #414141">
                                                {{ $aucation->status == "closed" ? "Tutup" : "Buka" }}
                                            </span>
                                        </h5>
                                    </div>
                                    <div class="mt-2">
                                        <small style="color: #757575">Bid Terakhir</small>
                                        <h5 class="mb-0">
                                            <span style="color: #414141">
                                                {{ $aucation->final_price == null ? "Belum ada yang melakukan bid" : "Rp ".number_format($aucation->initial_price, 0, '.', '. ') }}
                                                <small
                                                    style="color: #757575; font-size: small">{{ $aucation->user_id == null ? "" : "Oleh " . $aucation->user->username  }}</small>

                                            </span>
                                        </h5>
                                    </div>
                                    <div class="mt-2">
                                        <small style="color: #757575">Harga Dasar</small>
                                        <div class="row mt-2">
                                            <div class="col-12">
                                                <h5 class="mb-0">
                                                    <span style="color: #414141">
                                                        Rp {{ number_format($aucation->initial_price, 0, "", ". ") }}
                                                    </span>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <small style="color: #757575">Kelipatan Bid</small>
                                        <h5 class="mb-0">
                                            <span style="color: #414141">
                                                Rp {{ number_format($aucation->multiple_bid, 0, "", ". ") }}
                                            </span>
                                        </h5>
                                    </div>

                                    <div class="mt-4">
                                        <div class="btn {{ $aucation->status == "opened" ? "": "disabled" }} rounded btn-lg btn-flat"
                                            data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                            style="background-color: #008374; color:white">
                                            Bid barang
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <hr>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
</main>
@push('parents-client-js')
<script>
    $(document).ready(function () {
        
        $('.product-image-thumb').on('click', function () {
            var $image_element = $(this).find('img')
            $('.product-image').prop('src', $image_element.attr('src'))
            $('.product-image-thumb.active').removeClass('active')
            $(this).addClass('active')
        })
        let myPrice = {
            {
                $item - > initial_price
            }
        }
        $('#addVal').on('click', function () {
            myPrice += 50000;
            $('#inputt').val(myPrice)
        })
        $('#closeMod').on('click', function () {
            myPrice = {
                {
                    $item - > initial_price
                }
            }
            $('#inputt').val(myPrice)
        })
    })
</script>
@endpush
@endsection