<html>

<head>
    <style>
        table {
            border-collapse: collapse;
            border-color: black;
        }

        .tab3 {
            display: inline-block;
            margin-left: 30px;
        }

        .tab5 {
            display: inline-block;
            margin-left: 67px;
        }
    </style>
</head>

<body>
    <table style="margin-left:12%; margin-right:auto; text-align:center;" cellpadding="6">
        <tr>
            <td rowspan="4"><img src="Asset/images/logo-tutwuri-handayani.jpg" width="65px" height="65px"></td>
            <td></td>
        </tr>
        <tr align="center">
            <th style='width:725px'>{{ $sekolah->nama_sekolah }}</th>
        </tr>
        <tr align="center; color:red;">
            <td>Jl.Pesantren KM 2 Cimahi 40513 Tlp. (022) 6652326 Fax (022) 6654698</td>
        </tr>
    </table>

    <table border="1" cellpadding="10">
        <tr>
            <td colspan="3" align="right" style='width:800px'></td>
            <td style='width:200px'>No :<br>Tanggal: {{ $date }}</td>
        </tr>
        <tr>
            <th colspan="4" align="center" style='width:800px' bgcolor="#9ec5f2">KARTU PEMINJAMAN ALAT</th>
        </tr>
        <tr>
            <td colspan="4">Nama Peminjam<span class="tab3"></span>: {{ $peminjaman->guru->nama_guru }} (
                {{ $peminjaman->kelas->nama_kelas }} )</td>
        </tr>
        <tr>
            <td colspan="4">Unit Kerja<span class="tab5"></span>:</td>
        </tr>
        <tr>
            <td colspan="4">Alat yang dipinjam :</td>
        </tr>
        <tr>
            <td colspan="2">1. {{ $peminjaman->peralatan->nama_peralatan_atau_mesin }}</td>
            <td colspan="2">4. </td>
        </tr>
        <tr>
            <td colspan="2">2. </td>
            <td colspan="2">5. </td>
        </tr>
        <tr>
            <td colspan="2">3. </td>
            <td colspan="2">6. </td>
        </tr>
        <tr>
            <td colspan="4">Lama Peminjaman : {{ \Carbon\Carbon::parse($peminjaman->waktu_awal)->format('H:i') }} -
                {{ \Carbon\Carbon::parse($peminjaman->waktu_akhir)->format('H:i') }}</td>
        </tr>
        <tr>
            <td colspan="4" height="7%" valign="top">Tujuan :</td>
        </tr>
        <tr>
            <td style='width:350px' height="5%" valign="top">Dipinjam :</td>
            <td style='width:200px'colspan="2" height="5%" valign="top">Tanggal: {{ $date }}</td>
            <td style='width:350px' height="5%" valign="top">Pukul : {{ \Carbon\Carbon::parse($peminjaman->waktu_awal)->format('H:i') }}</td>
        </tr>
        <tr>
            <td colspan="2" align="center">Diketahui
                oleh,<br><br><br><br><br>.......................................................<br>(Penanggungjawab
                Alat)</td>
            <td colspan="2" align="center">Pemohon,<br><br><br><br><br>........................................</td>
        </tr>
        <tr>
            <td style='width:350px' height="5%" valign="top">Dikembalikan :</td>
            <td style='width:200px'colspan="2" height="5%" valign="top">Tanggal: </td>
            <td style='width:350px' height="5%" valign="top">Pukul :  {{ \Carbon\Carbon::parse($peminjaman->waktu_akhir)->format('H:i') }}</td>
        </tr>
        <tr>
            <td colspan="2" align="center">Diterima
                oleh,<br><br><br><br><br>.......................................................</td>
            <td colspan="2" align="center">Yang
                Mengembalikan,<br><br><br><br><br>........................................</td>
        </tr>
        <tr>
            <td colspan="4"><i>Catatan :<br>1. Peminjam harus menanggung resiko atas kerusakan alat;<br>2.
                    Pengembalian alat harus dalam keadaan baik.</i></td>
        </tr>
    </table>
</body>

</html>
