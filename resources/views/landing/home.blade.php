@extends('layouts.apptamu')

@section('title', 'Perpustakaan Digital')

@section('hero')

<div id="heroSlider"
     class="carousel slide carousel-fade"
     data-ride="carousel"
     data-interval="5000">

<ol class="carousel-indicators">
    <li data-target="#heroSlider" data-slide-to="0" class="active"></li>
    <li data-target="#heroSlider" data-slide-to="1"></li>
    <li data-target="#heroSlider" data-slide-to="2"></li>
</ol>

<div class="carousel-inner">

    <div class="carousel-item active">

        <div class="hero-slide">

            <div class="container h-100">

                <div class="row h-100 align-items-center">

                    <div class="col-lg-7 text-white">

                        <span class="hero-badge">
                            📚 Perpustakaan Digital Sekolah
                        </span>

                        <h1 class="hero-title">
                            Membaca Lebih Mudah,
                            Belajar Lebih Cerdas
                        </h1>

                        <p class="hero-subtitle">
                            Temukan berbagai koleksi buku terbaik
                            untuk menunjang kegiatan belajar.
                        </p>

                        <a href="{{ url('/katalog') }}"
                           class="btn btn-warning btn-lg rounded-pill mr-2">

                            Jelajahi Buku

                        </a>

                        <a href="{{ url('/register/peminjam') }}"
                           class="btn btn-light btn-lg rounded-pill">

                            Daftar Sekarang

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="carousel-item">

        <div class="hero-slide">

            <div class="container h-100">

                <div class="row h-100 align-items-center">

                    <div class="col-lg-7 text-white">

                        <span class="hero-badge">
                            📖 Koleksi Lengkap
                        </span>

                        <h1 class="hero-title">
                            Ribuan Buku
                            Dalam Satu Sistem
                        </h1>

                        <p class="hero-subtitle">
                            Buku pelajaran, teknologi,
                            agama, novel dan referensi lainnya.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="carousel-item">

        <div class="hero-slide">

            <div class="container h-100">

                <div class="row h-100 align-items-center">

                    <div class="col-lg-7 text-white">

                        <span class="hero-badge">
                            🚀 Literasi Digital
                        </span>

                        <h1 class="hero-title">
                            Belajar Kapan Saja
                        </h1>

                        <p class="hero-subtitle">
                            Akses perpustakaan melalui
                            laptop maupun smartphone.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
</div>

@endsection


@section('content')

{{-- Buku Populer --}}
<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="font-weight-bold mb-1">
            Buku Populer
        </h2>

        <p class="text-muted">
            Koleksi buku terbaru perpustakaan
        </p>

    </div>

    <a href="{{ url('/katalog') }}"
       class="btn btn-outline-primary rounded-pill">

        Lihat Semua

    </a>

</div>

<div class="row">

@forelse($bukupopuler as $buku)

<div class="col-lg-3 col-md-4 col-sm-6 mb-4">

    <div class="card buku-card h-100">

        @if($buku->foto)

            <img src="{{ asset('cover/buku/'.$buku->foto) }}"
                 class="card-img-top"
                 style="height:320px;object-fit:cover;">

        @else

            <img src="{{ asset('dist/img/no-image.png') }}"
                 class="card-img-top"
                 style="height:320px;object-fit:cover;">

        @endif

        <div class="card-body">

            <span class="badge badge-primary mb-2">
                {{ $buku->kategori->namakategori ?? '-' }}
            </span>

            <h5 class="font-weight-bold">
                {{ $buku->judul }}
            </h5>

            <p class="text-muted mb-2">
                {{ $buku->pengarang }}
            </p>

            <small class="text-secondary">
                Penerbit: {{ $buku->penerbit }}
            </small>

            <br>

            @if($buku->stok > 0)

                <span class="badge badge-success mt-2">
                    Stok {{ $buku->stok }}
                </span>

            @else

                <span class="badge badge-danger mt-2">
                    Habis
                </span>

            @endif

        </div>

        <div class="card-footer bg-white border-0">

            <a href="{{ url('/detailbuku/'.$buku->id) }}"
               class="btn btn-primary btn-block rounded-pill">

                Detail Buku

            </a>

        </div>

    </div>

</div>

@empty

<div class="col-12">

    <div class="alert alert-info">
        Belum ada data buku.
    </div>

</div>

@endforelse

</div>

{{-- CTA --}}
<div class="card bg-primary text-white border-0 shadow-lg mt-5">

    <div class="card-body text-center p-5">

        <h2 class="font-weight-bold">
            Mulai Membaca Sekarang
        </h2>

        <p class="lead">
            Temukan berbagai koleksi buku terbaik untuk menunjang pembelajaran.
        </p>

        <a href="{{ url('/katalog') }}"
           class="btn btn-light btn-lg rounded-pill">

            <i class="fas fa-book-open mr-2"></i>
            Buka Katalog

        </a>

    </div>

</div>

@endsection

@push('style')

<style>

.hero-slide{
height:100vh;

background:
linear-gradient(
    135deg,
    rgba(0,123,255,.85),
    rgba(52,152,219,.85)
),
url('{{ asset("dist/img/library1.jpg") }}');

background-size:cover;
background-position:center;

display:flex;
align-items:center;

}

.hero-title{
font-size:4rem;
font-weight:700;
margin-top:20px;
margin-bottom:20px;
}

.hero-subtitle{
font-size:1.2rem;
max-width:600px;
opacity:.95;
}

.hero-badge{
display:inline-block;

padding:10px 20px;

background:rgba(255,255,255,.2);

backdrop-filter:blur(10px);

border-radius:50px;

color:white;

font-weight:600;

}

.carousel-indicators li{
width:12px;
height:12px;
border-radius:50%;
}

.carousel-item{
transition:1s ease-in-out;
}

.buku-card{
border-radius:20px;
overflow:hidden;
transition:.3s;
}

.buku-card:hover{
transform:translateY(-10px);
box-shadow:0 20px 40px rgba(0,0,0,.15);
}

@media(max-width:768px){


.hero-title{
    font-size:2.5rem;
}

.hero-slide{
    text-align:center;
}

}


</style>

@endpush