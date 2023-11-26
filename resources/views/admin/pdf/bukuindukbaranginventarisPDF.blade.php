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
    <div class="container">
        <h2 align="center">{{ $sekolah->nama_sekolah }}</h2>
        <h2 align="center">BUKU INDUK BAHAN INVENTARIS</h2>
        <h3 align="center">{{ $ruangan->nama_ruangan }}</h3>

        <table style="margin-right:2%; text-align:center;" border="1" cellpadding="7">
            <tr align="center" bgcolor="#e9e9e9">
                <th style='width:50px'>Nomor urut</th>
                <th style='width:90px'>Tanggal Pembukuan</th>
                <th style='width:120px'>Kode Barang</th>
                <th style='width:150px'>Nama Barang</th>
                <th style='width:100px'>Spesifikasi</th>
                <th style='width:100px'>Kuantitas</th>
                <th style='width:90px'>Nama Satuan</th>
                <th style='width:90px'>Tahun Pembuatan</th>
                <th style='width:120px'>Asal Barang</th>
                <th style='width:110px'>Keadaan Barang</th>
                <th style='width:120px'>Harga</th>
                <th style='width:180px'>Keterangan</th>
            </tr>
            @foreach ($bahans as $bahan)
                <tr align="center">
                    <td height="3%">
                        {{ $loop->iteration }}
                    </td>
                    <td>{{ $date }}</td>
                    <td>sdsk</td>
                    <td>{{ $bahan->nama_alat_atau_bahan }}</td>
                    <td>{{ $bahan->spesifikasi->merk }}, {{ $bahan->spesifikasi->tipe_atau_model }},
                        {{ $bahan->spesifikasi->dimensi }}</td>
                    <td>{{ $bahan->volume }}</td>
                    <td>{{ $bahan->satuan }}</td>
                    <td height="3%"></td>
                    <td></td>
                    <td></td>
                    <td>Rp {{ number_format($bahan->saldo, 2, ',', '.') }}</td>
                    <td></td>
                </tr>
            @endforeach
        </table>
    </div>
</body>

</html>
