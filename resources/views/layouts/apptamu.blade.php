<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Perpustakaan Digital')</title>

    {{-- AdminLTE --}}
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

    {{-- Google Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f4f6f9;
        }

        .hero-section {
            background: linear-gradient(135deg, #0d6efd, #224abe);
            color: white;
            border-radius: 0 0 30px 30px;
            padding: 80px 20px;
        }

        .content-wrapper {
            background: #f4f6f9;
        }

        .card {
            border-radius: 15px;
            border: none;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }

        .footer-custom {
            background: #ffffff;
            border-top: 1px solid #dee2e6;
            padding: 15px;
            text-align: center;
            color: #6c757d;
        }
    </style>

    @stack('style')
</head>
<body class="hold-transition layout-top-nav">

<div class="wrapper">

    {{-- Navbar --}}
    @include('layouts..tamu.navbar')

    {{-- Content --}}
    <div class="content-wrapper">

        @yield('hero')

        <div class="content pt-4 pb-5">
            <div class="container">
                @yield('content')
            </div>
        </div>

    </div>

    {{-- Footer --}}
    @include('layouts..tamu.footer')

</div>

<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

@stack('script')

</body>
</html>