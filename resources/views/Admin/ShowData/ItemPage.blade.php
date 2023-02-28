@extends('Layouts.AdminLayouts.MainLayout')
@section('ItemPreview')
<!-- Site wrapper -->
<div class="card card-solid">
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-sm-6" style="margin-bottom: 20px">
                <h3 class="d-inline-block d-sm-none text-uppercase">{{ $item->item_name }} <p><span  class="btn btn-sm btn-info rounded" >{{ $item->category->category }}</span></p></h3>
                <div class="col-12">
                    <img src="{{ asset($item->item_main_image) }}" class="product-image" alt="Product Image">
                </div>
                <div class="col-12 product-image-thumbs">
                    <div class="product-image-thumb active"><img src="{{ asset($item->item_main_image) }}"
                            alt="Product Image"></div>
                    @foreach ($item->images as $image)
                    <div class="product-image-thumb"><img src="{{ asset($image->image_path) }}" alt="Product Image">
                    </div>
                    @endforeach
                </div>
            </div>
            <div class=" col-12 col-sm-6 "> 
                <h3 class="d-none d-md-block text-uppercase">{{ $item->item_name }} </h3>
                <span  class="badge badge-info rounded text-capitalized" >{{ $item->category->category }}</span>
                <hr>
                <div class="row mt-4">
                    @if (isset($aucation))
                    <div class="col-6">
                        <div class="wrap">
                            <h6>Tanggal lelang di buka</h6>
                            <h4>{{ $aucation->aucation_date }}</h4>
                        </div>
                        <div class="wrap">
                            <h6>Status</h6>
                            <h4>{{ $aucation->status == "opened" ? "Buka" : "Tutup" }}</h4>
                        </div>
                        <div class="wrap">
                            <h6>Harga dasar</h6>
                            <h4>Rp {{ number_format($aucation->initial_price, 0, "", ". ") }}</h4>
                        </div>
                        <div class="wrap">
                            <h6>Kelipatan bid</h6>
                            <h4>Rp {{ number_format($aucation->multiple_bid, 0, "", ". ") }}</h4>
                        </div>
                        <div class="wrap">
                            <h6>Harga Akhir</h6>
                            <h4>{{ $aucation->user_id == null ? "Belum ada yang melakukan bid" : "Rp ".number_format($aucation->final_price, 0, "", ". "). "oleh" . $aucation->user->name  }}</h4>
                        </div>
                        <div class="wrap">
                            <h6>Petugas lelang di buka</h6>
                            <h4>{{ $aucation->officer->officer_name }}</h4>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="wrap">
                            <h6>Chipset</h6>
                            <h4>{{ $item->itemDetail->chipset }}</h4>
                        </div>
                        <hr>
                        <div class="wrap">
                            <h6>Layar</h6>
                            <h4>{{ $item->itemDetail->display }}</h4>
                        </div>
                        <hr>
                        <div class="wrap">
                            <h6>Penyimpanan</h6>
                            <h4>{{ $item->itemDetail->storage }}</h4>
                        </div>
                        <hr>
                        <div class="wrap">
                            <h6>Kamera</h6>
                            <h4>{{ $item->itemDetail->camera }}</h4>
                        </div>
                        <hr>
                        <div class="wrap">
                            <h6>Batrai</h6>
                            <h4>{{ $item->itemDetail->battery }}<small>{{ $item->category->category == 'Laptop' ? 'Wh' : 'mAh' }}</small> </h4>
                        </div>
                        <hr>
                    </div>
                    @else
                    <div class="col-12">
                        <div class="wrap">
                            <h6>CHIPSET</h6>
                            <h4>{{ $item->itemDetail->chipset }}</h4>
                        </div>
                        <hr>
                        <div class="wrap">
                            <h6>LAYAR</h6>
                            <h4>{{ $item->itemDetail->display }}</h4>
                        </div>
                        <hr>
                        <div class="wrap">
                            <h6>Penyimpanan</h6>
                            <h4>{{ $item->itemDetail->storage }}</h4>
                        </div>
                        <hr>
                        <div class="wrap">
                            <h6>Kamera</h6>
                            <h4>{{ $item->itemDetail->camera }}</h4>
                        </div>
                        <hr>
                        <div class="wrap">
                            <h6>Batrai</h6>
                            <h4>{{ $item->itemDetail->battery }} <small>mAh</small> </h4>
                        </div>
                        <hr>
                    </div>
                    @endif
                </div>
                @if (isset($aucation))
                    <a href="javascript:void(0)" status={{ $aucation->status }} data-id="{{ $aucation->aucation_id }}" class="btn btn-{{ $aucation->status == 'closed' ? 'success' : 'danger' }} swalTrigger my-4">{{ $aucation->status == "closed" ? "Buka " : "Tutup " }} Lelang</a>
                @endif
                <h6 class="mt-2">Deskripsi :</h6>
                <p>
                    {!! $item->description !!} 
                </p>

                <hr>    

                
            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>

@push('parents-js')
@if (Session::has('success'))
    <script>toastr.success('{{ session('success') }}')</script>
@endif
@if (Session::has('error'))
    <script>toastr.error('{{ session('error') }}')</script>
@endif

<script>
    $(document).ready(function () {
        $('.swalTrigger').click(function () {
            const id = $(this).attr('data-id')
            const status = $(this).attr('status')
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success ml-3',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })
            swalWithBootstrapButtons.fire({
                title: status == "opened" ? 'Apakah kamu yakin ingin menutup' : 'Apakah kamu yakin ingin membuka' + ' lelang?',
                html: "<small style='color:white'>Barang yang di hapus tidak bisa dikembalikan!</small>",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya!',
                cancelButtonText: 'Tidak!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    swalWithBootstrapButtons.fire(
                        status == "opened" ? 'Tertutup!' : 'Terbuka!',
                        status == "opened" ? 'Kamu berhasil menutup lelang' : 'Kamu berhasil membuka lelang',
                        'success'
                    )
                    setTimeout(function() {
                        window.location = "../update-status/" + id 
                    }, 500);
                } else if (
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Batal',
                        status == "opened" ? 'Tidak jadi menutup lelang' : 'Tidak jadi membuka lelang',
                        'error'
                    )
                }
            })
        });
        $('.product-image-thumb').on('click', function () {
            var $image_element = $(this).find('img')
            $('.product-image').prop('src', $image_element.attr('src'))
            $('.product-image-thumb.active').removeClass('active')
            $(this).addClass('active')
        })
    })
</script>
@endpush

@endsection