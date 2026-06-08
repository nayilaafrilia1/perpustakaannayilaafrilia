@extends('layouts.apppeminjam')

@section('title', 'Katalog Buku')

@section('content')

<div class="content-header">
    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center">

            <div>
                <h1 class="m-0 text-success font-weight-bold">
                    📚 Katalog Buku
                </h1>
                <p class="text-muted mb-0">
                    Temukan dan pinjam buku favoritmu
                </p>
            </div>

            {{-- SEARCH (opsional nanti bisa pakai JS) --}}
            <div class="w-25">
                <input type="text" class="form-control" placeholder="Cari buku...">
            </div>

        </div>

    </div>
</div>

<section class="content">
<div class="container-fluid">

    <div class="row">

        @forelse($bukus as $buku)

        <div class="col-xl-3 col-lg-4 col-md-6 mb-4">

            <div class="card book-card h-100 shadow-sm border-0">

                {{-- COVER --}}
                <div class="book-cover">

                    <img src="{{ $buku->foto 
                        ? asset('cover/buku/'.$buku->foto) 
                        : asset('dist/img/default-150x150.png') }}">

                    <span class="badge stock-badge badge-{{ $buku->stok > 0 ? 'success' : 'danger' }}">
                        Stok: {{ $buku->stok }}
                    </span>

                    <span class="badge category-badge badge-info">
                        {{ $buku->kategori->namakategori ?? 'Umum' }}
                    </span>

                </div>

                {{-- BODY --}}
                <div class="card-body">

                    <h6 class="font-weight-bold text-dark mb-2">
                        {{ $buku->judul }}
                    </h6>

                    <p class="text-muted mb-1 small">
                        ✍ {{ $buku->pengarang }}
                    </p>

                    <p class="text-muted mb-1 small">
                        🏢 {{ $buku->penerbit }}
                    </p>

                    <p class="text-muted small mb-0">
                        📖 {{ $buku->tahunterbit ?? '-' }}
                    </p>

                </div>

                {{-- FOOTER --}}
                <div class="card-footer bg-white border-0">

                    <div class="d-flex justify-content-between align-items-center">

                        {{-- DETAIL --}}
                        <a href="{{ route('peminjam.detailbuku', $buku->id) }}"
                           class="btn btn-sm btn-outline-success">
                            Detail
                        </a>

                        {{-- PINJAM --}}
                        @if($buku->stok > 0)

                            <form action="{{ route('pinjambuku', $buku->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin ingin meminjam buku ini?')">

                                @csrf

                                <button type="submit"
                                        class="btn btn-sm btn-success">

                                    Pinjam

                                </button>

                            </form>

                        @else

                            <button class="btn btn-sm btn-secondary" disabled>
                                Habis
                            </button>

                        @endif

                    </div>

                </div>

            </div>

        </div>

        @empty

        <div class="col-12 text-center text-muted">
            Tidak ada buku tersedia
        </div>

        @endforelse

    </div>

</div>
</section>

@endsection

{{-- STYLE --}}
@push('css')
<style>

.book-card{
    border-radius: 16px;
    overflow: hidden;
    transition: .3s;
}

.book-card:hover{
    transform: translateY(-6px);
    box-shadow: 0 15px 35px rgba(0,0,0,.15);
}

.book-cover {
    position: relative;
    height: 150px; /* lebih kecil dari sebelumnya */
    overflow: hidden;
    border-radius: 12px;
}

.book-cover img {
    width: 100%;       /* menyesuaikan lebar card */
    height: 100%;      /* tetap proporsional */
    object-fit: cover;
    display: block;
}

/* BADGE STOK */
.stock-badge{
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 12px;
    border-radius: 20px;
}

/* BADGE KATEGORI */
.category-badge{
    position: absolute;
    top: 10px;
    left: 10px;
    font-size: 11px;
    border-radius: 20px;
}

</style>
@endpush