@extends('Layouts.AdminLayouts.MainLayout')
@section('AdminContent')
    <div class="searchbar form-group d-flex justify-content-center">
        <form action="" class="form-group d-flex">
            <input type="text" name="search" placeholder="Cari.." class="form-control rounded" style="width:600px">
            <button class="btn btn-primary"><i class="fas fa-search fa-fw"></i></button>
        </form>
    </div>
    <div class="row py-4">
        @forelse ($users as $user)
            <div class="col-3">
                <a href="{{ route('detailRiwayatLelang', $user->user_id) }}">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="{{ asset('dist/img/avatar.png') }}" style="max-width:100px; max-height:100px" class="rounded-circle" alt="">
                                <h1>{{ $user->name }}</h1>
                                <h4>{{ $user->histories->count() }}x Melakukan Penawaran</h4>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @empty
            
        @endforelse
    </div>
    {{ $users->links() }}

@endsection