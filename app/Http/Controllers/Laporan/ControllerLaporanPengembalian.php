<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DetailPeminjaman;

class ControllerLaporanPengembalian extends Controller
{
    /**
     * LIST LAPORAN PENGEMBALIAN
     */
    public function index(Request $request)
    {
        $query = DetailPeminjaman::with([
            'peminjaman.peminjam',
            'buku'
        ])->whereNotNull('tanggalkembalikan');

        // FILTER NAMA PEMINJAM
        if ($request->cari) {
            $query->whereHas('peminjaman.peminjam', function ($q) use ($request) {
                $q->where('namapeminjam', 'like', '%' . $request->cari . '%');
            });
        }

        // FILTER STATUS
        if ($request->status) {
            $query->where('status', $request->status);
        }

        $pengembalian = $query->orderBy('id', 'desc')->paginate(10);

        return view('user.laporan.pengembalian', compact('pengembalian'));
    }

    /**
     * CETAK LAPORAN
     */
    public function cetak(Request $request)
    {
        $query = DetailPeminjaman::with([
            'peminjaman.peminjam',
            'buku'
        ])->whereNotNull('tanggalkembalikan');

        if ($request->cari) {
            $query->whereHas('peminjaman.peminjam', function ($q) use ($request) {
                $q->where('namapeminjam', 'like', '%' . $request->cari . '%');
            });
        }

        if ($request->status) {
            $query->where('status', $request->status);
        }

        $pengembalian = $query->get();

        return view('user.laporan.cetak_pengembalian', compact('pengembalian'));
    }
}