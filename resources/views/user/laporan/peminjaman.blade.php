@extends('layouts.appuser')

@section('title', 'Laporan Peminjaman')

@section('content')

<div class="content-header">
    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">
                <h1>Laporan Peminjaman</h1>
            </div>

            <div class="col-sm-6 text-right">

                <a href="{{ route('laporan.peminjaman.cetak', request()->query()) }}"
                   target="_blank"
                   class="btn btn-danger">

                    <i class="fas fa-print"></i> Cetak

                </a>

            </div>

        </div>

    </div>
</div>

<section class="content">
<div class="container-fluid">

    {{-- FILTER --}}
    <div class="card card-primary card-outline">

        <div class="card-header">
            <h3 class="card-title">Filter Peminjaman</h3>
        </div>

        <div class="card-body">

            <form method="GET">

                <div class="row">

                    <div class="col-md-8">
                        <label>Cari Nama Peminjam</label>
                        <input type="text"
                               name="cari"
                               class="form-control"
                               value="{{ request('cari') }}"
                               placeholder="Nama peminjam...">
                    </div>

                    <div class="col-md-4">
                        <label>&nbsp;</label>
                        <button class="btn btn-primary btn-block">
                            <i class="fas fa-search"></i> Filter
                        </button>
                    </div>

                </div>

            </form>

        </div>

    </div>

    {{-- TABLE --}}
    <div class="card card-success card-outline">

        <div class="card-header">
            <h3 class="card-title">Data Peminjaman Buku</h3>
        </div>

        <div class="card-body table-responsive p-0">

            <table class="table table-bordered table-hover">

                <thead class="text-center">

                    <tr>
                        <th>No</th>
                        <th>Peminjam</th>
                        <th>Admin</th>
                        <th>Total Denda</th>
                        <th>Tunggakan</th>
                        <th>Jumlah Buku</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($peminjaman as $item)

                    <tr>

                        <td class="text-center">
                            {{ $loop->iteration }}
                        </td>

                        <td>
                            {{ $item->peminjam->namapeminjam ?? '-' }}
                        </td>

                        <td>
                            {{ $item->user->namauser ?? '-' }}
                        </td>

                        <td class="text-center">
                            Rp{{ number_format($item->totaldenda,0,',','.') }}
                        </td>

                        <td class="text-center">
                            Rp{{ number_format($item->tunggakan,0,',','.') }}
                        </td>

                        <td class="text-center">
                            {{ $item->detailPeminjaman->count() }} buku
                        </td>

                    </tr>

                    @empty

                    <tr>
                        <td colspan="6" class="text-center text-danger">
                            Tidak ada data peminjaman
                        </td>
                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        <div class="card-footer">
            {{ $peminjaman->links() }}
        </div>

    </div>

</div>
</section>

@endsection