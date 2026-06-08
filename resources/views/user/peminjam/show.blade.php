@extends('layouts.appuser')

@section('title','Detail Peminjam')

@section('content')

<section class="content">
<div class="container-fluid">

<div class="card card-info card-outline">

    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-user"></i> Detail Peminjam
        </h3>
    </div>

    <div class="card-body">

        <div class="text-center mb-3">

            @if($peminjam->foto)
                <img src="{{ asset('storage/peminjam/'.$peminjam->foto) }}"
                     width="120"
                     height="120"
                     style="border-radius:50%; object-fit:cover;">
            @else
                <img src="{{ asset('img/default.png') }}"
                     width="120"
                     height="120"
                     style="border-radius:50%; object-fit:cover;">
            @endif

        </div>

        <table class="table table-bordered">

            <tr><th>Nama</th><td>{{ $peminjam->namapeminjam }}</td></tr>
            <tr><th>Username</th><td>{{ $peminjam->username }}</td></tr>
            <tr><th>No HP</th><td>{{ $peminjam->nomorhp }}</td></tr>
            <tr><th>Alamat</th><td>{{ $peminjam->alamat }}</td></tr>
            <tr><th>Jenis</th><td>{{ $peminjam->jenis_peminjam }}</td></tr>
            <tr><th>Kelas</th><td>{{ $peminjam->kelas ?? '-' }}</td></tr>
            <tr><th>NISN</th><td>{{ $peminjam->nisn ?? '-' }}</td></tr>
            <tr><th>Tahun Akademik</th><td>{{ $peminjam->tahun_akademik ?? '-' }}</td></tr>

            <tr>
                <th>Status</th>
                <td>
                    @if($peminjam->status == 'setujui')
                        <span class="badge badge-success">Disetujui</span>
                    @elseif($peminjam->status == 'pending')
                        <span class="badge badge-warning">Pending</span>
                    @else
                        <span class="badge badge-danger">Ditolak</span>
                    @endif
                </td>
            </tr>

        </table>

    </div>

</div>

</div>
</section>

@endsection