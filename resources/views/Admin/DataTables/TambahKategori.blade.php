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
        <form action="{{ isset($category) ? route('ubahKategori', $category->category_id) : route('simpanKategori') }}"
            enctype="multipart/form-data" method="post">
            @csrf
            <div class="card card-outline card-info">
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Kategori <span class="text-danger">*</span></label>
                        <input type="text" name="category"
                            value="{{ isset($category) ? $category->category : old('category') }}"
                            class="@error('category') is-invalid @enderror form-control" id="exampleInputEmail1"
                            placeholder="Masukan nama kategori">
                        @error('category')
                        <span class="invalid-feedback error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <button class="btn btn-primary btn-md" style="width:100px">{{ isset($category) ? 'Ubah' : 'Buat' }}</button>
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
@endsection