@extends('layouts.appuser')

@section('title', 'Edit Kategori')

@section('content')

<section class="content pt-3">
<div class="container-fluid">

    <div class="card card-warning">

        <div class="card-header">
            <h3 class="card-title">
                Edit Kategori
            </h3>
        </div>

        <form action="{{ route('kategori.update',$kategori->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="card-body">

                <div class="form-group">

                    <label>Nama Kategori</label>

                    <input type="text"
                           name="namakategori"
                           class="form-control"
                           value="{{ $kategori->namakategori }}"
                           required>

                </div>

            </div>

            <div class="card-footer">

                <button class="btn btn-warning">
                    Update
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