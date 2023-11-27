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
                <th style='width:725px'>{{ $sekolah->nama_sekolah}}</th>
            </tr>
            <tr align="center;" style='font-size:14px'>
                <td>Jl.Pesantren KM 2 Cimahi 40513 Tlp. (022) 6652326 Fax (022) 6654698</td>
            </tr>
        </table>
        <hr>
        <table border="0" style=" margin-right:auto; text-align:center;" cellpadding="6" width="100%">
            <tr align="center;">
                <td style='font-size:18px;'><b>BUKU PEMELIHARAAN PERALATAN</b></td>
            </tr>
            
            <tr align="left">
                <td colspan="6" >Unit Kerja :</td>
            </tr>
            <tr align="left">
                <td colspan="6" >Ruang : {{ $ruangan->nama_ruangan }}</td>
            </tr>
        </table>
        <table border="1" cellpadding="4" width="100%">
            <tr >
                <th>No.</th>
                <th>Nama Alat</th>
                <th>Keadaan yang Dikehendaki</th>
                <th>Pelaksanaan Pemeliharaan</th>
            </tr>
            @foreach ($pemeliharaans as $pemeliharaan)
            <tr>
                <td>{{ loop->iteration }}</td>
                <td>{{ $pemeliharaan->peralatan->nama_peralatan_atau_mesin }}</td>
                <td></td>
                <td></td>
            </tr>
            @endforeach
        </table>
        <br>
        <table  width='100%' cellspacing='0' cellpadding='2'>
      <tr>
        <td width='33%' valign='top' style='font-size:13px;'>Mengetahui,<br/>
            Kepala Departemen<br>
            <br>
            <br>
            <br>
            <br>
            ................................. <br>
            NIP ..........................
        </td>
        <td valign='top' width='34%' align='right' style='font-size:13px;'>Cimahi, .............................2016<br/> 
            Kepala Bengkel.........................<br/> 
            <br/>   
            <br/> 
            <br/> 
            <br/> 
            ................................................ <br>
            NIP .........................................
        </td>
      </tr>
    </table>
    </body>
</html>