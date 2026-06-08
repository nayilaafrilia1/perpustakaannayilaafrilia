<?php

namespace App\Http\Controllers\ZonaPeminjam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Peminjaman;
use App\Models\DetailPeminjaman;
use App\Models\Buku;
use Carbon\Carbon;

class ControllerZonaPeminjam extends Controller
{
    /**
     * DASHBOARD PEMINJAM
     */
    public function index()
    {
        $id = auth('peminjam')->id();

        $totalPinjam = Peminjaman::where('idpeminjam', $id)->count();

        $totalKembali = DetailPeminjaman::whereHas('peminjaman', function ($q) use ($id) {
            $q->where('idpeminjam', $id);
        })->where('keterangan', 'sudahkembali')->count();

        $totalDenda = DetailPeminjaman::whereHas('peminjaman', function ($q) use ($id) {
            $q->where('idpeminjam', $id);
        })->sum('denda');

        $riwayat = DetailPeminjaman::with(['buku'])
            ->whereHas('peminjaman', function ($q) use ($id) {
                $q->where('idpeminjam', $id);
            })
            ->latest()
            ->take(10)
            ->get();

        return view('zonapeminjam.dashboard.dashboardpeminjam', compact(
            'totalPinjam',
            'totalKembali',
            'totalDenda',
            'riwayat'
        ));
    }

    /**
     * KATALOG
     */
    public function katalog()
    {
        $bukus = Buku::with('kategori')
            ->where('stok', '>', 0)
            ->latest()
            ->get();

        return view('zonapeminjam.katalog.index', compact('bukus'));
    }

    /**
     * DETAIL BUKU
     */
   public function pinjambuku($id)
{
    $peminjamId = auth('peminjam')->id();
    $userId = auth()->id() ?? 1;

    $buku = Buku::findOrFail($id);

    if ($buku->stok <= 0) {
        return back()->with('error', 'Stok buku habis');
    }

    DB::transaction(function () use ($buku, $peminjamId, $userId) {

        // HEADER PEMINJAMAN
        $peminjaman = Peminjaman::create([
            'idpeminjam' => $peminjamId,
            'iduser'     => $userId,
        ]);

        // DETAIL PEMINJAMAN (WAJIB SESUAI DB KAMU)
        DetailPeminjaman::create([
            'idpeminjaman'      => $peminjaman->id,
            'idbuku'            => $buku->id,
            'iddenda'           => null,

            // 🔥 WAJIB FIELD DARI DATABASE KAMU
            'tanggalpinjam'     => Carbon::now(),
            'tanggalkembali'    => Carbon::now()->addDays(5),

            'durasipeminjaman'  => 5,
            'jumlahharitelat'   => 0,
            'status'            => 'tidakterlambat',
            'keterangan'        => 'belumkembali',
            'denda'             => 0,
        ]);

        // KURANGI STOK
        $buku->decrement('stok');
    });

    return back()->with('success', 'Buku berhasil dipinjam');
}
    /**
     * RIWAYAT PEMINJAMAN
     */
    public function riwayatpeminjaman()
    {
        $id = auth('peminjam')->id();

        $data = DetailPeminjaman::with(['buku', 'peminjaman'])
            ->whereHas('peminjaman', function ($q) use ($id) {
                $q->where('idpeminjam', $id);
            })
            ->latest()
            ->get();

        return view('zonapeminjam.transaksi.riwayatpeminjam', compact('data'));
    }

    /**
     * RIWAYAT PENGEMBALIAN
     */
    public function riwayatpengembalian()
    {
        $id = auth('peminjam')->id();

        $data = DetailPeminjaman::with(['buku', 'peminjaman'])
            ->whereHas('peminjaman', function ($q) use ($id) {
                $q->where('idpeminjam', $id);
            })
            ->where('keterangan', 'sudahkembali')
            ->latest()
            ->get();

        return view('zonapeminjam.transaksi.riwayatpengembalian', compact('data'));
    }

    /**
     * DETAIL PEMINJAMAN
     */
    public function detailpeminjaman($id)
    {
        $data = DetailPeminjaman::with(['buku', 'peminjaman.peminjam'])
            ->findOrFail($id);

        return view('zonapeminjam.transaksi.detailpeminjaman', compact('data'));
    }

    /**
     * DENDA
     */
    public function dendasaya()
    {
        $id = auth('peminjam')->id();

        $data = DetailPeminjaman::with(['buku', 'peminjaman'])
            ->whereHas('peminjaman', function ($q) use ($id) {
                $q->where('idpeminjam', $id);
            })
            ->where('denda', '>', 0)
            ->latest()
            ->get();

        return view('zonapeminjam.transaksi.dendasaya', compact('data'));
    }

    /**
     * SURAT BEBAS PUSTAKA
     */
    public function suratbebaspustaka()
    {
        $id = auth('peminjam')->id();

        $totalDenda = DetailPeminjaman::whereHas('peminjaman', function ($q) use ($id) {
            $q->where('idpeminjam', $id);
        })->sum('denda');

        $belumKembali = DetailPeminjaman::whereHas('peminjaman', function ($q) use ($id) {
            $q->where('idpeminjam', $id);
        })->where('keterangan', 'belumkembali')->count();

        return view('zonapeminjam.transaksi.suratbebaspustaka', compact(
            'totalDenda',
            'belumKembali'
        ));
    }
}