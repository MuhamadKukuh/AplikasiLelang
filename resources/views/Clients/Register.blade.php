<!DOCTYPE html>
<html lang="en">
<head>
    @include('Layouts.ClientLayouts.Head')
</head>
<body>
    <div class="container">
        <div style="padding-left: 150px; padding-right: 150px">
            <div class="row ">
                <div class="col-12">
                    <div class="d-flex justify-content-center mt-5">
                        <a href="/" class="logo d-flex align-items-center">
                            <h1>Legit<span class="text-warning">.</span></h1>
                        </a>
                    </div>
                </div>
                <div class="col-12 py-5 d-flex justify-content-center">
                    <div class="card shadow" style="width: 24rem; border-color:rgb(255, 255, 255)">
                        <div class="card-body">
                            <div class="container">
                                <div class="py-3">
                                    <h5 class="card-title text-center fw-bold">Daftar</h5>
                                    <h6 class="card-subtitle mb-2 text-muted text-center">Sudah punya akun? <a href="{{ route('loginIndex') }}">Masuk</a></h6>
                                </div>
                                <form action="{{ route('register') }}" method="post">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label class="text-muted" style="font-size: 14px; font-weight:500" for="email">Nama</label>
                                        <input type="text" name="name" value="{{ old('name') }}" class="@error('name') is-invalid @enderror form-control border-success">
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="text-muted" style="font-size: 14px; font-weight:500" for="email">Username</label>
                                        <input type="text" name="username" value="{{ old('username') }}" class="@error('username') is-invalid @enderror form-control border-success">
                                        @error('username')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="text-muted" style="font-size: 14px; font-weight:500" for="email">Nomor HP</label>
                                        <input type="number" value="{{ old('phone_number') }}" name="phone_number" class="@error('phone_number') is-invalid @enderror form-control border-success">
                                        @error('phone_number')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="text-muted" style="font-size: 14px; font-weight:500" for="email">Email</label>
                                        <input type="email" name="email" value="{{ old('email') }}" class="@error('email') is-invalid @enderror form-control border-success">
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="text-muted" style="font-size: 14px; font-weight:500" for="email">Kata sandi</label>
                                        <input type="password" name="password" class="@error('password') is-invalid @enderror form-control border-success">
                                        @error('password')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="text-muted" style="font-size: 14px; font-weight:500" for="email">Konfirmasi kata sandi</label>
                                        <input type="password" name="password_confirmation" class="form-control border-success">
                                    </div>
                                    <div class="form-group mb-5">
                                        <button class="btn btn-outline-success w-100 py-2 fw-bold">Daftar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('Layouts.ClientLayouts.JavaScript')
</body>
</html>