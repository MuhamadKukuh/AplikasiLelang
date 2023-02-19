@extends('Layouts.AdminLayouts.MainLayout')
@section('AdminContent')
<!-- Info boxes -->
<div class="row">
    <div class="col-12 col-sm-6 col-md-3">
            <a href="{{ route('listBarang') }}">
            <div class="info-box">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-boxes"></i></span>
    
                <div class="info-box-content">
                    <span class="info-box-text">Data Barang</span>
                    <span class="info-box-number">
                       {{ $items_total }}
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            </a>
    </div>
        <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-history"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Riwayat Lelang</span>
                <span class="info-box-number">{{ $aucationsHistory_total }}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Petugas</span>
                <span class="info-box-number">{{ $officers_total }}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Masyarakat</span>
                <span class="info-box-number">{{ $users_total }}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
</div>
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <div class="col-md-8">
        <!-- MAP & BOX PANE -->
        <!-- TABLE: LATEST ORDERS -->
        <div class="card">
            <div class="card-header border-transparent">
                <h3 class="card-title">Data lelang baru baru ini</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table m-0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Item</th>
                                <th>Status</th>
                                <th>Tanggal lelang di buka</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($latest_aucations as $aucation)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $aucation->item->item_name }}</td>
                                <td><span class="badge badge-{{ $aucation->status == "closed" ? 'danger' : 'success' }}">{{ $aucation->status == "closed" ? "Tutup" : "Buka" }}</span></td>
                                <td>
                                    <div class="sparkbar" data-color="#00a65a" data-height="20">{{ $aucation->aucation_date }}
                                    </div>
                                </td>
                                <td>
                                    <button class="btn-warning btn">Buka lelang</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                <a href="{{ route('listLelang') }}" class="btn btn-sm btn-secondary float-right">Lihat lebih banyak</a>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->
        <!-- /.card -->
        <div class="row">
            <div class="col-md-12">
                <!-- DIRECT CHAT -->
                <div class="card direct-chat direct-chat-warning">
                    <div class="card-header">
                        <h3 class="card-title">Direct Chat</h3>

                        <div class="card-tools">
                            <span title="3 New Messages" class="badge badge-warning">3</span>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" title="Contacts" data-widget="chat-pane-toggle">
                                <i class="fas fa-comments"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- Conversations are loaded here -->
                        <div class="direct-chat-messages">
                            <!-- Message. Default to the left -->
                            <div class="direct-chat-msg">
                                <div class="direct-chat-infos clearfix">
                                    <span class="direct-chat-name float-left">Alexander Pierce</span>
                                    <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                                </div>
                                <!-- /.direct-chat-infos -->
                                <img class="direct-chat-img" src="{{ asset('dist/img/user1-128x128.jpg') }}" alt="message user image">
                                <!-- /.direct-chat-img -->
                                <div class="direct-chat-text">
                                    Is this template really for free? That's unbelievable!
                                </div>
                                <!-- /.direct-chat-text -->
                            </div>
                            <!-- /.direct-chat-msg -->

                            <!-- Message to the right -->
                            <div class="direct-chat-msg right">
                                <div class="direct-chat-infos clearfix">
                                    <span class="direct-chat-name float-right">Sarah Bullock</span>
                                    <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                                </div>
                                <!-- /.direct-chat-infos -->
                                <img class="direct-chat-img" src="{{ asset('dist/img/user3-128x128.jpg') }}" alt="message user image">
                                <!-- /.direct-chat-img -->
                                <div class="direct-chat-text">
                                    You better believe it!
                                </div>
                                <!-- /.direct-chat-text -->
                            </div>

                        </div>
                        <!--/.direct-chat-messages-->

                        <!-- Contacts are loaded here -->
                        <div class="direct-chat-contacts">
                            <ul class="contacts-list">
                                <li>
                                    <a href="#">
                                        <img class="contacts-list-img" src="dist/img/user1-128x128.jpg"
                                            alt="User Avatar">

                                        <div class="contacts-list-info">
                                            <span class="contacts-list-name">
                                                Count Dracula
                                                <small class="contacts-list-date float-right">2/28/2015</small>
                                            </span>
                                            <span class="contacts-list-msg">How have you been? I was...</span>
                                        </div>
                                        <!-- /.contacts-list-info -->
                                    </a>
                                </li>
                                <!-- End Contact Item -->
                                <li>
                                    <a href="#">
                                        <img class="contacts-list-img" src="dist/img/user7-128x128.jpg"
                                            alt="User Avatar">

                                        <div class="contacts-list-info">
                                            <span class="contacts-list-name">
                                                Sarah Doe
                                                <small class="contacts-list-date float-right">2/23/2015</small>
                                            </span>
                                            <span class="contacts-list-msg">I will be waiting for...</span>
                                        </div>
                                        <!-- /.contacts-list-info -->
                                    </a>
                                </li>
                                <!-- End Contact Item -->
                                <li>
                                    <a href="#">
                                        <img class="contacts-list-img" src="dist/img/user3-128x128.jpg"
                                            alt="User Avatar">

                                        <div class="contacts-list-info">
                                            <span class="contacts-list-name">
                                                Nadia Jolie
                                                <small class="contacts-list-date float-right">2/20/2015</small>
                                            </span>
                                            <span class="contacts-list-msg">I'll call you back at...</span>
                                        </div>
                                        <!-- /.contacts-list-info -->
                                    </a>
                                </li>
                                <!-- End Contact Item -->
                                <li>
                                    <a href="#">
                                        <img class="contacts-list-img" src="dist/img/user5-128x128.jpg"
                                            alt="User Avatar">

                                        <div class="contacts-list-info">
                                            <span class="contacts-list-name">
                                                Nora S. Vans
                                                <small class="contacts-list-date float-right">2/10/2015</small>
                                            </span>
                                            <span class="contacts-list-msg">Where is your new...</span>
                                        </div>
                                        <!-- /.contacts-list-info -->
                                    </a>
                                </li>
                                <!-- End Contact Item -->
                                <li>
                                    <a href="#">
                                        <img class="contacts-list-img" src="dist/img/user6-128x128.jpg"
                                            alt="User Avatar">

                                        <div class="contacts-list-info">
                                            <span class="contacts-list-name">
                                                John K.
                                                <small class="contacts-list-date float-right">1/27/2015</small>
                                            </span>
                                            <span class="contacts-list-msg">Can I take a look at...</span>
                                        </div>
                                        <!-- /.contacts-list-info -->
                                    </a>
                                </li>
                                <!-- End Contact Item -->
                                <li>
                                    <a href="#">
                                        <img class="contacts-list-img" src="dist/img/user8-128x128.jpg"
                                            alt="User Avatar">

                                        <div class="contacts-list-info">
                                            <span class="contacts-list-name">
                                                Kenneth M.
                                                <small class="contacts-list-date float-right">1/4/2015</small>
                                            </span>
                                            <span class="contacts-list-msg">Never mind I found...</span>
                                        </div>
                                        <!-- /.contacts-list-info -->
                                    </a>
                                </li>
                                <!-- End Contact Item -->
                            </ul>
                            <!-- /.contacts-list -->
                        </div>
                        <!-- /.direct-chat-pane -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <form action="#" method="post">
                            <div class="input-group">
                                <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                                <span class="input-group-append">
                                    <button type="button" class="btn btn-warning">Send</button>
                                </span>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-footer-->
                </div>
                <!--/.direct-chat -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        
    </div>
    <!-- /.col -->

    <div class="col-md-4">
        <!-- PRODUCT LIST -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Barang yang baru di tambahkan</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                    @foreach ($latest_items as $item)
                    <li class="item">
                        <div class="product-img">
                            <img src="{{ asset($item->item_main_image) }}" alt="Product Image" class="img-size-50">
                        </div>
                        <div class="product-info">
                            <a href="{{ route("detailBarang", $item->item_id) }}" class="product-title">{{ $item->item_name }}
                                <span class="badge badge-success float-right">Baru</span></a>
                            <span class="product-description">
                                {!! substr($item->description, 0, 40)."..."  !!}
                            </span>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            <!-- /.card-body -->
            <div class="card-footer text-center">
                <a href="{{ route('listBarang') }}" class="uppercase">Lihat semua barang</a>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Pengguna baru</h3>

                <div class="card-tools">
                    <span class="badge badge-danger">{{ $latest_users->count() }} Pengguna baru</span>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <ul class="users-list clearfix">
                    @forelse ($latest_users as $latest_user)
                        <li>
                            <img src="{{ asset('/dist/img/user2-160x160.jpg') }}" alt="User Image">
                            <a class="users-list-name" href="#">{{ $latest_user->name }}</a>
                            <span class="users-list-date">{{ $latest_user->created_at->diffForHumans() }}</span>
                        </li> 
                    @empty
                    <div class="d-flex justify-content-center">
                        <div class="py-2">
                            <h5>Belum ada pengguna baru</h5>
                        </div>
                    </div>
                    @endforelse
                </ul>
                <!-- /.users-list -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer text-center">
                <a href="">Lihat semua pengguna</a>
            </div>
            <!-- /.card-footer -->
        </div>


        
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
@endsection