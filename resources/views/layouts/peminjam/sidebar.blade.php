<aside class="main-sidebar sidebar-dark-primary elevation-4">

    {{-- Brand Logo --}}
    <a href="{{ route('dashboardpeminjam') }}" class="brand-link">

        <img src="{{ asset('dist/img/AdminLTELogo.png') }}"
             alt="Logo"
             class="brand-image img-circle elevation-3"
             style="opacity:.8">

        <span class="brand-text font-weight-light">
            Perpustakaan
        </span>

    </a>

    <div class="sidebar">

        {{-- User Panel --}}
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            <div class="image">
                <img src="{{ asset('dist/img/avatar5.png') }}"
                     class="img-circle elevation-2"
                     alt="User Image">
            </div>

            <div class="info">
                <a href="#" class="d-block">
                    {{ auth('peminjam')->user()->nama ?? 'Peminjam' }}
                </a>
            </div>

        </div>

        {{-- Menu --}}
        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column"
                data-widget="treeview"
                role="menu">

                <li class="nav-item">
                    <a href="{{ route('dashboardpeminjam') }}"
                       class="nav-link {{ request()->routeIs('dashboardpeminjam') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('katalogbuku') }}"
                       class="nav-link {{ request()->routeIs('katalogbuku') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book-open"></i>
                        <p>Katalog Buku</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('riwayatpeminjaman') }}"
                       class="nav-link {{ request()->routeIs('riwayatpeminjaman') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Riwayat Peminjaman</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('riwayatpengembalian') }}"
                       class="nav-link {{ request()->routeIs('riwayatpengembalian') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-undo"></i>
                        <p>Riwayat Pengembalian</p>
                    </a>
                </li>

                <li class="nav-header">AKUN</li>

                <li class="nav-item">
                    <form action="{{ route('logoutpeminjam') }}"
                          method="POST">
                        @csrf

                        <button type="submit"
                                class="nav-link border-0 bg-transparent text-left w-100">

                            <i class="nav-icon fas fa-sign-out-alt text-danger"></i>
                            <p>Logout</p>

                        </button>
                    </form>
                </li>

            </ul>

        </nav>

    </div>

</aside>