@extends('layouts.apppeminjam')

@section('title', 'Detail Buku')

@section('content')

<div class="card card-success card-outline">

    <div class="card-header">
        <h3 class="card-title">Detail Buku</h3>
    </div>

    <div class="card-body">

        <div class="row">

            {{-- COVER --}}
            <div class="col-md-4 text-center">

                <img src="{{ $data->foto 
                            ? asset('cover/buku/'.$data->foto) 
                            : asset('dist/img/default-150x150.png') }}"
                     class="img-fluid rounded shadow"
                     style="max-height:350px; object-fit:cover;">

            </div>

            {{-- DETAIL --}}
            <div class="col-md-8">

                <h3 class="font-weight-bold">{{ $data->judul }}</h3>

                <hr>

                <table class="table table-borderless">

                    <tr>
                        <th width="150">Kategori</th>
                        <td>{{ $data->kategori->namakategori ?? '-' }}</td>
                    </tr>

                    <tr>
                        <th>Pengarang</th>
                        <td>{{ $data->pengarang }}</td>
                    </tr>

                    <tr>
                        <th>Penerbit</th>
                        <td>{{ $data->penerbit }}</td>
                    </tr>

                    <tr>
                        <th>Tahun Terbit</th>
                        <td>{{ $data->tahunterbit ?? '-' }}</td>
                    </tr>

                    <tr>
                        <th>ISBN</th>
                        <td>{{ $data->isbn ?? '-' }}</td>
                    </tr>

                    <tr>
                        <th>Rak</th>
                        <td>{{ $data->rak }}</td>
                    </tr>

                    <tr>
                        <th>Stok</th>
                        <td>
                            <span class="badge badge-info">
                                {{ $data->stok }}
                            </span>
                        </td>
                    </tr>

                    <tr>
                        <th>Status</th>
                        <td>
                            @if($data->status == 'tersedia')
                                <span class="badge badge-success">Tersedia</span>
                            @elseif($data->status == 'dipinjam')
                                <span class="badge badge-warning">Dipinjam</span>
                            @else
                                <span class="badge badge-danger">{{ $data->status }}</span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th>Deskripsi</th>
                        <td>{{ $data->deskripsi ?? '-' }}</td>
                    </tr>

                </table>

                <a href="{{ route('katalogbuku') }}" class="btn btn-secondary">
                    Kembali
                </a>
            </div>

        </div>

    </div>

</div>

@endsection