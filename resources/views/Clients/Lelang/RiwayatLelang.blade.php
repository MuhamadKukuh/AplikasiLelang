@extends('Layouts.ClientLayouts.MainLayout')
@section('ClientContent')
<section class="heroHistory" id="heroe">
    <div class="container">
        <div class="row" data-aos="fade-in  ">
            <div class="d-flex justify-content-start">
                <h2>Riwayat Lelang</h2>
            </div>
            
            @forelse ($histories as $history)
            <div class="col-12 py-3">
                <div class="card border-white shadow py-2">
                    <div class="card-body">
                        <div class="justify-content-between d-flex">
                            <h5 class="fw-bold">Anda melakuakan bid pada barang <a href="{{ route('lelangDetail', $history->aucation->aucation_id) }}">{{ $history->aucation->item->item_name }}</a> </h5>
                            <h6>Pada tanggal {{ substr($history->created_at, 0, 10) }}</h6>
                        </div>
                        <div class="py-2">
                            <table class="table">
                                <thead>
                                    <th>
                                        Nama barang
                                    </th>
                                    <th>
                                        Status lelang
                                    </th>
                                    <th>
                                        Jumlah bid
                                    </th>
                                    <th>
                                        Harga lelang terakhir
                                    </th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $history->aucation->item->item_name }}</td>
                                        <td>
                                            @if ($history->user_id == $history->aucation_id && $history->aucation->status == "closed")
                                                Menang
                                            @elseif($history->aucation->status == "closed" && $history->user_id != $history->aucation->user_id)
                                                Maaf anda kalah lelang
                                            @else
                                                Lelang masih di buka
                                            @endif
                                        </td>
                                        <td>
                                            Rp {{ number_format($history->price_quotaion, 0, "", ". ") }}
                                        </td>
                                        <td>
                                            Rp {{ number_format($history->aucation->final_price, 0, "", ". ") }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-dark">Unduh PDF</button>
                        </div>
                    </div>
                </div>
            </div>
            @if ($history->aucation_id == $history->aucation->aucation_id)
                @break
            @endif
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