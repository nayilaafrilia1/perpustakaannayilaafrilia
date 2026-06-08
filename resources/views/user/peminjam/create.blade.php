@extends('layouts.appuser')

@section('title','Tambah Peminjam')

@section('content')

<section class="content">
    <div class="container-fluid">

        <div class="card card-primary card-outline">

            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-user-plus"></i> Tambah Peminjam
                </h3>
            </div>

            <form action="{{ route('peminjam.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="card-body">

                    <div class="row">

                        <div class="col-md-6">

                            <div class="form-group">
                                <label>Nama Peminjam</label>
                                <input type="text" name="namapeminjam" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>No HP</label>
                                <input type="text" name="nomorhp" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="alamat" class="form-control"></textarea>
                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-group">
                                <label>Jenis Peminjam</label>
                                <select name="jenis_peminjam" class="form-control" required>
                                    <option value="siswa">Siswa</option>
                                    <option value="umum">Umum</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Kelas</label>
                                <select name="kelas" class="form-control" required>
                                    <option value="">-- Pilih Kelas --</option>

                                    <optgroup label="X">
                                        <option value="X RPL 1">X RPL 1</option>
                                        <option value="X RPL 2">X RPL 2</option>
                                        <option value="X TKJ 1">X TKJ 1</option>
                                        <option value="X TKJ 2">X TKJ 2</option>
                                    </optgroup>

                                    <optgroup label="XI">
                                        <option value="XI RPL 1">XI RPL 1</option>
                                        <option value="XI RPL 2">XI RPL 2</option>
                                        <option value="XI TKJ 1">XI TKJ 1</option>
                                        <option value="XI TKJ 2">XI TKJ 2</option>
                                    </optgroup>

                                    <optgroup label="XII">
                                        <option value="XII RPL 1">XII RPL 1</option>
                                        <option value="XII RPL 2">XII RPL 2</option>
                                        <option value="XII TKJ 1">XII TKJ 1</option>
                                        <option value="XII TKJ 2">XII TKJ 2</option>
                                    </optgroup>

                                </select>
                            </div>

                            <div class="form-group">
                                <label>NISN</label>
                                <input type="text" name="nisn" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Tahun Akademik</label>
                                <select name="tahun_akademik" class="form-control" required>
                                    <option value="">-- Pilih Tahun Akademik --</option>

                                    @php
                                    $year = date('Y');
                                    @endphp

                                    @for($i = -2; $i <= 3; $i++)
                                        <option value="{{ $year+$i }}/{{ $year+$i+1 }}">
                                        {{ $year+$i }}/{{ $year+$i+1 }}
                                        </option>
                                        @endfor

                                </select>
                            </div>

                            <div class="form-group">
                                <label>Foto</label>
                                <input type="file" name="foto" class="form-control">
                            </div>

                        </div>

                    </div>

                </div>

                <div class="card-footer">
                    <button class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                </div>

            </form>

        </div>

    </div>
</section>

@endsection