<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControllerAuthUser extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | FORM LOGIN
    |--------------------------------------------------------------------------
    */

    public function login()
    {
        return view('auth.loginuser');
    }

    /*
    |--------------------------------------------------------------------------
    | PROSES LOGIN
    |--------------------------------------------------------------------------
    */

    public function proseslogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credential = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($credential)) {

            $request->session()->regenerate();

            /*
            |--------------------------------------------------------------------------
            | ROLE ADMIN
            |--------------------------------------------------------------------------
            */

            if (Auth::user()->role == 'admin') {

                return redirect('/dashboardadmin')
                    ->with('success', 'Login admin berhasil');
            }

            /*
            |--------------------------------------------------------------------------
            | ROLE PETUGAS
            |--------------------------------------------------------------------------
            */

            if (Auth::user()->role == 'petugas') {

                return redirect('/dashboardpetugas')
                    ->with('success', 'Login petugas berhasil');
            }
        }

        return back()
            ->with('error', 'Username atau password salah');
    }

    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */

   public function logout()
{
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/loginuser');
}
}