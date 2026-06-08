@extends('layouts.appuser')

@section('title', 'Laporan Buku')

@section('content')

<div class="content-header">
    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">
                <h1 class="m-0">
                    Laporan Data Buku
                </h1>
            </div>

            <div class="col-sm-6 text-right">

                <a href="{{ route('laporan.buku.cetak', request()->query()) }}"
                   target="_blank"
                   class="btn btn-danger">

                    <i class="fas fa-print"></i>
                    Cetak Laporan

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
            <h3 class="card-title">Filter Data Buku</h3>
        </div>

        <div class="card-body">

            <form method="GET">

                <div class="row">

                    <div class="col-md-6">
                        <label>Cari Judul Buku</label>
                        <input type="text"
                               name="cari"
                               class="form-control"
                               placeholder="Masukkan judul buku..."
                               value="{{ request('cari') }}">
                    </div>

                    <div class="col-md-3">
                        <label>Status</label>

                        <select name="status" class="form-control">
                            <option value="">Semua</option>

                            <option value="tersedia" {{ request('status')=='tersedia' ? 'selected' : '' }}>Tersedia</option>
                            <option value="dipinjam" {{ request('status')=='dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                            <option value="rusak" {{ request('status')=='rusak' ? 'selected' : '' }}>Rusak</option>
                            <option value="hilang" {{ request('status')=='hilang' ? 'selected' : '' }}>Hilang</option>

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
            <h3 class="card-title">Data Buku</h3>
        </div>

        <div class="card-body table-responsive p-0">

            <table class="table table-bordered table-hover">

                <thead class="text-center">
                    <tr>
                        <th width="5%">No</th>
                        <th>Judul Buku</th>
                        <th>Kategori</th>
                        <th>Pengarang</th>
                        <th>Tahun</th>
                        <th>Stok</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($buku as $item)

                    <tr>

                        <td class="text-center">
                            {{ $loop->iteration + (($buku->currentPage()-1) * $buku->perPage()) }}
                        </td>

                        <td>
                            <strong>{{ $item->judul }}</strong>
                        </td>

                        <td>
                            {{ $item->kategori->namakategori ?? '-' }}
                        </td>

                        <td>
                            {{ $item->pengarang }}
                        </td>

                        <td class="text-center">
                            {{ $item->tahunterbit }}
                        </td>

                        <td class="text-center">
                            <span class="badge badge-info">
                                {{ $item->stok }}
                            </span>
                        </td>

                        <td class="text-center">

                            @if($item->status == 'tersedia')
                                <span class="badge badge-success">Tersedia</span>

                            @elseif($item->status == 'dipinjam')
                                <span class="badge badge-warning">Dipinjam</span>

                            @elseif($item->status == 'rusak')
                                <span class="badge badge-danger">Rusak</span>

                            @else
                                <span class="badge badge-dark">Hilang</span>
                            @endif

                        </td>

                    </tr>

                    @empty

                    <tr>
                        <td colspan="7" class="text-center text-danger">
                            Tidak ada data buku
                        </td>
                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        <div class="card-footer clearfix">
            {{ $buku->links() }}
        </div>

    </div>

</div>

</section>

@endsection