<div>
    @if ($alats == 'kosong')
        <div class="login-form-bg h-100">
            <div class="container h-100">
                <div class="row justify-content-center h-100">
                    <div class="col-xl-6">
                        <div class="error-content">
                            <div class="card mb-0">
                                <div class="card-body text-center pt-5">
                                    <h1 class="error-text text-warning mt-5"><i class="fa fa-info-circle"></i></h1>

                                    <h1 class="my-5 text-warning text-wrap">Tambahkan Ruangan Untuk Bisa Mengatur Data
                                        Alat dan bahan</h1>
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
                        <div class="basic-form">
                            @if ($updateMode)
                                <form wire:submit.prevent="update">
                                    <div class="form-group">
                                        <h4 class="text-center">Edit Data Alat Atau Bahan</h4>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-4 mb-4">
                                                <input wire:model="nama_alat_atau_bahan" type="text"
                                                    class="form-control input-default"
                                                    placeholder="Nama Alat Atau Bahan">
                                                @error('nama_alat_atau_bahan')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-3 mb-4">
                                                <select wire:model="kode" class="form-control" id="kode">
                                                    <option value="" selected>JENIS</option>
                                                    <option value="A">Alat</option>
                                                    <option value="B">Bahan</option>
                                                </select>
                                                @error('kode')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-3 mb-4">
                                                <select wire:model="ruangan_id" class="form-control" id="ruangan">
                                                    <option value="" selected>Ruangan</option>
                                                    @foreach ($ruangans as $ruangan)
                                                        <option value="{{ $ruangan->id }}">{{ $ruangan->nama_ruangan }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('ruangan_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col">
                                                <div class="d-flex justify-content-end">
                                                    <div class="col-auto">
                                                        <button type="button" wire:click="cancel"
                                                            class="btn btn-secondary text-white">Batal</button>
                                                    </div>
                                                    <div class="col-auto">
                                                        <button type="submit" class="btn btn-primary">Simpan
                                                            Perubahan</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            @else
                                <form wire:submit.prevent="store">
                                    <div class="form-group">
                                        <h4 class="text-center">Tambahkan Alat Atau Bahan</h4>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6 mb-4">
                                                <input wire:model="nama_alat_atau_bahan" type="text"
                                                    class="form-control input-default"
                                                    placeholder="Nama Alat Atau Bahan">
                                                @error('nama_alat_atau_bahan')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col">
                                                <div class="d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label for="tanggal" class="col-md-auto col-form-label">Tanggal
                                                Masuk</label>
                                            <div class="col-lg-2 mb-4">
                                                <input wire:model="tanggal_masuk" type="date" id="tanggal"
                                                    class="form-control input-default">
                                                @error('tanggal_masuk')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-2 mb-4">
                                                <select wire:model="kode" class="form-control" id="kode">
                                                    <option value="" selected>JENIS</option>
                                                    <option value="A">Alat</option>
                                                    <option value="B">Bahan</option>
                                                </select>
                                                @error('kode')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-3 mb-4">
                                                <select wire:model="ruangan_id" class="form-control" id="ruangan">
                                                    <option value="" selected>Ruangan</option>
                                                    @foreach ($ruangans as $ruangan)
                                                        <option value="{{ $ruangan->id }}">
                                                            {{ $ruangan->nama_ruangan }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('ruangan_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <input wire:model="volume" type="text" id="volume"
                                                    class="form-control input-default" placeholder="Jumlah">
                                                @error('volume')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-3">
                                                <input wire:model="satuan" type="text" id="satuan"
                                                    class="form-control input-default" placeholder="Satuan">
                                                @error('satuan')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-3">
                                                <input wire:model="saldo" type="text" id="saldo"
                                                    class="form-control input-default" placeholder="Harga">
                                                @error('saldo')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-3">
                                                <input wire:model="sumber_dana" type="text" id="sumber_dana"
                                                    class="form-control input-default" placeholder="Sumber Dana">
                                                @error('sumber_dana')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <label>Spesifikasi</label>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-3 mb-4">
                                                <input wire:model="merk" type="text" id="spek"
                                                    class="form-control input-default" placeholder="Merk">
                                                @error('merk')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-3 mb-4">
                                                <input wire:model="type" type="text"
                                                    class="form-control input-default" placeholder="Type/Model">
                                                @error('type')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-3 mb-4">
                                                <input wire:model="dimensi" type="text"
                                                    class="form-control input-default" placeholder="Dimensi">
                                                @error('dimensi')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            @endif
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
                            <div class="col">
                                <div class="card-title">
                                    <h4>Daftar Alat dan Bahan</h4>
                                </div>
                            </div>
                            <div class="col d-flex justify-content-end px-4">
                                <div class="form-group">
                                    <input type="text" class="form-control input-rounded h-25" placeholder="Cari"
                                        wire:model='searchAlat' wire:input='resetPage'>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Kode Alat/Bahan</th>
                                            <th>Nama Alat/Bahan</th>
                                            <th>Spesifikasi</th>
                                            <th>Stock</th>
                                            <th>Saldo</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($alats as $alat)
                                            <tr>
                                                <td>AB-{{ $alat->id }}</td>
                                                <td>{{ $alat->nama_alat_atau_bahan }}</td>
                                                <td>
                                                    @if ($alat->spesifikasi)
                                                        <ul>
                                                            <li>
                                                                <i>
                                                                    Merk : {{ $alat->spesifikasi->merk }}
                                                                </i>
                                                            </li>
                                                            <li>
                                                                <i>
                                                                    Type/Model :
                                                                    {{ $alat->spesifikasi->tipe_atau_model }}
                                                                </i>
                                                            </li>
                                                            <li>
                                                                <i>
                                                                    Dimensi :
                                                                    {{ $alat->spesifikasi->dimensi }}
                                                                </i>
                                                            </li>
                                                        </ul>
                                                    @endif
                                                </td>
                                                <td>{{ $alat->volume }} {{ $alat->satuan }}</td>
                                                <td>Rp {{ number_format($alat->saldoalat(), 2, ',', '.') }}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a href="javascript:void(0)" data-toggle="dropdown"><i
                                                                class="fa fa-ellipsis-v fa-lg"></i></a>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="javascript:void(0)"
                                                                data-toggle="modal"
                                                                data-target="#ModalAlat">Informasi</a>
                                                            <a class="dropdown-item" href="javascript:void(0)"
                                                                data-toggle="modal"
                                                                data-target="#ModalAlat"
                                                                wire:click='onmas({{ $alat->id }})'>Tambah Stock</a>
                                                            <a class="dropdown-item" href="javascript:void(0)"
                                                                wire:click='edit({{ $alat->id }})'>Edit</a>
                                                            <a class="dropdown-item text-danger"
                                                                href="javascript:void(0)" data-toggle="modal"
                                                                data-target="#ModalAlat"
                                                                wire:click='onkel({{ $alat->id }})'>Keluar</a>
                                                            @if (auth()->user()->role == 'AdminSekolah' or auth()->user()->role == 'SuperAdmin')
                                                                <a class="dropdown-item text-danger"
                                                                    href="javascript:void(0)"
                                                                    wire:click='ondel({{ $alat->id }})'>Delete</a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
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
                    </div>
                </div>
            </div>
        </div>
    @endif


    {{-- modal --}}
    @include('livewire.admin.alat-bahan.daftar.modal')
</div>
