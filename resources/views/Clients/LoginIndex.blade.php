<!DOCTYPE html>
<html lang="en">
<head>
    @include('Layouts.ClientLayouts.Head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                <div class="col-6 py-5">
                    <img src="{{ asset('assets/img/pngegg.png') }}" style="max-width: 500px; max-height:500px" class=" d-flex justify-content-center" alt="">
                </div>
                <div class="col-6 py-5">
                    <div class="card shadow" style="width: 24rem; border-color:rgb(255, 255, 255)">
                        <div class="card-body">
                            <div class="container">
                                <div class="py-3">
                                    <h5 class="card-title text-center fw-bold">Masuk</h5>
                                    <h6 class="card-subtitle mb-2 text-muted text-center">Belum punya akun? <a href="{{ route('registerIndex') }}">Daftar</a></h6>
                                </div>
                                <form action="{{ route('loginUser') }}" method="post">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label class="text-muted" style="font-size: 14px; font-weight:500" for="email">Email atau Username</label>
                                        <input type="text" name="email" class="form-control  @error('email') is-invalid @else border-success @enderror" value="{{ old('email') }}">
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="text-muted" style="font-size: 14px; font-weight:500" for="email">Kata sandi</label>
                                        <input type="password" id="trigger-button" name="password" class="form-control border-success">
                                    </div>
                                    <div class="form-group mb-5">
                                        <div class="d-flex justify-content-end">
                                            <a href="" style="font-size:13px" class="mb-2">Lupa kata sandi?</a>
                                        </div>
                                        <button id="myButton" class="btn btn-success disabled w-100 py-2 fw-bold">Masuk</button>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#trigger-button').keyup(function () {
                $('#myButton').removeClass('disabled');
            })
        })
    </script>
    @if (Session::has('error'))
    <script>
        toastr.error("{{ session('error') }}")
    </script>
    @endif
    @if (Session::has('success'))
    <script>
        toastr.success("{{ session('success') }}")
    </script>
    @endif
</body>
</html>