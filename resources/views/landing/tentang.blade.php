@extends('layouts.apptamu')

@section('title', 'Tentang Kami')

@section('content')

<div class="card shadow-sm border-0">

    <div class="card-body p-5">

        <div class="text-center mb-5">

            <i class="fas fa-school fa-4x text-primary mb-3"></i>

            <h2 class="font-weight-bold text-primary">
                Tentang Perpustakaan Digital
            </h2>

            <p class="text-muted">
                Sistem perpustakaan modern untuk mendukung literasi digital sekolah.
            </p>

        </div>

        <div class="row">

            <div class="col-md-6 mb-4">

                <h4 class="font-weight-bold text-dark">
                    Visi
                </h4>

                <p class="text-muted text-justify">
                    Menjadi perpustakaan digital sekolah yang modern dan inovatif.
                </p>

            </div>

            <div class="col-md-6 mb-4">

                <h4 class="font-weight-bold text-dark">
                    Misi
                </h4>

                <ul class="text-muted">
                    <li>Meningkatkan minat baca siswa</li>
                    <li>Mempermudah akses buku</li>
                    <li>Mendukung pembelajaran digital</li>
                </ul>

            </div>

        </div>

    </div>

</div>

@endsection