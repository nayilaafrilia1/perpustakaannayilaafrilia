@extends('layouts.appuser)

@section('title', 'Tambah Kategori')

@section('content')

<section class="content pt-3">
<div class="container-fluid">

    <div class="card card-success">

        <div class="card-header">
            <h3 class="card-title">
                Tambah Kategori
            </h3>
        </div>

        <form action="{{ route('kategori.store') }}"
              method="POST">

            @csrf

            <div class="card-body">

                <div class="form-group">

                    <label>Nama Kategori</label>

                    <input type="text"
                           name="namakategori"
                           class="form-control"
                           required>

                </div>

            </div>

            <div class="card-footer">

                <button class="btn btn-success">
                    Simpan
                </button>

                <a href="{{ route('kategori.index') }}"
                   class="btn btn-secondary">
                    Kembali
                </a>

            </div>

        </form>

    </div>

</div>
</section>

@endsection