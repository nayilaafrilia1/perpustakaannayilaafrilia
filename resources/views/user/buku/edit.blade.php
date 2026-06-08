@extends('layouts.appuser')

@section('title', 'Edit Buku')

@section('content')

<div class="card card-warning card-outline">


<div class="card-header">
    <h3 class="card-title">
        <i class="fas fa-edit"></i> Edit Buku
    </h3>
</div>

<form action="{{ route('buku.update', $buku->id) }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <div class="card-body">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">

            {{-- KATEGORI --}}
            <div class="col-md-6">
                <div class="form-group">
                    <label>Kategori</label>

                    <select name="idkategori"
                            class="form-control"
                            required>

                        <option value="">-- Pilih Kategori --</option>

                        @foreach($kategori as $item)
                            <option value="{{ $item->id }}"
                                {{ $buku->idkategori == $item->id ? 'selected' : '' }}>
                                {{ $item->namakategori }}
                            </option>
                        @endforeach

                    </select>
                </div>
            </div>

            {{-- NOMOR SERI --}}
            <div class="col-md-6">
                <div class="form-group">
                    <label>Nomor Seri</label>

                    <input type="text"
                           name="nomorseri"
                           class="form-control"
                           value="{{ old('nomorseri', $buku->nomorseri) }}"
                           required>
                </div>
            </div>

            {{-- ISBN --}}
            <div class="col-md-6">
                <div class="form-group">
                    <label>ISBN</label>

                    <input type="text"
                           name="isbn"
                           class="form-control"
                           value="{{ old('isbn', $buku->isbn) }}">
                </div>
            </div>

            {{-- JUDUL --}}
            <div class="col-md-6">
                <div class="form-group">
                    <label>Judul Buku</label>

                    <input type="text"
                           name="judul"
                           class="form-control"
                           value="{{ old('judul', $buku->judul) }}"
                           required>
                </div>
            </div>

            {{-- PENERBIT --}}
            <div class="col-md-6">
                <div class="form-group">
                    <label>Penerbit</label>

                    <input type="text"
                           name="penerbit"
                           class="form-control"
                           value="{{ old('penerbit', $buku->penerbit) }}"
                           required>
                </div>
            </div>

            {{-- PENGARANG --}}
            <div class="col-md-6">
                <div class="form-group">
                    <label>Pengarang</label>

                    <input type="text"
                           name="pengarang"
                           class="form-control"
                           value="{{ old('pengarang', $buku->pengarang) }}"
                           required>
                </div>
            </div>

            {{-- TAHUN TERBIT --}}
            <div class="col-md-6">
                <div class="form-group">
                    <label>Tahun Terbit</label>

                    <input type="number"
                           name="tahunterbit"
                           class="form-control"
                           value="{{ old('tahunterbit', $buku->tahunterbit) }}">
                </div>
            </div>

            {{-- TAHUN PENGADAAN --}}
            <div class="col-md-6">
                <div class="form-group">
                    <label>Tahun Pengadaan</label>

                    <input type="number"
                           name="tahunpengadaan"
                           class="form-control"
                           value="{{ old('tahunpengadaan', $buku->tahunpengadaan) }}">
                </div>
            </div>

            {{-- STATUS --}}
            <div class="col-md-6">
                <div class="form-group">
                    <label>Status</label>

                    <select name="status"
                            class="form-control"
                            required>

                        <option value="tersedia"
                            {{ $buku->status == 'tersedia' ? 'selected' : '' }}>
                            Tersedia
                        </option>

                        <option value="dipinjam"
                            {{ $buku->status == 'dipinjam' ? 'selected' : '' }}>
                            Dipinjam
                        </option>

                        <option value="rusak"
                            {{ $buku->status == 'rusak' ? 'selected' : '' }}>
                            Rusak
                        </option>

                        <option value="hilang"
                            {{ $buku->status == 'hilang' ? 'selected' : '' }}>
                            Hilang
                        </option>

                    </select>
                </div>
            </div>

            {{-- KONDISI --}}
            <div class="col-md-6">
                <div class="form-group">
                    <label>Kondisi</label>

                    <select name="kondisi"
                            class="form-control"
                            required>

                        <option value="bagus"
                            {{ $buku->kondisi == 'bagus' ? 'selected' : '' }}>
                            Bagus
                        </option>

                        <option value="rusak"
                            {{ $buku->kondisi == 'rusak' ? 'selected' : '' }}>
                            Rusak
                        </option>

                    </select>
                </div>
            </div>

            {{-- RAK --}}
            <div class="col-md-6">
                <div class="form-group">
                    <label>Rak</label>

                    <input type="text"
                           name="rak"
                           class="form-control"
                           value="{{ old('rak', $buku->rak) }}"
                           required>
                </div>
            </div>

            {{-- STOK --}}
            <div class="col-md-6">
                <div class="form-group">
                    <label>Stok</label>

                    <input type="number"
                           name="stok"
                           class="form-control"
                           value="{{ old('stok', $buku->stok) }}"
                           required>
                </div>
            </div>

            {{-- DESKRIPSI --}}
            <div class="col-md-12">
                <div class="form-group">
                    <label>Deskripsi</label>

                    <textarea name="deskripsi"
                              rows="4"
                              class="form-control">{{ old('deskripsi', $buku->deskripsi) }}</textarea>
                </div>
            </div>

            {{-- FOTO --}}
            <div class="col-md-12">
                <div class="form-group">
                    <label>Ganti Cover Buku</label>

                    <input type="file"
                           name="foto"
                           class="form-control">
                </div>

                @if($buku->foto)
                    <img src="{{ asset('cover/buku/'.$buku->foto) }}"
                         width="150"
                         class="img-thumbnail">
                @endif
            </div>

        </div>

    </div>

    <div class="card-footer">

        <button type="submit"
                class="btn btn-warning">
            <i class="fas fa-save"></i>
            Update
        </button>

        <a href="{{ route('buku.index') }}"
           class="btn btn-secondary">
            Kembali
        </a>

    </div>

</form>


</div>

@endsection
