<?php

namespace App\Http\Controllers\ZonaPeminjam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\DetailPeminjaman;

class ControllerZonaPeminjam extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | DASHBOARD PEMINJAM
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $idPeminjam = auth('peminjam')->id();

        $totalPinjam = Peminjaman::where(
            'idpeminjam',
            $idPeminjam
        )->count();

        $totalKembali = DetailPeminjaman::whereHas(
            'peminjaman',
            function ($q) use ($idPeminjam) {
                $q->where('idpeminjam', $idPeminjam);
            }
        )
        ->where('keterangan', 'sudahkembali')
        ->count();

        $totalDenda = DetailPeminjaman::whereHas(
            'peminjaman',
            function ($q) use ($idPeminjam) {
                $q->where('idpeminjam', $idPeminjam);
            }
        )
        ->sum('denda');

        $riwayat = DetailPeminjaman::with('buku')
            ->whereHas(
                'peminjaman',
                function ($q) use ($idPeminjam) {
                    $q->where('idpeminjam', $idPeminjam);
                }
            )
            ->latest()
            ->take(10)
            ->get();

        return view(
            'zonapeminjam.dashboard.dashboardpeminjam',
            compact(
                'totalPinjam',
                'totalKembali',
                'totalDenda',
                'riwayat'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | KATALOG BUKU
    |--------------------------------------------------------------------------
    */
    public function katalog()
    {
        $bukus = Buku::with('kategori')
            ->latest()
            ->get();

        return view(
            'zonapeminjam.katalog.index',
            compact('bukus')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | DETAIL BUKU
    |--------------------------------------------------------------------------
    */
    public function detailbuku($id)
    {
        $buku = Buku::with('kategori')
            ->findOrFail($id);

        return view(
            'zonapeminjam.katalog.detail',
            compact('buku')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | PINJAM BUKU
    |--------------------------------------------------------------------------
    */
    public function pinjambuku($id)
    {
        $peminjamId = auth('peminjam')->id();

        $buku = Buku::findOrFail($id);

        if ($buku->stok <= 0) {
            return back()->with(
                'error',
                'Stok buku sedang habis.'
            );
        }

        DB::transaction(function () use (
            $buku,
            $peminjamId
        ) {

            $peminjaman = Peminjaman::create([

                'idpeminjam' => $peminjamId,

                'iduser' => 1,

            ]);

            DetailPeminjaman::create([

                'idpeminjaman' => $peminjaman->id,

                'idbuku' => $buku->id,

                'iddenda' => null,

                'tanggalpinjam' => now(),

                'tanggalkembali' => now()->addDays(5),

                'durasipeminjaman' => 5,

                'jumlahharitelat' => 0,

                'status' => 'tidakterlambat',

                'keterangan' => 'belumkembali',

                'denda' => 0,

            ]);

            $buku->decrement('stok');
        });

        return back()->with(
            'success',
            'Buku berhasil dipinjam.'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | RIWAYAT PEMINJAMAN
    |--------------------------------------------------------------------------
    */
    public function riwayatpeminjaman()
    {
        $idPeminjam = auth('peminjam')->id();

        $data = DetailPeminjaman::with([
                'buku',
                'peminjaman'
            ])
            ->whereHas(
                'peminjaman',
                function ($q) use ($idPeminjam) {
                    $q->where(
                        'idpeminjam',
                        $idPeminjam
                    );
                }
            )
            ->latest()
            ->get();

        return view(
            'zonapeminjam.transaksi.riwayatpeminjam',
            compact('data')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | DETAIL PEMINJAMAN
    |--------------------------------------------------------------------------
    */
    public function detailpeminjaman($id)
    {
        $data = DetailPeminjaman::with([
                'buku',
                'peminjaman',
                'peminjaman.peminjam'
            ])
            ->findOrFail($id);

        return view(
            'zonapeminjam.transaksi.detailpeminjaman',
            compact('data')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | RIWAYAT PENGEMBALIAN
    |--------------------------------------------------------------------------
    */
    public function riwayatpengembalian()
    {
        $idPeminjam = auth('peminjam')->id();

        $data = DetailPeminjaman::with([
                'buku',
                'peminjaman'
            ])
            ->whereHas(
                'peminjaman',
                function ($q) use ($idPeminjam) {
                    $q->where(
                        'idpeminjam',
                        $idPeminjam
                    );
                }
            )
            ->where(
                'keterangan',
                'sudahkembali'
            )
            ->latest()
            ->get();

        return view(
            'zonapeminjam.transaksi.riwayatpengembalian',
            compact('data')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | DENDA SAYA
    |--------------------------------------------------------------------------
    */
    public function dendasaya()
    {
        $idPeminjam = auth('peminjam')->id();

        $data = DetailPeminjaman::with([
                'buku',
                'peminjaman'
            ])
            ->whereHas(
                'peminjaman',
                function ($q) use ($idPeminjam) {
                    $q->where(
                        'idpeminjam',
                        $idPeminjam
                    );
                }
            )
            ->where('denda', '>', 0)
            ->latest()
            ->get();

        return view(
            'zonapeminjam.transaksi.dendasaya',
            compact('data')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | SURAT BEBAS PUSTAKA
    |--------------------------------------------------------------------------
    */
    public function suratbebaspustaka()
    {
        $idPeminjam = auth('peminjam')->id();

        $totalDenda = DetailPeminjaman::whereHas(
            'peminjaman',
            function ($q) use ($idPeminjam) {
                $q->where(
                    'idpeminjam',
                    $idPeminjam
                );
            }
        )->sum('denda');

        $belumKembali = DetailPeminjaman::whereHas(
            'peminjaman',
            function ($q) use ($idPeminjam) {
                $q->where(
                    'idpeminjam',
                    $idPeminjam
                );
            }
        )
        ->where(
            'keterangan',
            'belumkembali'
        )
        ->count();

        return view(
            'zonapeminjam.transaksi.suratbebaspustaka',
            compact(
                'totalDenda',
                'belumKembali'
            )
        );
    }
}