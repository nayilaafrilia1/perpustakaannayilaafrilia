<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Dashboard Perpustakaan')</title>

    {{-- AdminLTE --}}
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

    {{-- DataTables --}}
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">

    {{-- Google Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .main-sidebar {
            background: linear-gradient(180deg, #0d47a1, #1565c0);
        }

        .brand-link {
            background: rgba(255,255,255,0.08);
            border-bottom: 1px solid rgba(255,255,255,0.1) !important;
        }

        .brand-text {
            font-weight: 600;
            color: white !important;
        }

        .nav-sidebar .nav-link {
            border-radius: 10px;
            margin-bottom: 5px;
            color: #ecf0f1;
        }

        .nav-sidebar .nav-link:hover {
            background: rgba(255,255,255,0.1);
        }

        .nav-sidebar .nav-link.active {
            background: #ffffff;
            color: #0d47a1 !important;
            font-weight: 600;
        }

        .content-wrapper {
            background: #f4f6f9;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        .main-header {
            border-bottom: none;
        }
    </style>

    @stack('style')
</head>

<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

    {{-- NAVBAR --}}
    @include('layouts.user.navbar')

    {{-- SIDEBAR (AMAN DARI ERROR NULL ROLE) --}}
    @auth
        @if(auth()->user()->role == 'admin')
            @include('layouts.user.sidebaradmin')
        @else
            @include('layouts.user.sidebarpetugas')
        @endif
    @endauth

    {{-- CONTENT --}}
    <div class="content-wrapper">

        {{-- HEADER --}}
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 align-items-center">

                    <div class="col-sm-6">
                        <h1 class="m-0 font-weight-bold text-primary">
                            @yield('judul', 'Dashboard')
                        </h1>
                    </div>

                    <div class="col-sm-6 text-right">
                        <small class="text-muted">
                            <i class="fas fa-calendar-alt"></i>
                            {{ date('d F Y') }}
                        </small>
                    </div>

                </div>
            </div>
        </div>

        {{-- MAIN CONTENT --}}
        <section class="content">
            <div class="container-fluid">

                {{-- SUCCESS --}}
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {{ session('success') }}
                    </div>
                @endif

                {{-- ERROR --}}
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')

            </div>
        </section>

    </div>

    {{-- FOOTER --}}
    @include('layouts.user.footer')

</div>

{{-- SCRIPT --}}
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

{{-- ✅ TAMBAH SELECT2 --}}
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

{{-- 🔥 FIX PENTING --}}
@stack('scripts')

</body>
</html>