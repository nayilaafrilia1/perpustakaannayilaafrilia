<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Zona Peminjam')</title>

    {{-- AdminLTE --}}
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

    {{-- Google Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .main-sidebar {
            background: linear-gradient(180deg, #198754, #157347);
        }

        .brand-link {
            background: rgba(255,255,255,0.08);
        }

        .brand-text {
            color: white !important;
            font-weight: 600;
        }

        .nav-sidebar .nav-link {
            color: #ffffff;
            border-radius: 10px;
            margin-bottom: 5px;
        }

        .nav-sidebar .nav-link:hover {
            background: rgba(255,255,255,0.1);
        }

        .nav-sidebar .nav-link.active {
            background: white;
            color: #198754 !important;
            font-weight: 600;
        }

        .content-wrapper {
            background: #f4f6f9;
        }

        .card {
            border-radius: 15px;
            border: none;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }

        .welcome-box {
            background: linear-gradient(135deg, #198754, #20c997);
            border-radius: 20px;
            padding: 25px;
            color: white;
        }
    </style>

    @stack('style')
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

    {{-- Navbar --}}
    @include('layouts.peminjam.navbar')

    {{-- Sidebar --}}
    @include('layouts.peminjam.sidebar')

    {{-- Content --}}
    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="welcome-box mb-4">
                    <div class="d-flex justify-content-between align-items-center flex-wrap">

                        <div>
                            <h3 class="font-weight-bold mb-2">
                                Selamat Datang,
                                {{ auth('peminjam')->user()->nama ?? 'Peminjam' }}
                            </h3>

                            <p class="mb-0">
                                Sistem Perpustakaan Digital Sekolah
                            </p>
                        </div>

                        <div>
                            <i class="fas fa-book-reader fa-4x opacity-50"></i>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {{ session('success') }}
                    </div>
                @endif

                @yield('content')

            </div>
        </section>

    </div>

    {{-- Footer --}}
    @include('layouts.peminjam.footer')

</div>

<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

@stack('script')

</body>
</html>