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
            margin-left: 14px;
        }

        .tab3 {
            display: inline-block;
            margin-left: 65px;
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
    <hr>
    <table border="0" style=" margin-right:auto; text-align:center;" cellpadding="6" width="100%">
        <tr align="center;" class="">
            <td style='font-size:18px;'><b>KARTU PERAWATAN ALAT</b></td>
        </tr>
    </table>
    <table border="0" style=" margin-right:auto; text-align:center;" cellpadding="6" width="100%">
        <tr align="left">
            <td colspan="6">Bengkel :{{ $ruangan->nama_ruangan }}</td>
        </tr>
        <tr align="left">
            <td colspan="6">Nama Alat : {{ $peralatan->nama_peralatan_atau_mesin }}</td>
        </tr>
    </table>
    <table border="1" cellpadding="4" width="100%">
        <tr>
            <th rowspan="2">No.</th>
            <th rowspan="2">Nama Petugas</th>
            <th colspan="2">Perawatan/Perbaikan</th>
            <th rowspan="2">Kondisi ALat</th>
            <th rowspan="2">Tanda Tangan</th>
        </tr>
        <tr>
            <th>Jenis</th>
            <th>Tanggal</th>
        </tr>
        @forelse ($pemeliharaans as $pemeliharaan)
            <tr>
                <td align="center">{{ $loop->iteration }}</td>
                <td>{{ $pemeliharaan->petugas }}</td>
                <td>{{ $pemeliharaan->jenis }}</td>
                <td>{{ $pemeliharaan->tanggal }}</td>
                <td>{{ $pemeliharaan->peralatan->kondisi }}</td>
                <td></td>
            </tr>
        @empty
            <tr>
                <td colspan='7' align='center'></td>
            </tr>
        @endforelse
    </table>
    <br>
    <table width='100%' cellspacing='0' cellpadding='2'>
        <tr>
            <td valign='top' width='34%' align='right' style='font-size:13px;'>Cimahi,
                ....................................2016 <br>
                Kepala .............................................<br />
                <br />
                <br />
                <br />
                <br />
                ......................................................... <br>
            </td>
        </tr>
    </table>
</body>

</html>
