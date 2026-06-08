<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Peminjaman;

class ControllerDenda extends Controller
{
    /**
     * LIST DATA DENDA
     */
    public function index()
    {
        $dendas = Peminjaman::with([
            'peminjam',
            'detailPeminjaman.buku'
        ])
        ->whereHas('detailPeminjaman', function ($q) {
            $q->where('denda', '>', 0);
        })
        ->latest()
        ->get();

        return view(
            'user.denda.index',
            compact('dendas')
        );
    }

    /**
     * DETAIL DENDA
     */
    public function show(string $id)
    {
        $denda = Peminjaman::with([
            'peminjam',
            'detailPeminjaman.buku'
        ])->findOrFail($id);

        return view(
            'user.denda.show',
            compact('denda')
        );
    }

    /**
     * FORM PEMBAYARAN
     */
    public function edit(string $id)
    {
        $denda = Peminjaman::with([
            'peminjam',
            'detailPeminjaman.buku'
        ])->findOrFail($id);

        return view(
            'user.denda.edit',
            compact('denda')
        );
    }

    /**
     * PROSES PEMBAYARAN
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'dibayar' => 'required|numeric|min:0'
        ]);

        $peminjaman = Peminjaman::with(
            'detailPeminjaman'
        )->findOrFail($id);

        $totalDenda = $peminjaman
            ->detailPeminjaman
            ->sum('denda');

        $dibayar = $request->dibayar;

        if ($dibayar < $totalDenda) {

            return back()
                ->withErrors([
                    'dibayar' => 'Uang pembayaran kurang dari total denda.'
                ])
                ->withInput();
        }

        $kembalian = $dibayar - $totalDenda;

        $peminjaman->update([

            'totaldenda'   => $totalDenda,
            'dibayar'      => $dibayar,
            'kembalian'    => $kembalian,
            'tunggakan'    => 0,
            'statusbayar'  => 'sudahbayar',
            'tanggalbayar' => now(),

        ]);

        return redirect()
            ->route('denda.index')
            ->with(
                'success',
                'Pembayaran denda berhasil disimpan.'
            );
    }

    public function create()
    {
        abort(404);
    }

    public function store(Request $request)
    {
        abort(404);
    }

    public function destroy(string $id)
    {
        abort(404);
    }
}