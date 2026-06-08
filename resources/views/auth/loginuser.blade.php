@extends('layouts.apptamu')

@section('title', 'Login Admin & Petugas')

@section('content')

<div class="login-page"
     style="
        min-height:100vh;
        background:linear-gradient(135deg,#fff7ed,#fed7aa);
     ">

    <div class="login-box" style="width:450px;">

        <div class="card login-card shadow-lg border-0">

            {{-- Header --}}
            <div class="login-header">

                <div class="logo-circle">
                    <i class="fas fa-user-shield"></i>
                </div>

                <h2 class="mt-3 mb-1 font-weight-bold text-white">
                    Perpustakaan Digital
                </h2>

                <p class="text-white mb-0">
                    Login Admin & Petugas
                </p>

            </div>

            {{-- Body --}}
            <div class="card-body login-card-body">

                @if(session('gagal'))
                    <div class="alert alert-danger">
                        {{ session('gagal') }}
                    </div>
                @endif

                <form action="{{ route('prosesloginuser') }}"
                      method="POST">

                    @csrf

                    <div class="form-group">

                        <label>Username</label>

                        <div class="input-group">

                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </span>
                            </div>

                            <input type="text"
                                   name="username"
                                   class="form-control"
                                   placeholder="Masukkan Username"
                                   required>

                        </div>

                    </div>

                    <div class="form-group">

                        <label>Password</label>

                        <div class="input-group">

                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </span>
                            </div>

                            <input type="password"
                                   id="password"
                                   name="password"
                                   class="form-control"
                                   placeholder="Masukkan Password"
                                   required>

                            <div class="input-group-append">

                                <span class="input-group-text"
                                      onclick="togglePassword()"
                                      style="cursor:pointer">

                                    <i id="eye"
                                       class="fas fa-eye"></i>

                                </span>

                            </div>

                        </div>

                    </div>

                    <button type="submit"
                            class="btn btn-login btn-block">

                        <i class="fas fa-sign-in-alt mr-2"></i>
                        Login

                    </button>

                </form>

                <hr>

                <div class="text-center">

                    <a href="{{ url('/') }}"
                       class="btn btn-outline-secondary">

                        <i class="fas fa-arrow-left mr-1"></i>
                        Kembali ke Beranda

                    </a>

                </div>

            </div>

        </div>

        <div class="text-center mt-3">

            <small class="text-muted">
                © {{ date('Y') }} Perpustakaan Digital
            </small>

        </div>

    </div>

</div>

<style>

.login-card{
    border-radius:25px;
    overflow:hidden;
}

.login-header{
    background:linear-gradient(
        135deg,
        #f97316,
        #ea580c
    );
    padding:35px 25px;
    text-align:center;
}

.logo-circle{
    width:95px;
    height:95px;
    margin:auto;

    border-radius:50%;

    background:rgba(255,255,255,.15);

    border:3px solid rgba(255,255,255,.3);

    display:flex;
    align-items:center;
    justify-content:center;
}

.logo-circle i{
    color:white;
    font-size:40px;
}

.login-card-body{
    padding:35px;
}

.form-control{
    height:48px;
    border-radius:10px;
}

.input-group-text{
    background:#fff7ed;
    color:#ea580c;
    border:none;
}

.btn-login{
    background:linear-gradient(
        135deg,
        #f97316,
        #ea580c
    );
    border:none;
    color:white;
    padding:12px;
    border-radius:12px;
    font-weight:600;
}

.btn-login:hover{
    color:white;
}

.card{
    transition:.3s;
}

.card:hover{
    transform:translateY(-3px);
}

</style>

<script>
function togglePassword()
{
    let password = document.getElementById('password');
    let eye = document.getElementById('eye');

    if(password.type === 'password')
    {
        password.type = 'text';
        eye.classList.replace('fa-eye','fa-eye-slash');
    }
    else
    {
        password.type = 'password';
        eye.classList.replace('fa-eye-slash','fa-eye');
    }
}
</script>

@endsection