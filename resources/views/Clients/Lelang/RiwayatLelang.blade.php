@extends('Layouts.ClientLayouts.MainLayout')
@section('ClientContent')
<section class="heroHistory" id="heroe">
    <div class="container">
        <div class="row" data-aos="fade-in  ">
            <div class="d-flex justify-content-start">
                <h2>Riwayat Lelang</h2>
            </div>

            @forelse ($histories as $history)
            <div class="col-xl-12 py-3">
                <div class="card border-white shadow py-2">
                    <div class="card-body">
                        @if ($history->user_id == $history->aucation->user_id && $history->aucation->status ==
                        "closed")
                        <span class="badge bg-success">Menang</span>
                        @elseif($history->aucation->status == "closed" && $history->user_id !=
                        $history->aucation->user_id)
                        <span class="badge bg-danger">Maaf anda kalah lelang</span>
                        @else
                        <span class="badge bg-warning">Lelang masih di buka</span>
                        @endif
                        
                        <div class="card-title mt-3">
                            <div class="justify-content-between d-flex">
                                <h5  class="fw-bold">
                                    Anda melakuakan bid pada barang
                                </h5>
                                <p class="d-none d-lg-block">Pada tanggal {{ substr($history->created_at, 0, 10) }}</p>
                            </div>
                        </div>
                        <div class="card-subtitle justify-content-between d-flex">
                            <a href="{{ route('lelangDetail', $history->aucation->aucation_id) }}" class="fw-bold display-6">{{ $history->aucation->item->item_name }}</a>
                            <p class="d-lg-none">{{ substr($history->created_at, 0, 10) }}</p>
                        </div>
                        <div class="py-3">
                            <label for="" title="Jumlah bid yang anda masukan">Nilai <span class="text-success">lelang</span> saat ini : </label> 
                            <label for="" class="text-success">Rp {{ number_format($history->aucation->final_price, 0, "", ". ") }}</label>
                            <div class="justify-content-between d-flex mt-2">
                                <p>Nilai yang anda tawarkan :</p>
                                <h1 class="d-none d-lg-block">Rp {{ number_format($history->price_quotaion, 0, "", ". ") }}</h1>
                                <h6 class="d-lg-none">Rp {{ number_format($history->price_quotaion, 0, "", ". ") }}</h6>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-dark">Unduh PDF</button>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 py-3">
                <div class="card border-white shadow py-5">
                    <div class="card-body">
                        <div class="d-flex justify-content-center text-center">
                            <h3>Anda belum memiliki riwayat lelang <br>...</h3>
                        </div>
                    </div>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection