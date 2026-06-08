<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use App\Models\Buku;
use App\Models\Peminjam;
use App\Models\Peminjaman;
use App\Models\DetailPeminjaman;
use App\Models\User;

class ControllerDashboardAdmin extends Controller
{
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | STATISTIK
        |--------------------------------------------------------------------------
        */

        $totalBuku = Buku::count();

        $totalPeminjam = Peminjam::count();

        $totalUser = User::count();

        $totalPeminjaman = Peminjaman::count();

        $totalDipinjam = DetailPeminjaman::where(
            'keterangan',
            'belumkembali'
        )->count();

        $totalDikembalikan = DetailPeminjaman::where(
            'keterangan',
            'sudahkembali'
        )->count();

        $totalTerlambat = DetailPeminjaman::where(
            'status',
            'terlambat'
        )->count();

        /*
        |--------------------------------------------------------------------------
        | TOTAL DENDA
        |--------------------------------------------------------------------------
        */

        $totalDenda = DetailPeminjaman::sum('denda');

        /*
        |--------------------------------------------------------------------------
        | GRAFIK PEMINJAMAN
        |--------------------------------------------------------------------------
        */

        $grafikPeminjaman = [];

        for ($bulan = 1; $bulan <= 12; $bulan++) {

            $grafikPeminjaman[] = DetailPeminjaman::whereYear(
                'tanggalpinjam',
                date('Y')
            )
            ->whereMonth(
                'tanggalpinjam',
                $bulan
            )
            ->count();
        }

        /*
        |--------------------------------------------------------------------------
        | BUKU TERBARU
        |--------------------------------------------------------------------------
        */

        $bukuTerbaru = Buku::with('kategori')
            ->latest()
            ->take(8)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | TRANSAKSI TERBARU
        |--------------------------------------------------------------------------
        */

        $transaksiTerbaru = DetailPeminjaman::with([
                'buku',
                'peminjaman',
                'peminjaman.peminjam'
            ])
            ->latest()
            ->take(10)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | BUKU TERLAMBAT
        |--------------------------------------------------------------------------
        */

        $bukuTerlambat = DetailPeminjaman::with([
                'buku',
                'peminjaman.peminjam'
            ])
            ->where('status', 'terlambat')
            ->latest()
            ->take(5)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | VIEW
        |--------------------------------------------------------------------------
        */

        return view(
            'user.dashboard.dashboardadmin',
            compact(
                'totalBuku',
                'totalPeminjam',
                'totalUser',
                'totalPeminjaman',
                'totalDipinjam',
                'totalDikembalikan',
                'totalTerlambat',
                'totalDenda',
                'grafikPeminjaman',
                'bukuTerbaru',
                'transaksiTerbaru',
                'bukuTerlambat'
            )
        );
    }
}