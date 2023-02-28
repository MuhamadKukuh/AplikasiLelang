@extends('Layouts.AdminLayouts.MainLayout')
@section('AdminContent')
<div class="row">
    <div class="col-md-3">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="{{ asset('/dist/img/user2-160x160.jpg') }}"
                        alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{ $officer->username }}</h3>

                <p class="text-muted text-center">{{ $officer->level_id == 1 ? "Admin" : "Petugas" }}</p>
                
                {{-- <a href="{{ route('hapusPegawai', $officer->officer_id) }}" class="btn btn-danger btn-block"><b>Hapus</b></a> --}}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- About Me Box -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Tentang Petugas</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Nama Petugas</strong>

                <p class="text-muted">
                   {{ $officer->officer_name }}
                </p>
                <strong><i class="fas fa-boxes mr-1"></i> Barang yang di buat petugas</strong>

                <p class="text-muted">
                   {{ $officer_history['create_item']->count() }} Barang
                </p>
                <strong><i class="fas fa-history mr-1"></i> Riwayat menjadi petugas lelang</strong>

                <p class="text-muted">
                   {{ $officer_history['create_aucation']->count() }} Lelang
                </p>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
    <div class="col-md-9">
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link {{ count($errors) <= 0 ? 'active' : '' }}" href="#timeline" data-toggle="tab">Riwayat</a></li>
                    @if (Auth()->guard('officer')->user()->officer_id == $officer->officer_id || Auth()->guard('officer')->user()->level_id == 1)
                        <li class="nav-item"><a class="nav-link {{ count($errors) > 0 ? 'active' : '' }}" href="#settings" data-toggle="tab">Pengaturan</a></li>
                    @endif
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    <div class="{{ count($errors) <= 0 ? 'active' : '' }} tab-pane" id="timeline">
                        <!-- The timeline -->
                        <div class="timeline timeline-inverse">
                            <!-- timeline time label -->
                            <div class="time-label">
                                <span class="bg-danger">
                                    Barang
                                </span>
                            </div>
                            <!-- /.timeline-label -->
                            <!-- timeline item -->
                            @foreach ($officer_history['create_item'] as $itemHistory)
                            <div>
                                <i class="fas fa-boxes bg-info"></i>
                                <div class="timeline-item">
                                    <span class="time"><i class="far fa-clock"></i> {{ $itemHistory->created_at->diffForHumans() }}</span>

                                    <h3 class="timeline-header">Menambahkan barang <a href="#">{{ $itemHistory->item_name }}</a></h3>
                                </div>
                            </div>
                            @endforeach
                            <div class="time-label">
                                <span class="bg-success">
                                    Lelang
                                </span>
                            </div>
                            <!-- /.timeline-label -->
                            <!-- timeline item -->
                            @foreach ($officer_history['create_aucation'] as $aucation)
                            <div>
                                <i class="fas fa-flag bg-purple"></i>

                                <div class="timeline-item">
                                    <span class="time"><i class="far fa-clock"></i> {{ $aucation->created_at != $aucation->updated_at ? $aucation->updated_at->diffForHumans() : $aucation->created_at->diffForHumans() }}</span>

                                    <h3 class="timeline-header">{{ $aucation->created_at != $aucation->updated_at ? "Mengubah data lelang barang" : "Menambahkan data lelang barang" }} <a href="">{{ $aucation->item->item_name }}</a> </h3>
                                </div>
                            </div>
                            @endforeach
                            <!-- END timeline item -->
                            <div>
                                <i class="far fa-clock bg-gray"></i>
                            </div>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    {{-- @dd($officer->officer_name) --}}
                    <div class="{{ count($errors) > 0 ? 'active' : '' }} tab-pane" id="settings">
                        <form class="form-horizontal" action="{{ route('ubahSandiPegawai', $officer->officer_id) }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="inputName2" class="col-sm-2 col-form-label">Sandi baru</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror" id="inputName2" placeholder="Katasandi">
                                    @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputExperience" class="col-sm-2 col-form-label">Konfrimasi sandi</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password_confirmation" class="form-control" id="inputName2" placeholder="Konfirmasi sandi">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <button type="submit" class="btn btn-danger">Perbarui sandi</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
@push('parents-js')
    @if (Session::has('success'))
        <script>toastr.success("{{ session('success') }}")</script>
    @endif
@endpush

@endsection