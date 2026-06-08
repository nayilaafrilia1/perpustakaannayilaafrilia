@extends('layouts.appuser')

@section('title', 'Data User')

@section('content')

<div class="container-fluid">

    <div class="card card-primary card-outline">

        <div class="card-header">
            <h3 class="card-title">Data User</h3>

            <div class="card-tools">
                <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i>
                </a>
            </div>
        </div>

        <div class="card-body">

            <table class="table table-bordered table-striped text-sm">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th width="160">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($users as $i => $u)
                    <tr>

                        <td>{{ $i + 1 }}</td>

                        <td>
                            <img src="{{ asset('storage/'.$u->foto) }}"
                                 width="35"
                                 class="img-circle">
                        </td>

                        <td>{{ $u->namauser }}</td>
                        <td>{{ $u->username }}</td>

                        <td>
                            <span class="badge badge-info">
                                {{ $u->role }}
                            </span>
                        </td>

                        <td>
                            @if($u->status == 'setujui')
                                <span class="badge badge-success">✔</span>
                            @elseif($u->status == 'pending')
                                <span class="badge badge-warning">⏳</span>
                            @else
                                <span class="badge badge-danger">✖</span>
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

                                    <input type="hidden" name="status" value="setujui">

                                    <button type="button"
                                            class="btn btn-success btn-xs btn-approve">
                                        <i class="fas fa-check"></i>
                                    </button>
                                </form>

                                <form action="{{ route('user.update', $u->id) }}"
                                      method="POST"
                                      class="d-inline reject-form">
                                    @csrf
                                    @method('PUT')

                                    <input type="hidden" name="status" value="tolak">

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
                    @endforeach
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
    btn.addEventListener('click', function () {

        let form = this.closest('form');

        Swal.fire({
            title: 'Setujui user ini?',
            text: "User akan diaktifkan",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Setujui'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });

    });
});

document.querySelectorAll('.btn-reject').forEach(btn => {
    btn.addEventListener('click', function () {

        let form = this.closest('form');

        Swal.fire({
            title: 'Tolak user ini?',
            text: "User tidak akan bisa login",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#343a40',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Tolak'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });

    });
});

document.querySelectorAll('.btn-delete').forEach(btn => {
    btn.addEventListener('click', function () {

        let form = this.closest('form');

        Swal.fire({
            title: 'Hapus user?',
            text: "Data tidak bisa dikembalikan!",
            icon: 'error',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Hapus'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });

    });
});
</script>
@endpush