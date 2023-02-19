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
                    <a href="{{ route('tambahPegawai') }}" class="btn btn-primary"><span style="font-weight: bold; font-size:18px">+</span> Tambah data
                        pegawai</a>
                </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama pegawai</th>
                            <th>Username</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($officers as $officer)
                        <tr>
                            <td>1</td>
                            <td>{{ $officer->officer_name }}</td>
                            <td>
                                {{ $officer->username }}
                            </td>
                            <td>
                                <div class="">
                                    <a href="{{ route('hapusPegawai', $officer->officer_id) }}" class="btn btn-danger" style="font-weight:bold; width:100px">Hapus</a>
                                    <a href="{{ route('editPegawai', $officer->officer_id) }}" class="btn btn-warning" style="font-weight:bold; width:100px">Ubah</a>
                                    <a href="{{ route('profilPegawai', $officer->officer_id) }}" class="btn btn-primary" style="font-weight:bold; width:100px">Detail</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3">Total pegawai</th>
                            <th colspan="1">1000 pegawai</th>
                        </tr>
                    </tfoot>
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
@if (Session::has('success'))
    <script>toastr.success('{{ session('success') }}')</script>
@endif
@if (Session::has('error'))
    <script>toastr.error('{{ session('error') }}')</script>
@endif
<!-- page script -->
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