<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ControllerUser extends Controller
{
    /**
     * INDEX
     */
    public function index()
    {
        $users = User::latest()->get();

        return view(
            'user.user.index',
            compact('users')
        );
    }

    /**
     * CREATE
     */
    public function create()
    {
        return view('user.user.create');
    }

    /**
     * STORE
     */
    public function store(Request $request)
    {
        $request->validate([

            'namauser' => 'required',

            'username' => 'required|unique:user,username',

            'password' => 'required|min:6',

            'role' => 'required',

            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'

        ]);

        $namaFoto = null;

        if ($request->hasFile('foto')) {

            $file = $request->file('foto');

            $namaFoto = time() . '_' . $file->getClientOriginalName();

            $file->move(
                public_path('fotoupload/user'),
                $namaFoto
            );
        }

        User::create([

            'namauser' => $request->namauser,

            'username' => $request->username,

            'password' => Hash::make(
                $request->password
            ),

            'role' => $request->role,

            'status' => 'pending',

            'foto' => $namaFoto

        ]);

        return redirect()
            ->route('user.index')
            ->with(
                'success',
                'User berhasil ditambahkan'
            );
    }

    /**
     * SHOW
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view(
            'user.user.show',
            compact('user')
        );
    }

    /**
     * EDIT
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view(
            'user.user.edit',
            compact('user')
        );
    }

    /**
     * UPDATE
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $data = [

            'namauser' => $request->namauser
                ?? $user->namauser,

            'username' => $request->username
                ?? $user->username,

            'role' => $request->role
                ?? $user->role,

        ];

        /*
        |--------------------------------------------------------------------------
        | STATUS
        |--------------------------------------------------------------------------
        */

        if ($request->filled('status')) {

            $data['status'] = $request->status;

            if ($request->status == 'setujui') {

                $data['setujui'] = now();
            }
        }

        /*
        |--------------------------------------------------------------------------
        | PASSWORD
        |--------------------------------------------------------------------------
        */

        if ($request->filled('password')) {

            $data['password'] = Hash::make(
                $request->password
            );
        }

        /*
        |--------------------------------------------------------------------------
        | FOTO
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('foto')) {

            if (
                $user->foto &&
                file_exists(
                    public_path(
                        'fotoupload/user/' . $user->foto
                    )
                )
            ) {
                unlink(
                    public_path(
                        'fotoupload/user/' . $user->foto
                    )
                );
            }

            $file = $request->file('foto');

            $namaFoto = time() . '_' .
                $file->getClientOriginalName();

            $file->move(
                public_path('fotoupload/user'),
                $namaFoto
            );

            $data['foto'] = $namaFoto;
        }

        $user->update($data);

        return redirect()
            ->route('user.index')
            ->with(
                'success',
                'User berhasil diupdate'
            );
    }

    /**
     * DELETE
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if (
            $user->foto &&
            file_exists(
                public_path(
                    'fotoupload/user/' . $user->foto
                )
            )
        ) {
            unlink(
                public_path(
                    'fotoupload/user/' . $user->foto
                )
            );
        }

        $user->delete();

        return redirect()
            ->route('user.index')
            ->with(
                'success',
                'User berhasil dihapus'
            );
    }
}