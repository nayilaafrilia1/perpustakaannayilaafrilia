@extends('layouts.appuser')

@section('title', 'Laporan Denda')

@section('content')

<div class="content-header">
    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">
                <h1>Laporan Denda</h1>
            </div>

            <div class="col-sm-6 text-right">

                <a href="{{ route('laporan.denda.cetak', request()->query()) }}"
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
            <h3 class="card-title">Filter Denda</h3>
        </div>

        <div class="card-body">

            <form method="GET">

                <div class="row">

                    <div class="col-md-6">
                        <label>Cari Nama Peminjam</label>
                        <input type="text"
                               name="cari"
                               class="form-control"
                               value="{{ request('cari') }}">
                    </div>

                    <div class="col-md-3">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="">Semua</option>
                            <option value="terlambat" {{ request('status')=='terlambat'?'selected':'' }}>Terlambat</option>
                            <option value="tidakterlambat" {{ request('status')=='tidakterlambat'?'selected':'' }}>Tidak</option>
                        </select>
                    </div>

                    <div class="col-md-3">
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
            <h3 class="card-title">Data Denda</h3>
        </div>

        <div class="card-body table-responsive p-0">

            <table class="table table-bordered table-hover">

                <thead class="text-center">

                    <tr>
                        <th>No</th>
                        <th>Peminjam</th>
                        <th>Buku</th>
                        <th>Hari Telat</th>
                        <th>Denda</th>
                        <th>Status</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($denda as $item)

                    <tr>

                        <td class="text-center">
                            {{ $loop->iteration }}
                        </td>

                        <td>
                            {{ $item->peminjaman->peminjam->namapeminjam ?? '-' }}
                        </td>

                        <td>
                            {{ $item->buku->judul ?? '-' }}
                        </td>

                        <td class="text-center">
                            {{ $item->jumlahharitelat }} hari
                        </td>

                        <td class="text-center">
                            Rp{{ number_format($item->denda,0,',','.') }}
                        </td>

                        <td class="text-center">

                            @if($item->status == 'terlambat')
                                <span class="badge badge-danger">Terlambat</span>
                            @else
                                <span class="badge badge-success">Normal</span>
                            @endif

                        </td>

                    </tr>

                    @empty

                    <tr>
                        <td colspan="6" class="text-center text-danger">
                            Tidak ada data denda
                        </td>
                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        <div class="card-footer">
            {{ $denda->links() }}
        </div>

    </div>

</div>
</section>

@endsection