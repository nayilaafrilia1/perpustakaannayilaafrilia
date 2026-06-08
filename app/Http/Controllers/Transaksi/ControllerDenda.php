<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\DetailPeminjaman;

class ControllerDenda extends Controller
{
    /**
     * LIST DATA DENDA
     */
    public function index()
    {
        $dendas = DetailPeminjaman::with([
            'buku',
            'peminjaman',
            'peminjaman.peminjam'
        ])
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
        $denda = DetailPeminjaman::with([
            'buku',
            'peminjaman',
            'peminjaman.peminjam'
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
        $denda = DetailPeminjaman::with([
            'buku',
            'peminjaman',
            'peminjaman.peminjam'
        ])->findOrFail($id);

        return view(
            'user.denda.edit',
            compact('denda')
        );
    }

    /**
     * PROSES PEMBAYARAN DENDA
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'dibayar' => 'required|numeric|min:0'
        ]);

        $detail = DetailPeminjaman::with([
            'peminjaman'
        ])->findOrFail($id);

        $totalDenda = $detail->denda;

        $dibayar = $request->dibayar;

        if ($dibayar < $totalDenda) {

            return back()
                ->withErrors([
                    'dibayar' => 'Uang pembayaran kurang dari total denda.'
                ])
                ->withInput();
        }

        $kembalian = $dibayar - $totalDenda;

        $detail->peminjaman->update([

            'totaldenda'  => $totalDenda,

            'dibayar'     => $dibayar,

            'kembalian'   => $kembalian,

            'tunggakan'   => 0,

            'statusbayar' => 'sudahbayar',

            'tanggalbayar' => now(),

        ]);

        return redirect()
            ->route('denda.index')
            ->with(
                'success',
                'Pembayaran denda berhasil disimpan.'
            );
    }

    /**
     * TIDAK DIGUNAKAN
     */
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