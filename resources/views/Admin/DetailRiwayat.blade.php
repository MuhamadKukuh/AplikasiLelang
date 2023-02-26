@extends('Layouts.AdminLayouts.MainLayout')
@section('AdminContent')
    <div class="row">
        @foreach ($user->histories as $user_history)
        <div class="col-xl-12 py-3">
            <div class="card shadow py-2">
                <div class="card-body">
                    @if ($user_history->user_id == $user_history->aucation->user_id && $user_history->aucation->status ==
                    "closed")
                    <span class="badge bg-success">Menang</span>
                    @elseif($user_history->aucation->status == "closed" && $user_history->user_id !=
                    $user_history->aucation->user_id)
                    <span class="badge bg-danger">Maaf anda kalah lelang</span>
                    @else
                    <span class="badge bg-warning">Lelang masih di buka</span>
                    @endif
                    
                    <div class=" mt-3">
                        <div class="justify-content-between d-flex">
                            <h3 class="fw-bold" style="font-weight:bold">
                                {{ $user->name }} melakuakan bid pada barang
                            </h3>
                            <p class="d-none d-lg-block">Pada tanggal {{ substr($user_history->created_at, 0, 10) }}</p>
                        </div>
                    </div>
                    <div class="card-subtitle justify-content-between d-flex" style="">
                        <h3  style="font-weight:bold">
                            <a href="{{ route('detailLelang', $user_history->aucation->aucation_id) }}" class="text-primary fw-bold display-6">{{ $user_history->aucation->item->item_name }}</a>
                        </h3>
                        <p class="d-lg-none">{{ substr($user_history->created_at, 0, 10) }}</p>
                    </div>
                    <div class="py-3">
                        <label for="" title="Jumlah bid yang anda masukan">Nilai <span class="text-primary">lelang</span> saat ini : </label> 
                        <label for="" class="text-primary">Rp {{ number_format($user_history->aucation->final_price, 0, "", ". ") }}</label>
                        <div class="justify-content-between d-flex mt-2">
                            <p>Nilai yang anda tawarkan :</p>
                            <h1 class="d-none d-lg-block">Rp {{ number_format($user_history->price_quotaion, 0, "", ". ") }}</h1>
                            <h6 class="d-lg-none">Rp {{ number_format($user_history->price_quotaion, 0, "", ". ") }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection