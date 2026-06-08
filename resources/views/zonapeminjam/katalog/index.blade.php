@extends('layouts.apppeminjam')

@section('title','Katalog Buku')

@section('content')

<div class="content-header">

    <div class="container-fluid">

        <div class="card shadow-sm border-0">

            <div class="card-body">

                <div class="row align-items-center">

                    <div class="col-md-6">

                        <h2 class="font-weight-bold text-success mb-1">
                            <i class="fas fa-book-open mr-2"></i>
                            Katalog Buku
                        </h2>

                        <p class="text-muted mb-0">
                            Temukan dan pinjam buku favoritmu
                        </p>

                    </div>

                    <div class="col-md-6 text-md-right mt-3 mt-md-0">

                        <input
                            type="text"
                            id="searchBook"
                            class="form-control"
                            placeholder="Cari judul buku...">

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<section class="content">

<div class="container-fluid">

    <div class="row" id="bookContainer">

        @forelse($bukus as $buku)

        <div class="col-lg-3 col-md-4 col-sm-6 mb-4 book-item">

            <div class="card buku-card h-100">

                @php

                    $gambar = public_path('cover/buku/'.$buku->foto);

                @endphp

                @if(!empty($buku->foto) && file_exists($gambar))

                    <img
                        src="{{ asset('cover/buku/'.$buku->foto) }}"
                        class="card-img-top"
                        alt="{{ $buku->judul }}">

                @else

                    <img
                        src="{{ asset('dist/img/no-image.png') }}"
                        class="card-img-top"
                        alt="No Image">

                @endif

                <div class="card-body">

                    <span class="badge badge-primary mb-2">

                        {{ $buku->kategori->namakategori ?? 'Umum' }}

                    </span>

                    <h5 class="font-weight-bold judul-buku">

                        {{ $buku->judul }}

                    </h5>

                    <p class="text-muted mb-1">

                        <i class="fas fa-user-edit"></i>

                        {{ $buku->pengarang }}

                    </p>

                    <p class="text-muted mb-1">

                        <i class="fas fa-building"></i>

                        {{ $buku->penerbit }}

                    </p>

                    <small class="text-secondary">

                        Tahun:
                        {{ $buku->tahunterbit }}

                    </small>

                    <br>

                    @if($buku->stok > 0)

                        <span class="badge badge-success mt-2">
                            Stok {{ $buku->stok }}
                        </span>

                    @else

                        <span class="badge badge-danger mt-2">
                            Stok Habis
                        </span>

                    @endif

                </div>

                <div class="card-footer bg-white border-0">

                    <div class="row">

                        <div class="col-6 pr-1">

                            <a href="{{ route('peminjam.detailbuku',$buku->id) }}"
                               class="btn btn-outline-primary btn-block rounded-pill">

                                Detail

                            </a>

                        </div>

                        <div class="col-6 pl-1">

                            @if($buku->stok > 0)

                            <form action="{{ route('pinjambuku',$buku->id) }}"
                                  method="POST">

                                @csrf

                                <button
                                    type="submit"
                                    class="btn btn-success btn-block rounded-pill">

                                    Pinjam

                                </button>

                            </form>

                            @else

                            <button
                                class="btn btn-secondary btn-block rounded-pill"
                                disabled>

                                Habis

                            </button>

                            @endif

                        </div>

                    </div>

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

</div>

</section>

@endsection

@push('css')

<style>

.buku-card{
    border-radius:20px;
    overflow:hidden;
    transition:.3s;
    border:none;
}

.buku-card:hover{
    transform:translateY(-10px);
    box-shadow:0 20px 40px rgba(0,0,0,.15);
}

.buku-card .card-img-top{
    height:320px;
    width:100%;
    object-fit:cover;
}

.judul-buku{
    min-height:55px;
}

.card-footer{
    background:#fff;
}

@media(max-width:768px){

    .buku-card .card-img-top{
        height:260px;
    }

}

</style>

@endpush

@push('scripts')

<script>

document
.getElementById('searchBook')
.addEventListener('keyup', function(){

    let value = this.value.toLowerCase();

    document
    .querySelectorAll('.book-item')
    .forEach(function(item){

        item.style.display =
        item.innerText.toLowerCase().includes(value)
        ? ''
        : 'none';

    });

});

</script>

@endpush