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
        <form action="{{ isset($aucation) ? route('ubahLelang', $aucation->aucation_id) : route('simpanLelang') }}"
            method="post">
            @csrf
            <div class="card card-outline card-info">
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="">
                        <div class="form-group background">
                            <label>Pilih barang <span class="text-danger">*</span></label>
                            <div class="select2-blue">
                                <select class="form-control select2" name="item">
                                    <option value="" selected>Pilih barang</option>
                                    @foreach ($items as $item)
                                        <option value="{{ $item->item_id }}" {{ isset($aucation) && $aucation->item_id == $item->item_id ? 'selected' : '' }}>{{ $item->item_name }}</option>
                                    @endforeach
                                </select>
                                @error('item')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-8">
                                <label>Harga Dasar<span class="text-danger"> *</span></label>
                                <input type="number" class="form-control @error('initial_price') is-invalid @enderror" value="{{ isset($aucation) ? $aucation->initial_price : old('initial_price') }}" name="initial_price"
                                    class="form-control" placeholder="Masukan harga awal barang">
                                @error('initial_price')
                                <span class="invalid-feedback error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-4">
                                <label for="exampleInputEmail1">Kelipatan bid <span class="text-danger">*</span></label>
                                <input type="number" name="multiple_bid"
                                    value="{{ isset($aucation) ? $aucation->multiple_bid : old('multiple_bid') }}"
                                    class="@error('multiple_bid') is-invalid @enderror form-control"
                                    id="exampleInputEmail1" placeholder="Masukan kelipatan bid">
                                @error('multiple_bid')
                                <span class="invalid-feedback error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label for="">Tanggal lelang di buka <span class="text-danger"> *</span></label>
                                <input type="date" class="form-control @error('aucation_date') is-invalid @enderror" value="{{ isset($aucation) ? $aucation->aucation_date : @old('aucation_date') }}" name="aucation_date"
                                    class="form-control">
                                @error('aucation_date')
                                    <span class="invalid-feedback error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="exampleInputEmail1">Status <span class="text-danger">*</span></label>
                                <select name="status" id="" class="form-control">
                                    <option value="opened"
                                        {{ isset($aucation) && $aucation->status == "opened" ? 'selected' : '' }}>Di
                                        Buka</option>
                                    <option value="closed"
                                        {{ isset($aucation) && $aucation->status == "closed" ? 'selected' : '' }}>Di
                                        Tutup</option>
                                </select>
                                @error('status')
                                <span class="invalid-feedback error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
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
<script>
    $(function () {
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    })
</script>
@endpush
@endsection