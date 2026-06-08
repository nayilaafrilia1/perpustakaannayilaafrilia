<aside class="main-sidebar sidebar-dark-success elevation-4">

    {{-- Brand Logo --}}
    <a href="{{ url('/dashboard/petugas') }}" class="brand-link">

        <div class="d-flex align-items-center">

            <div class="bg-white rounded-circle d-flex justify-content-center align-items-center mr-2"
                 style="width:42px; height:42px;">
                <i class="fas fa-book text-success"></i>
            </div>

            <div>
                <span class="brand-text font-weight-bold d-block">
                    Perpustakaan
                </span>

                <small style="font-size:11px; color:#dfe6e9;">
                    Dashboard Petugas
                </small>
            </div>

        </div>

    </a>

    <div class="sidebar">

        {{-- User Panel --}}
        <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center border-bottom">

            <div class="image">
                <img src="{{ asset('dist/img/avatar5.png') }}"
                     class="img-circle elevation-2"
                     alt="User Image">
            </div>

            <div class="info">
                <a href="#" class="d-block font-weight-bold text-white">
                    {{ auth()->user()->nama ?? 'Petugas' }}
                </a>

                <small class="text-light">
                    Petugas Perpustakaan
                </small>
            </div>

        </div>

        {{-- Menu --}}
        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column"
                data-widget="treeview"
                role="menu"
                data-accordion="false">

                <li class="nav-item">
                    <a href="{{ url('/dashboard/petugas') }}" class="nav-link active">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-header">MASTER DATA</li>

                <li class="nav-item">
                    <a href="{{ url('/buku') }}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Data Buku</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/kategori') }}" class="nav-link">
                        <i class="nav-icon fas fa-layer-group"></i>
                        <p>Kategori Buku</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/peminjam') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-graduate"></i>
                        <p>Data Peminjam</p>
                    </a>
                </li>

                <li class="nav-header">TRANSAKSI</li>

                <li class="nav-item">
                    <a href="{{ url('/peminjaman') }}" class="nav-link">
                        <i class="nav-icon fas fa-book-reader"></i>
                        <p>Peminjaman</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/pengembalian') }}" class="nav-link">
                        <i class="nav-icon fas fa-undo"></i>
                        <p>Pengembalian</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/denda') }}" class="nav-link">
                        <i class="nav-icon fas fa-money-bill-wave"></i>
                        <p>Denda</p>
                    </a>
                </li>

            </ul>

        </nav>

    </div>

</aside>
