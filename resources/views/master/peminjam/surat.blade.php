<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">

    <title>
        Surat Anggota Perpustakaan
    </title>

    <style>

        body{
            font-family: Arial, Helvetica, sans-serif;
            margin:40px;
            color:#000;
        }

        .header{
            text-align:center;
        }

        .header h2{
            margin:0;
        }

        .header h3{
            margin:5px 0;
        }

        hr{
            border:1px solid #000;
        }

        table{
            width:100%;
            margin-top:20px;
        }

        td{
            padding:8px;
        }

        .ttd{
            width:300px;
            float:right;
            text-align:center;
            margin-top:50px;
        }

        .foto{
            width:120px;
            height:150px;
            object-fit:cover;
            border:1px solid #ccc;
        }

    </style>

</head>

<body onload="window.print()">

<div class="header">

    <h2>PERPUSTAKAAN DIGITAL</h2>

    <h3>SURAT KETERANGAN ANGGOTA</h3>

    <hr>

</div>

<br>

<p>
    Yang bertanda tangan di bawah ini menerangkan bahwa:
</p>

<table border="0">

    <tr>

        <td width="220">
            Nama Lengkap
        </td>

        <td>
            : {{ $peminjam->namapeminjam }}
        </td>

    </tr>

    <tr>

        <td>
            Username
        </td>

        <td>
            : {{ $peminjam->username }}
        </td>

    </tr>

    <tr>

        <td>
            Nomor HP
        </td>

        <td>
            : {{ $peminjam->nomorhp }}
        </td>

    </tr>

    <tr>

        <td>
            Jenis Peminjam
        </td>

        <td>
            : {{ ucfirst($peminjam->jenis_peminjam) }}
        </td>

    </tr>

    <tr>

        <td>
            Status
        </td>

        <td>
            : {{ strtoupper($peminjam->status) }}
        </td>

    </tr>

</table>

<br>

@if($peminjam->foto)

<img
src="{{ asset('fotoupload/peminjam/'.$peminjam->foto) }}"
class="foto">

@endif

<br><br>

<p style="text-align:justify">

    Dengan ini diterangkan bahwa nama tersebut di atas
    merupakan anggota aktif Perpustakaan Digital dan
    berhak menggunakan seluruh fasilitas layanan
    perpustakaan sesuai dengan peraturan yang berlaku.

</p>

<div class="ttd">

    <p>
        {{ date('d F Y') }}
    </p>

    <br><br><br><br>

    <b>
        Kepala Perpustakaan
    </b>

</div>

</body>
</html>