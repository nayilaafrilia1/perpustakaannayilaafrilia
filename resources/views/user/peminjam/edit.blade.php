@extends('layouts.appuser')

@section('title','Edit Peminjam')

@section('content')

<section class="content">
<div class="container-fluid">

<div class="card card-warning card-outline">

    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-edit"></i> Edit Peminjam
        </h3>
    </div>

    <form action="{{ route('peminjam.update',$peminjam->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="card-body">

            <div class="row">

                <div class="col-md-6">

                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="namapeminjam" value="{{ $peminjam->namapeminjam }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" value="{{ $peminjam->username }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>No HP</label>
                        <input type="text" name="nomorhp" value="{{ $peminjam->nomorhp }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control">{{ $peminjam->alamat }}</textarea>
                    </div>

                </div>

                <div class="col-md-6">

                    <div class="form-group">
                        <label>Jenis</label>
                        <select name="jenis_peminjam" class="form-control">
                            <option value="siswa" {{ $peminjam->jenis_peminjam=='siswa'?'selected':'' }}>Siswa</option>
                            <option value="umum" {{ $peminjam->jenis_peminjam=='umum'?'selected':'' }}>Umum</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Kelas</label>
                        <input type="text" name="kelas" value="{{ $peminjam->kelas }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>NISN</label>
                        <input type="text" name="nisn" value="{{ $peminjam->nisn }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Tahun Akademik</label>
                        <input type="text" name="tahun_akademik" value="{{ $peminjam->tahun_akademik }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Foto</label><br>

                        @if($peminjam->foto)
                            <img src="{{ asset('storage/peminjam/'.$peminjam->foto) }}"
                                 width="60"
                                 style="border-radius:50%;">
                        @endif

                        <input type="file" name="foto" class="form-control mt-2">
                    </div>

                </div>

            </div>

        </div>

        <div class="card-footer">
            <button class="btn btn-success">
                <i class="fas fa-save"></i> Update
            </button>
        </div>

    </form>

</div>

</div>
</section>

@endsection