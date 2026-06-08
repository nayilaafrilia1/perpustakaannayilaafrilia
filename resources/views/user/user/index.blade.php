@extends('layouts.appuser')

@section('title', 'Data User')

@section('content')

<div class="container-fluid">

    <div class="card card-primary card-outline shadow">

        <div class="card-header">

            <h3 class="card-title">
                <i class="fas fa-users mr-1"></i>
                Data User
            </h3>

            <div class="card-tools">

                <a href="{{ route('user.create') }}"
                   class="btn btn-primary btn-sm">

                    <i class="fas fa-plus"></i>
                    Tambah User

                </a>

            </div>

        </div>

        <div class="card-body table-responsive">

            <table class="table table-bordered table-hover table-striped">

                <thead class="text-center">

                    <tr>

                        <th width="60">No</th>
                        <th width="90">Foto</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th width="100">Role</th>
                        <th width="100">Status</th>
                        <th width="220">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($users as $i => $u)

                    <tr>

                        <td class="text-center">
                            {{ $i + 1 }}
                        </td>

                        <td class="text-center">

                            @if(!empty($u->foto))

                                <img src="{{ asset('fotoupload/user/'.$u->foto) }}"
                                     width="45"
                                     height="45"
                                     class="img-circle elevation-2"
                                     style="object-fit:cover;">

                            @else

                                <img src="{{ asset('dist/img/avatar5.png') }}"
                                     width="45"
                                     height="45"
                                     class="img-circle elevation-2">

                            @endif

                        </td>

                        <td>
                            {{ $u->namauser }}
                        </td>

                        <td>
                            {{ $u->username }}
                        </td>

                        <td class="text-center">

                            @if($u->role == 'admin')

                                <span class="badge badge-info">
                                    Admin
                                </span>

                            @else

                                <span class="badge badge-success">
                                    Petugas
                                </span>

                            @endif

                        </td>

                        <td class="text-center">

                            @if($u->status == 'setujui')

                                <span class="badge badge-success">
                                    Aktif
                                </span>

                            @elseif($u->status == 'pending')

                                <span class="badge badge-warning">
                                    Pending
                                </span>

                            @else

                                <span class="badge badge-danger">
                                    Ditolak
                                </span>

                            @endif

                        </td>

                        <td class="text-center">

                            {{-- DETAIL --}}
                            <a href="{{ route('user.show', $u->id) }}"
                               class="btn btn-info btn-xs">

                                <i class="fas fa-eye"></i>

                            </a>

                            {{-- EDIT --}}
                            <a href="{{ route('user.edit', $u->id) }}"
                               class="btn btn-warning btn-xs">

                                <i class="fas fa-edit"></i>

                            </a>

                            {{-- APPROVE --}}
                            @if($u->status == 'pending')

                            <form action="{{ route('user.update', $u->id) }}"
                                  method="POST"
                                  class="d-inline approve-form">

                                @csrf
                                @method('PUT')

                                <input type="hidden"
                                       name="status"
                                       value="setujui">

                                <button type="button"
                                        class="btn btn-success btn-xs btn-approve">

                                    <i class="fas fa-check"></i>

                                </button>

                            </form>

                            {{-- REJECT --}}
                            <form action="{{ route('user.update', $u->id) }}"
                                  method="POST"
                                  class="d-inline reject-form">

                                @csrf
                                @method('PUT')

                                <input type="hidden"
                                       name="status"
                                       value="tolak">

                                <button type="button"
                                        class="btn btn-dark btn-xs btn-reject">

                                    <i class="fas fa-times"></i>

                                </button>

                            </form>

                            @endif

                            {{-- DELETE --}}
                            <form action="{{ route('user.destroy', $u->id) }}"
                                  method="POST"
                                  class="d-inline delete-form">

                                @csrf
                                @method('DELETE')

                                <button type="button"
                                        class="btn btn-danger btn-xs btn-delete">

                                    <i class="fas fa-trash"></i>

                                </button>

                            </form>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="7"
                            class="text-center text-muted">

                            Tidak ada data user

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection

@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

document.querySelectorAll('.btn-approve').forEach(btn => {

    btn.addEventListener('click', function(){

        let form = this.closest('form');

        Swal.fire({
            title: 'Setujui User?',
            text: 'User akan diaktifkan',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal'
        }).then((result) => {

            if(result.isConfirmed){
                form.submit();
            }

        });

    });

});

document.querySelectorAll('.btn-reject').forEach(btn => {

    btn.addEventListener('click', function(){

        let form = this.closest('form');

        Swal.fire({
            title: 'Tolak User?',
            text: 'User tidak dapat login',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal'
        }).then((result) => {

            if(result.isConfirmed){
                form.submit();
            }

        });

    });

});

document.querySelectorAll('.btn-delete').forEach(btn => {

    btn.addEventListener('click', function(){

        let form = this.closest('form');

        Swal.fire({
            title: 'Hapus Data?',
            text: 'Data tidak bisa dikembalikan',
            icon: 'error',
            showCancelButton: true,
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {

            if(result.isConfirmed){
                form.submit();
            }

        });

    });

});

</script>

@endpush