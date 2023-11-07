<!DOCTYPE html>
<html>

<head>

    <title>Kartu Pemeliharaan</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row mb-4 pb-4">
            <div class="col text-center">
                <h1>{{ $sekolah->nama_sekolah }}</h1>
            </div>
            <div class="col text-center">
                <h4>{{ $ruangan->nama_ruangan }}</h4>
            </div>
        </div>
        <h5>
            <div class="row">
                <div class="col">
                    <table>
                        <tr>
                            <td class="pb-3">
                                Kode P/M
                            </td>
                            <td class="pb-3">
                                : PM-0{{ $pemeliharaan->peralatan_id }}
                            </td>
                            <td class="pl-2 pb-3">Tanggal Mulai</td>
                            <td class="pb-3">: {{ $pemeliharaan->tanggal }}</td>
                        </tr>
                        <tr>
                            <td class="pb-3" colspan="2">Nama Peralatan/Mesin</td>
                            <td class="pb-3" colspan="2">: {{ $pemeliharaan->peralatan->nama_peralatan_atau_mesin }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </h5>
        <h5>
            <div class="row">
                <div class="col">
                    <table>
                        <tr>
                            <td class="pb-4">Status</td>
                            <td class="pb-4">: {{ $pemeliharaan->status }}</td>
                            <td class="pl-4 pb-4">Jenis Perawatan</td>
                            <td class="pb-4">: {{ $pemeliharaan->jenis }}</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-center pb-3">Keterangan</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-center">{{ $pemeliharaan->keterangan }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </h5>
    </div>
</body>

</html>
