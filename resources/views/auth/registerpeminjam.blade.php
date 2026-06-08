@extends('layouts.apptamu')

@section('title', 'Register Peminjam')

@section('content')

<div class="register-page"
     style="
        min-height:100vh;
        background:
        linear-gradient(
            rgba(25,135,84,0.90),
            rgba(13,110,253,0.85)
        ),
        url('{{ asset('dist/img/photo4.jpg') }}');
        background-size: cover;
        background-position:center;
    ">

    <div class="register-box"
         style="width:700px;">

        <div class="card border-0 shadow-lg"
             style="border-radius:20px; overflow:hidden;">

            <div class="card-body register-card-body p-5">

                <div class="text-center mb-4">

                    <div class="bg-success rounded-circle d-inline-flex justify-content-center align-items-center shadow"
                         style="width:90px;height:90px;">

                        <i class="fas fa-book-reader text-white fa-3x"></i>

                    </div>

                    <h2 class="font-weight-bold text-success mt-3">

                        Registrasi Peminjam

                    </h2>

                    <p class="text-muted">

                        Daftar akun perpustakaan digital sekolah

                    </p>

                </div>

                <form action="{{ route('prosesregisterpeminjam') }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf

                    <div class="row">

                        {{-- NAMA --}}
                        <div class="col-md-6">

                            <div class="form-group">

                                <label>Nama Lengkap</label>

                                <input type="text"
                                       name="namapeminjam"
                                       class="form-control"
                                       required>

                            </div>

                        </div>

                        {{-- USERNAME --}}
                        <div class="col-md-6">

                            <div class="form-group">

                                <label>Username</label>

                                <input type="text"
                                       name="username"
                                       class="form-control"
                                       required>

                            </div>

                        </div>

                        {{-- PASSWORD --}}
                        <div class="col-md-6">

                            <div class="form-group">

                                <label>Password</label>

                                <input type="password"
                                       name="password"
                                       class="form-control"
                                       required>

                            </div>

                        </div>

                        {{-- NOMOR HP --}}
                        <div class="col-md-6">

                            <div class="form-group">

                                <label>Nomor HP</label>

                                <input type="text"
                                       name="nomorhp"
                                       class="form-control">

                            </div>

                        </div>

                        {{-- JENIS --}}
                        <div class="col-md-6">

                            <div class="form-group">

                                <label>Jenis Peminjam</label>

                                <select name="jenis_peminjam"
                                        class="form-control">

                                    <option value="siswa">
                                        Siswa
                                    </option>

                                    <option value="guru">
                                        Guru
                                    </option>

                                    <option value="umum">
                                        Umum
                                    </option>

                                </select>

                            </div>

                        </div>

                        {{-- KELAS --}}
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

                        {{-- TAHUN AKADEMIK --}}
                        <div class="col-md-6">

                            <div class="form-group">

                                <label>Tahun Akademik</label>

                                <input type="text"
                                       name="tahun_akademik"
                                       class="form-control">

                            </div>

                        </div>

                        {{-- FOTO --}}
                        <div class="col-md-12">

                            <div class="form-group">

                                <label>Foto</label>

                                <input type="file"
                                       name="foto"
                                       class="form-control">

                            </div>

                        </div>

                        {{-- ALAMAT --}}
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
                            class="btn btn-success btn-block rounded-pill py-2 shadow">

                        <i class="fas fa-user-plus mr-2"></i>

                        Daftar Sekarang

                    </button>

                </form>

                <hr>

                <div class="text-center">

                    <a href="{{ route('loginpeminjam') }}"
                       class="text-success">

                        Sudah punya akun? Login disini

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection