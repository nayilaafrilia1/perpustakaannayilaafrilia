@extends('layouts.apppeminjam')

@section('title', 'Riwayat Peminjaman')

@section('content')

<div class="card card-success card-outline">

    <div class="card-header">
        <h3 class="card-title">Riwayat Peminjaman</h3>
    </div>

    <div class="card-body table-responsive">

        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Jatuh Tempo</th>
                    <th>Status</th>
                    <th>Keterangan</th>
                    <th width="120">Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse($data as $item)

                <tr>
                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $item->buku->judul ?? '-' }}</td>

                    <td>{{ $item->tanggalpinjam }}</td>

                    <td>{{ $item->tanggalkembali }}</td>

                    <td>
                        @if($item->status == 'terlambat')
                            <span class="badge badge-danger">Terlambat</span>
                        @else
                            <span class="badge badge-success">Tepat Waktu</span>
                        @endif
                    </td>

                    <td>
                        @if($item->keterangan == 'sudahkembali')
                            <span class="badge badge-primary">Sudah Kembali</span>
                        @else
                            <span class="badge badge-warning">Belum Kembali</span>
                        @endif
                    </td>

                    <td>
                        <a href="{{ route('detailpeminjaman', $item->id) }}"
                           class="btn btn-info btn-sm">
                            Detail
                        </a>
                    </td>
                </tr>

                @empty
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data</td>
                </tr>
                @endforelse

            </tbody>

        </table>

    </div>
</div>

@endsection