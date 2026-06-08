@extends('layouts.appuser')

@section('title','Detail Buku')

@section('content')

<div class="card card-info card-outline">

    <div class="card-header">

        <h3 class="card-title">
            Detail Buku
        </h3>

    </div>

    <div class="card-body">

        <div class="row">

            <div class="col-md-3 text-center">

                @if($buku->foto)

                    <img src="{{ asset('cover/buku/'.$buku->foto) }}"
                         class="img-fluid img-thumbnail">

                @else

                    <img src="https://via.placeholder.com/200x250"
                         class="img-fluid img-thumbnail">

                @endif

            </div>

            <div class="col-md-9">

                <table class="table table-bordered">

                    <tr>
                        <th width="250">Kategori</th>
                        <td>{{ $buku->kategori->namakategori ?? '-' }}</td>
                    </tr>

                    <tr>
                        <th>Nomor Seri</th>
                        <td>{{ $buku->nomorseri }}</td>
                    </tr>

                    <tr>
                        <th>ISBN</th>
                        <td>{{ $buku->isbn }}</td>
                    </tr>

                    <tr>
                        <th>Judul</th>
                        <td>{{ $buku->judul }}</td>
                    </tr>

                    <tr>
                        <th>Pengarang</th>
                        <td>{{ $buku->pengarang }}</td>
                    </tr>

                    <tr>
                        <th>Penerbit</th>
                        <td>{{ $buku->penerbit }}</td>
                    </tr>

                    <tr>
                        <th>Tahun Terbit</th>
                        <td>{{ $buku->tahunterbit }}</td>
                    </tr>

                    <tr>
                        <th>Tahun Pengadaan</th>
                        <td>{{ $buku->tahunpengadaan }}</td>
                    </tr>

                    <tr>
                        <th>Rak</th>
                        <td>{{ $buku->rak }}</td>
                    </tr>

                    <tr>
                        <th>Stok</th>
                        <td>{{ $buku->stok }}</td>
                    </tr>

                    <tr>
                        <th>Status</th>
                        <td>{{ $buku->status }}</td>
                    </tr>

                    <tr>
                        <th>Kondisi</th>
                        <td>{{ $buku->kondisi }}</td>
                    </tr>

                    <tr>
                        <th>Deskripsi</th>
                        <td>{{ $buku->deskripsi }}</td>
                    </tr>

                </table>

            </div>

        </div>

    </div>

    <div class="card-footer">

        <a href="{{ route('buku.index') }}"
           class="btn btn-secondary">

            Kembali
        </a>

        <a href="{{ route('buku.edit',$buku->id) }}"
           class="btn btn-warning">

            Edit
        </a>

    </div>

</div>

@endsection