<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan Buku</title>

    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
        }

        h3{
            text-align:center;
            margin:0;
        }

        p{
            text-align:center;
            margin-top:5px;
            margin-bottom:20px;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        th, td{
            border:1px solid #000;
            padding:6px;
        }

        th{
            background:#f2f2f2;
            text-align:center;
        }

        .center{
            text-align:center;
        }

        .ttd{
            margin-top:50px;
            width:100%;
            border:none;
        }

        .ttd td{
            border:none;
        }

        .bold{
            font-weight:bold;
        }
    </style>

</head>

<body>

<h3>LAPORAN DATA BUKU</h3>
<p>PERPUSTAKAAN SEKOLAH</p>

<table>

    <thead>
        <tr>
            <th width="5%">No</th>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Pengarang</th>
            <th>Penerbit</th>
            <th>Tahun</th>
            <th>Stok</th>
            <th>Status</th>
        </tr>
    </thead>

    <tbody>

        @forelse($buku as $item)

        <tr>

            <td class="center">{{ $loop->iteration }}</td>

            <td>{{ $item->judul }}</td>

            <td>{{ $item->kategori->namakategori ?? '-' }}</td>

            <td>{{ $item->pengarang }}</td>

            <td>{{ $item->penerbit }}</td>

            <td class="center">{{ $item->tahunterbit }}</td>

            <td class="center">{{ $item->stok }}</td>

            <td class="center">{{ ucfirst($item->status) }}</td>

        </tr>

        @empty

        <tr>
            <td colspan="8" class="center">
                Tidak ada data buku
            </td>
        </tr>

        @endforelse

    </tbody>

</table>

<br><br><br>

<table class="ttd">

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