<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use App\Models\Buku;
use App\Models\DetailPeminjaman;

class ControllerDashboardPetugas extends Controller
{
    /**
     * =========================================================
     * DASHBOARD PETUGAS
     * =========================================================
     */
    public function index()
    {
        /*
        |=========================================================
        | STATISTIK
        |=========================================================
        */

        $totalBuku = Buku::count();

        $dipinjam = DetailPeminjaman::where(
                                'keterangan',
                                'belumkembali'
                            )->count();

        $dikembalikan = DetailPeminjaman::where(
                                    'keterangan',
                                    'sudahkembali'
                                )->count();

        $terlambat = DetailPeminjaman::where(
                                'status',
                                'terlambat'
                            )->count();

        /*
        |=========================================================
        | TRANSAKSI TERBARU
        |=========================================================
        */

        $transaksiTerbaru = DetailPeminjaman::with([
                                    'buku',
                                    'peminjaman.peminjam'
                                ])
                                ->latest()
                                ->take(10)
                                ->get();

        return view('user.dashboard.dashboardpetugas', [

            'title'                => 'Dashboard Petugas',

            'totalBuku'            => $totalBuku,

            'dipinjam'             => $dipinjam,

            'dikembalikan'         => $dikembalikan,

            'terlambat'            => $terlambat,

            'transaksiTerbaru'     => $transaksiTerbaru,

        ]);
    }
}