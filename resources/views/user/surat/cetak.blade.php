<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Cetak Surat Bebas Perpustakaan</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
        }

        .center {
            text-align: center;
        }

        .line {
            border-bottom: 2px solid #000;
            margin: 10px 0;
        }

        table {
            width: 100%;
        }

        .ttd {
            margin-top: 60px;
        }
    </style>
</head>

<body onload="window.print()">

    <div class="center">
        <h3>SURAT BEBAS PERPUSTAKAAN</h3>
        <h4>PERPUSTAKAAN SEKOLAH</h4>
    </div>

    <div class="line"></div>

    <p>Nomor Surat: <b>{{ $surat->nomor_surat }}</b></p>
    <p>Tanggal: {{ $surat->tanggal_cetak->format('d F Y') }}</p>

    <br>

    <p>
        Yang bertanda tangan di bawah ini menerangkan bahwa:
    </p>

    <table>
        <tr>
            <td width="200">Nama</td>
            <td>: {{ $surat->peminjam->namapeminjam }}</td>
        </tr>

        <tr>
            <td>Alamat</td>
            <td>: {{ $surat->peminjam->alamat }}</td>
        </tr>

        <tr>
            <td>Status</td>
            <td>: <b>BEBAS PERPUSTAKAAN</b></td>
        </tr>
    </table>

    <br>

    <p>
        Dengan ini dinyatakan bahwa yang bersangkutan tidak memiliki pinjaman buku
        dan telah menyelesaikan semua kewajiban di perpustakaan.
    </p>

    <div class="ttd">

        <table>
            <tr>
                <td></td>
                <td class="center">
                    Karang Baru, {{ date('d F Y') }}<br>
                    Kepala Perpustakaan
                </td>
            </tr>

            <tr>
                <td height="80"></td>
                <td></td>
            </tr>

            <tr>
                <td></td>
                <td class="center">
                    <b>Zulkifli NG, S.Pd</b><br>
                    NIP. 19860505 201403 1 003
                </td>
            </tr>
        </table>

    </div>

</body>

</html>