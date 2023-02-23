@extends('Layouts.AdminLayouts.MainLayout')
@section('AdminContent')
@push('parents-css')
<!-- Hallo -->
<link rel="stylesheet" href="{{ asset('/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush
<div class="row">
    <div class="col-12">

        <!-- /.card -->

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <a href="{{ route('tambahBarang') }}" class="btn btn-primary"><span style="font-weight: bold; font-size:18px">+</span> Tambah data
                        barang</a>
                </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar barang</th>
                            <th>Nama barang</th>
                            <th>Deskripsi</th>
                            <th>Kategori</th>
                            @if (Auth()->guard()->user()->level_id == 1)
                            <th>Dibuat oleh</th>
                            @endif
                            <th>Aksi    </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="text-center"><img src="{{ asset($item->item_main_image) }}" style="max-width: 300px; max-height:300px" alt=""></td>
                            <td>
                                {{ $item->item_name }}
                            </td>
                            <td >{!! substr($item->description, 0, 100) !!}...</td>
                            <td>{{ $item->category->category }}</td>
                            @if (Auth()->guard('officer')->user()->level_id == 1)
                            <td><a href="{{ route('profilPegawai', $item->officer_id) }}">{{ $item->officer->officer_name }}</a></td>
                            @endif
                            <td>
                                @if (Auth()->guard('officer')->user()->level_id == 1 || $item->officer_id == Auth()->guard('officer')->user()->officer_id)
                                <a href="{{ route('hapusBarang', $item->item_id) }}" class="btn btn-danger" style="font-weight:bold; width:100px">Hapus</a>
                                <br>
                                <br>
                                <a href="{{ route('editBarang', $item->item_id) }}" class="btn btn-warning" style="font-weight:bold; width:100px">Ubah</a>
                                <br>
                                <br>
                                @endif
                                <a href="{{ route('detailBarang', $item->item_id) }}" class="btn btn-primary" style="font-weight:bold; width:100px">Detail</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
@push('parents-js')
<script src="{{ asset('/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<!-- page script -->
@if (Session::has('success'))
    <script>toastr.success('{{ session('success') }}')</script>
@endif
@if (Session::has('error'))
    <script>toastr.error('{{ session('error') }}')</script>
@endif

<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
@endpush
@endsection