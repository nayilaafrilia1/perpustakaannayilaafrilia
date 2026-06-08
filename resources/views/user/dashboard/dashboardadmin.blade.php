@extends('layouts.appuser')

@section('title','Dashboard Admin')

@section('content')

<div class="content-header">
    <div class="container-fluid">

        {{-- HERO --}}
        <div class="card bg-gradient-primary shadow-lg border-0 mb-4">

            <div class="card-body">

                <div class="row align-items-center">

                    <div class="col-md-8">

                        <h2 class="font-weight-bold">
                            Selamat Datang,
                            {{ auth()->user()->nama }}
                        </h2>

                        <p class="mb-0">
                            Sistem Informasi Perpustakaan Digital
                        </p>

                    </div>

                    <div class="col-md-4 text-center">

                        <i class="fas fa-book-reader"
                           style="font-size:90px;opacity:.3;">
                        </i>

                    </div>

                </div>

            </div>

        </div>

    </div>
</div>

<section class="content">

<div class="container-fluid">

    {{-- INFO BOX --}}
    <div class="row">

        <div class="col-md-3">

            <div class="info-box shadow">

                <span class="info-box-icon bg-primary">
                    <i class="fas fa-book"></i>
                </span>

                <div class="info-box-content">

                    <span class="info-box-text">
                        Total Buku
                    </span>

                    <span class="info-box-number">
                        {{ $totalBuku }}
                    </span>

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="info-box shadow">

                <span class="info-box-icon bg-success">
                    <i class="fas fa-users"></i>
                </span>

                <div class="info-box-content">

                    <span class="info-box-text">
                        Peminjam
                    </span>

                    <span class="info-box-number">
                        {{ $totalPeminjam }}
                    </span>

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="info-box shadow">

                <span class="info-box-icon bg-warning">
                    <i class="fas fa-book-reader"></i>
                </span>

                <div class="info-box-content">

                    <span class="info-box-text">
                        Peminjaman
                    </span>

                    <span class="info-box-number">
                        {{ $totalPeminjaman }}
                    </span>

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="info-box shadow">

                <span class="info-box-icon bg-danger">
                    <i class="fas fa-money-bill-wave"></i>
                </span>

                <div class="info-box-content">

                    <span class="info-box-text">
                        Denda
                    </span>

                    <span class="info-box-number">
                        {{ $totalDenda }}
                    </span>

                </div>

            </div>

        </div>

    </div>

    {{-- GRAFIK + RINGKASAN --}}
    <div class="row">

        <div class="col-md-8">

            <div class="card card-primary card-outline shadow">

                <div class="card-header">

                    <h3 class="card-title">

                        Statistik Peminjaman Tahun Ini

                    </h3>

                </div>

                <div class="card-body">

                    <canvas id="grafikPeminjaman"
                            height="120"></canvas>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card card-success card-outline shadow">

                <div class="card-header">

                    <h3 class="card-title">

                        Ringkasan Sistem

                    </h3>

                </div>

                <div class="card-body">

                    <div class="description-block border-right">

                        <h5 class="description-header">
                            {{ $totalDipinjam }}
                        </h5>

                        <span class="description-text">
                            Sedang Dipinjam
                        </span>

                    </div>

                    <hr>

                    <div class="description-block border-right">

                        <h5 class="description-header">
                            {{ $totalDikembalikan }}
                        </h5>

                        <span class="description-text">
                            Dikembalikan
                        </span>

                    </div>

                    <hr>

                    <div class="description-block">

                        <h5 class="description-header text-danger">
                            {{ $totalTerlambat }}
                        </h5>

                        <span class="description-text">
                            Terlambat
                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>

    {{-- BUKU TERBARU --}}
    <div class="card card-primary card-outline shadow">

        <div class="card-header">

            <h3 class="card-title">

                Buku Terbaru

            </h3>

        </div>

        <div class="card-body table-responsive">

            <table class="table table-hover">

                <thead>

                    <tr>

                        <th>No</th>
                        <th>Cover</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Status</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($bukuTerbaru as $item)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>

                            <img src="{{ asset('cover/buku/'.$item->cover) }}"
                                 width="50"
                                 class="img-circle elevation-2">

                        </td>

                        <td>

                            <strong>
                                {{ $item->judul }}
                            </strong>

                        </td>

                        <td>
                            {{ $item->kategori->nama_kategori ?? '-' }}
                        </td>

                        <td>

                            <span class="badge badge-success">
                                Tersedia
                            </span>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="5"
                            class="text-center">

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

@section('js')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

new Chart(
document.getElementById('grafikPeminjaman'),
{
    type:'line',

    data:{

        labels:[
            'Jan','Feb','Mar','Apr',
            'Mei','Jun','Jul','Agu',
            'Sep','Okt','Nov','Des'
        ],

        datasets:[{

            label:'Jumlah Peminjaman',

            data:@json($grafikPeminjaman),

            fill:true,

            tension:0.4,

            borderWidth:3

        }]

    },

    options:{
        responsive:true,
        maintainAspectRatio:false
    }
});

</script>

@endsection