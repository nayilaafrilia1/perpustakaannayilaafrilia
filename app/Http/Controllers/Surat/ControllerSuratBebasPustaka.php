<?php

namespace App\Http\Controllers\Surat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SuratBebasPerpus;
use App\Models\Peminjam;
use Carbon\Carbon;

class ControllerSuratBebasPustaka extends Controller
{
    /**
     * LIST SURAT
     */
    public function index()
    {
        $surat = SuratBebasPerpus::with('peminjam')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('user.surat.index', compact('surat'));
    }

    /**
     * FORM CREATE SURAT
     */
    public function create()
    {
        $peminjam = Peminjam::all();
        return view('user.surat.create', compact('peminjam'));
    }

    /**
     * STORE SURAT
     */
    public function store(Request $request)
    {
        $request->validate([
            'idpeminjam' => 'required',
        ]);

        SuratBebasPerpus::create([
            'idpeminjam' => $request->idpeminjam,
            'nomor_surat' => 'SBP-' . date('YmdHis'),
            'tanggal_cetak' => Carbon::now(),
            'status' => 'valid',
        ]);

        return redirect()->route('surat.index')
            ->with('success', 'Surat berhasil dibuat');
    }

    /**
     * CETAK SURAT
     */
    public function show($id)
    {
        $surat = SuratBebasPerpus::with('peminjam')->findOrFail($id);

        return view('user.surat.cetak', compact('surat'));
    }

    /**
     * DELETE
     */
    public function destroy($id)
    {
        SuratBebasPerpus::destroy($id);

        return back()->with('success', 'Surat dihapus');
    }
}