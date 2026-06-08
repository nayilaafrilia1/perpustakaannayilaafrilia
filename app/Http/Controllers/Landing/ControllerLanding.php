<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Buku;
use App\Models\Kategori;

class ControllerLanding extends Controller
{
    /**
     * =========================================================
     * HOME LANDING
     * =========================================================
     */
    public function home()
    {
        $totalBuku = Buku::count();

        $totalKategori = Kategori::count();

        $totalTersedia = Buku::where('stok', '>', 0)->count();

        $bukupopuler = Buku::with('kategori')
                            ->latest()
                            ->take(8)
                            ->get();

        return view('landing.home', [
            'title'          => 'Home',
            'totalBuku'      => $totalBuku,
            'totalKategori'  => $totalKategori,
            'totalTersedia'  => $totalTersedia,
            'bukupopuler'    => $bukupopuler,
        ]);
    }

    /**
     * =========================================================
     * KATALOG BUKU
     * =========================================================
     */
    public function katalog(Request $request)
    {
        $search = $request->search;

        $buku = Buku::with('kategori')

            ->when($search, function ($query) use ($search) {

                $query->where('judul', 'like', '%' . $search . '%')
                      ->orWhere('pengarang', 'like', '%' . $search . '%')
                      ->orWhere('penerbit', 'like', '%' . $search . '%');
            })

            ->latest()
            ->paginate(12);

        return view('landing.katalog', [
            'title' => 'Katalog Buku',
            'buku'  => $buku,
        ]);
    }

    /**
     * =========================================================
     * DETAIL BUKU
     * =========================================================
     */
    public function detailbuku($id)
    {
        $buku = Buku::with('kategori')
                    ->findOrFail($id);

        return view('landing.detailbuku', [
            'title' => 'Detail Buku',
            'buku'  => $buku,
        ]);
    }

    /**
     * =========================================================
     * KATEGORI
     * =========================================================
     */
    public function kategori()
    {
        $kategori = Kategori::latest()->get();

        return view('landing.kategori', [
            'title'    => 'Kategori Buku',
            'kategori' => $kategori,
        ]);
    }

    /**
     * =========================================================
     * TENTANG
     * =========================================================
     */
    public function tentang()
    {
        return view('landing.tentang', [
            'title' => 'Tentang Kami',
        ]);
    }

    /**
     * =========================================================
     * KONTAK
     * =========================================================
     */
    public function kontak()
    {
        return view('landing.kontak', [
            'title' => 'Kontak',
        ]);
    }
}