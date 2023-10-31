<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="card-title">
                                <h4>Daftar Peralatan Keluar</h4>
                            </div>
                        </div>
                        <div class="col d-flex justify-content-end px-4">
                            <div class="form-group">
                                <input type="text" class="form-control input-rounded h-25" placeholder="Cari"
                                    wire:model='searchPeralatan' wire:input='resetPage'>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Kode P/M</th>
                                        <th>Kategori P/M</th>
                                        <th>Nama Barang</th>
                                        <th>Spesifikasi</th>
                                        <th>Alasan Keluar</th>
                                        {{-- <th>Aksi</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($peralatans as $peralatan)
                                        <tr>
                                            <td>{{ $peralatan->peralatankeluar->tanggal_keluar }}</td>
                                            <td>PM-{{ $peralatan->id }}</td>
                                            <td>{{ $peralatan->kategori->nama_kategori }}</td>
                                            <td>{{ $peralatan->nama_peralatan_atau_mesin }}</td>
                                            <td>
                                                @if ($peralatan->spesifikasi)
                                                    <ul>
                                                        <li>Merk : {{ $peralatan->spesifikasi->merk }}
                                                        </li>
                                                        <li>Type/Model :
                                                            {{ $peralatan->spesifikasi->tipe_atau_model }}
                                                        </li>
                                                        <li>Tahun :
                                                            {{ $peralatan->spesifikasi->tahun }}</li>
                                                        <li>Kapasitas :
                                                            {{ $peralatan->spesifikasi->kapasitas }}
                                                        </li>
                                                    </ul>
                                                @endif
                                            </td>
                                            <td>{{ $peralatan->peralatankeluar->alasan }}</td>
                                            {{-- <td>
                                                <div class="dropdown">
                                                    <a href="#" data-toggle="dropdown"><i
                                                            class="fa fa-ellipsis-v fa-lg"></i></a>
                                                    <div class="dropdown-menu"><a class="dropdown-item"
                                                            href="#">Link
                                                            1</a> <a class="dropdown-item" href="#">Link 2</a> <a
                                                            class="dropdown-item" href="#">Link 3</a>
                                                    </div>
                                                </div>
                                            </td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
