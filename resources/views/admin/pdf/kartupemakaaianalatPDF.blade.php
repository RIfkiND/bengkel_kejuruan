<!DOCTYPE html>
<html>

<head>

    <title>Kartu Peraltan</title>

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
            <div class="row mb-4 justify-content-center">
                <div class="col-md-auto">
                    <table>
                        <tr>
                            <td>
                                Kode P/M
                            </td>
                            <td>
                                : PM-0{{ $peralatan->id }}
                            </td>
                        </tr>
                        <tr>
                            <td>Nama Peralatan/Mesin</td>
                            <td>: {{ $peralatan->nama_peralatan_atau_mesin }}</td>
                        </tr>
                        <tr>
                            <td>Spesifikasi</td>
                            <td>:</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>- {{ $peralatan->spesifikasi->merk }}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>- {{ $peralatan->spesifikasi->tipe_atau_model }}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>- {{ $peralatan->spesifikasi->kapasitas }}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>- {{ $peralatan->spesifikasi->tahun }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </h5>
        <h5>
            <div class="row">
                <div class="col">Tanggal Masuk: <span
                        class="pl-4">{{ $peralatan->peralatanmasuk->tanggal_masuk }}</span></div>
            </div>
        </h5>
    </div>
</body>

</html>
