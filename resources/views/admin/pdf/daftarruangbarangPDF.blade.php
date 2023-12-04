<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            border-collapse: collapse;
            border-color: black;
        }

        .tab2 {
            display: inline-block;
            margin-left: 7px;
        }

        .tab3 {
            display: inline-block;
            margin-left: 30px;
        }
    </style>
</head>

<body>
    <table style="margin-left:8%; margin-right:auto; text-align:center;" cellpadding="6">
        <tr>
            <td rowspan="4"><img src="Asset/images/logo-tutwuri-handayani.jpg" width="65px" height="65px"></td>
            <td></td>
        </tr>
        <tr align="center">
            <th style='width:725px'>{{ $sekolah->nama_sekolah }}</th>
        </tr>
        <tr align="center; color:red; mb-4">
            <td>Jl.Pesantren KM 2 Cimahi 40513 Tlp. (022) 6652326 Fax (022) 6654698</td>
        </tr>
        <p align="center"><b>DAFTAR RUANG BARANG (DBR)</b></p>

    </table>
    <table border="0">
        <tr>
            <td colspan="6">Tanggal : {{ $date }}</td>
        </tr>
        <tr>
            <td colspan="6">Ruang : {{ $ruangan->nama_ruangan }}</td>
        </tr>
    </table>
    <table border="1" cellpadding="4" width="100%">
        <tr style='font-size:14px;'>
            <th rowspan="2">No.</th>
            <th width="9%" rowspan="2">Nama Barang</th>
            <th rowspan="2">Merek</th>
            <th rowspan="2">Type/Model</th>
            <th rowspan="2">Tahun Pembuatan</th>
            <th rowspan="2">Kapasitas</th>
            <th rowspan="2">Nomor Kode Barang</th>
            <th rowspan="2">Harga Satuan</th>
            <th colspan="2">Keadaan Barang</th>
            <th rowspan="2">Keterangan</th>
        </tr>
        <tr style='font-size:13px;'>
            <th>Pemeliharaan</th>
            <th>Siap Digunakan</th>
        </tr>
        @forelse ($peralatans as $peralatan)
            <tr>
                <td align="center">{{ $loop->iteration }}</td>
                <td>{{ $peralatan->nama_peralatan_atau_mesin }}</td>
                <td align="center">{{ $peralatan->spesifikasi->merk }}</td>
                <td align="center">{{ $peralatan->spesifikasi->tipe_atau_model }}</td>
                <td align="center">{{ $peralatan->spesifikasi->tahun }}</td>
                <td align="center">{{ $peralatan->spesifikasi->kapasitas }}</td>
                <td align="center">{{ $peralatan->kode_peralatan }}</td>
                <td align="center">Rp {{ number_format($peralatan->harga, 2, ',', '.') }}</td>
                @php
                    $latestPemeliharaan = $peralatan->pemeliharaan->sortByDesc('created_at')->first();
                @endphp
                @if ($latestPemeliharaan && $latestPemeliharaan->status == 'Belum Selesai')
                    <td align="center">X</td>
                    <td></td>
                @else
                    <td></td>
                    <td align="center">X</td>
                @endif
                <td></td>
            </tr>
        @empty
            <tr>
                <td colspan='13' align='center'></td>
            </tr>
        @endforelse
    </table>
    <br>
    <table>
        <tr>style='width:800px'
        <td></td>
        <td style='font-size:13px;'>Cimahi, ...............................2016<br>Kepala Departemen MKE</td>
        </tr>
        <tr>
            <td></td>
            <td style='font-size:13px;'><br><br><br><br><br>Drs. Sumarsono, MM<br>NIP 19610615 198503 1 004</td>
        </tr>
    </table>
</body>

</html>
