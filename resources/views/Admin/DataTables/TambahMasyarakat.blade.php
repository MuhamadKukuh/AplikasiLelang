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
        <form action="{{ isset($user) ? route('ubahMasyarakat', $user->user_id) : route('simpanMasyarakat') }}"
            enctype="multipart/form-data" method="post">
            @csrf
            <div class="card card-outline card-info">
                <!-- /.card-header -->
                <div class="card-body">
                    @if (isset($user))
                    <div class="form-group">
                        <label for="exampleInputEmail1">Masukan kata sandi baru<span class="text-danger"> *</span></label>
                        <input type="password" name="password"
                            value="{{ old('password') }}"
                            class="form-control @error('password') is-invalid @enderror" id="exampleInputEmail1"
                            placeholder="Masukan sandi">
                        @error('password')
                        <span class="invalid-feedback error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Konfirmasi sandi <span class="text-danger"> *</span></label>
                        <input type="password" name="password_confirmation"
                            class="form-control" id="exampleInputEmail1"
                            placeholder="Masukan konfirmasi">
                    </div> 
                    @else
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama masyarakat <span class="text-danger"> *</span></label>
                        <input type="text" name="name"
                            value="{{ old('name') }}"
                            class="@error('name') is-invalid @enderror form-control" id="exampleInputEmail1"
                            placeholder="Masukan nama pegawai">
                        @error('name')
                        <span class="invalid-feedback error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username <span class="text-danger"> *</span></label>
                        <input type="text" name="username"
                            value="{{ old('username') }}"
                            class="@error('username') is-invalid @enderror form-control" id="exampleInputEmail1"
                            placeholder="Masukan nama pegawai">
                        @error('username')
                        <span class="invalid-feedback error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email <span class="text-danger"> *</span></label>
                        <input type="email" name="email"
                            value="{{ old('email') }}"
                            class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1"
                            placeholder="Masukan email">
                        @error('email')
                        <span class="invalid-feedback error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nomor HP<span class="text-danger"> *</span></label>
                        <input type="number" name="phone_number"
                            value="{{ old('phone_number') }}"
                            class="form-control @error('phone_number') is-invalid @enderror" id="exampleInputphone_number1"
                            placeholder="Masukan phone_number">
                        @error('phone_number')
                        <span class="invalid-feedback error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Masukan kata sandi<span class="text-danger"> *</span></label>
                        <input type="password" name="password"
                            value="{{ old('password') }}"
                            class="form-control @error('password') is-invalid @enderror" id="exampleInputEmail1"
                            placeholder="Masukan sandi">
                        @error('password')
                        <span class="invalid-feedback error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Konfirmasi sandi <span class="text-danger"> *</span></label>
                        <input type="password" name="password_confirmation"
                            class="form-control" id="exampleInputEmail1"
                            placeholder="Masukan konfirmasi">
                    </div> 
                    @endif
                    <div class="mt-4">
                        <button class="btn btn-primary btn-md" style="width:100px">{{ isset($user) ? 'Ubah' : 'Buat' }}</button>
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