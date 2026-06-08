<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use Illuminate\Http\Request;

class ControllerLaporanBuku extends Controller
{
    /**
     * TAMPIL LAPORAN BUKU
     */
    public function index(Request $request)
    {
        $query = Buku::with('kategori');

        // Filter kategori
        if ($request->filled('kategori')) {
            $query->where('idkategori', $request->kategori);
        }

        // Filter status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Pencarian judul
        if ($request->filled('cari')) {
            $query->where('judul', 'like', '%' . $request->cari . '%');
        }

        $buku = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view(
            'user.laporan.buku',
            compact('buku')
        );
    }

    /**
     * CETAK LAPORAN BUKU
     */
    public function cetak(Request $request)
    {
        $query = Buku::with('kategori');

        if ($request->filled('kategori')) {
            $query->where('idkategori', $request->kategori);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('cari')) {
            $query->where('judul', 'like', '%' . $request->cari . '%');
        }

        $buku = $query
            ->orderBy('judul')
            ->get();

        $judul = 'Laporan Data Buku';

        return view(
            'user.laporan.cetak_buku',
            compact(
                'judul',
                'buku'
            )
        );
    }
}