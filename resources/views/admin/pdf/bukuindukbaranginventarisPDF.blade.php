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
                <th style='width:80px'>Nomor urut</th>
                <th style='width:140px'>Tanggal Pembukuan</th>
                <th style='width:120px'>Kode Barang</th>
                <th style='width:180px'>Nama Barang</th>
                <th style='width:180px'>Spesifikasi</th>
                <th style='width:100px'>Kuantitas</th>
                <th style='width:120px'>Nama Satuan</th>
                <th style='width:120px'>Tahun Pembuatan</th>
                <th style='width:120px'>Harga</th>
                <th style='width:180px'>Keterangan</th>
            </tr>
            @forelse ($bahans as $bahan)
                <tr align="center">
                    <td height="3%">
                        {{ $loop->iteration }}nana
                    </td>
                    <td>{{ $date }}</td>
                    <td>{{ $bahan->kode_bahan }}</td>
                    <td>{{ $bahan->nama_alat_atau_bahan }}</td>
                    <td>{{ $bahan->spesifikasi->merk }}, {{ $bahan->spesifikasi->tipe_atau_model }},
                        {{ $bahan->spesifikasi->dimensi }}</td>
                    <td>{{ $bahan->volume }}</td>
                    <td>{{ $bahan->satuan }}</td>
                    <td height="3%">{{ $bahan->spesifikasi->tahun }}</td>
                    <td>Rp {{ number_format($bahan->harga, 2, ',', '.') }}</td>
                    <td></td>
                </tr>
            @empty
                <tr>
                    <td colspan='12' align='center'></td>
                </tr>
            @endforelse
        </table>
    </div>
</body>

</html>
