@extends('layouts.apppeminjam')

@section('title', 'Detail Peminjaman')

@section('content')

<div class="card card-success card-outline">

    <div class="card-header">
        <h3 class="card-title">Detail Peminjaman</h3>
    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <tr>
                <th>Judul Buku</th>
                <td>{{ $data->buku->judul ?? '-' }}</td>
            </tr>

            <tr>
                <th>Peminjam</th>
                <td>{{ $data->peminjaman->peminjam->namapeminjam ?? '-' }}</td>
            </tr>

            <tr>
                <th>Tanggal Pinjam</th>
                <td>{{ $data->tanggalpinjam }}</td>
            </tr>

            <tr>
                <th>Jatuh Tempo</th>
                <td>{{ $data->tanggalkembali }}</td>
            </tr>

            <tr>
                <th>Tanggal Kembali</th>
                <td>{{ $data->tanggalkembalikan ?? '-' }}</td>
            </tr>

            <tr>
                <th>Status</th>
                <td>{{ $data->status }}</td>
            </tr>

            <tr>
                <th>Keterangan</th>
                <td>{{ $data->keterangan }}</td>
            </tr>

            <tr>
                <th>Denda</th>
                <td>Rp {{ number_format($data->denda, 0, ',', '.') }}</td>
            </tr>

        </table>

        <a href="{{ url('/riwayatpeminjaman') }}" class="btn btn-secondary">
            Kembali
        </a>

    </div>

</div>

@endsection