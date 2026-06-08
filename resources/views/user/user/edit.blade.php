@extends('layouts.appuser')

@section('title', 'Edit User')

@section('content')

<div class="container-fluid">

    <div class="card card-warning card-outline">

        <div class="card-header">
            <h3 class="card-title">Edit User</h3>
        </div>

        <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="card-body">

                <div class="form-group">
                    <label>Nama User</label>
                    <input type="text" name="namauser" class="form-control" value="{{ $user->namauser }}">
                </div>

                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" value="{{ $user->username }}">
                </div>

                <div class="form-group">
                    <label>Password (kosongkan jika tidak diganti)</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <div class="form-group">
                    <label>Role</label>
                    <select name="role" class="form-control">
                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="petugas" {{ $user->role == 'petugas' ? 'selected' : '' }}>Petugas</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="pending" {{ $user->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="setujui" {{ $user->status == 'setujui' ? 'selected' : '' }}>Setujui</option>
                        <option value="tolak" {{ $user->status == 'tolak' ? 'selected' : '' }}>Tolak</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" name="foto" class="form-control">
                </div>

                @if($user->foto)
                    <img src="{{ asset('storage/'.$user->foto) }}" width="80">
                @endif

            </div>

            <div class="card-footer text-right">
                <a href="{{ route('user.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
                <button class="btn btn-success btn-sm">Update</button>
            </div>

        </form>

    </div>

</div>

@endsection