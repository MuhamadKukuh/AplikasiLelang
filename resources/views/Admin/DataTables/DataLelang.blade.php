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
                    <a href="{{ route('tambahLelang') }}" class="btn btn-primary"><span
                            style="font-weight: bold; font-size:18px">+</span> Tambah data
                        lelang</a>
                </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama barang</th>
                            @if (Auth()->guard('officer')->user()->level_id == 1)
                                <th>Petugas</th>
                            @endif
                            <th>Tanggal lelang di buka</th>
                            <th>Satus</th>
                            <th>Harga dasar</th>
                            <th>Kelipatan bid</th>
                            <th>Terakhir di bid oleh</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($aucations as $aucation)
                        {{-- @dd($aucation->item) --}}
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="">
                                {{ $aucation->item->item_name }}
                            </td>
                            @if (Auth()->guard('officer')->user()->level_id == 1)
                            <td>
                                {{ $aucation->officer->officer_name }}
                            </td>
                            @endif
                            <td>{{ $aucation->aucation_date }}</td>
                            <td>{{ $aucation->status ==  "closed" ? "Tutup" : "Buka" }} |
                                {!! $aucation->final_price == 0 ? 'Belum ada yang bid brang' : 'Bid terakhir <br>  Rp '. number_format($aucation->final_price, 0, '', '. ')  !!}
                            </td>
                            <td>{{ number_format($aucation->initial_price, 0, ' ', '. ') }}</td>
                            <td>{{ number_format($aucation->multiple_bid, 0, '', '. ') }}</td>
                            <td>{{ $aucation->user_id == null ?'Belum di bid' : $aucation->user->name }}</td>
                            <td>
                                <a href="{{ route('editLelang', $aucation->aucation_id) }}" class="btn btn-warning"
                                    style="font-weight:bold; width:100px">Ubah</a>
                                <br>
                                <a href="{{ route('detailLelang', $aucation->aucation_id) }}" class="btn mt-2 btn-primary"
                                    style="font-weight:bold; width:100px">Detail</a>
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
@if(Session::has('success'))
    <script>
        toastr.success('{{ session('success') }}')
    </script>
@endif
@if(Session::has('error'))
    <script>
        toastr.error('{{ session('error') }}')
    </script>
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