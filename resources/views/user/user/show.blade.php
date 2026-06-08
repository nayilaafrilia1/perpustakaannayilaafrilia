@extends('layouts.appuser')

@section('title', 'Detail User')

@section('content')

<div class="container-fluid">

    <div class="card card-info card-outline">

        <div class="card-header">
            <h3 class="card-title">Detail User</h3>
        </div>

        <div class="card-body">

            @if($user->foto)
                <img src="{{ asset('storage/'.$user->foto) }}"
                     width="100"
                     class="img-circle mb-3">
            @endif

            <p><b>Nama:</b> {{ $user->namauser }}</p>
            <p><b>Username:</b> {{ $user->username }}</p>
            <p><b>Role:</b> {{ $user->role }}</p>
            <p><b>Status:</b> {{ $user->status }}</p>
            <p><b>Disetujui:</b> {{ $user->setujui ?? '-' }}</p>

        </div>

        <div class="card-footer text-right">
            <a href="{{ route('user.index') }}" class="btn btn-secondary btn-sm">
                Kembali
            </a>
        </div>

    </div>

</div>

@endsection