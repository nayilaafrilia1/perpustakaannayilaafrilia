@extends('layouts.appuser')

@section('title', 'Pembayaran Denda')

@section('content')

<div class="card card-success card-outline">


<div class="card-header">

    <h3 class="card-title">

        Pembayaran Denda

    </h3>

</div>

<form
    action="{{ route('denda.update',$denda->id) }}"
    method="POST">

    @csrf
    @method('PUT')

    <div class="card-body">

        <div class="form-group">

            <label>Nama Peminjam</label>

            <input
                type="text"
                class="form-control"
                value="{{ $denda->peminjaman->peminjam->namapeminjam }}"
                readonly>

        </div>

        <div class="form-group">

            <label>Judul Buku</label>

            <input
                type="text"
                class="form-control"
                value="{{ $denda->buku->judul }}"
                readonly>

        </div>

        <div class="form-group">

            <label>Total Denda</label>

            <input
                type="number"
                id="totaldenda"
                class="form-control"
                value="{{ $denda->peminjaman->totaldenda }}"
                readonly>

        </div>

        <div class="form-group">

            <label>Uang Dibayar</label>

            <input
                type="number"
                name="dibayar"
                id="dibayar"
                class="form-control"
                required>

        </div>

        <div class="form-group">

            <label>Kembalian</label>

            <input
                type="number"
                id="kembalian"
                class="form-control"
                readonly>

        </div>

    </div>

    <div class="card-footer">

        <button
            type="submit"
            class="btn btn-success">

            Simpan Pembayaran

        </button>

        <a href="{{ route('denda.index') }}"
            class="btn btn-secondary">

            Batal

        </a>

    </div>

</form>

</div>

@endsection

@push('scripts')

<script>

document.getElementById('dibayar')
.addEventListener('keyup', function(){

    let bayar =
        parseInt(this.value) || 0;

    let total =
        parseInt(
            document.getElementById(
                'totaldenda'
            ).value
        ) || 0;

    let kembali =
        bayar - total;

    document.getElementById(
        'kembalian'
    ).value = kembali;

});

</script>

@endpush
