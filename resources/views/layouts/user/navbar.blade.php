<nav class="main-header navbar navbar-expand navbar-white navbar-light shadow-sm border-0">

    {{-- Left navbar links --}}
    <ul class="navbar-nav">

        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                <i class="fas fa-bars"></i>
            </a>
        </li>

        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link font-weight-bold text-primary">
                <i class="fas fa-book-reader mr-1"></i>
                Sistem Perpustakaan Digital
            </a>
        </li>

    </ul>

    {{-- Right Navbar --}}
    <ul class="navbar-nav ml-auto align-items-center">

        {{-- Search --}}
        <li class="nav-item d-none d-md-block mr-3">

            <form action="#" method="GET">

                <div class="input-group input-group-sm">

                    <input type="text"
                           class="form-control"
                           placeholder="Cari data...">

                    <div class="input-group-append">
                        <button class="btn btn-primary">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>

                </div>

            </form>

        </li>

        {{-- Notification --}}
        <li class="nav-item dropdown mr-2">

            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-danger navbar-badge">3</span>
            </a>

            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right border-0 shadow">

                <span class="dropdown-header font-weight-bold">
                    Notifikasi Sistem
                </span>

                <div class="dropdown-divider"></div>

                <a href="#" class="dropdown-item">
                    <i class="fas fa-book text-primary mr-2"></i>
                    Ada peminjaman baru
                </a>

                <div class="dropdown-divider"></div>

                <a href="#" class="dropdown-item">
                    <i class="fas fa-user text-success mr-2"></i>
                    Anggota baru terdaftar
                </a>

                <div class="dropdown-divider"></div>

                <a href="#" class="dropdown-item">
                    <i class="fas fa-exclamation-circle text-danger mr-2"></i>
                    Ada denda belum dibayar
                </a>

            </div>

        </li>

        {{-- Fullscreen --}}
        <li class="nav-item mr-2">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>

        {{-- User Dropdown --}}
        <li class="nav-item dropdown user-menu">

            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">

                <img src="{{ asset('dist/img/avatar5.png') }}"
                     class="user-image img-circle elevation-2"
                     alt="User Image">

                <span class="d-none d-md-inline font-weight-bold">
                    {{ auth()->user()->nama ?? 'User' }}
                </span>

            </a>

            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right border-0 shadow">

                {{-- User Header --}}
                <li class="user-header bg-primary">

                    <img src="{{ asset('dist/img/avatar5.png') }}"
                         class="img-circle elevation-2"
                         alt="User Image">

                    <p>
                        {{ auth()->user()->nama ?? 'User' }}
                        <small>
                            {{ ucfirst(auth()->user()->role ?? 'Admin') }}
                        </small>
                    </p>

                </li>

                {{-- Footer --}}
                <li class="user-footer d-flex justify-content-between">

                    <a href="#" class="btn btn-default btn-flat">
                        <i class="fas fa-user mr-1"></i>
                        Profil
                    </a>
<a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    Logout
</a>

<form id="logout-form" action="{{ route('logoutuser') }}" method="POST" style="display:none;">
    @csrf
</form>

                </li>

            </ul>

        </li>

    </ul>

</nav>
