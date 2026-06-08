@extends('layouts.appuser')

@section('title','Detail Pengembalian')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <h1>Detail Pengembalian Buku</h1>
    </div>
</div>

<section class="content">

<div class="card">

<div class="card-body">

<table class="table table-bordered">

<tr>
    <th>Peminjam</th>
    <td>{{ $data->peminjaman->peminjam->namapeminjam }}</td>
</tr>

<tr>
    <th>Buku</th>
    <td>{{ $data->buku->judul }}</td>
</tr>

<tr>
    <th>Tanggal Pinjam</th>
    <td>{{ $data->tanggalpinjam }}</td>
</tr>

<tr>
    <th>Batas Kembali</th>
    <td>{{ $data->tanggalkembali }}</td>
</tr>

<tr>
    <th>Tanggal Dikembalikan</th>
    <td>{{ $data->tanggalkembalikan ?? '-' }}</td>
</tr>

<tr>
    <th>Hari Terlambat</th>
    <td>{{ $data->jumlahharitelat }}</td>
</tr>

<tr>
    <th>Denda</th>
    <td>
        Rp {{ number_format($data->denda,0,',','.') }}
    </td>
</tr>

<tr>
    <th>Status</th>
    <td>


    @if($data->status=='terlambat')

        <span class="badge badge-danger">
            Terlambat
        </span>

    @else

        <span class="badge badge-success">
            Tepat Waktu
        </span>

    @endif

</td>


</tr>

</table>

<a href="{{ route('pengembalian.index') }}"
class="btn btn-secondary">

Kembali

</a>

</div>
</div>

</section>

@endsection
