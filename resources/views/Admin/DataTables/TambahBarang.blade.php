@extends('Layouts.AdminLayouts.MainLayout')
@section('AdminContent')
@push('parents-css')
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
<!-- CodeMirror -->
<link rel="stylesheet" href="{{ asset('plugins/codemirror/codemirror.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/codemirror/theme/monokai.css') }}">
<!-- SimpleMDE -->
<link rel="stylesheet" href="{{ asset('plugins/simplemde/simplemde.min.css') }}">
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush
<div class="row">

    <div class="col-md-12">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ isset($item) ? route('ubahBarang', $item->item_id) : route('simpanBarang') }}"
            enctype="multipart/form-data" method="post">
            @csrf
            <div class="card card-outline card-info">
                <!-- /.card-header -->
                <div class="card-header">
                    <h3 class="card-title">Data barang</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama barang <span class="text-danger">*</span></label>
                                <input type="text" name="item_name"
                                    value="{{ isset($item) ? $item->item_name : old('item_name') }}"
                                    class="@error('item_name') is-invalid @enderror form-control" id="exampleInputEmail1"
                                    placeholder="Masukan nama barang">
                                @error('item_name')
                                <span class="invalid-feedback error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="exampleInputEmail1">Merek<span class="text-danger"> *</span></label>
                            <select name="brand" class="form-control @error('brand') is-invalid @enderror" id="">
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->brand_id }}" {{ isset($item) && $item->itemDetail->brand_id == $brand->brand_id || old('brand') == $brand->brand_id ? 'selected' : '' }}>{{ $brand->brand_name }}</option>
                                @endforeach
                            </select>
                            @error('brand')
                            <span class="invalid-feedback error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <label for="exampleInputEmail1">Kondisi barang<span class="text-danger"> *</span></label>
                            <select name="condition" class="form-control" id="">
                                <option value="new" {{ isset($item) && $item->itemDetail->condition == "new" ? "selected" : '' }}>Baru</option>
                                <option value="used" {{ isset($item) && $item->itemDetail->condition == "used" ? "selected" : '' }}>Bekas</option>
                            </select>
                        </div>
                        <div class="col-12 col-sm-8">
                            <label for="exampleInputEmail1">Kapasitas penyimpanan<span class="text-danger"> *</span></label>
                            <input type="text" name="storage"
                                value="{{ isset($item) ? $item->itemDetail->storage : old('storage') }}"
                                class="@error('storage') is-invalid @enderror form-control" id="exampleInputEmail1"
                                placeholder="Masukan kapasitas penyimpanan">
                            @error('storage')
                            <span class="invalid-feedback error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 col-sm-5">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Resolusi Kamera<span class="text-danger"> *</span></label>
                                <input type="text" name="camera"
                                    value="{{ isset($item) ? $item->itemDetail->camera : old('camera') }}"
                                    class="@error('camera') is-invalid @enderror form-control" id="exampleInputEmail1"
                                    placeholder="Masukan resolusi kamera">
                                @error('camera')
                                <span class="invalid-feedback error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <label for="exampleInputEmail1">Layar<span class="text-danger"> *</span></label>
                            <input type="text" name="display"
                                value="{{ isset($item) ? $item->itemDetail->display : old('display') }}"
                                class="@error('display') is-invalid @enderror form-control" id="exampleInputEmail1"
                                placeholder="Masukan keterangan layar">
                            @error('display')
                            <span class="invalid-feedback error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12 col-sm-3">
                            <label for="exampleInputEmail1">Kapasitas Batrai<span class="text-danger"> *</span></label>
                            <input type="number" name="battery"
                                value="{{ isset($item) ? $item->itemDetail->battery : old('battery') }}"
                                class="@error('battery') is-invalid @enderror form-control" id="exampleInputEmail1"
                                placeholder="Masukan kapasitas batrai">
                            @error('battery')
                            <span class="invalid-feedback error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <label>Kategori barang <span class="text-danger">*</span></label>
                                <select class="form-control" name="category">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->category_id }}">{{ $category->category }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-8">
                            <label for="exampleInputEmail1">Chipset<span class="text-danger"> *</span></label>
                            <input type="text" name="chipset"
                                value="{{ isset($item) ? $item->itemDetail->chipset : old('chipset') }}"
                                class="@error('chipset') is-invalid @enderror form-control" id="exampleInputEmail1"
                                placeholder="Masukan spesifiksi chipset">
                            @error('chipset')
                            <span class="invalid-feedback error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Gambar Utama Barang <span class="text-danger">*</span></label>
                        <div class="user-image mb-3 text-center">
                            <div class="imgPreview row"> </div>
                        </div>
                        <div class="row">
                            @if (isset($item))
                            <div class="col-12 mb-4">
                                <img src="{{ asset($item->item_main_image) }}" alt="Product Image" id="mainImage"
                                    style="max-width: 400px; max-height:400px">
                            </div>
                            @endif
                        </div>
                        <div class="custom-file">
                            <input type="file" name="{{ isset($item) ? 'image' : 'images[]' }}"
                                class="custom-file-input @error('images.*') is-invalid @enderror @error('images') is-invalid @enderror"
                                id="images" {{ isset($item) ? '' : 'multiple' }}>
                            <label class="custom-file-label" for="images">Pilih gamabar</label>
                        </div>
                        @if (isset($item))
                        <label for="exampleInputFile" class="mt-3">Gambar lainya </label>
                        <small class="text-sm text-danger">Ceklis jika anda ingin menghapus foto</small>
                        <div class="row">
                            @foreach ($item->images as $image)
                            <div class="col-3">
                                <div class="card image-card">
                                    <div class="card-header">
                                        <input type="checkbox" id="check-box" name="imagesDelete[]"
                                            value="{{ $image->image_id }}">
                                    </div>
                                    <div class="card-body" >
                                        <img src="{{ asset($image->image_path) }}" alt="Product Image"
                                            class="mw-100 mh-100">
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <label for="exampleInputFile" id="previewLabel" class="d-none">Pratinjau gambar</label>
                    <div class="user-image mb-3 text-center">
                        <div class="row imgPreviews">
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="custom-file">
                            <input multiple name="images[]" type="file" class="custom-file-input" id="images2">
                            <label class="custom-file-label" for="exampleInputFile">Masukan gambar yang ingin di
                                tambahkan di detail barang</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                    </div>
                    @endif
                    <div class="mt-4">
                        @error('description')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <textarea id="summernote" class="bg-white mt-2" name="description">
                                @if(isset($item))  {!! $item->description !!} @elseif(old('description')) {{ old('description') }} @else Tulis deskipsi produk disini @endif 
                            </textarea>
                        <button class="btn btn-primary btn-md" style="width:100px">Buat</button>
                    </div>
                </div>
            </div>
            <div class="card-footer">
            </div>
    </div>
    </form>
</div>
<!-- /.col-->
</div>

@push('parents-js')
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- CodeMirror -->
<script src="{{ asset('plugins/codemirror/codemirror.js') }}"></script>
<script src="{{ asset('plugins/codemirror/mode/css/css.js') }}"></script>
<script src="{{ asset('plugins/codemirror/mode/xml/xml.js') }}"></script>
<script src="{{ asset('plugins/codemirror/mode/htmlmixed/htmlmixed.js') }}"></script>

<!-- Select2 -->
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<!-- Page specific script -->
@if (Session::has('error'))
<script>
    toastr.error('{{ session('error') }}')
</script>
@endif


<script>
    $(function () {

        // Multiple images preview with JavaScript
        var ImgPreview = function (input, imgPreviewPlaceholder) {
            if (input.files) {

                var filesAmount = input.files.length;
                for (i = 0; i < filesAmount; i++) {
                    $('#mainImage').addClass('d-none');
                    var reader = new FileReader();
                    reader.onload = function (event) {
                        $($.parseHTML('<img class="col-2" style="max-width:400px; max-height:400px">'))
                            .attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                    }
                    reader.readAsDataURL(input.files[i]);
                }
            }
        };
        var multiImgPreview = function (input, imgPreviewPlaceholder) {
            if (input.files) {

                var filesAmount = input.files.length;
                for (i = 0; i < filesAmount; i++) {
                    $('#previewLabel').removeClass('d-none');
                    var reader = new FileReader();
                    reader.onload = function (event) {
                        $($.parseHTML('<img class="col-2" style="max-width:300px; max-height:300px">'))
                            .attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                    }
                    reader.readAsDataURL(input.files[i]);
                }
            }
        };
        $('#images').on('change', function () {
            ImgPreview(this, 'div.imgPreview');
        });
        $('#images2').on('change', function () {
            multiImgPreview(this, 'div.imgPreviews');
        });

        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
        // Summernote
        $('#summernote').summernote()

        // CodeMirror
        CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
            mode: "htmlmixed",
            theme: "monokai"
        });
    })
</script>
@endpush
@endsection