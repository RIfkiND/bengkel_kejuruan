<div>
    @if ($peralatans == 'kosong')
        <div class="justify-content-center" style="height:10vw">
            <div class="container h-100">
                <div class="row justify-content-center h-100">
                    <div class="col">
                        <div class="error-content">
                            <div class="card mb-0">
                                <div class="card-body text-center pt-5">
                                    <h1 class="error-text text-warning my-5"><i class="fa fa-info-circle"></i></h1>
                                    <h1 class="text-warning mb-5">Tambahkan Ruangan Untuk <br> Bisa Mengatur Peralatan</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        @if (auth()->user()->role == 'AdminSekolah' or auth()->user()->role == 'KepalaBengkel')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="basic-form">
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
                                                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
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
                                                <select wire:model="kategori_id" class="form-control" id="category">
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
                                            <div class="col-lg-2 mb-4">
                                                <input wire:model="tahun" type="date" id="tanggal"
                                                    class="form-control input-default">
                                                @error('tahun')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-3 mb-4">
                                                <input wire:model="kapasitas" type="text"
                                                    class="form-control input-default" placeholder="Kapasitas">
                                                @error('kapasitas')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="card-title">
                                    <h4>Daftar Peralatan</h4>
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
                                            <th>Kode Barang</th>
                                            <th>Kategori P/M</th>
                                            <th>Nama Barang</th>
                                            <th>Spesifikasi</th>
                                            {{-- <th>Tanggal</th>
                                                        <th>Waktu/Jam</th>
                                                        <th>Nama Kelas</th>
                                                        <th>Nama Guru</th> --}}
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($peralatans as $peralatan)
                                            <tr>
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
                                                {{-- <td>Belum Di Gunakan</td>
                                                            <td>Belum Di Gunakan</td>
                                                            <td>Belum Di Gunakan</td>
                                                            <td>Belum Di Gunakan</td> --}}
                                                <td>
                                                    <a href="javascript('')"></a>
                                                    <span class="badge badge-success px-2 text-white"> Tersedia
                                                    </span>
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a href="" data-toggle="dropdown"><i
                                                                class="fa fa-ellipsis-v fa-lg"></i></a>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href=""
                                                                wire:click='ondel({{ $peralatan->id }})'>Delete</a>
                                                            <a class="dropdown-item" href="">Link
                                                                2</a>
                                                            <a class="dropdown-item" href="">Link
                                                                3</a>
                                                        </div>
                                                    </div>
                                                </td>
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
    @endif
</div>
