<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="card-title">
                                <h4>Daftar Pengajuan</h4>
                            </div>
                        </div>
                        <div class="col d-flex justify-content-end px-5">
                            <div class="form-group">
                                <input type="text" class="form-control input-rounded h-25" placeholder="Cari"
                                    wire:model='searchPengajuan' wire:input='resetPage'>
                            </div>
                        </div>
                        @if (auth()->user()->role == 'KepalaBengkel' || auth()->user()->role == 'Guru')
                        <div class="col-lg-2 d-flex justify-content-end px-4 h-50">
                            <a href="add-peralatan.html" type="button"
                                class="btn mb-1 btn-primary d-flex justify-content-end" data-toggle="modal"
                                data-target="#ModalPengajuan">Ajukan Alat dan Bahan</a>
                        </div>
                        @endif
                    </div>

                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Gambar</th>
                                        <th>Kode A/B</th>
                                        <th>Nama A/B</th>
                                        <th>Volume</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pengajuans as $pengajuan)
                                        <tr>
                                            <td>{{ $pengajuan->tanggal }}</td>
                                            <td>
                                                @if ($pengajuan->gambar)
                                                    <img onclick="previewImage(this)"
                                                        src="{{ asset('storage/' . $pengajuan->gambar) }}"
                                                        alt=""
                                                        style="max-width: 100px; height: auto; cursor: pointer;">
                                                @else
                                                    <svg class="bd-placeholder-img img-thumbnail" width="200"
                                                        height="200" xmlns="http://www.w3.org/2000/svg" role="img"
                                                        aria-label="A generic square placeholder image with a white border around it, making it resemble a photograph taken with an old instant camera: 200x200"
                                                        preserveAspectRatio="xMidYMid slice" focusable="false">
                                                        <title>A generic square placeholder image with a white border
                                                            around
                                                            it,
                                                            making it resemble a photograph taken with an old instant
                                                            camera
                                                        </title>
                                                        <rect width="100%" height="100%" fill="#868e96"></rect>
                                                        <text y="50%" x="20%" fill="#dee2e6" dy=".3em">Gambar
                                                            Preview</text>
                                                    </svg>
                                                @endif
                                            </td>
                                            <td>{{ $pengajuan->kode }}</td>
                                            <td>{{ $pengajuan->nama_alat_atau_bahan }}</td>
                                            <td>{{ $pengajuan->volume }}{{ $pengajuan->satuan }}</td>
                                            <td>{{ $pengajuan->status }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <a href="javascript:void(0)" data-toggle="dropdown"><i
                                                            class="fa fa-ellipsis-v fa-lg"></i></a>
                                                    <div class="dropdown-menu">
                                                        @if (auth()->user()->role == 'AdminSekolah')
                                                            <a class="dropdown-item" data-toggle="modal"
                                                                data-target="#ModalPengajuan"href="javascript:void(0)"
                                                                wire:click='info({{ $pengajuan->id }})'>Informasi</a>
                                                        @endif
                                                        <a class="dropdown-item" data-toggle="modal"
                                                            data-target="#ModalPengajuan" href="javascript:void(0)"
                                                            wire:click='edit({{ $pengajuan->id }})'>Edit</a>
                                                        <a class="dropdown-item" href="javascript:void(0)"
                                                            wire:click='ondel({{ $pengajuan->id }})'>Hapus</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            {{ $pengajuans->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- modal --}}
    @include('livewire.admin.alat-bahan.pengajuan.modal')
</div>
