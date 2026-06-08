@extends('layouts.appuser')

@section('title', 'Edit User')

@section('content')

<div class="container-fluid">

    <div class="card card-warning card-outline shadow">

        <div class="card-header">

            <h3 class="card-title">
                <i class="fas fa-user-edit mr-1"></i>
                Edit Data User
            </h3>

        </div>

        <form action="{{ route('user.update', $user->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="card-body">

                <div class="row">

                    {{-- FOTO --}}
                    <div class="col-md-3 text-center">

                        @if(!empty($user->foto))

                            <img src="{{ asset('fotoupload/user/'.$user->foto) }}"
                                 class="img-circle elevation-3 mb-3"
                                 width="150"
                                 height="150"
                                 style="object-fit:cover;">

                        @else

                            <img src="{{ asset('dist/img/avatar5.png') }}"
                                 class="img-circle elevation-3 mb-3"
                                 width="150"
                                 height="150">

                        @endif

                        <div class="form-group">

                            <label class="font-weight-bold">
                                Ganti Foto
                            </label>

                            <input type="file"
                                   name="foto"
                                   class="form-control">

                        </div>

                    </div>

                    {{-- DATA USER --}}
                    <div class="col-md-9">

                        <div class="form-group">

                            <label>Nama User</label>

                            <input type="text"
                                   name="namauser"
                                   class="form-control"
                                   value="{{ old('namauser', $user->namauser) }}"
                                   required>

                        </div>

                        <div class="form-group">

                            <label>Username</label>

                            <input type="text"
                                   name="username"
                                   class="form-control"
                                   value="{{ old('username', $user->username) }}"
                                   required>

                        </div>

                        <div class="form-group">

                            <label>Password Baru</label>

                            <input type="password"
                                   name="password"
                                   class="form-control">

                            <small class="text-muted">
                                Kosongkan jika tidak ingin mengganti password
                            </small>

                        </div>

                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group">

                                    <label>Role</label>

                                    <select name="role"
                                            class="form-control">

                                        <option value="admin"
                                            {{ $user->role == 'admin' ? 'selected' : '' }}>
                                            Admin
                                        </option>

                                        <option value="petugas"
                                            {{ $user->role == 'petugas' ? 'selected' : '' }}>
                                            Petugas
                                        </option>

                                    </select>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group">

                                    <label>Status</label>

                                    <select name="status"
                                            class="form-control">

                                        <option value="pending"
                                            {{ $user->status == 'pending' ? 'selected' : '' }}>
                                            Pending
                                        </option>

                                        <option value="setujui"
                                            {{ $user->status == 'setujui' ? 'selected' : '' }}>
                                            Setujui
                                        </option>

                                        <option value="tolak"
                                            {{ $user->status == 'tolak' ? 'selected' : '' }}>
                                            Tolak
                                        </option>

                                    </select>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="card-footer text-right">

                <a href="{{ route('user.index') }}"
                   class="btn btn-secondary">

                    <i class="fas fa-arrow-left"></i>
                    Kembali

                </a>

                <button type="submit"
                        class="btn btn-success">

                    <i class="fas fa-save"></i>
                    Update User

                </button>

            </div>

        </form>

    </div>

</div>

@endsection