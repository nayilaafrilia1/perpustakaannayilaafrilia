<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ControllerBuku extends Controller
{
    /**
     * =========================
     * LIST BUKU (ADMIN)
     * =========================
     */
    public function index()
    {
        $bukus = Buku::with('kategori')
            ->latest()
            ->get();

        return view('user.buku.index', compact('bukus'));
    }

    /**
     * =========================
     * HOME / FRONTEND (PUBLIC)
     * =========================
     * (dipindahkan dari index kedua)
     */
    public function home()
    {
        $bukus = Buku::with('kategori')
            ->latest()
            ->take(8)
            ->get();

        return view('home', compact('bukus'));
    }

    /**
     * FORM CREATE
     */
    public function create()
    {
        $kategori = Kategori::orderBy('namakategori')->get();

        return view('user.buku.create', compact('kategori'));
    }

    /**
     * SIMPAN BUKU
     */
    public function store(Request $request)
    {
        $request->validate([
            'idkategori'      => 'required|exists:kategori,id',
            'nomorseri'       => 'required|string|max:255',
            'isbn'            => 'nullable|string|max:255',
            'judul'           => 'required|string|max:255',
            'penerbit'        => 'required|string|max:255',
            'pengarang'       => 'required|string|max:255',
            'tahunterbit'     => 'nullable|integer',
            'tahunpengadaan'  => 'nullable|integer',
            'deskripsi'       => 'nullable|string',
            'status'          => 'required|in:tersedia,dipinjam,rusak,hilang',
            'kondisi'         => 'required|in:bagus,rusak',
            'rak'             => 'required|string|max:100',
            'stok'            => 'required|integer|min:0',
            'foto'            => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $foto = null;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $foto = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('cover/buku'), $foto);
        }

        Buku::create([
            'idkategori'      => $request->idkategori,
            'nomorseri'       => $request->nomorseri,
            'isbn'            => $request->isbn,
            'judul'           => $request->judul,
            'penerbit'        => $request->penerbit,
            'pengarang'       => $request->pengarang,
            'tahunterbit'     => $request->tahunterbit,
            'tahunpengadaan'  => $request->tahunpengadaan,
            'deskripsi'       => $request->deskripsi,
            'status'          => $request->status,
            'kondisi'         => $request->kondisi,
            'rak'             => $request->rak,
            'stok'            => $request->stok,
            'foto'            => $foto,
        ]);

        return redirect()->route('buku.index')
            ->with('success', 'Buku berhasil ditambahkan');
    }

    /**
     * DETAIL BUKU
     */
    public function show($id)
    {
        $buku = Buku::with('kategori')->findOrFail($id);

        return view('user.buku.show', compact('buku'));
    }

    /**
     * FORM EDIT
     */
    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        $kategori = Kategori::orderBy('namakategori')->get();

        return view('user.buku.edit', compact('buku', 'kategori'));
    }

    /**
     * UPDATE
     */
    public function update(Request $request, $id)
    {
        $buku = Buku::findOrFail($id);

        $request->validate([
            'idkategori'      => 'required|exists:kategori,id',
            'nomorseri'       => 'required|string|max:255',
            'isbn'            => 'nullable|string|max:255',
            'judul'           => 'required|string|max:255',
            'penerbit'        => 'required|string|max:255',
            'pengarang'       => 'required|string|max:255',
            'tahunterbit'     => 'nullable|integer',
            'tahunpengadaan'  => 'nullable|integer',
            'deskripsi'       => 'nullable|string',
            'status'          => 'required|in:tersedia,dipinjam,rusak,hilang',
            'kondisi'         => 'required|in:bagus,rusak',
            'rak'             => 'required|string|max:100',
            'stok'            => 'required|integer|min:0',
            'foto'            => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->except('foto');

        if ($request->hasFile('foto')) {

            if ($buku->foto && file_exists(public_path('cover/buku/' . $buku->foto))) {
                unlink(public_path('cover/buku/' . $buku->foto));
            }

            $file = $request->file('foto');
            $namaFoto = time() . '_' . $file->getClientOriginalName();

            $file->move(public_path('cover/buku'), $namaFoto);

            $data['foto'] = $namaFoto;
        }

        $buku->update($data);

        return redirect()->route('buku.index')
            ->with('success', 'Buku berhasil diupdate');
    }

    /**
     * DELETE
     */
    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);

        if ($buku->foto && file_exists(public_path('cover/buku/' . $buku->foto))) {
            unlink(public_path('cover/buku/' . $buku->foto));
        }

        $buku->delete();

        return redirect()->route('buku.index')
            ->with('success', 'Buku berhasil dihapus');
    }
}