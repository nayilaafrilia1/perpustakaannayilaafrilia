@extends('layouts.appuser')

@section('title', 'Data Kategori')

@section('content')

<div class="content-header">

<div class="container-fluid">

    <div class="row mb-2">

        <div class="col-sm-6">

            <h1 class="m-0">

                <i class="fas fa-tags text-success"></i>
                Data Kategori

            </h1>

        </div>

        <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>

                <li class="breadcrumb-item active">
                    Kategori
                </li>

            </ol>

        </div>

    </div>

</div>


</div>

<section class="content">


<div class="container-fluid">

    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            <button type="button"
                    class="close"
                    data-dismiss="alert">

                &times;

            </button>

            <i class="fas fa-check-circle"></i>
            {{ session('success') }}

        </div>

    @endif

    <div class="card card-outline card-success shadow-sm">

        <div class="card-header">

            <h3 class="card-title">

                <i class="fas fa-book"></i>
                Daftar Kategori Buku

            </h3>

            <div class="card-tools">

                <span class="badge badge-success mr-2">

                    Total :
                    {{ count($kategori) }}

                </span>

                <a href="{{ route('kategori.create') }}"
                   class="btn btn-success btn-sm">

                    <i class="fas fa-plus-circle"></i>
                    Tambah Kategori

                </a>

            </div>

        </div>

        <div class="card-body table-responsive">

            <table class="table table-bordered table-hover">

                <thead class="bg-success">

                    <tr>

                        <th width="5%">No</th>

                        <th>
                            Nama Kategori
                        </th>

                        <th width="25%">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($kategori as $item)

                    <tr>

                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td>

                            <span class="font-weight-bold">

                                {{ $item->namakategori }}

                            </span>

                        </td>

                        <td>

                            <a href="{{ route('kategori.show',$item->id) }}"
                               class="btn btn-info btn-sm">

                                <i class="fas fa-eye"></i>

                            </a>

                            <a href="{{ route('kategori.edit',$item->id) }}"
                               class="btn btn-warning btn-sm">

                                <i class="fas fa-edit"></i>

                            </a>

                            <form action="{{ route('kategori.destroy',$item->id) }}"
                                  method="POST"
                                  style="display:inline;">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus kategori ini?')">

                                    <i class="fas fa-trash"></i>

                                </button>

                            </form>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="3"
                            class="text-center text-muted">

                            <i class="fas fa-folder-open fa-2x mb-2"></i>

                            <br>

                            Belum ada data kategori.

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        <div class="card-footer text-muted">

            <i class="fas fa-info-circle"></i>
            Data kategori digunakan untuk pengelompokan buku perpustakaan.

        </div>

    </div>

</div>

</section>

@endsection
