<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laporan Pengembalian</title>

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

        .ttd {
            margin-top: 50px;
            border: none;
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
    <h3>LAPORAN PENGEMBALIAN BUKU</h3>
    <h4>PERPUSTAKAAN SEKOLAH</h4>
</div>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Peminjam</th>
            <th>Buku</th>
            <th>Pinjam</th>
            <th>Jatuh Tempo</th>
            <th>Kembali</th>
            <th>Terlambat</th>
            <th>Denda</th>
            <th>Status</th>
        </tr>
    </thead>

    <tbody>

        @foreach($pengembalian as $item)

        <tr>
            <td class="text-center">{{ $loop->iteration }}</td>
            <td>{{ $item->peminjaman->peminjam->namapeminjam ?? '-' }}</td>
            <td>{{ $item->buku->judul ?? '-' }}</td>
            <td class="text-center">{{ $item->tanggalpinjam }}</td>
            <td class="text-center">{{ $item->tanggalkembali }}</td>
            <td class="text-center">{{ $item->tanggalkembalikan ?? '-' }}</td>
            <td class="text-center">{{ $item->jumlahharitelat }} hari</td>
            <td class="text-center">Rp{{ number_format($item->denda,0,',','.') }}</td>
            <td class="text-center">{{ ucfirst($item->status) }}</td>
        </tr>

        @endforeach

    </tbody>
</table>

<br><br>

<table class="ttd" width="100%">
    <tr>
        <td width="50%">
            Mengetahui,<br>
            Kepala Sekolah
        </td>

        <td>
            Karang Baru, {{ date('d F Y') }}<br>
            Kepala Perpustakaan
        </td>
    </tr>

    <tr>
        <td height="70"></td>
        <td></td>
    </tr>

    <tr>
        <td class="bold">
            Fahmi Putra, S.Pd<br>
            NIP. 19791108 200904 1 001
        </td>

        <td class="bold">
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