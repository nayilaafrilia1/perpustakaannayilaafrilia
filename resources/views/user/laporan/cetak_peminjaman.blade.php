<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laporan Peminjaman</title>

    <style>
        body {
            font-family: Arial;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #000;
            padding: 6px;
        }

        th {
            background: #f2f2f2;
        }

        .text-center {
            text-align: center;
        }

        .ttd td {
            border: none;
        }

        .bold {
            font-weight: bold;
        }
    </style>

</head>

<body>

<div class="text-center">
    <h3>LAPORAN PEMINJAMAN BUKU</h3>
    <h4>PERPUSTAKAAN SEKOLAH</h4>
</div>

<table>

    <thead>
        <tr>
            <th>No</th>
            <th>Peminjam</th>
            <th>Admin</th>
            <th>Total Denda</th>
            <th>Tunggakan</th>
            <th>Jumlah Buku</th>
        </tr>
    </thead>

    <tbody>

        @foreach($peminjaman as $item)

        <tr>

            <td class="text-center">{{ $loop->iteration }}</td>
            <td>{{ $item->peminjam->namapeminjam ?? '-' }}</td>
            <td>{{ $item->user->namauser ?? '-' }}</td>
            <td class="text-center">Rp{{ number_format($item->totaldenda,0,',','.') }}</td>
            <td class="text-center">Rp{{ number_format($item->tunggakan,0,',','.') }}</td>
            <td class="text-center">{{ $item->detailPeminjaman->count() }}</td>

        </tr>

        @endforeach

    </tbody>

</table>

<br><br>

<table width="100%" class="ttd">

    <tr>
        <td width="50%">
            Mengetahui,<br>Kepala Sekolah
        </td>

        <td>
            Karang Baru, {{ date('d F Y') }}<br>Kepala Perpustakaan
        </td>
    </tr>

    <tr><td height="70"></td><td></td></tr>

    <tr>
        <td class="bold">
            Fahmi Putra, S.Pd<br>NIP. 19791108 200904 1 001
        </td>

        <td class="bold">
            Zulkifli NG, S.Pd<br>NIP. 19860505 201403 1 003
        </td>
    </tr>

</table>

<script>
    window.print();
</script>

</body>
</html>