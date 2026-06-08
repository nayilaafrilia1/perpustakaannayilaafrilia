@extends('layouts.apppeminjam')

@section('title','Detail Buku')

@section('content')

<div class="content-header">

    <div class="container-fluid">

        <a href="{{ url()->previous() }}"
           class="btn btn-secondary mb-3">

            <i class="fas fa-arrow-left"></i>
            Kembali

        </a>

    </div>

</div>

<section class="content">

<div class="container-fluid">

    <div class="card border-0 shadow-lg">

        <div class="card-body">

            <div class="row">

                {{-- COVER --}}
                <div class="col-lg-4 text-center">

                    @php
                        $gambar = public_path('cover/buku/'.$buku->foto);
                    @endphp

                    @if(!empty($buku->foto) && file_exists($gambar))

                        <img
                            src="{{ asset('cover/buku/'.$buku->foto) }}"
                            class="img-fluid shadow rounded"
                            style="height:500px;object-fit:cover;">

                    @else

                        <img
                            src="{{ asset('dist/img/no-image.png') }}"
                            class="img-fluid shadow rounded"
                            style="height:500px;object-fit:cover;">

                    @endif

                </div>

                {{-- DETAIL --}}
                <div class="col-lg-8">

                    <span class="badge badge-primary mb-2">

                        {{ $buku->kategori->namakategori ?? 'Umum' }}

                    </span>

                    <h2 class="font-weight-bold">

                        {{ $buku->judul }}

                    </h2>

                    <hr>

                    <table class="table table-borderless">

                        <tr>
                            <th width="200">Nomor Seri</th>
                            <td>: {{ $buku->nomorseri }}</td>
                        </tr>

                        <tr>
                            <th>ISBN</th>
                            <td>: {{ $buku->isbn }}</td>
                        </tr>

                        <tr>
                            <th>Pengarang</th>
                            <td>: {{ $buku->pengarang }}</td>
                        </tr>

                        <tr>
                            <th>Penerbit</th>
                            <td>: {{ $buku->penerbit }}</td>
                        </tr>

                        <tr>
                            <th>Tahun Terbit</th>
                            <td>: {{ $buku->tahunterbit }}</td>
                        </tr>

                        <tr>
                            <th>Tahun Pengadaan</th>
                            <td>: {{ $buku->tahunpengadaan }}</td>
                        </tr>

                        <tr>
                            <th>Rak Buku</th>
                            <td>: {{ $buku->rak }}</td>
                        </tr>

                        <tr>
                            <th>Kondisi</th>
                            <td>

                                @if($buku->kondisi == 'bagus')

                                    <span class="badge badge-success">
                                        Bagus
                                    </span>

                                @else

                                    <span class="badge badge-warning">
                                        {{ ucfirst($buku->kondisi) }}
                                    </span>

                                @endif

                            </td>
                        </tr>

                        <tr>
                            <th>Status</th>
                            <td>

                                @if($buku->stok > 0)

                                    <span class="badge badge-success">
                                        Tersedia
                                    </span>

                                @else

                                    <span class="badge badge-danger">
                                        Habis
                                    </span>

                                @endif

                            </td>
                        </tr>

                        <tr>
                            <th>Stok</th>
                            <td>

                                <span class="badge badge-info">
                                    {{ $buku->stok }} Buku
                                </span>

                            </td>
                        </tr>

                    </table>

                    <div class="mt-4">

                        <h5 class="font-weight-bold">
                            Deskripsi Buku
                        </h5>

                        <div class="alert alert-light border">

                            {{ $buku->deskripsi }}

                        </div>

                    </div>

                    {{-- BUTTON --}}
                    <div class="mt-4">

                        @if($buku->stok > 0)

                        <form action="{{ route('pinjambuku',$buku->id) }}"
                              method="POST">

                            @csrf

                            <button
                                type="submit"
                                class="btn btn-success btn-lg rounded-pill">

                                <i class="fas fa-book-reader"></i>
                                Pinjam Buku

                            </button>

                        </form>

                        @else

                        <button
                            class="btn btn-danger btn-lg rounded-pill"
                            disabled>

                            Buku Sedang Tidak Tersedia

                        </button>

                        @endif

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</section>

@endsection

@push('css')

<style>

.table-borderless th{
    color:#555;
}

.card{
    border-radius:20px;
}

img{
    border-radius:15px;
}

</style>

@endpush