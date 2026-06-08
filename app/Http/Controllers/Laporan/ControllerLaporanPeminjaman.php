<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Peminjaman;

class ControllerLaporanPeminjaman extends Controller
{
    /**
     * LAPORAN PEMINJAMAN (VIEW)
     */
    public function index(Request $request)
    {
        $query = Peminjaman::with([
            'peminjam',
            'user',
            'detailPeminjaman.buku'
        ]);

        // filter nama peminjam
        if ($request->cari) {
            $query->whereHas('peminjam', function ($q) use ($request) {
                $q->where('namapeminjam', 'like', '%' . $request->cari . '%');
            });
        }

        $peminjaman = $query->orderBy('id', 'desc')->paginate(10);

        return view('user.laporan.peminjaman', compact('peminjaman'));
    }

    /**
     * CETAK LAPORAN PEMINJAMAN
     */
    public function cetak(Request $request)
    {
        $query = Peminjaman::with([
            'peminjam',
            'user',
            'detailPeminjaman.buku'
        ]);

        if ($request->cari) {
            $query->whereHas('peminjam', function ($q) use ($request) {
                $q->where('namapeminjam', 'like', '%' . $request->cari . '%');
            });
        }

        $peminjaman = $query->get();

        return view('user.laporan.cetak_peminjaman', compact('peminjaman'));
    }
}