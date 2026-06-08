<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use App\Models\Buku;
use App\Models\Peminjam;
use App\Models\Peminjaman;
use App\Models\User;
use App\Models\DetailPeminjaman;

class ControllerDashboardAdmin extends Controller
{
    /**
     * =========================================================
     * DASHBOARD ADMIN
     * =========================================================
     */
    public function index()
    {
        /*
        |=========================================================
        | STATISTIK
        |=========================================================
        */

        $totalBuku         = Buku::count();

        $totalPeminjam     = Peminjam::count();

        $totalUser         = User::count();

        $totalPeminjaman   = Peminjaman::count();

        $totalDipinjam     = DetailPeminjaman::where(
                                    'keterangan',
                                    'belumkembali'
                                )->count();

        $totalDikembalikan = DetailPeminjaman::where(
                                        'keterangan',
                                        'sudahkembali'
                                    )->count();

        $totalTerlambat    = DetailPeminjaman::where(
                                        'status',
                                        'terlambat'
                                    )->count();

        /*
        |=========================================================
        | BUKU TERBARU
        |=========================================================
        */

        $bukuTerbaru = Buku::latest()
                            ->take(8)
                            ->get();

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

        return view('user.dashboard.dashboardadmin', [

            'title'                => 'Dashboard Admin',

            'totalBuku'            => $totalBuku,

            'totalPeminjam'        => $totalPeminjam,

            'totalUser'            => $totalUser,

            'totalPeminjaman'      => $totalPeminjaman,

            'totalDipinjam'        => $totalDipinjam,

            'totalDikembalikan'    => $totalDikembalikan,

            'totalTerlambat'       => $totalTerlambat,

            'bukuTerbaru'          => $bukuTerbaru,

            'transaksiTerbaru'     => $transaksiTerbaru,

        ]);
    }
}