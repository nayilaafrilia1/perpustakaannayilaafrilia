@extends('layouts.apppeminjam')

@section('title','Dashboard Peminjam')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard Peminjam</h1>
            </div>
        </div>
    </div>
</div>

<section class="content">
<div class="container-fluid">

    {{-- STAT --}}
    <div class="row">

        <div class="col-lg-4 col-6">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ $totalPinjam ?? 0 }}</h3>
                    <p>Total Peminjaman</p>
                </div>
                <div class="icon">
                    <i class="fas fa-book"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $totalKembali ?? 0 }}</h3>
                    <p>Total Pengembalian</p>
                </div>
                <div class="icon">
                    <i class="fas fa-undo"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>Rp {{ number_format($totalDenda ?? 0,0,',','.') }}</h3>
                    <p>Total Denda</p>
                </div>
                <div class="icon">
                    <i class="fas fa-money-bill"></i>
                </div>
            </div>
        </div>

    </div>

    {{-- MENU --}}
    <div class="row">

        <div class="col-md-4">
            <a href="{{ url('/katalog') }}" class="small-box bg-info text-white">
                <div class="inner">
                    <h4>Katalog Buku</h4>
                </div>
                <div class="icon">
                    <i class="fas fa-book-open"></i>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="{{ url('/riwayatpeminjaman') }}" class="small-box bg-success text-white">
                <div class="inner">
                    <h4>Riwayat Pinjam</h4>
                </div>
                <div class="icon">
                    <i class="fas fa-history"></i>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="{{ url('/riwayatpengembalian') }}" class="small-box bg-danger text-white">
                <div class="inner">
                    <h4>Pengembalian</h4>
                </div>
                <div class="icon">
                    <i class="fas fa-undo"></i>
                </div>
            </a>
        </div>

    </div>

    {{-- TABLE --}}
    <div class="card mt-3">
        <div class="card-header">
            <h3 class="card-title">Riwayat Terbaru</h3>
        </div>

        <div class="card-body table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Buku</th>
                        <th>Tgl Pinjam</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                @forelse($riwayat ?? [] as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->buku->judul ?? '-' }}</td>
                        <td>{{ $item->tanggalpinjam ?? '-' }}</td>
                        <td>
                            @if($item->keterangan == 'belumkembali')
                                <span class="badge badge-warning">Dipinjam</span>
                            @else
                                <span class="badge badge-success">Dikembalikan</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada data</td>
                    </tr>
                @endforelse
                </tbody>

            </table>
        </div>
    </div>

</div>
</section>

@endsection