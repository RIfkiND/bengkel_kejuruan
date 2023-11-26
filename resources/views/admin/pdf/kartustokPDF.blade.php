<!DOCTYPE html>
<html>
<head>
        <style>
            table {
                border-collapse: collapse;
                border-color: black;
            }
        </style>
    </head>
    <body>

        <h2 align="center">{{ $sekolah->nama_sekolah }}</h2>
        <h2 align="center">KARTU STOK BARANG  </h2>
        <h2 align="center">{{ $ruangan->nama_ruangan }}</h2><br>
        <p>Nama Barang:</p>

        <table style="margin-right:2%; text-align:center;" border="1" cellpadding="10">
            <tr align="center" bgcolor="#e9e9e9">
                <th rowspan="2" style='width:70px'>Tanggal</th>
                <th rowspan="2" style='width:270px'>Deskripsi/Spesifikasi</th>
                <th rowspan="2" style='width:90px'>Harga/Unit</th>
                <th colspan="2" style='width:170px'>Keluar masuk barang</th>
                <th rowspan="2" style='width:50px'>Sisa</th>
                <th rowspan="2" style='width:250px'>Keterangan</th>
            </tr>
            <tr align="center" bgcolor="#e9e9e9">
                <th style='width:80px'>Masuk</th>
                <th style='width:80px'>Keluar</th>
            </tr>
            @foreach ($bahans as $bahan)
            <tr align="left" valign="top">
                <td height="3%">{{ $date }}</td>
                <td>1,2,3</td>
                <td align="center"></td>
                <td></td>
                <td></td>
                <td align="center"></td>
                <td></td>
            </tr>
            @endforeach
        </table>
    </body>
</html>