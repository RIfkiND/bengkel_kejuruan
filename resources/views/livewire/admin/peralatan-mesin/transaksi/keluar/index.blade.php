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
                                <caption>Peralatan Keluar yang terdaftar</caption>
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
                                                    <a class="dropdown-toggle pl-md-3 position-relative"
                                                        href="javascript:void(0)" data-bs-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" a href="javascript:void(0)"
                                                            data-bs-toggle="modal" data-bs-target="#ModalAlatKeluar"
                                                            wire:click='onkembali($peralatan->peralatankeluar->id)'><i
                                                                class="fas fa-pencil-alt text-info"></i><span
                                                                class="text-info">
                                                                Masuk Kembali</span></a>
                                                    </div>
                                                </td>
                                                {{-- Modal --}}
                                                <div class="modal fade" id="ModalAlatKeluar" tabindex="-1"
                                                    role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content" style="border-radius: 10px">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Masukkan Kembali Peralatan
                                                                    Keluar</h4>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close">
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label>Tanggal Masuk</label>
                                                                    <input type="date" id="tanggal_masuk_kembali"
                                                                        class="form-control input-default"
                                                                        wire:model='tanggal_masuk'>
                                                                    @error('tanggal_masuk')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Batal</button>
                                                                <button type="button" class="btn btn-primary"
                                                                    data-bs-dismiss="modal"
                                                                    wire:click.prevent="kembali()">Simpan</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7">
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
