@extends('layouts.apptamu')

@section('title', 'Login User')

@section('content')

<div class="login-page bg-light"
     style="
        min-height:100vh;
        background:
        linear-gradient(
            rgba(13,71,161,0.85),
            rgba(21,101,192,0.85)
        ),
        url('{{ asset('dist/img/photo1.png') }}');
        background-size: cover;
        background-position:center;
    ">

    <div class="login-box" style="width:420px;">

        <div class="card border-0 shadow-lg"
             style="border-radius:20px; overflow:hidden;">

            <div class="card-body login-card-body p-5">

                {{-- LOGO --}}
                <div class="text-center mb-4">

                    <div class="mb-3">

                        <div class="bg-primary rounded-circle shadow d-inline-flex justify-content-center align-items-center"
                             style="width:90px;height:90px;">

                            <i class="fas fa-book-reader text-white fa-3x"></i>

                        </div>

                    </div>

                    <h3 class="font-weight-bold text-primary">
                        Perpustakaan Digital
                    </h3>

                    <p class="text-muted">
                        Login Admin / Petugas
                    </p>

                </div>

                {{-- ALERT --}}
                @if(session('gagal'))

                    <div class="alert alert-danger">

                        {{ session('gagal') }}

                    </div>

                @endif

                {{-- FORM --}}
                <form action="{{ route('prosesloginuser') }}"
                      method="POST">

                    @csrf

                    {{-- USERNAME --}}
                    <div class="input-group mb-4">

                        <input type="text"
                               name="username"
                               class="form-control rounded-left"
                               placeholder="Masukkan Username"
                               required>

                        <div class="input-group-append">

                            <div class="input-group-text bg-primary text-white rounded-right">

                                <span class="fas fa-user"></span>

                            </div>

                        </div>

                    </div>

                    {{-- PASSWORD --}}
                    <div class="input-group mb-4">

                        <input type="password"
                               name="password"
                               class="form-control rounded-left"
                               placeholder="Masukkan Password"
                               required>

                        <div class="input-group-append">

                            <div class="input-group-text bg-primary text-white rounded-right">

                                <span class="fas fa-lock"></span>

                            </div>

                        </div>

                    </div>

                    {{-- BUTTON --}}
                    <button type="submit"
                            class="btn btn-primary btn-block rounded-pill py-2 shadow-sm">

                        <i class="fas fa-sign-in-alt mr-2"></i>

                        Login Sekarang

                    </button>

                </form>

                <hr>

                <div class="text-center">

                    <a href="{{ url('/') }}"
                       class="text-primary">

                        <i class="fas fa-arrow-left mr-1"></i>

                        Kembali ke Beranda

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection