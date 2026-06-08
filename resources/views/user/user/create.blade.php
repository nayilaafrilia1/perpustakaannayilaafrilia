@extends('layouts.appuser')

@section('title', 'Tambah User')

@section('content')

<div class="container-fluid">

    <div class="card card-success card-outline">

        <div class="card-header">
            <h3 class="card-title">Tambah User</h3>
        </div>

        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="card-body">

                <div class="form-group">
                    <label>Nama User</label>
                    <input type="text" name="namauser" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Role</label>
                    <select name="role" class="form-control">
                        <option value="admin">Admin</option>
                        <option value="petugas">Petugas</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" name="foto" class="form-control">
                </div>

            </div>

            <div class="card-footer text-right">
                <a href="{{ route('user.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
                <button class="btn btn-success btn-sm">Simpan</button>
            </div>

        </form>

    </div>

</div>

@endsection