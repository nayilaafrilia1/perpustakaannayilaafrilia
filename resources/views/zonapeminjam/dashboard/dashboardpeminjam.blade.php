@extends('layouts.apppeminjam')

@section('title','Dashboard Peminjam')

@section('content')

<div class="content-header">
    <div class="container-fluid">

        {{-- WELCOME --}}
        <div class="card bg-primary elevation-3">
            <div class="card-body">
                <div class="row align-items-center">

                    <div class="col-md-8">
                        <h2>
                            <i class="fas fa-book-reader"></i>
                            Selamat Datang,
                            {{ Auth::user()->nama ?? 'Peminjam' }}
                        </h2>

                        <p class="mb-0">
                            Sistem Informasi Perpustakaan Digital
                        </p>

                        <small>
                            {{ now()->translatedFormat('l, d F Y') }}
                        </small>
                    </div>

                    <div class="col-md-4 text-center">
                        <i class="fas fa-library fa-5x opacity-50"></i>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

<section class="content">
<div class="container-fluid">

    {{-- STATISTIK --}}
    <div class="row">

        <div class="col-lg-4 col-md-6">
            <div class="small-box bg-info elevation-2">
                <div class="inner">
                    <h3>{{ $totalPinjam ?? 0 }}</h3>
                    <p>Total Peminjaman</p>
                </div>
                <div class="icon">
                    <i class="fas fa-book"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="small-box bg-success elevation-2">
                <div class="inner">
                    <h3>{{ $totalKembali ?? 0 }}</h3>
                    <p>Total Pengembalian</p>
                </div>
                <div class="icon">
                    <i class="fas fa-check-circle"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-12">
            <div class="small-box bg-danger elevation-2">
                <div class="inner">
                    <h3>
                        Rp {{ number_format($totalDenda ?? 0,0,',','.') }}
                    </h3>
                    <p>Total Denda</p>
                </div>
                <div class="icon">
                    <i class="fas fa-money-bill-wave"></i>
                </div>
            </div>
        </div>

    </div>

    {{-- MENU CEPAT --}}
    <div class="row">

        <div class="col-md-4">
            <div class="card card-info card-outline">
                <div class="card-body text-center">

                    <i class="fas fa-book-open fa-3x text-info mb-3"></i>

                    <h5>Katalog Buku</h5>

                    <p>
                        Lihat seluruh koleksi buku perpustakaan.
                    </p>

                    <a href="{{ url('/katalog') }}"
                       class="btn btn-info">
                        Buka Katalog
                    </a>

                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card card-success card-outline">
                <div class="card-body text-center">

                    <i class="fas fa-history fa-3x text-success mb-3"></i>

                    <h5>Riwayat Peminjaman</h5>

                    <p>
                        Lihat semua riwayat peminjaman buku.
                    </p>

                    <a href="{{ url('/riwayatpeminjaman') }}"
                       class="btn btn-success">
                        Lihat Riwayat
                    </a>

                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card card-danger card-outline">
                <div class="card-body text-center">

                    <i class="fas fa-undo-alt fa-3x text-danger mb-3"></i>

                    <h5>Riwayat Pengembalian</h5>

                    <p>
                        Cek data buku yang sudah dikembalikan.
                    </p>

                    <a href="{{ url('/riwayatpengembalian') }}"
                       class="btn btn-danger">
                        Lihat Pengembalian
                    </a>

                </div>
            </div>
        </div>

    </div>

    {{-- RIWAYAT TERBARU --}}
    <div class="card card-primary card-outline">

        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-clock"></i>
                Riwayat Peminjaman Terbaru
            </h3>
        </div>

        <div class="card-body table-responsive p-0">

            <table class="table table-hover">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($riwayat ?? [] as $item)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>
                            {{ $item->buku->judul ?? '-' }}
                        </td>

                        <td>
                            {{ $item->tanggalpinjam ?? '-' }}
                        </td>

                        <td>

                            @if($item->keterangan == 'belumkembali')

                                <span class="badge badge-warning">
                                    Sedang Dipinjam
                                </span>

                            @else

                                <span class="badge badge-success">
                                    Sudah Dikembalikan
                                </span>

                            @endif

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="4" class="text-center">
                            Belum ada riwayat peminjaman.
                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>
</section>

@endsection