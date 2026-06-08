<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    {{-- Left Navbar --}}
    <ul class="navbar-nav">

        <li class="nav-item">
            <a class="nav-link"
               data-widget="pushmenu"
               href="#"
               role="button">
                <i class="fas fa-bars"></i>
            </a>
        </li>

        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('dashboardpeminjam') }}"
               class="nav-link font-weight-bold">
                <i class="fas fa-book-reader mr-1"></i>
                Zona Peminjam
            </a>
        </li>

    </ul>

    {{-- Right Navbar --}}
    <ul class="navbar-nav ml-auto">

        {{-- Search --}}
        <li class="nav-item d-none d-md-block mr-3">

            <form action="{{ route('katalogbuku') }}"
                  method="GET">

                <div class="input-group input-group-sm">

                    <input type="text"
                           name="search"
                           class="form-control"
                           placeholder="Cari buku...">

                    <div class="input-group-append">

                        <button class="btn btn-primary"
                                type="submit">

                            <i class="fas fa-search"></i>

                        </button>

                    </div>

                </div>

            </form>

        </li>

        {{-- Notifications --}}
        <li class="nav-item dropdown">

            <a class="nav-link"
               data-toggle="dropdown"
               href="#">

                <i class="far fa-bell"></i>

                <span class="badge badge-warning navbar-badge">
                    2
                </span>

            </a>

            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                <span class="dropdown-header">
                    Notifikasi
                </span>

                <div class="dropdown-divider"></div>

                <a href="#"
                   class="dropdown-item">

                    <i class="fas fa-book mr-2 text-primary"></i>

                    Periksa buku yang sedang dipinjam

                </a>

                <div class="dropdown-divider"></div>

                <a href="#"
                   class="dropdown-item">

                    <i class="fas fa-info-circle mr-2 text-info"></i>

                    Selamat datang di perpustakaan digital

                </a>

            </div>

        </li>

        {{-- User Menu --}}
        <li class="nav-item dropdown user-menu">

            <a href="#"
               class="nav-link dropdown-toggle"
               data-toggle="dropdown">

                <img src="{{ asset('dist/img/avatar5.png') }}"
                     class="user-image img-circle elevation-2"
                     alt="User">

                <span class="d-none d-md-inline">
                    {{ auth('peminjam')->user()->nama ?? 'Peminjam' }}
                </span>

            </a>

            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                <li class="user-header bg-primary">

                    <img src="{{ asset('dist/img/avatar5.png') }}"
                         class="img-circle elevation-2"
                         alt="User">

                    <p>
                        {{ auth('peminjam')->user()->nama ?? 'Peminjam' }}

                        <small>
                            Anggota Perpustakaan
                        </small>
                    </p>

                </li>

                <li class="user-footer">

                    <form action="{{ route('logoutpeminjam') }}"
                          method="POST">
                        @csrf

                        <button type="submit"
                                class="btn btn-danger btn-block">

                            <i class="fas fa-sign-out-alt mr-1"></i>
                            Logout

                        </button>

                    </form>

                </li>

            </ul>

        </li>

    </ul>

</nav>