<div class="container-fluid pt-2">
    <div class="row">
        <div class="col-sm-6 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="col-5 pt-2">
                            <caption>Alat Bahan yang terdaftar</caption>
                        </div>
                        <div class="col-7">
                            <div class="d-flex align-items-center justify-content-end">
                                <form class="me-2 d-none d-lg-block">
                                    <div class="customize-input">
                                        <input class="form-control custom-shadow border-2 bg-white" type="text"
                                            placeholder="Search" aria-label="Search" style="border-radius: 10px;"
                                            wire:model='searchAlat' wire:input='resetPage'>
                                    </div>
                                </form>
                                <div class="customize-input float-end ms-2">
                                    <button class="btn btn-primary" style="border-radius: 10px;" data-bs-toggle="modal"
                                        data-bs-target="#ModalTambahAlat">Tambah
                                    </button>
                                </div>
                                @if (auth()->user()->ruangan_id)
                                    <div class="customize-input float-end ms-2">
                                        <a class="btn btn-success" type="button" style="border-radius: 10px" target="_blank"
                                            href="{{ route('print.bukuindukbaranginventaris', ['id' => auth()->user()->ruangan_id]) }}"><i
                                                class="fas fa-print"></i>
                                            Print
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
        <div wire:ignore.self class="modal fade" id="ModalEditAlat" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content" style="border-radius: 10px;">
                    <form wire:submit.prevent="update">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Data Alat Atau Bahan
                            </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-body mb-4">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6 mb-4">
                                            <input wire:model="nama_alat_atau_bahan" type="text"
                                                class="form-control input-default" placeholder="Nama Alat Atau Bahan">
                                            @error('nama_alat_atau_bahan')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-lg-2 mb-4">
                                            <select wire:model="kode" class="form-select" id="kode">
                                                <option value="" selected>JENIS</option>
                                                <option value="A">Alat</option>
                                                <option value="B">Bahan</option>
                                            </select>
                                            @error('kode')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-3 mb-4">
                                            <select wire:model="ruangan_id" class="form-select" id="ruangan">
                                                <option value="">Ruangan</option>
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
                                        <div class="col-lg-3 mb-4">
                                            <input wire:model='kode_bahan' type="text"
                                                class="form-control input-default" placeholder="Kode Alat atau Bahan">
                                            @error('kode_bahan')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-lg-3">
                                            <input wire:model="satuan" type="text" id="satuan"
                                                class="form-control input-default" placeholder="Satuan">
                                            @error('satuan')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-3">
                                            <input wire:model="harga" type="text" class="form-control input-default"
                                                placeholder="Harga Satuan">
                                            @error('harga')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <label>Spesifikasi</label>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <input wire:model="merk" type="text" id="spek"
                                                class="form-control input-default" placeholder="Merk">
                                            @error('merk')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-3">
                                            <input wire:model="type" type="text"
                                                class="form-control input-default" placeholder="Type/Model">
                                            @error('type')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-3">
                                            <input wire:model="dimensi" type="text"
                                                class="form-control input-default" placeholder="Dimensi">
                                            @error('dimensi')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-3">
                                            <input type="text" class="form-control" placeholder="Tahun dibuat"
                                                id="mdate" wire:model='tahun'>
                                            @error('tahun')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="text-end">
                                    <button type="reset" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Simpan
                                        Perubahan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div wire:ignore.self class="modal fade" id="ModalTambahAlat" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content" style="border-radius: 10px;">
                    <form wire:submit.prevent="store">
                        <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLabel">Tambah Alat Atau Bahan</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-body">
                                <label class="form-label">Tanggal Masuk </label>
                                <div class="row mb-4">
                                    <div class="col-md-3">
                                        <div class="form-group mb-3">
                                            <input wire:model="tanggal_masuk" type="date" class="form-control"
                                                id="tanggal">
                                            @error('tanggal_masuk')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <input wire:model="nama_alat_atau_bahan" type="text"
                                                class="form-control" placeholder="Nama Alat Atau Bahan">
                                            @error('nama_alat_atau_bahan')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group mb-3">
                                            <select wire:model="ruangan_id" class="form-select mr-sm-2"
                                                id="ruangan">
                                                <option selected>Ruangan</option>
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
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group mb-3">
                                            <input wire:model='kode_bahan' type="text" class="form-control"
                                                placeholder="Kode Alat Atau Bahan">
                                            @error('kode_bahan')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group mb-3">
                                            <select wire:model="kode" class="form-select mr-sm-2" id="category">
                                                <option value="" selected>JENIS</option>
                                                <option value="A">Alat</option>
                                                <option value="B">Bahan</option>
                                            </select>
                                            @error('kode')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group mb-3">
                                            <input wire:model="sumber_dana" type="text" class="form-control"
                                                placeholder="Sumber Dana" id="sumber_dana">
                                            @error('sumber_dana')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group mb-3">
                                            <input wire:model='satuan' type="text" class="form-control"
                                                placeholder="Satuan">
                                            @error('satuan')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <label class="form-label">Spesifikasi</label>
                                <div class="row mb-4">
                                    <div class="col-md-3">
                                        <div class="form-group mb-3">
                                            <input wire:model="merk" type="text" class="form-control"
                                                placeholder="Merk">
                                            @error('merk')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group mb-3">
                                            <input wire:model="type" type="text" class="form-control"
                                                placeholder="Type/Model">
                                            @error('type')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group mb-3">
                                            <input wire:model="dimensi" type="text" class="form-control"
                                                placeholder="Dimensi">
                                            @error('dimensi')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group mb-3">
                                            <input wire:model="tahun" type="text" class="form-control"
                                                placeholder="Tahun Dibuat">
                                            @error('tahun')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-3">
                                        <div class="form-group mb-3">
                                            <input wire:model="harga" type="text"
                                                class="form-control input-default" placeholder="Harga Satuan"
                                                wire:input='calculateTotalHarga()'>
                                            @error('harga')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group mb-3">
                                            <input wire:model="volume" type="text" id="volume"
                                                class="form-control input-default" placeholder="Jumlah"
                                                wire:input='calculateTotalHarga()'>
                                            @error('volume')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-1 d-flex justify-content-end">
                                        <label for="saldo" class="text-center">Rp
                                        </label>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group mb-3">
                                            <input wire:model="saldo" type="text" id="saldo" disabled
                                                class="form-control input-default" placeholder="Total Harga">
                                            @error('saldo')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="text-end">
                                    <button type="reset" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </div>
                            </div>
                        </div>
                    </form>
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
                                            <th>Kode Alat/Bahan</th>
                                            <th>Nama Alat/Bahan</th>
                                            <th>Spesifikasi</th>
                                            <th>Stock </th>
                                            <th>Saldo</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($alats as $alat)
                                            <tr>
                                                <td>
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        data-bs-target="#ModalAlat"
                                                        wire:click='history({{ $alat->id }})'
                                                        style="color: black; text-decoration: none;"
                                                        onmouseover="this.style.color='gray'"
                                                        onmouseout="this.style.color='black'">
                                                        {{ $alat->kode_bahan }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        data-bs-target="#ModalAlat"
                                                        wire:click='history({{ $alat->id }})'
                                                        style="color: black; text-decoration: none;"
                                                        onmouseover="this.style.color='gray'"
                                                        onmouseout="this.style.color='black'">
                                                        {{ $alat->nama_alat_atau_bahan }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        data-bs-target="#ModalAlat"
                                                        wire:click='history({{ $alat->id }})'
                                                        style="color: black; text-decoration: none;"
                                                        onmouseover="this.style.color='gray'"
                                                        onmouseout="this.style.color='black'">
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
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        data-bs-target="#ModalAlat"
                                                        wire:click='history({{ $alat->id }})'
                                                        style="color: black; text-decoration: none;"
                                                        onmouseover="this.style.color='gray'"
                                                        onmouseout="this.style.color='black'">
                                                        {{ $alat->volume }} {{ $alat->satuan }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        data-bs-target="#ModalAlat"
                                                        wire:click='history({{ $alat->id }})'
                                                        style="color: black; text-decoration: none;"
                                                        onmouseover="this.style.color='gray'"
                                                        onmouseout="this.style.color='black'">
                                                        Rp {{ number_format($alat->saldoalat(), 2, ',', '.') }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0)" data-bs-toggle="dropdown"><i
                                                            class="fa fa-ellipsis-v fa-lg"></i></a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="javascript:void(0)"
                                                            data-bs-toggle="modal" data-bs-target="#ModalAlat"
                                                            wire:click='onmas({{ $alat->id }})'>Tambah
                                                            Stock</a>
                                                        <a class="dropdown-item" data-bs-toggle="modal"
                                                            data-bs-target="#ModalEditAlat" href="javascript:void(0)"
                                                            wire:click='edit({{ $alat->id }})'>Edit</a>
                                                        <a class="dropdown-item text-danger" href="javascript:void(0)"
                                                            data-bs-toggle="modal" data-bs-target="#ModalAlat"
                                                            wire:click='onkel({{ $alat->id }})'>Pakai</a>
                                                        @if (auth()->user()->role == 'KepalaBengkel')
                                                            <a class="dropdown-item text-success" target="_blank"
                                                                href="{{ route('print.kartustok', ['id' => auth()->user()->ruangan_id]) }}">Print
                                                                Kartu Stock</a>
                                                        @endif
                                                        @if (auth()->user()->role == 'AdminSekolah' or auth()->user()->role == 'SuperAdmin')
                                                            <a class="dropdown-item text-danger"
                                                                href="javascript:void(0)"
                                                                wire:click='ondel({{ $alat->id }})'>Delete</a>
                                                        @endif
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
                        <div class="row">
                            <div class="col">
                                {{ $alats->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif


    {{-- modal --}}
    @include('livewire.admin.alat-bahan.daftar.modal')
