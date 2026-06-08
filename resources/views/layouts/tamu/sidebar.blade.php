<aside class="main-sidebar sidebar-dark-primary elevation-4">

    {{-- Brand Logo --}}
    <a href="{{ url('/') }}" class="brand-link text-center">

        <div class="d-flex align-items-center justify-content-center">

            <div class="bg-white rounded-circle d-flex justify-content-center align-items-center mr-2"
                 style="width:40px; height:40px;">
                <i class="fas fa-book-reader text-primary"></i>
            </div>

            <div class="text-left">
                <span class="brand-text font-weight-bold d-block">
                    Perpustakaan
                </span>

                <small style="font-size: 11px; color: #dfe6e9;">
                    Digital Sekolah
                </small>
            </div>

        </div>

    </a>

    {{-- Sidebar --}}
    <div class="sidebar">

        {{-- Welcome Box --}}
        <div class="user-panel mt-3 pb-3 mb-3 d-flex flex-column text-center border-bottom">

            <div class="image mb-2">
                <img src="{{ asset('dist/img/avatar5.png') }}"
                     class="img-circle elevation-2"
                     alt="User Image"
                     style="width:70px; height:70px; object-fit:cover;">
            </div>

            <div class="info text-white">
                <span class="d-block font-weight-bold">
                    Zona Tamu
                </span>

                <small>
                    Selamat Datang di Perpustakaan Digital
                </small>
            </div>

        </div>

        {{-- Menu Sidebar --}}
        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column"
                data-widget="treeview"
                role="menu"
                data-accordion="false">

                <li class="nav-item">
                    <a href="{{ url('/') }}"
                       class="nav-link {{ request()->is('/') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Home</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/katalog') }}"
                       class="nav-link {{ request()->is('katalog*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Katalog Buku</p>
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
                    <a href="{{ url('/tentang') }}"
                       class="nav-link {{ request()->is('tentang') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-school"></i>
                        <p>Tentang Sekolah</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/kontak') }}"
                       class="nav-link {{ request()->is('kontak') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>Kontak</p>
                    </a>
                </li>

                <li class="nav-header text-uppercase text-light mt-3">
                    Akses Sistem
                </li>

                <li class="nav-item">
                    <a href="{{ url('/login/user') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-shield text-warning"></i>
                        <p>Login Admin</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/login/peminjam') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-graduate text-success"></i>
                        <p>Login Peminjam</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/register/peminjam') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-plus text-info"></i>
                        <p>Registrasi</p>
                    </a>
                </li>

            </ul>

        </nav>

    </div>

</aside>
