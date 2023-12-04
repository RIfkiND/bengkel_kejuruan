<div>
    @if ($peralatans == 'kosong')
        <div class="login-form-bg h-100">
            <div class="container h-100">
                <div class="row justify-content-center h-100">
                    <div class="col-xl-6">
                        <div class="error-content">
                            <div class="card mb-0">
                                <div class="card-body text-center pt-5">
                                    <h1 class="error-text text-warning mt-5"><i class="fa fa-info-circle"></i></h1>

                                    <h1 class="my-5 text-warning text-wrap">Tambahkan Ruangan Untuk Bisa Mengatur Data
                                        Peralatan</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
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
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($peralatans as $peralatan)
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
                                                <td>{{ $peralatan->peralatankeluar->alasan_keluar }}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a href="javascript:void(0)" data-toggle="dropdown"><i
                                                                class="fa fa-ellipsis-v fa-lg"></i></a>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item text-success"
                                                                href="javascript:void(0)">Masuk Kembali
                                                            </a>
                                                        </div>
                                                    </div>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6">
                                                    <h1>Data Kosong</h1>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                {{ $peralatans->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
