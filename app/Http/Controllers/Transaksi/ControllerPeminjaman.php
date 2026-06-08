<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\DetailPeminjaman;
use App\Models\Peminjam;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerPeminjaman extends Controller
{
    /**
     * =========================
     * INDEX
     * =========================
     */
    public function index()
    {
        $peminjaman = Peminjaman::with([
            'peminjam',
            'user',
            'detailPeminjaman.buku'
        ])->latest()->get();

        foreach ($peminjaman as $item) {

            // hitung total denda dari detail
            $item->totaldenda = $item->detailPeminjaman->sum('denda');

            // hitung tunggakan
            $item->tunggakan = $item->totaldenda - $item->dibayar;

            if ($item->tunggakan < 0) {
                $item->tunggakan = 0;
            }

            $item->detailBelumKembali = $item->detailPeminjaman
                ->where('keterangan', 'belumkembali')
                ->first();

            $item->jumlahBelumKembali = $item->detailPeminjaman
                ->where('keterangan', 'belumkembali')
                ->count();
        }

        return view('user.peminjaman.index', compact('peminjaman'));
    }

    /**
     * =========================
     * CREATE FORM
     * =========================
     */
    public function create()
    {
        return view('user.peminjaman.create', [
            'peminjams' => Peminjam::all(),
            'users' => User::all(),
            'bukus' => Buku::where('stok', '>', 0)->get(),
        ]);
    }

    /**
     * =========================
     * STORE
     * =========================
     */
    public function store(Request $request)
    {
        $request->validate([
            'idpeminjam' => 'required|exists:peminjam,id',
            'buku' => 'required|array|min:1',
        ]);

        DB::beginTransaction();

        try {

            $peminjaman = Peminjaman::create([
                'idpeminjam' => $request->idpeminjam,
                'iduser' => auth()->id() ?? 1,
                'totaldenda' => 0,
                'dibayar' => 0,
                'tunggakan' => 0,
                'tanggalbayar' => null,
            ]);

            foreach ($request->buku as $item) {

                $buku = Buku::findOrFail($item['idbuku']);

                if ($buku->stok <= 0) {
                    throw new \Exception("Stok buku {$buku->judul} habis.");
                }

                $tanggalPinjam = now();
                $durasi = 5;
                $jatuhTempo = now()->addDays($durasi);

                // denda awal 0 (akan dihitung saat pengembalian)
                DetailPeminjaman::create([
                    'idpeminjaman' => $peminjaman->id,
                    'idbuku' => $buku->id,
                    'iddenda' => null,
                    'tanggalpinjam' => $tanggalPinjam,
                    'durasipeminjaman' => $durasi,
                    'tanggalkembali' => $jatuhTempo,
                    'tanggalkembalikan' => null,
                    'jumlahharitelat' => 0,
                    'status' => 'tidakterlambat',
                    'keterangan' => 'belumkembali',
                    'denda' => 0,
                ]);

                $buku->decrement('stok');
            }

            DB::commit();

            return redirect()->route('peminjaman.index')
                ->with('success', 'Peminjaman berhasil dibuat');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * =========================
     * SHOW
     * =========================
     */
    public function show($id)
    {
        $peminjaman = Peminjaman::with([
            'peminjam',
            'user',
            'detailPeminjaman.buku'
        ])->findOrFail($id);

        $peminjaman->totaldenda = $peminjaman->detailPeminjaman->sum('denda');
        $peminjaman->tunggakan = $peminjaman->totaldenda - $peminjaman->dibayar;

        if ($peminjaman->tunggakan < 0) {
            $peminjaman->tunggakan = 0;
        }

        return view('user.peminjaman.show', compact('peminjaman'));
    }

    /**
     * =========================
     * EDIT
     * =========================
     */
    public function edit($id)
    {
        $peminjaman = Peminjaman::with('detailPeminjaman.buku')->findOrFail($id);

        return view('user.peminjaman.edit', [
            'peminjaman' => $peminjaman,
            'peminjams' => Peminjam::all(),
            'users' => User::all(),
            'bukus' => Buku::all(),
        ]);
    }

    /**
     * =========================
     * UPDATE
     * =========================
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'idpeminjam' => 'required|exists:peminjam,id',
            'buku' => 'required|array|min:1',
        ]);

        DB::beginTransaction();

        try {

            $peminjaman = Peminjaman::with('detailPeminjaman.buku')->findOrFail($id);

            // restore stok lama
            foreach ($peminjaman->detailPeminjaman as $detail) {
                if ($detail->buku) {
                    $detail->buku->increment('stok');
                }
            }

            DetailPeminjaman::where('idpeminjaman', $peminjaman->id)->delete();

            $peminjaman->update([
                'idpeminjam' => $request->idpeminjam,
            ]);

            foreach ($request->buku as $item) {

                $buku = Buku::findOrFail($item['idbuku']);

                if ($buku->stok <= 0) {
                    throw new \Exception("Stok buku {$buku->judul} habis.");
                }

                DetailPeminjaman::create([
                    'idpeminjaman' => $peminjaman->id,
                    'idbuku' => $buku->id,
                    'iddenda' => null,
                    'tanggalpinjam' => now(),
                    'durasipeminjaman' => 5,
                    'tanggalkembali' => now()->addDays(5),
                    'tanggalkembalikan' => null,
                    'jumlahharitelat' => 0,
                    'status' => 'tidakterlambat',
                    'keterangan' => 'belumkembali',
                    'denda' => 0,
                ]);

                $buku->decrement('stok');
            }

            DB::commit();

            return redirect()->route('peminjaman.index')
                ->with('success', 'Peminjaman berhasil diupdate');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * =========================
     * DELETE
     * =========================
     */
    public function destroy($id)
    {
        DB::beginTransaction();

        try {

            $peminjaman = Peminjaman::with('detailPeminjaman.buku')->findOrFail($id);

            foreach ($peminjaman->detailPeminjaman as $detail) {

                if ($detail->keterangan == 'sudahkembali') {
                    throw new \Exception('Tidak bisa hapus peminjaman yang sudah dikembalikan');
                }

                if ($detail->buku) {
                    $detail->buku->increment('stok');
                }
            }

            DetailPeminjaman::where('idpeminjaman', $peminjaman->id)->delete();
            $peminjaman->delete();

            DB::commit();

            return back()->with('success', 'Data berhasil dihapus');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * =========================
     * BAYAR DENDA (FIX KASIR)
     * =========================
     */
    public function bayarDenda(Request $request)
    {
        $request->validate([
            'peminjaman_id' => 'required|exists:peminjaman,id',
            'uang_bayar' => 'required|numeric|min:0'
        ]);

        $peminjaman = Peminjaman::findOrFail($request->peminjaman_id);

        $total = $peminjaman->totaldenda;
        $bayar = $request->uang_bayar;

        // AKUMULASI
        $peminjaman->dibayar += $bayar;

        $peminjaman->tunggakan = $total - $peminjaman->dibayar;

        if ($peminjaman->tunggakan < 0) {
            $peminjaman->tunggakan = 0;
        }

        $peminjaman->tanggalbayar = now();
        $peminjaman->save();

        $kembalian = $peminjaman->dibayar - $total;
        $kembalian = $kembalian > 0 ? $kembalian : 0;

        return back()->with(
            'success',
            "Pembayaran berhasil. Kembalian: Rp " . number_format($kembalian, 0, ',', '.')
        );
    }
}