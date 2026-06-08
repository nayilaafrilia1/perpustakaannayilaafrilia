<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">

    <title>{{ $judul }}</title>

    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
        }

        .header{
            text-align:center;
            border-bottom:3px solid #000;
            padding-bottom:10px;
            margin-bottom:20px;
        }

        .header h2,
        .header h3,
        .header p{
            margin:0;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        table th,
        table td{
            border:1px solid #000;
            padding:6px;
        }

        table th{
            background:#f2f2f2;
        }

        .ttd{
            margin-top:50px;
        }

        .bold{
            font-weight:bold;
        }

    </style>
</head>

<body>

    <div class="header">

        <h2>PERPUSTAKAAN SEKOLAH</h2>

        <h3>LAPORAN {{ strtoupper($judul) }}</h3>

        <p>
            Tahun {{ date('Y') }}
        </p>

    </div>

    @yield('isi')

    <table class="ttd" style="border:none">

        <tr style="border:none">

            <td width="50%" style="border:none">
                Mengetahui,<br>
                Kepala Sekolah
            </td>

            <td style="border:none">
                Karang Baru,
                {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}
                <br>
                Kepala Perpustakaan
            </td>

        </tr>

        <tr style="border:none">

            <td height="80" style="border:none"></td>

            <td style="border:none"></td>

        </tr>

        <tr style="border:none">

            <td style="border:none" class="bold">
                Fahmi Putra, S.Pd<br>
                NIP. 19791108 200904 1 001
            </td>

            <td style="border:none" class="bold">
                Zulkifli NG, S.Pd<br>
                NIP. 19860505 201403 1 003
            </td>

        </tr>

    </table>

    <script>
        window.print();
    </script>

</body>

</html>