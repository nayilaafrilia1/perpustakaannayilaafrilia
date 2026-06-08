<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\DetailPeminjaman;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ControllerPengembalian extends Controller
{
    /**
     * LIST PENGEMBALIAN
     */
    public function index()
    {
        $data = DetailPeminjaman::with(['buku','peminjaman.peminjam'])
            ->latest()
            ->get()
            ->groupBy(fn($item) => $item->peminjaman->idpeminjam);

        return view('user.pengembalian.index', compact('data'));
    }

    /**
     * DETAIL
     */
    public function show($id)
    {
        $data = DetailPeminjaman::with(['buku','peminjaman.peminjam'])
            ->findOrFail($id);

        return view('user.pengembalian.show', compact('data'));
    }

    /**
     * FORM PENGEMBALIAN
     */
    public function edit($id)
    {
        $data = DetailPeminjaman::with(['buku','peminjaman.peminjam'])
            ->findOrFail($id);

        return view('user.pengembalian.edit', compact('data'));
    }

    /**
     * PROSES PENGEMBALIAN (CORE SYSTEM)
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggalkembalikan' => 'required|date',
        ]);

        DB::beginTransaction();

        try {

            $detail = DetailPeminjaman::with(['buku','peminjaman'])
                ->findOrFail($id);

            if ($detail->keterangan === 'sudahkembali') {
                return back()->with('error', 'Buku sudah dikembalikan');
            }

            $batas = Carbon::parse($detail->tanggalkembali);
            $kembali = Carbon::parse($request->tanggalkembalikan);

            $hariTelat = 0;
            $denda = 0;
            $status = 'tidakterlambat';

            // =========================
            // HITUNG DENDA
            // =========================
            if ($kembali->gt($batas)) {

                $hariTelat = $batas->diffInDays($kembali);
                $denda = $hariTelat * 5000;
                $status = 'terlambat';
            }

            // =========================
            // UPDATE DETAIL PEMINJAMAN
            // =========================
            $detail->update([
                'tanggalkembalikan' => $kembali,
                'jumlahharitelat' => $hariTelat,
                'status' => $status,
                'denda' => $denda,
                'keterangan' => 'sudahkembali',
            ]);

            // =========================
            // UPDATE PEMINJAMAN
            // =========================
            $peminjaman = $detail->peminjaman;

            $peminjaman->update([
                'totaldenda' => $peminjaman->totaldenda + $denda,
                'tunggakan' => ($peminjaman->totaldenda + $denda) - $peminjaman->dibayar,
            ]);

            // =========================
            // KEMBALIKAN STOK BUKU
            // =========================
            $detail->buku->increment('stok');

            DB::commit();

            return redirect()
                ->route('pengembalian.index')
                ->with('success','Pengembalian berhasil diproses');

        } catch (\Exception $e) {

            DB::rollBack();

            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * BAYAR DENDA (KASIR MODE)
     */
    public function bayarDenda(Request $request)
    {
        $request->validate([
            'peminjaman_id' => 'required|exists:peminjaman,id',
            'uang_bayar' => 'required|numeric|min:0'
        ]);

        $peminjaman = \App\Models\Peminjaman::findOrFail($request->peminjaman_id);

        if ($peminjaman->totaldenda <= 0) {
            return back()->with('error','Tidak ada denda');
        }

        if ($request->uang_bayar < $peminjaman->totaldenda) {
            return back()->with('error','Uang kurang');
        }

        $peminjaman->update([
            'dibayar' => $peminjaman->dibayar + $request->uang_bayar,
            'tunggakan' => 0,
            'tanggalbayar' => now()
        ]);

        return back()->with('success','Pembayaran berhasil');
    }
}