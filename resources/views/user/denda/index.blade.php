@extends('layouts.appuser')

@section('title', 'Data Denda')

@section('content')

<div class="card card-danger card-outline">

<div class="card-header">

    <h3 class="card-title">

        Data Denda Peminjam

    </h3>

</div>

<div class="card-body">

    <table class="table table-bordered table-striped">

        <thead>

            <tr>

                <th width="50">No</th>

                <th>Nama Peminjam</th>

                <th>Buku</th>

                <th>Hari Telat</th>

                <th>Total Denda</th>

                <th>Status Bayar</th>

                <th width="180">Aksi</th>

            </tr>

        </thead>

        <tbody>

            @forelse($dendas as $item)

            <tr>

                <td>{{ $loop->iteration }}</td>

                <td>
                    {{ $item->peminjaman->peminjam->namapeminjam }}
                </td>

                <td>
                    {{ $item->buku->judul }}
                </td>

                <td>

                    <span class="badge badge-danger">

                        {{ $item->jumlahharitelat }}
                        Hari

                    </span>

                </td>

                <td>

                    Rp
                    {{ number_format($item->denda,0,',','.') }}

                </td>

                <td>

                    @if($item->peminjaman->statusbayar=='sudahbayar')

                    <span class="badge badge-success">

                        Lunas

                    </span>

                    @else

                    <span class="badge badge-warning">

                        Belum Bayar

                    </span>

                    @endif

                </td>

                <td>

                    <a href="{{ route('denda.show',$item->id) }}"
                        class="btn btn-info btn-sm">

                        Detail

                    </a>

                    @if($item->peminjaman->statusbayar!='sudahbayar')

                    <a href="{{ route('denda.edit',$item->id) }}"
                        class="btn btn-success btn-sm">

                        Bayar

                    </a>

                    @endif

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="7" class="text-center">

                    Tidak ada data denda

                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

</div>

</div>

@endsection
