<div class="container-fluid pt-2">
    <div class="row">
        <div class="col-sm-6 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="col-5 pt-2">
                            <caption>Peralatan yang terdaftar</caption>
                        </div>
                        <div class="col-7">
                            <div class="d-flex align-items-center justify-content-end">
                                <form class="me-2 d-none d-lg-block">
                                    <div class="customize-input">
                                        <input class="form-control custom-shadow border-2 bg-white" type="text"
                                            placeholder="Search" aria-label="Search" style="border-radius: 10px;"
                                            wire:model='searchPeralatan' wire:input='resetPage'>
                                    </div>
                                </form>
                                @if (auth()->user()->role == 'AdminSekolah' or auth()->user()->role == 'KepalaBengkel')
                                    <div class="customize-input float-end ms-2">
                                        <button class="btn btn-primary" data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false" style="border-radius: 10px;">Tambah <i
                                                class="fas fa-caret-down"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <!-- Dropdown menu links -->
                                            <a class="dropdown-item" href="javascriptvoid(0)" data-bs-toggle="modal"
                                                data-bs-target="#ModalTambahPeralatan"><i
                                                    class="fas fa-plus text-primary"></i>
                                                <span class="text-primary"> Tambah Peralatan</span></a>
                                            <a class="dropdown-item" href="javascriptvoid(0)" data-bs-toggle="modal"
                                                data-bs-target="#ModalImportPeralatan"><i
                                                    class="fas fa-download text-warning"></i> <span
                                                    class="text-warning">Import Peralatan</span></a>
                                        </div>
                                    </div>
                                @endif
                                @if (auth()->user()->role == 'KepalaBengkel')
                                    <div class="customize-input float-end ms-2">
                                        <a class="btn btn-success" type="button" style="border-radius: 10px"
                                            href="{{ route('print.inventarisalat', ['id' => auth()->user()->ruangan_id]) }}"><i
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
        @if ($ruangan_byadmin == null)
            @if (auth()->user()->role == 'AdminSekolah' or auth()->user()->role == 'KepalaBengkel')
                <div wire:ignore.self class="modal fade" id="ModalEditPeralatan" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content" style="border-radius: 10px;">
                            <form wire:submit.prevent="update">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="exampleModalLabel">Edit Data Peralatan Atau Mesin
                                    </h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-lg-4 mb-4">
                                                <input wire:model="nama_peralatan_atau_mesin" type="text"
                                                    class="form-control input-default"
                                                    placeholder="Nama Peralatan Atau Mesin">
                                                @error('nama_peralatan_atau_mesin')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-3 mb-4">
                                                <select wire:model="kategori_id" class="form-select" id="category">
                                                    <option value="" selected>Kategori</option>
                                                    @foreach ($kategories as $kategori)
                                                        <option value="{{ $kategori->id }}">
                                                            {{ $kategori->nama_kategori }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('kategori_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-3 mb-4">
                                                <select wire:model="ruangan_id" class="form-select" id="ruangan">
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
                                            <div class="col-lg-3 mb-2">
                                                <input type="text" class="form-control input-default"
                                                    placeholder="Kode Peralatan atau Mesin" wire:model='kode_peralatan'>
                                                @error('kode_peralatan')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-3">
                                                <input type="text" class="form-control input-default"
                                                    placeholder="Harga" wire:model='harga'>
                                                @error('harga')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
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
            @endif
            @if (auth()->user()->role == 'AdminSekolah' or auth()->user()->role == 'KepalaBengkel')
                <div wire:ignore.self class="modal fade" id="ModalTambahPeralatan" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content" style="border-radius: 10px;">
                            <form wire:submit.prevent="store">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="exampleModalLabel">Tambah Peralatan Mesin</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-body">
                                        <label class="form-label">Tanggal Masuk </label>
                                        <div class="row mb-4">
                                            <div class="col-md-3">
                                                <div class="form-group mb-3">
                                                    <input wire:model="tanggal_masuk" type="date"
                                                        class="form-control" id="tanggal">
                                                    @error('tanggal_masuk')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <input wire:model="nama_peralatan_atau_mesin" type="text"
                                                        class="form-control" placeholder="Nama Peralatan Mesin">
                                                    @error('nama_peralatan_atau_mesin')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            @if (auth()->user()->ruangan_id == null)
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
                                            @endif
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group mb-3">
                                                    <input wire:model='kode_peralatan' type="text"
                                                        class="form-control" placeholder="Kode Peralatan Mesin">
                                                    @error('kode_peralatan')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group mb-3">
                                                    <select wire:model="kategori_id" class="form-select mr-sm-2"
                                                        id="category">
                                                        <option selected>Kategori</option>
                                                        @foreach ($kategories as $kategori)
                                                            <option value="{{ $kategori->id }}">
                                                                {{ $kategori->nama_kategori }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('kategori_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group mb-3">
                                                    <input wire:model="sumber_dana" type="text"
                                                        class="form-control" placeholder="Sumber Dana"
                                                        id="sumber_dana">
                                                    @error('sumber_dana')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group mb-3">
                                                    <input wire:model='harga' type="text" class="form-control"
                                                        placeholder="Harga">
                                                    @error('harga')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <label class="form-label">Spesifikasi</label>
                                        <div class="row mb-2">
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
                                                    <input wire:model="tahun" type="date" class="form-control"
                                                        placeholder="Tahun Dibuat">
                                                    @error('tahun')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group mb-3">
                                                    <input wire:model="kapasitas" type="text" class="form-control"
                                                        placeholder="Kapasitas">
                                                    @error('kapasitas')
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
            @endif
        @endif
        <div class="row">
            <div class="col-lg-12">
                <div class="row m-b-30">
                    @forelse ($peralatans as $peralatan)
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-lg-10">
                                            {{ $peralatan->kode_peralatan }}
                                        </div>
                                        <div class="col-lg-2 d-flex justify-content-end">
                                            <a class="dropdown-toggle pl-md-3 position-relative"
                                                href="javascript:void(0)" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="javascript:void(0)"
                                                    data-bs-toggle="modal" data-bs-target="#ModalPeralatan"
                                                    wire:click='info({{ $peralatan->id }})'>Informasi</a>
                                                <a class="dropdown-item" href="javascript:void(0)"
                                                    data-bs-toggle="modal" data-bs-target="#ModalEditPeralatan"
                                                    wire:click='edit({{ $peralatan->id }})'>Edit</a>
                                                @if (auth()->user()->role == 'KepalaBengkel')
                                                    <a class="dropdown-item text-success"
                                                        href="{{ route('print.kartuperawatanalat', ['id' => $peralatan->id]) }}">Print
                                                        Kartu Pemeliharaan</a>
                                                @endif
                                                <a class="dropdown-item text-danger" href="javascript:void(0)"
                                                    data-bs-toggle="modal" data-bs-target="#ModalPeralatan"
                                                    wire:click='onkel({{ $peralatan->id }})'>Keluar</a>
                                                @if (auth()->user()->role == 'AdminSekolah' or auth()->user()->role == 'SuperAdmin')
                                                    <a class="dropdown-item text-danger" href="javascript:void(0)"
                                                        wire:click='ondel({{ $peralatan->id }})'>Delete</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-body">
                                    <h3 class="card-title">{{ $peralatan->nama_peralatan_atau_mesin }}</h3>
                                    @if (auth()->user()->role == 'AdminSekolah' || auth()->user()->role == 'Guru')
                                        <h6 class="card-subtitle mb-2 text-muted">Ruangan
                                            {{ $peralatan->ruangan->nama_ruangan }}</h6>
                                    @endif
                                    <div class="d-flex justify-content-end">
                                        <h3> @php
                                            $latestPemeliharaan = $peralatan->pemeliharaan->sortByDesc('created_at')->first();
                                        @endphp
                                            @if ($latestPemeliharaan && $latestPemeliharaan->status == 'Belum Selesai')
                                                <span class="badge text-bg-warning px-2 text-white">
                                                    Sedang Dalam Pemeliharaan
                                                </span>
                                            @else
                                                @if (auth()->user()->role == 'KepalaBengkel')
                                                    <a href="javascript:void(0)" data-toggle="dropdown">
                                                        <h3>
                                                            <span
                                                                class="badge {{ $peralatan->status == 'Tersedia' ? 'text-bg-success' : 'text-bg-danger' }} px-2 text-white"><i
                                                                    class="fa fa-check mr-1"></i>
                                                                {{ $peralatan->status }}
                                                            </span>
                                                        </h3>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="javascript:void(0)"
                                                            wire:click='status({{ $peralatan->id }})'>
                                                            @if ($peralatan->status == 'Digunakan')
                                                                Tersedia
                                                            @else
                                                                Digunakan
                                                            @endif
                                                        </a>
                                                    </div>
                                                @else
                                                    <h3>
                                                        <span
                                                            class="badge {{ $peralatan->status == 'Tersedia' ? 'text-bg-success' : 'text-bg-danger' }} px-2 text-white"><i
                                                                class="fa fa-check mr-1"></i>
                                                            {{ $peralatan->status }}
                                                        </span>

                                                    </h3>
                                                @endif
                                            @endif
                                        </h3>
                                    </div>
                                </div>
                                <div class="card-footer text-muted">
                                    @if ($peralatan->latestPemakaian)
                                        {{-- <p>Pada: {{ $peralatan->latestPemakaian->tanggal_pemakaian }},
                                            {{ $peralatan->latestPemakaian->waktu_akhir }}</p> --}}
                                        <p class="card-text d-flex justify-content-start"><small
                                                class="text-muted">Terakhir digunakan
                                                oleh</small>
                                        </p>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <p class="card-text"><i class="fas fa-user"></i> :
                                                    {{ $peralatan->latestPemakaian->guru->nama_guru }}</p>
                                            </div>
                                            <div class="col-lg-6">
                                                <p class="card-text"><i class="fas fa-columns"></i> :
                                                    {{ $peralatan->latestPemakaian->kelas->nama_kelas }}</p>

                                            </div>
                                            <div class="col-lg-6">
                                                <div class="card-text">
                                                    <i class="fas fa-calendar-alt"></i> :
                                                    {{ $peralatan->latestPemakaian->tanggal_pemakaian }}
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="card-text">
                                                    <i class="fas fa-clock"></i> :
                                                    {{ $peralatan->latestPemakaian->waktu_akhir }}
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <p>Belum Pernah Di Gunakan</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col">
                            <div class="login-form-bg h-100">
                                <div class="container h-100">
                                    <div class="row justify-content-center h-100">
                                        <div class="col-xl-6">
                                            <div class="error-content">
                                                <div class="card mb-0">
                                                    <div class="card-body text-center pt-5">
                                                        <h1 class="error-text text-warning mt-5"><i
                                                                class="fa fa-info-circle"></i></h1>

                                                        <h1 class="my-5 text-warning text-wrap">Data Kosong
                                                        </h1>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>
                <div class="row">
                    <div class="col d-flex justify-content-center">
                        {{ $peralatans->links() }}
                    </div>
                </div>
            </div>
        </div>
    @endif
    {{-- modal --}}
    @include('livewire.admin.peralatan-mesin.daftar.modal')
