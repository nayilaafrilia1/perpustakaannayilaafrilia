@extends('layouts.appuser')

@section('title', 'Data Buku')

@section('content')

<div class="card card-primary card-outline">

<div class="card-header">

    <h3 class="card-title">
        Data Buku
    </h3>

    <div class="card-tools">

        <a href="{{ route('buku.create') }}"
           class="btn btn-primary btn-sm">

            <i class="fas fa-plus"></i>
            Tambah Buku

        </a>

    </div>

</div>

<div class="card-body">

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    <table class="table table-bordered table-striped">

        <thead>

            <tr>

                <th width="50">No</th>

                <th>Cover</th>

                <th>No Seri</th>

                <th>ISBN</th>

                <th>Judul</th>

                <th>Kategori</th>

                <th>Pengarang</th>

                <th>Penerbit</th>

                <th>Tahun</th>

                <th>Rak</th>

                <th>Stok</th>

                <th>Status</th>

                <th>Kondisi</th>

                <th width="180">Aksi</th>

            </tr>

        </thead>

        <tbody>

            @forelse($bukus as $buku)

            <tr>

                <td>

                    {{ $loop->iteration }}

                </td>

                <td>

                    @if($buku->foto)

                        <img
                            src="{{ asset('cover/buku/'.$buku->foto) }}"
                            width="60">

                    @else

                        <span class="badge badge-secondary">
                            Tidak Ada Cover
                        </span>

                    @endif

                </td>

                <td>

                    {{ $buku->nomorseri }}

                </td>

                <td>

                    {{ $buku->isbn ?? '-' }}

                </td>

                <td>

                    {{ $buku->judul }}

                </td>

                <td>

                    {{ $buku->kategori->namakategori ?? '-' }}

                </td>

                <td>

                    {{ $buku->pengarang }}

                </td>

                <td>

                    {{ $buku->penerbit }}

                </td>

                <td>

                    {{ $buku->tahunterbit }}

                </td>

                <td>

                    {{ $buku->rak }}

                </td>

                <td>

                    <span class="badge badge-info">

                        {{ $buku->stok }}

                    </span>

                </td>

                <td>

                    @if($buku->status == 'tersedia')

                        <span class="badge badge-success">
                            Tersedia
                        </span>

                    @elseif($buku->status == 'dipinjam')

                        <span class="badge badge-warning">
                            Dipinjam
                        </span>

                    @elseif($buku->status == 'rusak')

                        <span class="badge badge-danger">
                            Rusak
                        </span>

                    @else

                        <span class="badge badge-dark">
                            Hilang
                        </span>

                    @endif

                </td>

                <td>

                    @if($buku->kondisi == 'bagus')

                        <span class="badge badge-success">
                            Bagus
                        </span>

                    @else

                        <span class="badge badge-danger">
                            Rusak
                        </span>

                    @endif

                </td>

                <td>

                    <a href="{{ route('buku.show',$buku->id) }}"
                       class="btn btn-info btn-sm">

                        <i class="fas fa-eye"></i>

                    </a>

                    <a href="{{ route('buku.edit',$buku->id) }}"
                       class="btn btn-warning btn-sm">

                        <i class="fas fa-edit"></i>

                    </a>

                    <form
                        action="{{ route('buku.destroy',$buku->id) }}"
                        method="POST"
                        style="display:inline-block">

                        @csrf
                        @method('DELETE')

                        <button
                            onclick="return confirm('Hapus buku ini?')"
                            class="btn btn-danger btn-sm">

                            <i class="fas fa-trash"></i>

                        </button>

                    </form>

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="14" class="text-center">

                    Belum ada data buku

                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

</div>

</div>

@endsection
