@extends('layouts.apptamu')

@section('title', 'Login Peminjam')

@section('content')

<div class="login-page bg-light"
     style="
        min-height:100vh;
        background:
        linear-gradient(
            rgba(25,135,84,0.85),
            rgba(20,100,60,0.85)
        ),
        url('{{ asset('dist/img/photo2.png') }}');
        background-size: cover;
        background-position:center;
    ">

    <div class="login-box" style="width:420px;">

        <div class="card border-0 shadow-lg"
             style="border-radius:20px; overflow:hidden;">

            <div class="card-body login-card-body p-5">

                <div class="text-center mb-4">

                    <div class="mb-3">

                        <div class="bg-success rounded-circle shadow d-inline-flex justify-content-center align-items-center"
                             style="width:90px;height:90px;">

                            <i class="fas fa-user-graduate text-white fa-3x"></i>

                        </div>

                    </div>

                    <h3 class="font-weight-bold text-success">
                        Login Peminjam
                    </h3>

                    <p class="text-muted">
                        Perpustakaan Digital Sekolah
                    </p>

                </div>

                @if(session('gagal'))

                    <div class="alert alert-danger">

                        {{ session('gagal') }}

                    </div>

                @endif

                <form action="{{ route('prosesloginpeminjam') }}"
                      method="POST">

                    @csrf

                    <div class="input-group mb-4">

                        <input type="text"
                               name="username"
                               class="form-control"
                               placeholder="Masukkan Username"
                               required>

                        <div class="input-group-append">

                            <div class="input-group-text bg-success text-white">

                                <span class="fas fa-user"></span>

                            </div>

                        </div>

                    </div>

                    <div class="input-group mb-4">

                        <input type="password"
                               name="password"
                               class="form-control"
                               placeholder="Masukkan Password"
                               required>

                        <div class="input-group-append">

                            <div class="input-group-text bg-success text-white">

                                <span class="fas fa-lock"></span>

                            </div>

                        </div>

                    </div>

                    <button type="submit"
                            class="btn btn-success btn-block rounded-pill py-2 shadow">

                        <i class="fas fa-sign-in-alt mr-2"></i>

                        Login Peminjam

                    </button>

                </form>

                <hr>

                <div class="text-center">

                    <p class="mb-2">
                        Belum punya akun?
                    </p>

                    <a href="{{ route('registerpeminjam') }}"
                       class="btn btn-outline-success rounded-pill px-4">

                        <i class="fas fa-user-plus mr-1"></i>

                        Register

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection