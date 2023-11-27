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
        <tr align="center;" style='font-size:14px'>
            <td>Jl.Pesantren KM 2 Cimahi 40513 Tlp. (022) 6652326 Fax (022) 6654698</td>
        </tr>
    </table>

    <table border="1" width="100%">
        <tr>
            <td>
                <table border="0" style=" margin-right:auto; text-align:center;" cellpadding="6" width="100%">
                    <tr align="center;">
                        <td style='font-size:18px;'><b>DAFTAR INVENTARIS ALAT/MESIN</b></td>
                    </tr>
                    <tr align="center;">
                        <td style='font-size:16px;'>Departemen</td>
                    </tr>
                    <tr align="left">
                        <td>Laboratorium / Bengkel: {{ $ruangan->nama_ruangan }}</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table border="1" cellpadding="4" width="100%">
                    <tr>
                        <th rowspan="2">No.</th>
                        <th rowspan="2">Nomor Inventaris</th>
                        <th rowspan="2">Nama Alat</th>
                        <th rowspan="2">Spesifikasi</th>
                        <th rowspan="2">Jumlah</th>
                        <th colspan="2">Keadaan Alat</th>
                    </tr>
                    <tr>
                        <th>Sedang</th>
                        <th>Baik</th>
                    </tr>
                    @foreach ($peralatans as $peralatan)
                        <tr>
                            <td align="center">{{ $loop->iteration }}</td>
                            <td></td>
                            <td>{{ $peralatan->nama_peralatan_atau_mesin }}</td>
                            <td>{{ $peralatan->spesifikasi->merk }}, {{ $peralatan->spesifikasi->tipe_atau_model }},
                                {{ $peralatan->spesifikasi->tahun }}, {{ $peralatan->spesifikasi->kapasitas }}</td>
                            <td></td>
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
                        </tr>
                    @endforeach
                </table>
            </td>
        </tr>
    </table>
    <br>
    <table width='100%' cellspacing='0' cellpadding='2'>
        <tr>
            <td width='33%' valign='top' style='font-size:13px;'>Mengetahui,<br />
                Kepala Departemen<br>
                <br>
                <br>
                <br>
                <br>
                ................................. <br>
            </td>
            <td valign='top' width='34%' align='right' style='font-size:13px;'>Cimahi,
                .............................<br />
                Kepala Bengkel/Laboratorium<br />
                <br />
                <br />
                <br />
                <br />
                ................................................
            </td>
        </tr>
    </table>
</body>

</html>
