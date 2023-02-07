@extends('Layouts.AdminLayouts.MainLayout')
@section('ItemPreview')
<!-- Site wrapper -->
<div class="card card-solid">
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-sm-6" style="margin-bottom: 20px">
                <h3 class="d-inline-block d-sm-none text-uppercase">{{ $item->item_name }} <p><span  class="btn btn-sm btn-info rounded" >Barang Elektronik</span></p></h3>
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
                <h3 class="d-none d-md-block my-3 text-uppercase">{{ $item->item_name }} </h3>
                <p class="d-none d-md-block"><span  class="btn btn-sm btn-info rounded text-capitalized" >Barang Elektronik</span></p>
                <p>
                    {!! $item->description !!} Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero magnam ipsa quasi quidem ad eos suscipit fugiat hic minima laboriosam omnis accusantium nihil quis neque natus, doloribus quaerat modi? Quas! Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta aliquam suscipit ex! Tempore quod ipsum accusantium, tenetur voluptate non eveniet.
                </p>

                <hr>
                {{-- <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-default text-center active">
                        <input type="radio" name="color_option" id="color_option_a1" autocomplete="off" checked>
                        Green
                        <br>
                        <i class="fas fa-circle fa-2x text-green"></i>
                    </label>
                    <label class="btn btn-default text-center">
                        <input type="radio" name="color_option" id="color_option_a2" autocomplete="off">
                        Blue
                        <br>
                        <i class="fas fa-circle fa-2x text-blue"></i>
                    </label>
                    <label class="btn btn-default text-center">
                        <input type="radio" name="color_option" id="color_option_a3" autocomplete="off">
                        Purple
                        <br>
                        <i class="fas fa-circle fa-2x text-purple"></i>
                    </label>
                    <label class="btn btn-default text-center">
                        <input type="radio" name="color_option" id="color_option_a4" autocomplete="off">
                        Red
                        <br>
                        <i class="fas fa-circle fa-2x text-red"></i>
                    </label>
                    <label class="btn btn-default text-center">
                        <input type="radio" name="color_option" id="color_option_a5" autocomplete="off">
                        Orange
                        <br>
                        <i class="fas fa-circle fa-2x text-orange"></i>
                    </label>
                </div> --}}
                <div class="bg-gray py-2 px-3 mt-4">
                    <h2 class="mb-0">
                        Rp {{ number_format($item->initial_price, 0, '.', '. ') }}
                    </h2>
                </div>

                <div class="mt-4">
                    <div class="btn btn-primary btn-lg btn-flat" style="width:200px">
                        <i class="fas fa-flag fa-lg mr-2"></i>
                        Buka Lelang
                    </div>
                </div>

                
            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>

@push('parents-js')
<script>
    $(document).ready(function () {
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