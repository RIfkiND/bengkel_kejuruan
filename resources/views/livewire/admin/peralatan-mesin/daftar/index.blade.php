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
        @if ($ruangan_byadmin == null)
            @if (auth()->user()->role == 'AdminSekolah' or auth()->user()->role == 'KepalaBengkel')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="basic-form">
                                    @if ($updateMode)
                                        <form wire:submit.prevent="update">
                                            <div class="form-group">
                                                <h4 class="text-center">Edit Data Peralatan Atau Mesin</h4>
                                            </div>

                                            <div class="form-group">
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
                                                        <select wire:model="kategori_id" class="form-control"
                                                            id="category">
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
                                                        <select wire:model="ruangan_id" class="form-control"
                                                            id="ruangan">
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
                                                <h4 class="text-center">Tambahkan Peralatan Atau Mesin</h4>
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-6 mb-4">
                                                        <input wire:model="nama_peralatan_atau_mesin" type="text"
                                                            class="form-control input-default"
                                                            placeholder="Nama Peralatan Atau Mesin">
                                                        @error('nama_peralatan_atau_mesin')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col">
                                                        <div class="d-flex justify-content-end">
                                                            <button type="submit"
                                                                class="btn btn-primary">Tambahkan</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row justify-content-center">
                                                    <div class="col-lg-1 mb-4">
                                                        <label for="tanggal" class="text-center">Tanggal Masuk</label>
                                                    </div>
                                                    <div class="col-lg-2 mb-4">
                                                        <input wire:model="tanggal_masuk" type="date" id="tanggal"
                                                            class="form-control input-default">
                                                        @error('tanggal_masuk')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-lg-3 mb-4">
                                                        <select wire:model="kategori_id" class="form-control"
                                                            id="category">
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
                                                    @if (auth()->user()->ruangan_id == null)
                                                        <div class="col-lg-3 mb-4">
                                                            <select wire:model="ruangan_id" class="form-control"
                                                                id="ruangan">
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
                                                    @endif
                                                    <div class="col-lg-3">
                                                        <input wire:model="sumber_dana" type="text" id="sumber_dana"
                                                            class="form-control input-default"
                                                            placeholder="Sumber Dana">
                                                        @error('sumber_dana')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-lg-3 mb-4">
                                                        <input type="text" class="form-control input-default" placeholder="Kode Peralatan atau Mesin">
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
                                                            class="form-control input-default"
                                                            placeholder="Type/Model">
                                                        @error('type')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-lg-2 mb-4">
                                                        <input wire:model="tahun" type="date" id="tanggal"
                                                            class="form-control input-default">
                                                        @error('tahun')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-lg-3 mb-4">
                                                        <input wire:model="kapasitas" type="text"
                                                            class="form-control input-default"
                                                            placeholder="Kapasitas">
                                                        @error('kapasitas')
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
            @endif
        @endif
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col">
                        <div class="card-title">
                            <h4>Daftar Peralatan dan Mesin</h4>
                        </div>
                    </div>
                    <div class="col d-flex justify-content-end px-4">
                        <div class="form-group">
                            <input type="text" class="form-control input-rounded h-25" placeholder="Cari"
                                wire:model='searchPeralatan' wire:input='resetPage'>
                        </div>
                    </div>
                </div>
                <div class="row m-b-30">
                    @forelse ($peralatans as $peralatan)
                        <div class="col-lg-4">
                            <div class="card border-primary  d-flex justify-content-between">
                                <div class="card-header position-absolute">PM-0{{ $peralatan->id }}</div>
                                <div class="card-header ml-auto btn">
                                    <div class="dropdown">
                                        <a href="javascript:void(0)" data-toggle="dropdown"><i
                                                class="fa fa-info-circle fa-lg mr-1"></i>More</a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0)" data-toggle="modal"
                                                data-target="#ModalPeralatan"
                                                wire:click='info({{ $peralatan->id }})'>Informasi</a>
                                            <a class="dropdown-item" href="javascript:void(0)"
                                                wire:click='edit({{ $peralatan->id }})'>Edit</a>
                                            <a class="dropdown-item text-danger" href="javascript:void(0)"
                                                data-toggle="modal" data-target="#ModalPeralatan"
                                                wire:click='onkel({{ $peralatan->id }})'>Keluar</a>
                                            @if (auth()->user()->role == 'AdminSekolah' or auth()->user()->role == 'SuperAdmin')
                                                <a class="dropdown-item text-danger" href="javascript:void(0)"
                                                    wire:click='ondel({{ $peralatan->id }})'>Delete</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $peralatan->nama_peralatan_atau_mesin }}</h5>
                                    <div class="row">

                                        <div class="card-text">
                                            @if ($peralatan->latestPemakaian)
                                                <p>Terakhir Di Pakai Oleh:
                                                    {{ $peralatan->latestPemakaian->guru->nama_guru }}</p>
                                                <p>Kelas: {{ $peralatan->latestPemakaian->kelas->nama_kelas }}</p>
                                                <p>Pada: {{ $peralatan->latestPemakaian->tanggal_pemakaian }},
                                                    {{ $peralatan->latestPemakaian->waktu_akhir }}</p>
                                            @else
                                                <p>Belum Pernah Di Gunakan</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <h3> @php
                                            $latestPemeliharaan = $peralatan->pemeliharaan->sortByDesc('created_at')->first();
                                        @endphp
                                            @if ($latestPemeliharaan && $latestPemeliharaan->status == 'Belum Selesai')
                                                <span class="badge badge-warning px-2 text-white">
                                                    Sedang Dalam Pemeliharaan
                                                </span>
                                            @else
                                                @if (auth()->user()->role == 'KepalaBengkel')
                                                    <a href="javascript:void(0)" data-toggle="dropdown">
                                                        <h3>
                                                            <span
                                                                class="badge {{ $peralatan->status == 'Tersedia' ? 'badge-success' : 'badge-danger' }} px-2 text-white"><i
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
                                                            class="badge {{ $peralatan->status == 'Tersedia' ? 'badge-success' : 'badge-danger' }} px-2 text-white"><i
                                                                class="fa fa-check mr-1"></i>
                                                            {{ $peralatan->status }}
                                                        </span>
                                                    </h3>
                                                @endif
                                            @endif
                                        </h3>
                                    </div>
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
</div>
