@extends('layouts.apppeminjam')

@section('title', 'Riwayat Pengembalian')

@section('content')

<div class="card card-primary card-outline">

    <div class="card-header">
        <h3 class="card-title">Riwayat Pengembalian</h3>
    </div>

    <div class="card-body table-responsive">

        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul Buku</th>
                    <th>Tgl Pinjam</th>
                    <th>Tgl Kembali Aktual</th>
                    <th>Hari Telat</th>
                    <th>Denda</th>
                </tr>
            </thead>

            <tbody>

                @forelse($data as $item)

                <tr>
                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $item->buku->judul ?? '-' }}</td>

                    <td>{{ $item->tanggalpinjam }}</td>

                    <td>{{ $item->tanggalkembalikan ?? '-' }}</td>

                    <td>
                        @if($item->jumlahharitelat > 0)
                            <span class="badge badge-danger">
                                {{ $item->jumlahharitelat }} Hari
                            </span>
                        @else
                            <span class="badge badge-success">0 Hari</span>
                        @endif
                    </td>

                    <td>
                        Rp {{ number_format($item->denda, 0, ',', '.') }}
                    </td>
                </tr>

                @empty
                <tr>
                    <td colspan="6" class="text-center">Belum ada data</td>
                </tr>
                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection