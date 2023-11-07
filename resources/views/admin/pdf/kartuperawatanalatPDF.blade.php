<!DOCTYPE html>
<html>

<head>

    <title>Kartu Perawatan Alat</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
        .custom-thead {
            background-color: #d1d1d1;
            vertical-align: middle;
            /* Replace with your chosen secondary color */
            /* Replace with the text color you want to use */
        }

        .table-bordered.custom-table {
            border: 1px solid #000;
        }

        .table-bordered.custom-table th,
        .table-bordered.custom-table td {
            border: 1px solid #000;
        }
    </style>
</head>

<body
    style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif">
    <div class="container">
        <div class="table-responsive">
            <table class="table table-bordered custom-table">
                <thead class="custom-thead text-center">
                    <tr>
                        <th rowspan="2">NO</th>
                        <th rowspan="2">NAMA PETUGAS</th>
                        <th colspan="2" style="min-width: 85px">PERAWATAN/PERBAIKAN</th>
                        <th rowspan="2">Kondisi Alat</th>
                        <th rowspan="2">Tanda Tangan</th>
                    </tr>
                    <tr>
                        <th>Jenis</th>
                        <th>Kuku</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Jamal</td>
                        <td style="min-width: 85px">Perawatan Rutin</td>
                        <td style="min-width: 85px">kuku</td>
                        <td>Baik</td>
                        <td>sasa</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
