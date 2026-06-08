@extends('layouts.appuser')

@section('title', 'Dashboard Petugas')

@section('content')

<div class="content-header">

    <div class="container-fluid">

        <h1 class="font-weight-bold text-success">
            Dashboard Petugas
        </h1>

        <p class="text-muted">
            Kelola transaksi perpustakaan dengan mudah
        </p>

    </div>

</div>

<section class="content">

    <div class="container-fluid">

        {{-- STATISTIK --}}
        <div class="row">

            <div class="col-lg-4 col-md-6">

                <div class="info-box shadow-sm">

                    <span class="info-box-icon bg-primary elevation-1">
                        <i class="fas fa-book"></i>
                    </span>

                    <div class="info-box-content">

                        <span class="info-box-text">
                            Total Buku
                        </span>

                        <span class="info-box-number">
                            {{ $totalBuku ?? 0 }}
                        </span>

                    </div>

                </div>

            </div>

            <div class="col-lg-4 col-md-6">

                <div class="info-box shadow-sm">

                    <span class="info-box-icon bg-success elevation-1">
                        <i class="fas fa-book-reader"></i>
                    </span>

                    <div class="info-box-content">

                        <span class="info-box-text">
                            Peminjaman Hari Ini
                        </span>

                        <span class="info-box-number">
                            {{ $peminjamanHariIni ?? 0 }}
                        </span>

                    </div>

                </div>

            </div>

            <div class="col-lg-4 col-md-6">

                <div class="info-box shadow-sm">

                    <span class="info-box-icon bg-danger elevation-1">
                        <i class="fas fa-undo"></i>
                    </span>

                    <div class="info-box-content">

                        <span class="info-box-text">
                            Pengembalian Hari Ini
                        </span>

                        <span class="info-box-number">
                            {{ $pengembalianHariIni ?? 0 }}
                        </span>

                    </div>

                </div>

            </div>

        </div>

        {{-- TRANSAKSI TERBARU --}}
        <div class="card shadow-sm border-0">

            <div class="card-header bg-white">

                <h3 class="card-title font-weight-bold">
                    Transaksi Terbaru
                </h3>

            </div>

            <div class="card-body table-responsive p-0">

                <table class="table table-hover">

                    <thead class="bg-light">

                        <tr>

                            <th>No</th>
                            <th>Peminjam</th>
                            <th>Buku</th>
                            <th>Tanggal</th>
                            <th>Status</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($transaksiTerbaru ?? [] as $item)

                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $item->peminjam->nama ?? '-' }}</td>

                            <td>{{ $item->buku->judul ?? '-' }}</td>

                            <td>{{ $item->tanggal_pinjam ?? '-' }}</td>

                            <td>

                                <span class="badge badge-success">
                                    Dipinjam
                                </span>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="5" class="text-center">
                                Tidak ada transaksi
                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

        {{-- QUICK MENU --}}
        <div class="row mt-4">

            <div class="col-md-3 mb-3">

                <a href="{{ url('/peminjaman/create') }}"
                   class="btn btn-primary btn-block btn-lg shadow-sm rounded-pill">

                    <i class="fas fa-plus-circle mr-2"></i>
                    Peminjaman

                </a>

            </div>

            <div class="col-md-3 mb-3">

                <a href="{{ url('/pengembalian') }}"
                   class="btn btn-success btn-block btn-lg shadow-sm rounded-pill">

                    <i class="fas fa-undo mr-2"></i>
                    Pengembalian

                </a>

            </div>

            <div class="col-md-3 mb-3">

                <a href="{{ url('/buku') }}"
                   class="btn btn-warning btn-block btn-lg shadow-sm rounded-pill">

                    <i class="fas fa-book mr-2"></i>
                    Data Buku

                </a>

            </div>

            <div class="col-md-3 mb-3">

                <a href="{{ url('/peminjam') }}"
                   class="btn btn-danger btn-block btn-lg shadow-sm rounded-pill">

                    <i class="fas fa-users mr-2"></i>
                    Peminjam

                </a>

            </div>

        </div>

    </div>

</section>

@endsection