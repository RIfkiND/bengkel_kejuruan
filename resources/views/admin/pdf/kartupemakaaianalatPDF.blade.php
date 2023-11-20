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
            <td rowspan="4"><img src="/Asset/images/logo-tutwuri-handayani.jpg"></td>
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
        <tr align="center;">
            <td style='font-size:18px;'><b>KARTU PEMAKAIAN ALAT</b></td>
        </tr>

        <tr align="left">
            <td colspan="6">Bengkel<span class="tab3">: {{ $ruangan->nama_ruangan }}</span><br>Nama Alat/Media :
                {{ $peralatan->nama_peralatan_atau_mesin }}</td>
        </tr>
    </table>
    <table border="1" cellpadding="4" width="100%">
        <tr>
            <th rowspan="2">No.</th>
            <th rowspan="2">Nama Pemakai</th>
            <th colspan="3">Waktu Pemakaian</th>
            <th rowspan="2">Kondisi ALat</th>
            <th rowspan="2">Tanda Tangan</th>
        </tr>
        <tr>
            <th>Tanggal</th>
            <th>Jam Mulai</th>
            <th>Jam Selesai</th>
        </tr>
        @foreach ($pemakais as $pemakai)
            <tr>
                <td>
                    {{ $loop->iteration }}
                </td>
                <td>
                    {{ $pemakai->guru->nama_guru }} dengan ( {{ $pemakai->kelas->nama_kelas }} )
                </td>
                <td>
                    {{ $pemakai->tanggal_pemakaian }}
                </td>
                <td>
                    {{ $pemakai->waktu_awal }}
                </td>
                <td>
                    {{ $pemakai->waktu_akhir }}
                </td>
                <td>
                    {{ $pemakai->peralatan->keadaan }}
                </td>
                <td>

                </td>
            </tr>
        @endforeach
    </table>
    <br>
    <table width='100%' cellspacing='0' cellpadding='2'>
        <tr>
            <td valign='top' width='34%' align='right' style='font-size:13px;'> Kepala
                Departemen.........................<br />
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
