<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Peminjam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ControllerPeminjam extends Controller
{
    public function index()
    {
        $peminjams = Peminjam::latest()->get();
        return view('user.peminjam.index', compact('peminjams'));
    }

    public function create()
    {
        return view('user.peminjam.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'namapeminjam' => 'required',
            'username' => 'required|unique:peminjam,username',
            'password' => 'required|min:6',
        ]);

        $peminjam = new Peminjam();

        $peminjam->namapeminjam = $request->namapeminjam;
        $peminjam->username = $request->username;
        $peminjam->password = Hash::make($request->password);
        $peminjam->nomorhp = $request->nomorhp;
        $peminjam->alamat = $request->alamat;
        $peminjam->jenis_peminjam = $request->jenis_peminjam;
        $peminjam->kelas = $request->kelas;
        $peminjam->nisn = $request->nisn;
        $peminjam->tahun_akademik = $request->tahun_akademik;

        // 🔥 AUTO APPROVE
        $peminjam->status = 'setujui';

        // 🔥 UPLOAD FOTO (PUBLIC FOLDER)
        if ($request->hasFile('foto')) {

            $file = $request->file('foto');
            $namaFile = time().'_'.$file->getClientOriginalName();

            $file->move(public_path('fotoupload/peminjam'), $namaFile);

            $peminjam->foto = $namaFile;
        }

        $peminjam->save();

        return redirect()->route('peminjam.index')
            ->with('success', 'Data peminjam berhasil ditambahkan');
    }

    public function show($id)
    {
        $peminjam = Peminjam::findOrFail($id);
        return view('user.peminjam.show', compact('peminjam'));
    }

    public function edit($id)
    {
        $peminjam = Peminjam::findOrFail($id);
        return view('user.peminjam.edit', compact('peminjam'));
    }

    public function update(Request $request, $id)
    {
        $peminjam = Peminjam::findOrFail($id);

        $request->validate([
            'username' => 'required|unique:peminjam,username,' . $id,
        ]);

        $peminjam->namapeminjam = $request->namapeminjam;
        $peminjam->username = $request->username;
        $peminjam->nomorhp = $request->nomorhp;
        $peminjam->alamat = $request->alamat;
        $peminjam->jenis_peminjam = $request->jenis_peminjam;
        $peminjam->kelas = $request->kelas;
        $peminjam->nisn = $request->nisn;
        $peminjam->tahun_akademik = $request->tahun_akademik;

        if ($request->password) {
            $peminjam->password = Hash::make($request->password);
        }

        // 🔥 UPDATE FOTO (HAPUS LAMA + GANTI BARU)
        if ($request->hasFile('foto')) {

            if ($peminjam->foto && file_exists(public_path('fotoupload/peminjam/'.$peminjam->foto))) {
                unlink(public_path('fotoupload/peminjam/'.$peminjam->foto));
            }

            $file = $request->file('foto');
            $namaFile = time().'_'.$file->getClientOriginalName();

            $file->move(public_path('fotoupload/peminjam'), $namaFile);

            $peminjam->foto = $namaFile;
        }

        $peminjam->save();

        return redirect()->route('peminjam.index')
            ->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $peminjam = Peminjam::findOrFail($id);

        // 🔥 HAPUS FOTO
        if ($peminjam->foto && file_exists(public_path('fotoupload/peminjam/'.$peminjam->foto))) {
            unlink(public_path('fotoupload/peminjam/'.$peminjam->foto));
        }

        $peminjam->delete();

        return back()->with('success', 'Data berhasil dihapus');
    }

    public function setujui($id)
    {
        $peminjam = Peminjam::findOrFail($id);
        $peminjam->status = 'setujui';
        $peminjam->save();

        return back();
    }

    public function tolak($id)
    {
        $peminjam = Peminjam::findOrFail($id);
        $peminjam->status = 'tolak';
        $peminjam->save();

        return back();
    }

    public function pending($id)
    {
        $peminjam = Peminjam::findOrFail($id);
        $peminjam->status = 'pending';
        $peminjam->save();

        return back();
    }
    public function surat($id)
{
    $peminjam = Peminjam::findOrFail($id);

    return view(
        'master.peminjam.surat',
        compact('peminjam')
    );
}
}