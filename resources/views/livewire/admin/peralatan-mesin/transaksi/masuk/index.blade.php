<div class="container-fluid pt-2">
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
            <div class="col-sm-6 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row justify-content-between">
                            <div class="col-7 pt-2">
                                <caption>Peralatan Masuk yang terdaftar</caption>
                            </div>
                            <div class="col-5">
                                <div class="d-flex align-items-center justify-content-end">
                                    <form class="me-2 d-none d-lg-block">
                                        <div class="customize-input">
                                            <input class="form-control custom-shadow border-2 bg-white" type="text"
                                                placeholder="Search" aria-label="Search" style="border-radius: 10px;"
                                                wire:model='searchPeralatan' wire:input='resetPage'>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-responsive">
                                    <thead>
                                        <tr>
                                            <th>Tanggal Masuk</th>
                                            <th>Kode P/M</th>
                                            <th>Kategori P/M</th>
                                            <th>Nama Barang</th>
                                            <th>Spesifikasi</th>
                                            <th>Sumber Dana</th>
                                            {{-- <th>Aksi</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($peralatans as $peralatan)
                                            <tr>
                                                <td>{{ $peralatan->peralatanmasuk->tanggal_masuk }}</td>
                                                <td>{{ $peralatan->kode_peralatan }}</td>
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
                                                <td>{{ $peralatan->peralatanmasuk->sumber_dana }}</td>
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
