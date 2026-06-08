<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ControllerKategori extends Controller
{
    /**
     * Tampilkan semua data kategori
     */
    public function index()
    {
        $kategori = Kategori::latest()->get();

        return view('user.kategori.index', compact('kategori'));
    }

    /**
     * Form tambah kategori
     */
    public function create()
    {
        return view('user.kategori.create');
    }

    /**
     * Simpan kategori baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'namakategori' => 'required|string|max:100',
        ], [
            'namakategori.required' => 'Nama kategori wajib diisi.',
        ]);

        Kategori::create([
            'namakategori' => $request->namakategori,
        ]);

        return redirect()
            ->route('kategori.index')
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    /**
     * Detail kategori
     */
    public function show(string $id)
    {
        $kategori = Kategori::findOrFail($id);

        return view('user.kategori.show', compact('kategori'));
    }

    /**
     * Form edit kategori
     */
    public function edit(string $id)
    {
        $kategori = Kategori::findOrFail($id);

        return view('user.kategori.edit', compact('kategori'));
    }

    /**
     * Update kategori
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'namakategori' => 'required|string|max:100',
        ]);

        $kategori = Kategori::findOrFail($id);

        $kategori->update([
            'namakategori' => $request->namakategori,
        ]);

        return redirect()
            ->route('kategori.index')
            ->with('success', 'Kategori berhasil diperbarui.');
    }

    /**
     * Hapus kategori
     */
    public function destroy(string $id)
    {
        $kategori = Kategori::findOrFail($id);

        $kategori->delete();

        return redirect()
            ->route('kategori.index')
            ->with('success', 'Kategori berhasil dihapus.');
    }
}