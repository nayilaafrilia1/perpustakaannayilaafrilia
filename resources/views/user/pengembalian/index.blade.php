@extends('layouts.appuser')

@section('title','Data Pengembalian')

@section('content')

<div class="content-header">
    <div class="container-fluid">

        <h1 class="m-0">
            <i class="fas fa-undo-alt text-success"></i>
            Riwayat Pengembalian Buku
        </h1>

        <small class="text-muted">
            Data pengembalian per peminjam (digabung)
        </small>

    </div>
</div>

<section class="content">
<div class="container-fluid">

<div class="card card-success card-outline shadow-sm">

    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-history"></i>
            Riwayat Pengembalian
        </h3>
    </div>

    <div class="card-body table-responsive p-0">

        <table class="table table-hover table-striped mb-0">

            <thead class="bg-dark text-white text-center">
                <tr>
                    <th>No</th>
                    <th>Peminjam</th>
                    <th>Daftar Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Jatuh Tempo</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                    <th>Telat (hari)</th>
                    <th>Denda</th>
                </tr>
            </thead>

            <tbody>

            @forelse($data as $group)

                @php
                    $first = $group->first();

                    $totalDenda = $group->sum('denda');
                    $totalTelat = $group->sum('jumlahharitelat');

                    $semuaKembali = $group->every(function($item){
                        return $item->keterangan == 'sudahkembali';
                    });
                @endphp

                <tr>

                    {{-- NO --}}
                    <td class="text-center">
                        {{ $loop->iteration }}
                    </td>

                    {{-- PEMINJAM --}}
                    <td>
                        <b>{{ $first->peminjaman->peminjam->namapeminjam ?? '-' }}</b>
                        <br>
                        <small class="text-muted">
                            {{ $group->count() }} buku
                        </small>
                    </td>

                    {{-- BUKU (DIGABUNG) --}}
                    <td>
                        @foreach($group as $item)
                            <span class="badge badge-info mb-1">
                                {{ $item->buku->judul ?? '-' }}
                            </span>
                            <br>
                        @endforeach
                    </td>

                    {{-- TGL PINJAM --}}
                    <td>
                        {{ date('d-m-Y', strtotime($first->tanggalpinjam)) }}
                    </td>

                    {{-- JATUH TEMPO --}}
                    <td>
                        {{ date('d-m-Y', strtotime($first->tanggalkembali)) }}
                    </td>

                    {{-- TGL KEMBALI --}}
                    <td>
                        @if($first->tanggalkembalikan)
                            {{ date('d-m-Y', strtotime($first->tanggalkembalikan)) }}
                        @else
                            <span class="badge badge-warning">Belum</span>
                        @endif
                    </td>

                    {{-- STATUS --}}
                    <td>
                        @if($semuaKembali)
                            <span class="badge badge-success">Selesai</span>
                        @else
                            <span class="badge badge-danger">Proses</span>
                        @endif
                    </td>

                    {{-- TOTAL TELAT --}}
                    <td class="text-center">
                        {{ $totalTelat }}
                    </td>

                    {{-- TOTAL DENDA --}}
                    <td>
                        @if($totalDenda > 0)
                            <span class="badge badge-danger">
                                Rp {{ number_format($totalDenda,0,',','.') }}
                            </span>
                        @else
                            <span class="badge badge-success">0</span>
                        @endif
                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="9" class="text-center p-4">
                        <i class="fas fa-inbox fa-2x text-muted"></i>
                        <br>
                        Belum ada riwayat pengembalian
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