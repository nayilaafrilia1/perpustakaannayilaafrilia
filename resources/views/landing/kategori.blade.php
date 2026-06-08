@extends('layouts.apptamu')

@section('title', 'Kategori Buku')

@section('content')

<div class="card shadow-sm border-0">

    <div class="card-header bg-white border-0">
        <h4 class="font-weight-bold text-primary mb-0">
            Kategori Buku
        </h4>
    </div>

    <div class="card-body">

        <div class="row">

            @php
                $kategori = ['Teknologi', 'Pendidikan', 'Agama', 'Sejarah', 'Novel', 'Sains'];
            @endphp

            @foreach($kategori as $item)
            <div class="col-md-4 mb-4">

                <div class="card border-0 shadow-sm text-center p-4 h-100">

                    <div class="mb-3">
                        <i class="fas fa-book-open fa-3x text-primary"></i>
                    </div>

                    <h5 class="font-weight-bold">
                        {{ $item }}
                    </h5>

                    <p class="text-muted">
                        Koleksi buku kategori {{ $item }}
                    </p>

                    <a href="#" class="btn btn-outline-primary rounded-pill">
                        Lihat Buku
                    </a>

                </div>

            </div>
            @endforeach

        </div>

    </div>

</div>

@endsection