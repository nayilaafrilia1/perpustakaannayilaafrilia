@extends('layouts.appuser')

@section('title', 'Data Peminjam')

@section('content')

<div class="container-fluid">

    <div class="card card-primary card-outline">

        <div class="card-header">

            <h3 class="card-title">
                <i class="fas fa-users"></i>
                Data Peminjam
            </h3>

            <div class="card-tools">
                <a href="{{ route('peminjam.create') }}"
                    class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i>
                </a>
            </div>

        </div>

        <div class="card-body table-responsive">

            <table class="table table-bordered table-hover">

                <thead>
                    <tr>
                        <th width="50">No</th>
                        <th width="60">Foto</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>No HP</th>
                        <th>Jenis</th>
                        <th>Status</th>
                        <th width="220">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($peminjams as $key => $p)

                    <tr>

                        <td>{{ $key + 1 }}</td>

                        <td>

                            @if($p->foto && file_exists(public_path('fotoupload/peminjam/'.$p->foto)))

                            <img src="{{ asset('fotoupload/peminjam/'.$p->foto) }}"
                                width="40"
                                height="40"
                                class="img-circle"
                                style="object-fit:cover;">

                            @else

                            <img src="{{ asset('dist/img/avatar5.png') }}"
                                width="40"
                                height="40"
                                class="img-circle">

                            @endif

                        </td>

                        <td>
                            <b>{{ $p->namapeminjam }}</b>
                        </td>

                        <td>{{ $p->username }}</td>

                        <td>{{ $p->nomorhp }}</td>

                        <td>
                            <span class="badge badge-info">
                                {{ ucfirst($p->jenis_peminjam) }}
                            </span>
                        </td>

                        <td>

                            @if($p->status == 'setujui')

                            <span class="badge badge-success">
                                Disetujui
                            </span>

                            @elseif($p->status == 'pending')

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
                            <a href="{{ route('peminjam.show',$p->id) }}"
                                class="btn btn-info btn-xs"
                                title="Detail">
                                <i class="fas fa-eye"></i>
                            </a>

                            {{-- CETAK SURAT --}}
                            @if($p->status == 'setujui')

                            <a href="{{ route('peminjam.surat',$p->id) }}"
                                class="btn btn-primary btn-xs"
                                target="_blank"
                                title="Cetak Surat">
                                <i class="fas fa-print"></i>
                            </a>

                            @endif

                            {{-- EDIT --}}
                            <a href="{{ route('peminjam.edit',$p->id) }}"
                                class="btn btn-warning btn-xs"
                                title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>

                            {{-- SETUJUI --}}
                            @if($p->status != 'setujui')

                            <form action="/peminjam/{{ $p->id }}/setujui"
                                method="POST"
                                class="d-inline">

                                @csrf

                                <button type="button"
                                    class="btn btn-success btn-xs btn-approve"
                                    title="Setujui">
                                    <i class="fas fa-check"></i>
                                </button>

                            </form>

                            @endif

                            {{-- TOLAK --}}
                            @if($p->status != 'tolak')

                            <form action="/peminjam/{{ $p->id }}/tolak"
                                method="POST"
                                class="d-inline">

                                @csrf

                                <button type="button"
                                    class="btn btn-dark btn-xs btn-reject"
                                    title="Tolak">
                                    <i class="fas fa-times"></i>
                                </button>

                            </form>

                            @endif

                            {{-- PENDING --}}
                            @if($p->status != 'pending')

                            <form action="/peminjam/{{ $p->id }}/pending"
                                method="POST"
                                class="d-inline">

                                @csrf

                                <button type="button"
                                    class="btn btn-secondary btn-xs btn-pending"
                                    title="Pending">
                                    <i class="fas fa-clock"></i>
                                </button>

                            </form>

                            @endif

                            {{-- HAPUS --}}
                            <form action="{{ route('peminjam.destroy',$p->id) }}"
                                method="POST"
                                class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button type="button"
                                    class="btn btn-danger btn-xs btn-delete"
                                    title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>

                            </form>

                        </td>

                    </tr>

                    @empty

                    <tr>
                        <td colspan="8" class="text-center">
                            Data peminjam belum tersedia
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
    document.addEventListener('DOMContentLoaded', function() {

        function confirmAction(selector, title, text, icon = 'question') {
            document.querySelectorAll(selector).forEach(btn => {

                btn.addEventListener('click', function() {

                    let form = this.closest('form');

                    Swal.fire({
                        title: title,
                        text: text,
                        icon: icon,
                        showCancelButton: true,
                        confirmButtonText: 'Ya',
                        cancelButtonText: 'Batal',
                        confirmButtonColor: '#28a745',
                        cancelButtonColor: '#d33'
                    }).then((result) => {

                        if (result.isConfirmed) {
                            form.submit();
                        }

                    });

                });

            });
        }

        confirmAction(
            '.btn-approve',
            'Setujui peminjam?',
            'Peminjam akan diaktifkan'
        );

        confirmAction(
            '.btn-reject',
            'Tolak peminjam?',
            'Peminjam tidak dapat menggunakan sistem',
            'warning'
        );

        confirmAction(
            '.btn-pending',
            'Kembalikan ke pending?',
            'Status akan direset'
        );

        confirmAction(
            '.btn-delete',
            'Hapus data?',
            'Data tidak dapat dikembalikan',
            'error'
        );

    });
</script>

@endpush