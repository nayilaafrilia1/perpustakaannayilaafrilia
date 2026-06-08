<nav class="main-header navbar navbar-expand navbar-white navbar-light shadow-sm border-0">

    {{-- Left navbar links --}}
    <ul class="navbar-nav">

        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                <i class="fas fa-bars"></i>
            </a>
        </li>

        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ url('/zonapeminjam/dashboard') }}" class="nav-link font-weight-bold text-success">
                <i class="fas fa-book-reader mr-1"></i>
                Zona Peminjam
            </a>
        </li>

    </ul>

    {{-- Right navbar links --}}
    <ul class="navbar-nav ml-auto align-items-center">

        {{-- Pencarian Buku --}}
        <li class="nav-item mr-3 d-none d-md-block">

            <form action="{{ url('/katalog') }}" method="GET">

                <div class="input-group input-group-sm">

                    <input type="text"
                        name="search"
                        class="form-control"
                        placeholder="Cari buku...">

                    <div class="input-group-append">
                        <button class="btn btn-success">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>

                </div>

            </form>

        </li>

        {{-- Notifikasi --}}
        <li class="nav-item dropdown mr-2">

            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-danger navbar-badge">3</span>
            </a>

            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right shadow border-0">

                <span class="dropdown-header font-weight-bold">
                    Notifikasi
                </span>

                <div class="dropdown-divider"></div>

                <a href="#" class="dropdown-item">
                    <i class="fas fa-book text-primary mr-2"></i>
                    Buku harus dikembalikan
                </a>

                <div class="dropdown-divider"></div>

                <a href="#" class="dropdown-item">
                    <i class="fas fa-info-circle text-success mr-2"></i>
                    Selamat datang di sistem
                </a>

            </div>

        </li>

        {{-- User Dropdown --}}
        <li class="nav-item dropdown user-menu">

            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">

                <img src="{{ asset('dist/img/avatar5.png') }}"
                    class="user-image img-circle elevation-2"
                    alt="User Image">

                <span class="d-none d-md-inline font-weight-bold">
                    {{ auth('peminjam')->user()->nama ?? 'Peminjam' }}
                </span>

            </a>

            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right border-0 shadow">

                {{-- User Header --}}
                <li class="user-header bg-success">

                    <img src="{{ asset('dist/img/avatar5.png') }}"
                        class="img-circle elevation-2"
                        alt="User Image">

                    <p>
                        {{ auth('peminjam')->user()->nama ?? 'Peminjam' }}
                        <small>Anggota Perpustakaan</small>
                    </p>

                </li>

                {{-- Menu Footer --}}
                <li class="user-footer d-flex justify-content-between">

                    <a href="#" class="btn btn-default btn-flat">
                        <i class="fas fa-user mr-1"></i>
                        Profil
                    </a>

                    <form action="{{ route('logoutpeminjam') }}" method="POST">
                        @csrf

                        <button type="submit" class="btn btn-danger btn-flat">
                            <i class="fas fa-sign-out-alt mr-1"></i>
                            Logout
                        </button>
                    </form>

                </li>

            </ul>

        </li>

    </ul>

</nav>