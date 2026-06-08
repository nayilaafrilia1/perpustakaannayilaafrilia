@extends('layouts.appuser')

@section('title', 'Detail Denda')

@section('content')

<div class="card card-primary card-outline">

<div class="card-header">

    <h3 class="card-title">

        Detail Denda

    </h3>

</div>

<div class="card-body">

    <table class="table table-bordered">

        <tr>
            <th width="250">Nama Peminjam</th>
            <td>{{ $denda->peminjaman->peminjam->namapeminjam }}</td>
        </tr>

        <tr>
            <th>Judul Buku</th>
            <td>{{ $denda->buku->judul }}</td>
        </tr>

        <tr>
            <th>Tanggal Pinjam</th>
            <td>{{ $denda->tanggalpinjam }}</td>
        </tr>

        <tr>
            <th>Jatuh Tempo</th>
            <td>{{ $denda->tanggalkembali }}</td>
        </tr>

        <tr>
            <th>Tanggal Dikembalikan</th>
            <td>{{ $denda->tanggalkembalikan }}</td>
        </tr>

        <tr>
            <th>Hari Telat</th>
            <td>{{ $denda->jumlahharitelat }} Hari</td>
        </tr>

        <tr>
            <th>Total Denda</th>
            <td>

                Rp
                {{ number_format($denda->denda,0,',','.') }}

            </td>
        </tr>

    </table>

</div>

<div class="card-footer">

    <a href="{{ route('denda.index') }}"
        class="btn btn-secondary">

        Kembali

    </a>

</div>

</div>

@endsection
