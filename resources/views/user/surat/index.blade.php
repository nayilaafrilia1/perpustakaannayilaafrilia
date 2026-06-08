@extends('layouts.appuser')

@section('title', 'Surat Bebas Perpustakaan')

@section('content')

<div class="content-header">
    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">
                <h1>Surat Bebas Perpustakaan</h1>
            </div>

            <div class="col-sm-6 text-right">


        </div>

    </div>
</div>

<section class="content">
<div class="container-fluid">

<div class="card card-success card-outline">

    <div class="card-body table-responsive p-0">

        <table class="table table-bordered">

            <thead>
                <tr>
                    <th>No</th>
                    <th>Nomor Surat</th>
                    <th>Peminjam</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

                @foreach($surat as $item)

                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nomor_surat }}</td>
                    <td>{{ $item->peminjam->namapeminjam ?? '-' }}</td>
                    <td>{{ $item->tanggal_cetak }}</td>
                    <td>
                        <span class="badge badge-success">
                            {{ $item->status }}
                        </span>
                    </td>

                    <td>

                        <a href="{{ route('surat.show', $item->id) }}"
                           class="btn btn-sm btn-danger"
                           target="_blank">
                            Cetak
                        </a>

                        <form action="{{ route('surat.destroy', $item->id) }}"
                              method="POST"
                              style="display:inline">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-sm btn-dark">
                                Hapus
                            </button>

                        </form>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

</div>
</section>

@endsection