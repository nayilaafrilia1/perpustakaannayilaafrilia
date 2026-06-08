@extends('layouts.appuser')

@section('title', 'Detail Peminjaman')

@section('content')

<div class="container-fluid">

    <div class="card card-primary card-outline">

        <div class="card-header">
            <h3 class="card-title">Detail Peminjaman</h3>
        </div>

        <div class="card-body">

            <p><b>Peminjam:</b> {{ $peminjaman->peminjam->namapeminjam ?? '-' }}</p>
            <p><b>User:</b> {{ $peminjaman->user->namauser ?? '-' }}</p>

            <hr>

            <h5>Daftar Buku</h5>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Judul Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Kembali</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($peminjaman->detailPeminjaman as $d)
                        <tr>
                            <td>{{ $d->buku->judul ?? '-' }}</td>
                            <td>{{ $d->tanggalpinjam }}</td>
                            <td>{{ $d->tanggalkembali }}</td>
                            <td>{{ $d->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

        <div class="card-footer text-right">
            <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary btn-sm">
                Kembali
            </a>
        </div>

    </div>

</div>

@endsection