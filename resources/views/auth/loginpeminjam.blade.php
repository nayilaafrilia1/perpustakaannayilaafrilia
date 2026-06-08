@extends('layouts.apptamu')

@section('title', 'Login Peminjam')

@section('content')

<div class="login-page"
     style="
        min-height:100vh;
        background:linear-gradient(135deg,#eef2ff,#dbeafe);
     ">

    <div class="login-box" style="width:450px;">

        <div class="card login-card shadow-lg border-0">

            {{-- Header --}}
            <div class="login-header">

                <div class="logo-circle">
                    <i class="fas fa-book-reader"></i>
                </div>

                <h2 class="mt-3 mb-1 font-weight-bold text-white">
                    Perpustakaan Digital
                </h2>

                <p class="text-white mb-0">
                    Login Peminjam
                </p>

            </div>

            {{-- Body --}}
            <div class="card-body login-card-body">

                @if(session('gagal'))
                    <div class="alert alert-danger">
                        {{ session('gagal') }}
                    </div>
                @endif

                <form action="{{ route('prosesloginpeminjam') }}"
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
                            class="btn btn-primary btn-block">

                        <i class="fas fa-sign-in-alt mr-2"></i>
                        Login

                    </button>

                </form>

                <hr>

                <div class="text-center">

                    <p class="text-muted mb-2">
                        Belum memiliki akun?
                    </p>

                    <a href="{{ route('registerpeminjam') }}"
                       class="btn btn-outline-primary">

                        <i class="fas fa-user-plus mr-1"></i>
                        Register

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
        #4f46e5,
        #2563eb
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
    border-radius:10px;
    height:48px;
}

.input-group-text{
    background:#eef2ff;
    color:#4f46e5;
    border:none;
}

.btn-primary{
    border:none;
    border-radius:12px;
    padding:12px;

    background:linear-gradient(
        135deg,
        #4f46e5,
        #2563eb
    );
}

.btn-outline-primary{
    border-radius:10px;
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
    let password =
        document.getElementById('password');

    let eye =
        document.getElementById('eye');

    if(password.type === 'password')
    {
        password.type = 'text';

        eye.classList.remove('fa-eye');
        eye.classList.add('fa-eye-slash');
    }
    else
    {
        password.type = 'password';

        eye.classList.remove('fa-eye-slash');
        eye.classList.add('fa-eye');
    }
}
</script>

@endsection