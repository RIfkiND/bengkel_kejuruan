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
    <h2 align="center">KARTU STOK BAHAN </h2>
    <h2 align="center">{{ $ruangan->nama_ruangan }}</h2><br>
    <p>Nama Barang: {{ $bahans->nama_alat_atau_bahan }}</p>

    <table style="margin-right:2%; text-align:center;" border="1" cellpadding="10">
        <tr align="center" bgcolor="#e9e9e9">
            <th rowspan="2" style='width:80px'>Tanggal</th>
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
        @php
            $combinedEntries = $bahans->alatmasuk->concat($bahans->alatkeluar);
            $groupedEntries = $combinedEntries->groupBy(function ($entry) {
                return $entry->tanggal_masuk ?? $entry->tanggal_keluar;
            });
        @endphp

        @foreach ($groupedEntries as $tanggal => $entries)
            @php
                $totalVolumeMasuk = $bahans->alatmasuk->where('tanggal_masuk', $tanggal)->sum('volume');
                $totalVolumeKeluar = $bahans->alatkeluar->where('tanggal_keluar', $tanggal)->sum('volume');
            @endphp

            <tr align="left" valign="top">
                <td height="3%">{{ $tanggal }}</td>
                <td align="center">{{ $bahans->spesifikasi->merk }}, {{ $bahans->spesifikasi->tipe_atau_model }},
                    {{ $bahans->spesifikasi->dimensi }}</td>
                <td align="center"></td>
                <td align="center">{{ $totalVolumeMasuk }}</td>
                <td align="center">{{ $totalVolumeKeluar }}</td>
                <td align="center"> {{ $bahans->volume }}</td>
                <td align="center"></td>
            </tr>
        @endforeach


    </table>
</body>

</html>
