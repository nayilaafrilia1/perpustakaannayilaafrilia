@extends('layouts.appuser')

@section('title', 'Edit Peminjaman')

@section('content')

<div class="container-fluid">

    <div class="card card-warning card-outline">

        <div class="card-header">
            <h3 class="card-title">Edit Peminjaman</h3>
        </div>

        <form action="{{ route('peminjaman.update', $peminjaman->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="card-body">

                {{-- PEMINJAM --}}
                <div class="form-group">
                    <label>Peminjam</label>
                    <select name="idpeminjam" class="form-control">
                        @foreach($peminjams as $p)
                            <option value="{{ $p->id }}"
                                {{ $p->id == $peminjaman->idpeminjam ? 'selected' : '' }}>
                                {{ $p->namapeminjam }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <hr>

                <label><b>Daftar Buku</b></label>

                <div id="wrapper-buku">

                    @foreach($peminjaman->detailPeminjaman as $i => $d)
                    <div class="row buku-item mb-2">

                        <div class="col-md-7">
                            <select name="buku[{{ $i }}][idbuku]" class="form-control">
                                @foreach($bukus as $b)
                                    <option value="{{ $b->id }}"
                                        {{ $b->id == $d->idbuku ? 'selected' : '' }}>
                                        {{ $b->judul }} (stok: {{ $b->stok }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <input type="number"
                                   name="buku[{{ $i }}][qty]"
                                   class="form-control"
                                   value="{{ $d->qty ?? 1 }}"
                                   min="1">
                        </div>

                        <div class="col-md-2">
                            <button type="button" class="btn btn-danger btn-sm remove-buku">
                                Hapus
                            </button>
                        </div>

                    </div>
                    @endforeach

                </div>

                <button type="button" id="tambah-buku" class="btn btn-primary btn-sm">
                    + Tambah Buku
                </button>

            </div>

            <div class="card-footer text-right">
                <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary btn-sm">
                    Kembali
                </a>

                <button type="submit" class="btn btn-success btn-sm">
                    Update
                </button>
            </div>

        </form>

    </div>

</div>

@endsection

@push('scripts')
<script>
    let index = {{ $peminjaman->detailPeminjaman->count() }};

    document.getElementById('tambah-buku').addEventListener('click', function () {

        let wrapper = document.getElementById('wrapper-buku');

        let html = `
        <div class="row buku-item mb-2">

            <div class="col-md-7">
                <select name="buku[${index}][idbuku]" class="form-control">
                    @foreach($bukus as $b)
                        <option value="{{ $b->id }}">
                            {{ $b->judul }} (stok: {{ $b->stok }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <input type="number"
                       name="buku[${index}][qty]"
                       class="form-control"
                       value="1"
                       min="1">
            </div>

            <div class="col-md-2">
                <button type="button" class="btn btn-danger btn-sm remove-buku">
                    Hapus
                </button>
            </div>

        </div>`;

        wrapper.insertAdjacentHTML('beforeend', html);
        index++;
    });

    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-buku')) {
            e.target.closest('.buku-item').remove();
        }
    });
</script>
@endpush