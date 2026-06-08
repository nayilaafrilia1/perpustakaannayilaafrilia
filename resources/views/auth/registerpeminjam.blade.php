@extends('layouts.apptamu')

@section('title', 'Register Peminjam')

@section('content')

<div class="register-page"
     style="
        min-height:100vh;
        background:linear-gradient(135deg,#eef2ff,#dbeafe);
        padding:30px 0;
     ">

    <div class="register-box"
         style="max-width:900px;width:95%;">

        <div class="card register-card shadow-lg border-0">

            {{-- Header --}}
            <div class="register-header">

                <div class="logo-circle">
                    <i class="fas fa-user-plus"></i>
                </div>

                <h2 class="mt-3 mb-1 font-weight-bold text-white">
                    Registrasi Peminjam
                </h2>

                <p class="text-white mb-0">
                    Daftar akun Perpustakaan Digital
                </p>

            </div>

            {{-- Body --}}
            <div class="card-body register-card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('prosesregisterpeminjam') }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf

                    <div class="row">

                        {{-- Nama --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-user"></i>
                                        </span>
                                    </div>
                                    <input type="text"
                                           name="namapeminjam"
                                           class="form-control"
                                           required>
                                </div>
                            </div>
                        </div>

                        {{-- Username --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Username</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-id-card"></i>
                                        </span>
                                    </div>
                                    <input type="text"
                                           name="username"
                                           class="form-control"
                                           required>
                                </div>
                            </div>
                        </div>

                        {{-- Password --}}
                        <div class="col-md-6">
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
                                           required>

                                    <div class="input-group-append">
                                        <span class="input-group-text"
                                              onclick="togglePassword()"
                                              style="cursor:pointer;">
                                            <i id="eye"
                                               class="fas fa-eye"></i>
                                        </span>
                                    </div>

                                </div>
                            </div>
                        </div>

                        {{-- Nomor HP --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nomor HP</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-phone"></i>
                                        </span>
                                    </div>
                                    <input type="text"
                                           name="nomorhp"
                                           class="form-control">
                                </div>
                            </div>
                        </div>

                        {{-- Jenis Peminjam --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jenis Peminjam</label>
                                <select name="jenis_peminjam"
                                        class="form-control">
                                    <option value="siswa">Siswa</option>
                                    <option value="guru">Guru</option>
                                    <option value="umum">Umum</option>
                                </select>
                            </div>
                        </div>

                        {{-- Kelas --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kelas</label>
                                <input type="text"
                                       name="kelas"
                                       class="form-control">
                            </div>
                        </div>

                        {{-- NISN --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>NISN</label>
                                <input type="text"
                                       name="nisn"
                                       class="form-control">
                            </div>
                        </div>

                        {{-- Tahun Akademik --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tahun Akademik</label>
                                <input type="text"
                                       name="tahun_akademik"
                                       class="form-control">
                            </div>
                        </div>

                        {{-- Foto --}}
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Foto Profil</label>
                                <input type="file"
                                       name="foto"
                                       class="form-control">
                            </div>
                        </div>

                        {{-- Alamat --}}
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="alamat"
                                          rows="4"
                                          class="form-control"></textarea>
                            </div>
                        </div>

                    </div>

                    <button type="submit"
                            class="btn btn-register btn-block">

                        <i class="fas fa-user-plus mr-2"></i>
                        Daftar Sekarang

                    </button>

                </form>

                <hr>

                <div class="text-center">

                    <a href="{{ route('loginpeminjam') }}"
                       class="btn btn-outline-primary">

                        <i class="fas fa-sign-in-alt mr-1"></i>
                        Sudah Punya Akun? Login

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

<style>

.register-card{
    border-radius:25px;
    overflow:hidden;
}

.register-header{
    background:linear-gradient(
        135deg,
        #4f46e5,
        #2563eb
    );
    padding:35px;
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

.register-card-body{
    padding:35px;
}

.form-control{
    border-radius:10px;
}

.input-group-text{
    background:#eef2ff;
    color:#4f46e5;
    border:none;
}

.btn-register{
    background:linear-gradient(
        135deg,
        #4f46e5,
        #2563eb
    );
    color:white;
    border:none;
    border-radius:12px;
    padding:12px;
    font-weight:600;
}

.btn-register:hover{
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