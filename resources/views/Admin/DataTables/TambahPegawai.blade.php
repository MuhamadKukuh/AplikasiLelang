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
        <form action="{{ isset($officer) ? route('ubahPegawai', $officer->officer_id) : route('simpanPegawai') }}"
            enctype="multipart/form-data" method="post">
            @csrf
            <div class="card card-outline card-info">
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama pegawai <span class="text-danger">*</span></label>
                        <input type="text" name="officer_name"
                            value="{{ isset($officer) ? $officer->officer_name : old('officer_name') }}"
                            class="@error('officer_name') is-invalid @enderror form-control" id="exampleInputEmail1"
                            placeholder="Masukan nama pegawai">
                        @error('officer_name')
                        <span class="invalid-feedback error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username <span class="text-danger">*</span></label>
                        <input type="text" name="username"
                            value="{{ isset($officer) ? $officer->username : old('username') }}"
                            class="form-control @error('username') is-invalid @enderror" id="exampleInputEmail1"
                            placeholder="Masukan username">
                        @error('username')
                        <span class="invalid-feedback error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">{{ isset($officer) ? 'Masukan sandi baru' :'Masukan sandi' }} <span class="text-danger">*</span></label>
                        <input type="password" name="password"
                            value="{{ old('password') }}"
                            class="form-control @error('password') is-invalid @enderror" id="exampleInputEmail1"
                            placeholder="Masukan sandi">
                        @error('password')
                        <span class="invalid-feedback error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Konfirmasi sandi <span class="text-danger">*</span></label>
                        <input type="password" name="password_confirmation"
                            class="form-control" id="exampleInputEmail1"
                            placeholder="Masukan konfirmasi">
                    </div>
                    <div class="mt-4">
                        <button class="btn btn-primary btn-md" style="width:100px">{{ isset($officer) ? 'Ubah' : 'Buat' }}</button>
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