@extends('Layouts.ClientLayouts.MainLayout')
@section('ClientContent')
<section>
<div class="container ">
  <div class="row">
    <div class="col">
      <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Profile</li>
        </ol>
      </nav>
      @if (Session::has('success'))
      <div class="alert alert-success" role="alert">
        {{ session('success') }}!
      </div>
      @endif
    </div>
  </div>

  <div class="row">
    <div class="col-lg-4">
      <div class="card mb-4 border-white shadow">
        <div class="card-body text-center">
          <img src="{{ asset('dist/img/avatar.png') }}" alt="avatar"
            class="rounded-circle img-fluid" style="width: 150px;">
          <h5 class="my-3">{{ $user->name }}</h5>
          <p class="text-muted mb-1">Masyarakat</p>
        </div>
      </div>
      <div class="card mb-4 border-white shadow">
        <div class="card-body">
          <div class="row">
            <div class="col-sm-3">
              <p class="mb-0">Ikut lelang</p>
            </div>
            <div class="col-sm-9">
              <p class="text-muted mb-0"><a href="{{ route('historyLelang') }}">{{ $user->histories->count() }}</a>x</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-8">
      <div class="card mb-4 border-white shadow">
        <div class="card-body">
          <div class="row">
            <div class="col-sm-3">
              <p class="mb-0">Nama</p>
            </div>
            <div class="col-sm-9">
              <p class="text-muted mb-0">{{ $user->name }}</p>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <p class="mb-0">Email</p>
            </div>
            <div class="col-sm-9">
              <p class="text-muted mb-0">{{ $user->email }}</p>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <p class="mb-0">Username</p>
            </div>
            <div class="col-sm-9">
              <p class="text-muted mb-0">{{ $user->username }}</p>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <p class="mb-0">Nomor Hp</p>
            </div>
            <div class="col-sm-9">
              <p class="text-muted mb-0">{{ $user->phone_number }}</p>
            </div>
          </div>
          <hr>
        </div>
      </div>
      <div class="row">
        <div class="container">
          <div class="card border-white shadow">
            <h4 class="text-center">Ubah kata sandi</h4>
            <form action="{{ route('changePassword', $user->user_id) }}" class="container" method="POST">
              @csrf
              <div class="form-group">
                <label for="" class="text-muted">Kata sandi baru</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @else mb-3 @enderror">
                @error('password')
                <small class="text-danger mb-3">{{ $message }}</small>
                @enderror
              </div>
              <div class="form-group">
                <label for="" class="text-muted">Ulangi sandi baru</label>
                <input type="password" name="password_confirmation" class="form-control mb-3">
              </div>
              <button class="btn btn-success mb-3">Konfirmasi</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
@endsection