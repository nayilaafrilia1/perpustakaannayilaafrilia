<nav class="main-header navbar navbar-expand-md navbar-light bg-white shadow-sm">

    <div class="container">

        {{-- Logo --}}
        <a href="{{ url('/') }}" class="navbar-brand d-flex align-items-center">

            <div class="bg-primary rounded-circle d-flex justify-content-center align-items-center mr-2"
                 style="width:40px; height:40px;">
                <i class="fas fa-book-reader text-white"></i>
            </div>

            <div>
                <span class="font-weight-bold text-primary d-block" style="font-size: 16px; line-height: 1;">
                    Perpustakaan Digital
                </span>

                <small class="text-muted" style="font-size: 11px;">
                    Sekolah Modern Indonesia
                </small>
            </div>

        </a>

        {{-- Toggle --}}
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTamu">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Menu --}}
        <div class="collapse navbar-collapse" id="navbarTamu">

            <ul class="navbar-nav ml-auto align-items-lg-center">

                <li class="nav-item">
                    <a href="{{ url('/') }}"
                       class="nav-link {{ request()->is('/') ? 'active text-primary font-weight-bold' : '' }}">
                        <i class="fas fa-home mr-1"></i>
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/katalog') }}"
                       class="nav-link {{ request()->is('katalog*') ? 'active text-primary font-weight-bold' : '' }}">
                        <i class="fas fa-book mr-1"></i>
                        Katalog
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/kategori') }}"
                       class="nav-link {{ request()->is('kategori*') ? 'active text-primary font-weight-bold' : '' }}">
                        <i class="fas fa-layer-group mr-1"></i>
                        Kategori
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/tentang') }}"
                       class="nav-link {{ request()->is('tentang') ? 'active text-primary font-weight-bold' : '' }}">
                        <i class="fas fa-school mr-1"></i>
                        Tentang
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/kontak') }}"
                       class="nav-link {{ request()->is('kontak') ? 'active text-primary font-weight-bold' : '' }}">
                        <i class="fas fa-envelope mr-1"></i>
                        Kontak
                    </a>
                </li>

                {{-- Login Dropdown --}}
                <li class="nav-item dropdown ml-lg-3 mt-2 mt-lg-0">

                    <a class="btn btn-primary dropdown-toggle px-3"
                       href="#"
                       id="loginDropdown"
                       role="button"
                       data-toggle="dropdown">
                        <i class="fas fa-sign-in-alt mr-1"></i>
                        Login
                    </a>

                    <div class="dropdown-menu dropdown-menu-right shadow border-0">

                        <a class="dropdown-item" href="{{ url('loginuser') }}">
                            <i class="fas fa-user-shield text-primary mr-2"></i>
                            Login Admin 
                        </a>

                        <a class="dropdown-item" href="{{ url('loginpeminjam') }}">
                            <i class="fas fa-user-graduate text-success mr-2"></i>
                            Login Peminjam
                        </a>

                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" href="{{ url('registerpeminjam') }}">
                            <i class="fas fa-user-plus text-info mr-2"></i>
                            Registrasi Peminjam
                        </a>

                    </div>

                </li>

            </ul>

        </div>

    </div>

</nav>