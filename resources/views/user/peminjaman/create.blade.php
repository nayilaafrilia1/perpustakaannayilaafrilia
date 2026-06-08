@extends('layouts.appuser')

@section('title', 'Tambah Peminjaman')

@section('content')

<div class="container-fluid">

    <div class="card card-primary card-outline">

        <div class="card-header">
            <h3 class="card-title">Form Tambah Peminjaman</h3>
        </div>

        <form action="{{ route('peminjaman.store') }}" method="POST">
            @csrf

            <div class="card-body">

                {{-- PEMINJAM --}}
                <div class="form-group">
                    <label>Pilih Peminjam</label>
                    <select name="idpeminjam" class="form-control" required>
                        <option value="">-- pilih peminjam --</option>
                        @foreach($peminjams as $p)
                            <option value="{{ $p->id }}">{{ $p->namapeminjam }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- TANGGAL --}}
                <div class="row">
                    <div class="col-md-6">
                        <label>Tanggal Pinjam</label>
                        <input type="date" name="tanggal_pinjam"
                               value="{{ date('Y-m-d') }}"
                               class="form-control" readonly>
                    </div>

                    <div class="col-md-6">
                        <label>Tanggal Kembali</label>
                        <input type="date" name="tanggal_kembali"
                               value="{{ date('Y-m-d', strtotime('+5 days')) }}"
                               class="form-control" readonly>
                    </div>
                </div>

                <hr>

                <label><b>Daftar Buku</b></label>

                <div id="wrapper-buku">

                    {{-- ROW PERTAMA --}}
                    <div class="row buku-item mb-2">

                        <div class="col-md-7">
                            <select name="buku[0][idbuku]" class="form-control" required>
                                <option value="">-- pilih buku --</option>
                                @foreach ($bukus as $buku)
                                    <option value="{{ $buku->id }}">
                                        {{ $buku->judul }} (stok: {{ $buku->stok }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <input type="number"
                                   name="buku[0][jumlah]"
                                   class="form-control"
                                   min="1"
                                   required>
                        </div>

                        <div class="col-md-2">
                            <button type="button" class="btn btn-danger btn-hapus btn-block">
                                Hapus
                            </button>
                        </div>

                    </div>

                </div>

                <button type="button" id="tambah-buku" class="btn btn-primary btn-sm">
                    + Tambah Buku
                </button>

            </div>

            <div class="card-footer text-right">
                <button type="reset" class="btn btn-warning btn-sm">Reset</button>
                <button type="submit" class="btn btn-success btn-sm">Simpan</button>
            </div>

        </form>

    </div>
</div>

@endsection

@push('scripts')
<script>
$(document).ready(function () {

    let index = 1;

    // tambah buku
    $('#tambah-buku').on('click', function () {

        let html = `
        <div class="row buku-item mb-2">

            <div class="col-md-7">
                <select name="buku[${index}][idbuku]" class="form-control" required>
                    <option value="">-- pilih buku --</option>
                    @foreach($bukus as $b)
                        <option value="{{ $b->id }}">
                            {{ $b->judul }} (stok: {{ $b->stok }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <input type="number"
                       name="buku[${index}][jumlah]"
                       class="form-control"
                       min="1"
                       required>
            </div>

            <div class="col-md-2">
                <button type="button" class="btn btn-danger btn-hapus btn-block">Hapus</button>
            </div>

        </div>`;

        $('#wrapper-buku').append(html);
        index++;
    });

    // hapus
    $(document).on('click', '.btn-hapus', function () {
        $(this).closest('.buku-item').remove();
    });

});
</script>
@endpush