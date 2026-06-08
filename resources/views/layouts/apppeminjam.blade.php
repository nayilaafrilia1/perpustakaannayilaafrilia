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

        body{
            font-family:'Poppins',sans-serif;
        }

        /* Sidebar */
        .brand-text{
            font-weight:600;
        }

        .nav-sidebar .nav-link{
            border-radius:8px;
            margin-bottom:4px;
            transition:.3s;
        }

        .nav-sidebar .nav-link:hover{
            transform:translateX(3px);
        }

        .nav-sidebar .nav-link.active{
            border-radius:8px;
        }

        /* Content */
        .content-wrapper{
            background:#f4f6f9;
            min-height:100vh;
        }

        /* Card */
        .card{
            border:none;
            border-radius:15px;
            box-shadow:0 4px 15px rgba(0,0,0,.05);
        }

        .card-header{
            background:white;
            border-bottom:1px solid #eee;
        }

        /* Small Box */
        .small-box{
            border-radius:15px;
            overflow:hidden;
        }

        .small-box .icon{
            top:10px;
        }

        /* Button */
        .btn{
            border-radius:10px;
        }

        /* Table */
        .table th{
            background:#f8f9fa;
            border-top:none;
        }

        /* Alert */
        .alert{
            border-radius:10px;
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

        <section class="content pt-3">

            <div class="container-fluid">

                {{-- Flash Message --}}
                @if(session('success'))

                    <div class="alert alert-success alert-dismissible fade show">

                        <button type="button"
                                class="close"
                                data-dismiss="alert">

                            <span>&times;</span>

                        </button>

                        {{ session('success') }}

                    </div>

                @endif

                @if(session('error'))

                    <div class="alert alert-danger alert-dismissible fade show">

                        <button type="button"
                                class="close"
                                data-dismiss="alert">

                            <span>&times;</span>

                        </button>

                        {{ session('error') }}

                    </div>

                @endif

                {{-- Isi Halaman --}}
                @yield('content')

            </div>

        </section>

    </div>

    {{-- Footer --}}
    @include('layouts.peminjam.footer')

</div>

{{-- Script --}}
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

@stack('script')

</body>
</html>