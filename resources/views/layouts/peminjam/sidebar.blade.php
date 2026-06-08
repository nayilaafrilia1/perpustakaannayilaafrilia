<aside class="main-sidebar sidebar-dark-success elevation-4">

    {{-- Brand Logo --}}
    <a href="{{ route('dashboardpeminjam') }}" class="brand-link">

        <div class="d-flex align-items-center">

            <div class="bg-white rounded-circle d-flex justify-content-center align-items-center mr-2"
                style="width:42px; height:42px;">
                <i class="fas fa-book-reader text-success"></i>
            </div>

            <div>
                <span class="brand-text font-weight-bold d-block">
                    Perpustakaan
                </span>

                <small style="font-size:11px; color:#dfe6e9;">
                    Zona Peminjam
                </small>
            </div>

        </div>

    </a>

    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center border-bottom">

            <div class="image">
                <img src="{{ asset('dist/img/avatar5.png') }}"
                    class="img-circle elevation-2"
                    style="width:50px; height:50px; object-fit:cover;">
            </div>

            <div class="info">
                <a href="#" class="d-block font-weight-bold text-white">
                    {{ auth('peminjam')->user()->nama ?? 'Peminjam' }}
                </a>

                <small class="text-light">
                    Anggota Aktif
                </small>
            </div>

        </div>

        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column">

                {{-- Dashboard --}}
                <li class="nav-item">
                    <a href="{{ route('dashboardpeminjam') }}"
                        class="nav-link {{ request()->routeIs('dashboardpeminjam') ? 'active' : '' }}">

                        <i class="nav-icon fas fa-home"></i>
                        <p>Dashboard</p>

                    </a>
                </li>

                {{-- Riwayat Peminjaman --}}
                <li class="nav-item">
                    <a href="{{ route('riwayatpeminjaman') }}"
                        class="nav-link {{ request()->routeIs('riwayatpeminjaman') ? 'active' : '' }}">

                        <i class="nav-icon fas fa-book"></i>
                        <p>Riwayat Peminjaman</p>

                    </a>
                </li>

                {{-- Riwayat Pengembalian --}}
                <li class="nav-item">
                    <a href="{{ route('riwayatpengembalian') }}"
                        class="nav-link {{ request()->routeIs('riwayatpengembalian') ? 'active' : '' }}">

                        <i class="nav-icon fas fa-undo"></i>
                        <p>Riwayat Pengembalian</p>

                    </a>
                </li>

                {{-- Katalog --}}
                <li class="nav-item">
                   <a href="{{ route('katalogbuku') }}" class="nav-link">

                        <i class="nav-icon fas fa-book-open"></i>
                        <p>Katalog Buku</p>

                    </a>
                </li>

                {{-- Logout --}}
                <li class="nav-item mt-3">

                    <form action="{{ route('logoutpeminjam') }}" method="POST">
                        @csrf

                        <button type="submit"
                            class="nav-link btn btn-danger text-left w-100 border-0">

                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>Logout</p>

                        </button>

                    </form>

                </li>

            </ul>

        </nav>

    </div>

</aside>