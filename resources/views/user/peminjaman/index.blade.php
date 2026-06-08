@extends('layouts.appuser')

@section('title','Data Peminjaman')

@section('content')

<div class="content-header">
    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center">

            <h1 class="m-0">
                <i class="fas fa-book-reader text-primary"></i>
                Data Peminjaman
            </h1>

            <a href="{{ route('peminjaman.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i>
                Tambah Peminjaman
            </a>

        </div>

    </div>
</div>

<section class="content">
<div class="container-fluid">

{{-- ALERT --}}
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

@if(session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif

{{-- ================= TABLE PEMINJAMAN ================= --}}
<div class="card card-primary card-outline">

    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-list"></i>
            Data Peminjaman
        </h3>
    </div>

    <div class="card-body table-responsive">

        <table id="datatable" class="table table-bordered table-hover">

            <thead class="text-center bg-dark text-white">
                <tr>
                    <th>No</th>
                    <th>Peminjam</th>
                    <th>Buku</th>
                    <th>Tgl Pinjam</th>
                    <th>Batas</th>
                    <th>Status</th>
                    <th>Total Denda</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse($peminjaman as $item)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $item->peminjam->namapeminjam ?? '-' }}</td>

                    <td>
                        @foreach($item->detailPeminjaman as $d)
                            <span class="badge badge-info">
                                {{ $d->buku->judul ?? '-' }}
                            </span><br>
                        @endforeach
                    </td>

                    <td>
                        @foreach($item->detailPeminjaman as $d)
                            {{ $d->tanggalpinjam }}<br>
                        @endforeach
                    </td>

                    <td>
                        @foreach($item->detailPeminjaman as $d)
                            {{ $d->tanggalkembali }}<br>
                        @endforeach
                    </td>

                    <td>
                        @foreach($item->detailPeminjaman as $d)
                            @if($d->keterangan == 'sudahkembali')
                                <span class="badge badge-success">Kembali</span>
                            @else
                                <span class="badge badge-warning">Dipinjam</span>
                            @endif
                            <br>
                        @endforeach
                    </td>

                    {{-- TOTAL DENDA --}}
                    <td>
                        @if($item->totaldenda > 0)
                            <span class="badge badge-danger">
                                Rp {{ number_format($item->totaldenda,0,',','.') }}
                            </span>
                        @else
                            <span class="badge badge-success">0</span>
                        @endif
                    </td>

                    {{-- AKSI --}}
                    <td>

                        <a href="{{ route('peminjaman.show',$item->id) }}"
                           class="btn btn-info btn-sm">
                            <i class="fas fa-eye"></i>
                        </a>

                        @php
                        $belum = $item->detailPeminjaman
                                    ->where('keterangan','belumkembali')
                                    ->first();
                        @endphp

                        @if($belum)
                        <a href="{{ route('pengembalian.edit',$belum->id) }}"
                           class="btn btn-success btn-sm">
                            <i class="fas fa-undo"></i>
                        </a>
                        @endif

                        @if($item->totaldenda > 0)
                        <button class="btn btn-danger btn-sm open-kasir"
                                data-id="{{ $item->id }}"
                                data-total="{{ $item->totaldenda }}"
                                data-nama="{{ $item->peminjam->namapeminjam }}">
                            <i class="fas fa-cash-register"></i>
                        </button>
                        @endif

                    </td>

                </tr>

                @empty
                <tr>
                    <td colspan="8" class="text-center">Tidak ada data</td>
                </tr>
                @endforelse

            </tbody>

        </table>

    </div>

</div>

{{-- ================= KASIR ================= --}}
<div class="card card-danger mt-3">

    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-cash-register"></i>
            Kasir Pembayaran Denda
        </h3>
    </div>

    <div class="card-body">

        <form action="{{ route('admin.peminjaman.bayarDenda') }}" method="POST">
            @csrf

            <div class="row">

                <div class="col-md-4">
                    <label>Pilih Peminjaman</label>
                    <select class="form-control" name="peminjaman_id" id="kasir_select" required>
                        <option value="">Pilih</option>

                        @foreach($peminjaman as $item)
                            @if($item->totaldenda > 0)
                                <option value="{{ $item->id }}"
                                    data-total="{{ $item->totaldenda }}">
                                    {{ $item->peminjam->namapeminjam }}
                                    - Rp {{ number_format($item->totaldenda,0,',','.') }}
                                </option>
                            @endif
                        @endforeach

                    </select>
                </div>

                <div class="col-md-3">
                    <label>Total</label>
                    <input type="text" id="total" class="form-control" readonly>
                </div>

                <div class="col-md-3">
                    <label>Bayar</label>
                    <input type="number" name="uang_bayar" id="bayar" class="form-control">
                </div>

                <div class="col-md-2">
                    <label>Kembalian</label>
                    <input type="text" id="kembali" class="form-control" readonly>
                </div>

            </div>

            <br>

            <button class="btn btn-success">
                Bayar & Selesaikan
            </button>

        </form>

    </div>
</div>

</div>
</section>

@endsection

@section('scripts')

<script>

$(function(){

    function hitungKembali()
    {
        let total = parseInt($('#total').val()) || 0;
        let bayar = parseInt($('#bayar').val()) || 0;

        let kembali = bayar - total;

        if (bayar === 0) {
            $('#kembali').val('');
            return;
        }

        $('#kembali').val(
            bayar < total ? 'Kurang Rp ' + (total - bayar) : 'Rp ' + kembali
        );
    }

    // saat pilih peminjaman
    $('#kasir_select').on('change', function(){

        let total = $(this).find(':selected').data('total') || 0;

        $('#total').val(total);

        $('#bayar').val('');
        $('#kembali').val('');
    });

    // saat user input uang
    $('#bayar').on('input', function(){
        hitungKembali();
    });

});

</script>

@endsection