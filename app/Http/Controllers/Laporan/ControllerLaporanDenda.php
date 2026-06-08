<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DetailPeminjaman;

class ControllerLaporanDenda extends Controller
{
    /**
     * LIST LAPORAN DENDA
     */
    public function index(Request $request)
    {
        $query = DetailPeminjaman::with([
            'peminjaman.peminjam',
            'buku'
        ])->where('denda', '>', 0);

        // filter nama peminjam
        if ($request->cari) {
            $query->whereHas('peminjaman.peminjam', function ($q) use ($request) {
                $q->where('namapeminjam', 'like', '%' . $request->cari . '%');
            });
        }

        // filter status
        if ($request->status) {
            $query->where('status', $request->status);
        }

        $denda = $query->orderBy('id', 'desc')->paginate(10);

        return view('user.laporan.denda', compact('denda'));
    }

    /**
     * CETAK LAPORAN DENDA
     */
    public function cetak(Request $request)
    {
        $query = DetailPeminjaman::with([
            'peminjaman.peminjam',
            'buku'
        ])->where('denda', '>', 0);

        if ($request->cari) {
            $query->whereHas('peminjaman.peminjam', function ($q) use ($request) {
                $q->where('namapeminjam', 'like', '%' . $request->cari . '%');
            });
        }

        if ($request->status) {
            $query->where('status', $request->status);
        }

        $denda = $query->get();

        return view('user.laporan.cetak_denda', compact('denda'));
    }
}