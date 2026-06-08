@extends('layouts.appuser')

@section('title','Proses Pengembalian Buku')

@section('content')

<div class="content-header">
    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center">
            <h1 class="m-0">
                <i class="fas fa-undo text-success"></i>
                Proses Pengembalian Buku
            </h1>

            <a href="{{ route('pengembalian.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>

    </div>
</div>

<section class="content">
<div class="container-fluid">

<form action="{{ route('pengembalian.update',$data->id) }}" method="POST">
@csrf
@method('PUT')

{{-- hidden batas --}}
<input type="hidden" id="batas" value="{{ $data->tanggalkembali }}">

<div class="card card-success card-outline">

    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-book"></i>
            Form Pengembalian
        </h3>
    </div>

    <div class="card-body">

        {{-- INFO PEMINJAM --}}
        <div class="row">

            <div class="col-md-6">
                <label>Peminjam</label>
                <input type="text"
                       class="form-control"
                       value="{{ $data->peminjaman->peminjam->namapeminjam }}"
                       readonly>
            </div>

            <div class="col-md-6">
                <label>Buku</label>
                <input type="text"
                       class="form-control"
                       value="{{ $data->buku->judul }}"
                       readonly>
            </div>

        </div>

        <br>

        {{-- TANGGAL --}}
        <div class="row">

            <div class="col-md-4">
                <label>Tanggal Pinjam</label>
                <input type="text"
                       class="form-control"
                       value="{{ $data->tanggalpinjam }}"
                       readonly>
            </div>

            <div class="col-md-4">
                <label>Batas Kembali</label>
                <input type="text"
                       class="form-control"
                       value="{{ $data->tanggalkembali }}"
                       readonly>
            </div>

            <div class="col-md-4">
                <label>Tanggal Dikembalikan</label>
                <input type="date"
                       name="tanggalkembalikan"
                       id="kembali"
                       class="form-control"
                       value="{{ date('Y-m-d') }}"
                       required>
            </div>

        </div>

        {{-- STATUS DENDA --}}
        <div id="statusDenda" class="mt-3"></div>

    </div>

    <div class="card-footer">

        <button type="submit" class="btn btn-success">
            <i class="fas fa-save"></i>
            Simpan Pengembalian
        </button>

    </div>

</div>

</form>

</div>
</section>

@endsection

{{-- ================= SCRIPT ================= --}}
@push('scripts')

<script>

function hitungDenda()
{
    let batas = new Date(document.getElementById('batas').value);
    let kembali = new Date(document.getElementById('kembali').value);

    let selisih = Math.floor((kembali - batas) / (1000 * 60 * 60 * 24));

    let hariTelat = selisih > 0 ? selisih : 0;
    let denda = hariTelat * 5000;

    let box = document.getElementById('statusDenda');

    if(hariTelat > 0)
    {
        box.innerHTML = `
            <div class="alert alert-danger">
                <h5>
                    <i class="fas fa-exclamation-triangle"></i>
                    TERLAMBAT ${hariTelat} HARI
                </h5>

                Total Denda:
                <b>Rp ${denda.toLocaleString('id-ID')}</b>
            </div>
        `;
    }
    else
    {
        box.innerHTML = `
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                Tepat waktu (Tidak ada denda)
            </div>
        `;
    }
}

// init
window.onload = hitungDenda;

// change event
document.getElementById('kembali')
.addEventListener('change', hitungDenda);

</script>

@endpush