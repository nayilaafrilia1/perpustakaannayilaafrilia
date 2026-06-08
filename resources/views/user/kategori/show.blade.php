@extends('layouts.appuser')

@section('title', 'Detail Kategori')

@section('content')

<section class="content pt-3">
<div class="container-fluid">

    <div class="card card-info">

        <div class="card-header">
            <h3 class="card-title">
                Detail Kategori
            </h3>
        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <tr>
                    <th width="25%">ID</th>
                    <td>{{ $kategori->id }}</td>
                </tr>

                <tr>
                    <th>Nama Kategori</th>
                    <td>{{ $kategori->namakategori }}</td>
                </tr>

                <tr>
                    <th>Dibuat</th>
                    <td>{{ $kategori->created_at }}</td>
                </tr>

                <tr>
                    <th>Diubah</th>
                    <td>{{ $kategori->updated_at }}</td>
                </tr>

            </table>

        </div>

        <div class="card-footer">

            <a href="{{ route('kategori.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>

        </div>

    </div>

</div>
</section>

@endsection