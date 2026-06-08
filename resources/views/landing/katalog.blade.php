@extends('layouts.apptamu')

@section('title', 'Katalog Buku')

@section('content')

<div class="card">

    <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center flex-wrap">

        <h4 class="font-weight-bold text-primary mb-2 mb-md-0">
            Katalog Buku
        </h4>

        <form action="#" method="GET">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Cari buku...">
                <div class="input-group-append">
                    <button class="btn btn-primary">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>

    </div>

    <div class="card-body">

        <div class="row">

            @for($i = 1; $i <= 8; $i++)
            <div class="col-md-3 mb-4">

                <div class="card shadow-sm border-0 h-100">

                    <img src="{{ asset('dist/img/photo1.png') }}"
                         class="card-img-top"
                         style="height:250px; object-fit:cover;">

                    <div class="card-body text-center">

                        <h5 class="font-weight-bold">
                            Judul Buku {{$i}}
                        </h5>

                        <p class="text-muted mb-1">
                            Kategori Pendidikan
                        </p>

                        <span class="badge badge-success mb-3">
                            Tersedia
                        </span>

                        <br>

                        <a href="{{ url('/detailbuku') }}" class="btn btn-primary btn-sm rounded-pill px-3">
                            Detail
                        </a>

                    </div>

                </div>

            </div>
            @endfor

        </div>

    </div>

</div>

@endsection