<nav class="main-header navbar navbar-expand navbar-white navbar-light shadow-sm">

    {{-- LEFT --}}
    <ul class="navbar-nav">

        <li class="nav-item">

            <a class="nav-link"
               data-widget="pushmenu"
               href="#"
               role="button">

                <i class="fas fa-bars"></i>

            </a>

        </li>

        <li class="nav-item d-none d-md-inline-block">

            <span class="nav-link font-weight-bold text-primary">

                <i class="fas fa-book-reader mr-2"></i>

                Perpustakaan Digital

            </span>

        </li>

    </ul>

    {{-- RIGHT --}}
    <ul class="navbar-nav ml-auto align-items-center">

        {{-- JAM --}}
        <li class="nav-item mr-3 d-none d-md-block">

            <span class="nav-link">

                <i class="far fa-clock text-primary"></i>

                <span id="jam-sekarang"></span>

            </span>

        </li>

        {{-- FULLSCREEN --}}
        <li class="nav-item">

            <a class="nav-link"
               data-widget="fullscreen"
               href="#">

                <i class="fas fa-expand-arrows-alt"></i>

            </a>

        </li>

        {{-- USER --}}
        <li class="nav-item dropdown user-menu">

            <a href="#"
               class="nav-link dropdown-toggle"
               data-toggle="dropdown">

                <img src="{{ asset('dist/img/avatar5.png') }}"
                     class="user-image img-circle elevation-2"
                     alt="User">

                <span class="d-none d-md-inline">

                    {{ auth()->user()->nama ?? 'Administrator' }}

                </span>

            </a>

            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right shadow border-0">

                <div class="text-center p-3 bg-primary text-white">

                    <img src="{{ asset('dist/img/avatar5.png') }}"
                         class="img-circle elevation-2 mb-2"
                         width="80">

                    <h6 class="mb-0">
                        {{ auth()->user()->nama ?? 'Administrator' }}
                    </h6>

                    <small>
                        {{ ucfirst(auth()->user()->role ?? 'Admin') }}
                    </small>

                </div>

                <div class="dropdown-divider"></div>

                <a href="#"
                   class="dropdown-item">

                    <i class="fas fa-user mr-2"></i>

                    Profil Saya

                </a>

                <div class="dropdown-divider"></div>

                <a href="#"
                   class="dropdown-item text-danger"
                   onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">

                    <i class="fas fa-sign-out-alt mr-2"></i>

                    Logout

                </a>

                <form id="logout-form"
                      action="{{ route('logoutuser') }}"
                      method="POST"
                      style="display:none;">

                    @csrf

                </form>

            </div>

        </li>

    </ul>

</nav>