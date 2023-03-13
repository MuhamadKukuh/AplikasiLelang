@extends('Layouts.ClientLayouts.MainLayout')
@section('ClientContent')
    <section class="container">
        <div class="row">
            <div class="col-3">
                <h6 class="fw-bold">Filter. </h6>
                <form action="{{ route('daftarBarangLelang') }}">
                    <div class="border-white bg-white shadow rounded-3" style="">
                    <div class="p-3">
                        <h6 class="fw-bold mb-3">Kategori</h6>
                        <div class="form-group">
                            <select name="category" id="" class="form-select">
                                <option value="" selected>Semua jenis barang</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->category_id }}" {{ isset($_GET['category']) && $_GET['category'] == $category->category_id ? 'selected' : '' }}>{{ $category->category }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <hr class="mt-0 mb-0">
                    <div class="p-3">
                        <h6 class="fw-bold mb-3">Status lelang</h6>
                        <div class="form-group">
                            <select name="status" id="" class="form-select">
                                <option value="opened" {{ isset($_GET['status']) && $_GET['status'] == 'opened' ? 'selected' : '' }}>Buka</option>
                                <option value="closed" {{ isset($_GET['status']) && $_GET['status'] == 'closed' ? 'selected' : '' }}>Tutup</option>
                            </select>
                        </div>
                    </div>
                    <hr class="mt-0 mb-0">
                    <div class="p-3">
                        <h6 class="fw-bold mb-3">Kondisi</h6>
                        <div class="form-check">
                            <input class="form-check-input" {{ isset($_GET['condition']) && $_GET['condition'] == 'new' ? 'checked' : '' }} name="condition" value="new" type="radio" name="condition" id="flexRadioDefault1">
                            <label class="form-check-label"  for="flexRadioDefault1">
                              Baru
                            </label>
                        </div>
                        <div class="form-check">
                            <input {{ isset($_GET['condition']) && $_GET['condition'] == 'used' ? 'checked' : '' }} class="form-check-input" name="condition" value="used" type="radio" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                              Bekas
                            </label>
                        </div>
                    </div>
                    <hr class="mt-0 mb-0">
                    <div class="p-3">
                        <h6 class="fw-bold mb-3">Harga</h6>
                        <div class="form-group mb-3">
                            <input type="number" value="{{ isset($_GET['pmin']) ? $_GET['pmin'] : '' }}" name="pmin" class="form-control border-success" placeholder="Harga minimum">
                        </div>
                        <div class="form-group">
                            <input type="number" value="{{ isset($_GET['pmax']) ? $_GET['pmax'] : '' }}" name="pmax" class="form-control border-success" placeholder="Harga maksimum">
                        </div>
                        <button class="btn btn-outline-success rounded-3 mt-3 w-100"><i class="bi bi-funnel"></i>Filter</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-9">
                <div class="d-flex justify-content-between">
                    <h6 class="">Menampilakan <span class="text-success">{{ $auctions->count() }}</span> barang</h6>
                </div>
                <div class="row mt-2 myItems">
                    @foreach ($auctions as $aucation)
                    <div class="col-12 col-sm-3 mb-3" id="Item" data-sort="{{ $aucation->created_at }}">
                        <div class="card rounded-4 border-white shadow" >
                            <a href="{{ asset($aucation->item->item_main_image) }}"
                                data-gallery="portfolio-gallery-app" class="glightbox">
                                <img src="{{ asset($aucation->item->item_main_image) }}" class="img-fluid"
                                    style="max-width: 100%; max-height:300px" alt="">
                            </a>
                            <div class="text-white w-100 py-1 px-3 fw-bold" style="border-radius: 0px 10px 60px 0px; font-size:12px; background: linear-gradient(to right, rgb(1, 138, 19), rgb(0, 208, 28));">
                                {{ $aucation->item->category->category }}
                            </div>
                            <a href="{{ route('lelangDetail', $aucation->aucation_id) }}" class="pb-3">
                                <div class="mt-2 px-3">
                                    <h6 class="mb-2" style="color:black">
                                        {{ ucfirst($aucation->item->item_name) }}
                                    </h6>
                                    <h5 class="card-title fw-bold" style="color:black">
                                        Rp {{ number_format($aucation->initial_price, 0, '', '. ') }}
                                    </h5>
                                    <div class="py-1 rounded-2 fw-bold text-white" style="padding-left:8px; padding-right:8px;width:fit-content; {{ $aucation->item->itemDetail->condition == 'new' ? 'background-color:rgb(0, 174, 23)' : 'background-color: #f96f59;' }}; font-size: 12px">
                                        {{ $aucation->item->itemDetail->condition == 'new' ? 'Baru' : 'Bekas' }}
                                    </div>
                                    <div class="d-flex justify-content-between mt-2">
                                        <div class="text-muted" style="font-size:14px">{{ $aucation->status == "closed" ? 'Tutup' : 'Buka' }} | {{ $aucation->histories_count }}x di BID</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
                {{ $auctions->withQueryString()->links() }}
            </div>
        </div>
    </section>

    @push('parents-client-js')
    <script>
        
    </script>
    @endpush
@endsection