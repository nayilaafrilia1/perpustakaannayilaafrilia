@extends('layouts.appuser')

@section('title', 'Tambah Buku')

@section('content')

<div class="card card-primary card-outline">

    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-book mr-1"></i>
            Tambah Buku
        </h3>
    </div>

    <form action="{{ route('buku.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="card-body">

            <div class="row">

                {{-- KATEGORI --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Kategori</label>

                        <select name="idkategori"
                                class="form-control"
                                required>

                            <option value="">
                                -- Pilih Kategori --
                            </option>

                            @foreach($kategori as $item)
                                <option value="{{ $item->id }}">
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
                               required>
                    </div>
                </div>

                {{-- ISBN --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label>ISBN</label>

                        <input type="text"
                               name="isbn"
                               class="form-control">
                    </div>
                </div>

                {{-- JUDUL --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Judul Buku</label>

                        <input type="text"
                               name="judul"
                               class="form-control"
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
                               min="1900"
                               max="{{ date('Y') }}">
                    </div>
                </div>

                {{-- TAHUN PENGADAAN --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tahun Pengadaan</label>

                        <input type="number"
                               name="tahunpengadaan"
                               class="form-control"
                               min="1900"
                               max="{{ date('Y') }}">
                    </div>
                </div>

                {{-- STATUS --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Status</label>

                        <select name="status"
                                class="form-control"
                                required>

                            <option value="tersedia">Tersedia</option>
                            <option value="dipinjam">Dipinjam</option>
                            <option value="rusak">Rusak</option>
                            <option value="hilang">Hilang</option>

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

                            <option value="bagus">Bagus</option>
                            <option value="rusak">Rusak</option>

                        </select>
                    </div>
                </div>

                {{-- RAK --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Rak</label>

                        <select name="rak"
                                class="form-control"
                                required>

                            <option value="">-- Pilih Rak --</option>

                            <option value="A1">Rak A1</option>
                            <option value="A2">Rak A2</option>
                            <option value="A3">Rak A3</option>

                            <option value="B1">Rak B1</option>
                            <option value="B2">Rak B2</option>
                            <option value="B3">Rak B3</option>

                            <option value="C1">Rak C1</option>
                            <option value="C2">Rak C2</option>
                            <option value="C3">Rak C3</option>

                        </select>
                    </div>
                </div>

                {{-- STOK --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Stok</label>

                        <input type="number"
                               name="stok"
                               class="form-control"
                               min="0"
                               value="0"
                               required>
                    </div>
                </div>

                {{-- DESKRIPSI --}}
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Deskripsi</label>

                        <textarea name="deskripsi"
                                  class="form-control"
                                  rows="4"></textarea>
                    </div>
                </div>

                {{-- FOTO --}}
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Foto Buku</label>

                        <input type="file"
                               name="foto"
                               class="form-control">
                    </div>
                </div>

            </div>

        </div>

        <div class="card-footer">

            <button type="submit"
                    class="btn btn-primary">
                <i class="fas fa-save"></i>
                Simpan
            </button>

            <a href="{{ route('buku.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>

        </div>

    </form>

</div>

@endsection