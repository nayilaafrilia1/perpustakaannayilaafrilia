@extends('layouts.appuser')

@section('title', 'Dashboard Admin')

@section('content')

{{-- HEADER --}}
<div class="content-header">

    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">

                <h1 class="m-0 font-weight-bold text-primary">
                    Dashboard Admin
                </h1>

                <p class="text-muted">
                    Selamat datang di sistem perpustakaan digital
                </p>

            </div>

        </div>

    </div>

</div>

{{-- CONTENT --}}
<section class="content">

    <div class="container-fluid">

        {{-- STATISTIK --}}
        <div class="row">

            <div class="col-lg-3 col-6">

                <div class="small-box bg-primary shadow">

                    <div class="inner">

                        <h3>{{ $totalBuku ?? 0 }}</h3>

                        <p>Total Buku</p>

                    </div>

                    <div class="icon">
                        <i class="fas fa-book"></i>
                    </div>

                    <a href="{{ url('/buku') }}" class="small-box-footer">
                        Detail
                        <i class="fas fa-arrow-circle-right"></i>
                    </a>

                </div>

            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-success shadow">

                    <div class="inner">

                        <h3>{{ $totalPeminjam ?? 0 }}</h3>

                        <p>Total Peminjam</p>

                    </div>

                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>

                    <a href="{{ url('/peminjam') }}" class="small-box-footer">
                        Detail
                        <i class="fas fa-arrow-circle-right"></i>
                    </a>

                </div>

            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-warning shadow">

                    <div class="inner">

                        <h3>{{ $totalPeminjaman ?? 0 }}</h3>

                        <p>Peminjaman</p>

                    </div>

                    <div class="icon">
                        <i class="fas fa-book-reader"></i>
                    </div>

                    <a href="{{ url('/peminjaman') }}" class="small-box-footer">
                        Detail
                        <i class="fas fa-arrow-circle-right"></i>
                    </a>

                </div>

            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-danger shadow">

                    <div class="inner">

                        <h3>{{ $totalDenda ?? 0 }}</h3>

                        <p>Total Denda</p>

                    </div>

                    <div class="icon">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>

                    <a href="{{ url('/denda') }}" class="small-box-footer">
                        Detail
                        <i class="fas fa-arrow-circle-right"></i>
                    </a>

                </div>

            </div>

        </div>

        {{-- ROW --}}
        <div class="row">

            {{-- GRAFIK --}}
            <div class="col-md-8">

                <div class="card shadow-sm border-0">

                    <div class="card-header bg-white">

                        <h3 class="card-title font-weight-bold">
                            Statistik Peminjaman
                        </h3>

                    </div>

                    <div class="card-body">

                        <canvas id="grafikPeminjaman"
                                style="height: 300px;"></canvas>

                    </div>

                </div>

            </div>

            {{-- AKTIVITAS --}}
            <div class="col-md-4">

                <div class="card shadow-sm border-0">

                    <div class="card-header bg-white">

                        <h3 class="card-title font-weight-bold">
                            Aktivitas Terbaru
                        </h3>

                    </div>

                    <div class="card-body">

                        <div class="timeline timeline-inverse">

                            <div class="time-label">
                                <span class="bg-primary">
                                    Hari Ini
                                </span>
                            </div>

                            <div>
                                <i class="fas fa-book bg-success"></i>

                                <div class="timeline-item">

                                    <span class="time">
                                        <i class="far fa-clock"></i>
                                        2 jam lalu
                                    </span>

                                    <h3 class="timeline-header">
                                        Buku dipinjam
                                    </h3>

                                    <div class="timeline-body">
                                        Siswa meminjam buku Laravel
                                    </div>

                                </div>

                            </div>

                            <div>
                                <i class="fas fa-user bg-info"></i>

                                <div class="timeline-item">

                                    <span class="time">
                                        <i class="far fa-clock"></i>
                                        4 jam lalu
                                    </span>

                                    <h3 class="timeline-header">
                                        Peminjam baru
                                    </h3>

                                    <div class="timeline-body">
                                        Anggota baru berhasil mendaftar
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        {{-- TABLE --}}
        <div class="card shadow-sm border-0">

            <div class="card-header bg-white">

                <h3 class="card-title font-weight-bold">
                    Buku Terbaru
                </h3>

            </div>

            <div class="card-body table-responsive p-0">

                <table class="table table-hover text-nowrap">

                    <thead class="bg-light">

                        <tr>

                            <th>No</th>
                            <th>Cover</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Status</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($bukuTerbaru ?? [] as $item)

                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>

                                <img src="{{ asset('cover/buku/' . $item->cover) }}"
                                     width="50"
                                     class="rounded shadow-sm">

                            </td>

                            <td>{{ $item->judul }}</td>

                            <td>{{ $item->kategori->nama_kategori ?? '-' }}</td>

                            <td>

                                <span class="badge badge-success">
                                    Tersedia
                                </span>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="5" class="text-center">
                                Tidak ada data
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