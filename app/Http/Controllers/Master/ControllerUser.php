<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class ControllerUser extends Controller
{
    /**
     * INDEX
     */
    public function index()
    {
        $users = User::latest()->get();
        return view('user.user.index', compact('users'));
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
            'username'  => 'required|unique:user,username',
            'password'  => 'required',
            'role'      => 'required',
            'foto'      => 'nullable|image|mimes:jpg,png,jpeg'
        ]);

        $fotoPath = null;

        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('user', 'public');
        }

        User::create([
            'namauser' => $request->namauser,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
            'status'   => 'pending',
            'foto'     => $fotoPath
        ]);

        return redirect()->route('user.index')
            ->with('success', 'User berhasil ditambahkan');
    }

    /**
     * SHOW
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('user.user.show', compact('user'));
    }

    /**
     * EDIT
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.user.edit', compact('user'));
    }

    /**
     * UPDATE
     */
    public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    $data = [
        'namauser' => $request->namauser ?? $user->namauser,
        'username' => $request->username ?? $user->username,
        'role' => $request->role ?? $user->role,
    ];

    // 🔥 STATUS UPDATE (approve / reject)
    if ($request->status) {
        $data['status'] = $request->status;

        if ($request->status == 'setujui') {
            $data['setujui'] = now();
        }
    }

    $user->update($data);

    return redirect()->route('user.index')
        ->with('success', 'User berhasil diupdate');
}

    /**
     * DELETE
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->foto) {
            Storage::disk('public')->delete($user->foto);
        }

        $user->delete();

        return redirect()->route('user.index')
            ->with('success', 'User berhasil dihapus');
    }
}