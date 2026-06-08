<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Peminjam;

class ControllerAuthPeminjam extends Controller
{
    /*
    |----------------------------------------------------------
    | FORM LOGIN
    |----------------------------------------------------------
    */
    public function login()
    {
        return view('auth.loginpeminjam');
    }

    /*
    |----------------------------------------------------------
    | PROSES LOGIN
    |----------------------------------------------------------
    */
    public function proseslogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = Peminjam::where('username', $request->username)->first();

        // ❌ user tidak ditemukan
        if (!$user) {
            return back()->with('error', 'Username tidak ditemukan');
        }

        // ❌ cek status akun
        if ($user->status === 'pending') {
            return back()->with('error', 'Akun masih menunggu persetujuan admin');
        }

        if ($user->status === 'rejected') {
            return back()->with('error', 'Akun Anda ditolak oleh admin');
        }

        // ❌ cek password manual (karena pakai custom model)
        if (!Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Password salah');
        }

        Auth::guard('peminjam')->login($user);
        $request->session()->regenerate();

        return redirect('/dashboardpeminjam')
            ->with('success', 'Login berhasil');
    }

    /*
    |----------------------------------------------------------
    | FORM REGISTER
    |----------------------------------------------------------
    */
    public function register()
    {
        return view('auth.registerpeminjam');
    }

    /*
    |----------------------------------------------------------
    | PROSES REGISTER
    |----------------------------------------------------------
    */
    public function prosesregister(Request $request)
    {
        $request->validate([
            'namapeminjam' => 'required',
            'username'     => 'required|unique:peminjam,username',
            'password'     => 'required|min:6',
        ]);

        Peminjam::create([
            'namapeminjam'   => $request->namapeminjam,
            'username'       => $request->username,
            'password'       => Hash::make($request->password),

            'jenis_peminjam' => $request->jenis_peminjam,
            'alamat'         => $request->alamat,
            'kelas'          => $request->kelas,
            'nomorhp'        => $request->nomorhp,

            // 🔥 penting: default pending
            'status'         => 'pending',
        ]);

        return redirect('/loginpeminjam')
            ->with('success', 'Registrasi berhasil, menunggu persetujuan admin');
    }

    /*
    |----------------------------------------------------------
    | LOGOUT
    |----------------------------------------------------------
    */
    public function logout(Request $request)
    {
        Auth::guard('peminjam')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/loginpeminjam')
            ->with('success', 'Logout berhasil');
    }
}