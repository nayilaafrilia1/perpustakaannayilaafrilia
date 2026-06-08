<aside class="main-sidebar sidebar-dark-primary elevation-4">

    {{-- BRAND LOGO --}}
    <a href="{{ route('dashboardadmin') }}" class="brand-link">

        <img src="{{ asset('dist/img/AdminLTELogo.png') }}"
             alt="Logo"
             class="brand-image img-circle elevation-3"
             style="opacity:.8">

        <span class="brand-text font-weight-light">
            Perpustakaan
        </span>

    </a>

    {{-- SIDEBAR --}}
    <div class="sidebar">

        {{-- USER PANEL --}}
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            <div class="image">
                <img src="{{ asset('dist/img/avatar5.png') }}"
                     class="img-circle elevation-2"
                     alt="User">
            </div>

            <div class="info">
                <a href="#" class="d-block">
                    {{ auth()->user()->nama ?? 'Administrator' }}
                </a>

                <small class="text-success">
                    <i class="fas fa-circle"></i> Online
                </small>
            </div>

        </div>

        {{-- MENU --}}
        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column"
                data-widget="treeview"
                role="menu"
                data-accordion="false">

                {{-- DASHBOARD --}}
                <li class="nav-item">
                    <a href="{{ route('dashboardadmin') }}"
                       class="nav-link {{ request()->is('dashboardadmin') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                {{-- MASTER DATA --}}
                <li class="nav-header">MASTER DATA</li>

                <li class="nav-item">
                    <a href="{{ url('/user') }}"
                       class="nav-link {{ request()->is('user*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Data User</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/peminjam') }}"
                       class="nav-link {{ request()->is('peminjam*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-graduate"></i>
                        <p>Data Peminjam</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/kategori') }}"
                       class="nav-link {{ request()->is('kategori*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-layer-group"></i>
                        <p>Kategori Buku</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/buku') }}"
                       class="nav-link {{ request()->is('buku*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Data Buku</p>
                    </a>
                </li>

                {{-- TRANSAKSI --}}
                <li class="nav-header">TRANSAKSI</li>

                <li class="nav-item">
                    <a href="{{ url('/peminjaman') }}"
                       class="nav-link {{ request()->is('peminjaman*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book-reader"></i>
                        <p>Peminjaman</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/pengembalian') }}"
                       class="nav-link {{ request()->is('pengembalian*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-undo"></i>
                        <p>Pengembalian</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/denda') }}"
                       class="nav-link {{ request()->is('denda*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-money-bill-wave"></i>
                        <p>Denda</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/surat') }}"
                       class="nav-link {{ request()->is('surat*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file-signature"></i>
                        <p>Surat Bebas Perpus</p>
                    </a>
                </li>

                {{-- LAPORAN --}}
                <li class="nav-header">LAPORAN</li>

                <li class="nav-item has-treeview
                    {{ request()->is('laporan/*') ? 'menu-open' : '' }}">

                    <a href="#"
                       class="nav-link
                       {{ request()->is('laporan/*') ? 'active' : '' }}">

                        <i class="nav-icon fas fa-file-alt"></i>

                        <p>
                            Laporan
                            <i class="right fas fa-angle-left"></i>
                        </p>

                    </a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ url('/laporan/peminjaman') }}"
                               class="nav-link {{ request()->is('laporan/peminjaman*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Peminjaman</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('/laporan/pengembalian') }}"
                               class="nav-link {{ request()->is('laporan/pengembalian*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Pengembalian</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('/laporan/denda') }}"
                               class="nav-link {{ request()->is('laporan/denda*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Denda</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('/laporan/buku') }}"
                               class="nav-link {{ request()->is('laporan/buku*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Buku</p>
                            </a>
                        </li>

                    </ul>

                </li>

                {{-- LOGOUT --}}
                <li class="nav-header">AKUN</li>

                <li class="nav-item">

                    <form action="{{ route('logoutuser') }}"
                          method="POST">

                        @csrf

                        <button type="submit"
                                class="nav-link btn btn-link text-left w-100 border-0">

                            <i class="nav-icon fas fa-sign-out-alt text-danger"></i>

                            <p>
                                Logout
                            </p>

                        </button>

                    </form>

                </li>

            </ul>

        </nav>

    </div>

</aside>