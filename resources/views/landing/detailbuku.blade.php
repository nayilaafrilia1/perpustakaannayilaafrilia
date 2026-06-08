@extends('layouts.apptamu')

@section('title', 'Detail Buku')

@section('content')

<div class="card shadow-sm border-0">

    <div class="card-body">

        <div class="row">

            <div class="col-md-4 text-center mb-4">

                <img src="{{ asset('dist/img/photo1.png') }}"
                     class="img-fluid rounded shadow"
                     style="height:450px; object-fit:cover;">

            </div>

            <div class="col-md-8">

                <h2 class="font-weight-bold text-primary mb-3">
                    Pemrograman Laravel Modern
                </h2>

                <table class="table table-borderless">

                    <tr>
                        <th width="180">Penulis</th>
                        <td>: John Doe</td>
                    </tr>

                    <tr>
                        <th>Penerbit</th>
                        <td>: Informatika</td>
                    </tr>

                    <tr>
                        <th>Tahun</th>
                        <td>: 2026</td>
                    </tr>

                    <tr>
                        <th>Kategori</th>
                        <td>: Teknologi</td>
                    </tr>

                    <tr>
                        <th>Status</th>
                        <td>
                            : <span class="badge badge-success">Tersedia</span>
                        </td>
                    </tr>

                </table>

                <div class="mt-4">

                    <h5 class="font-weight-bold">
                        Deskripsi Buku
                    </h5>

                    <p class="text-muted text-justify">
                        Buku ini membahas tentang pengembangan aplikasi modern menggunakan Laravel.
                    </p>

                </div>

                <a href="{{ url('/login/peminjam') }}" class="btn btn-primary rounded-pill px-4 mt-3">
                    <i class="fas fa-book-reader mr-2"></i>
                    Pinjam Buku
                </a>

            </div>

        </div>

    </div>

</div>

@endsection