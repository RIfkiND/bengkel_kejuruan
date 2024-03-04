<div class="container-fluid pt-2">
    <div class="row">
        <div class="col-sm-6 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="col-7 pt-2">
                            <caption>Daftar Pengajuan</caption>
                        </div>
                        <div class="col-5">
                            <div class="d-flex align-items-center justify-content-end">
                                <form class="me-2 d-none d-lg-block">
                                    <div class="customize-input">
                                        <input class="form-control custom-shadow border-2 bg-white" type="text"
                                            placeholder="Search" aria-label="Search" style="border-radius: 10px;"
                                            wire:model='searchPengajuan' wire:input='resetPage'>
                                    </div>
                                </form>
                                @if (auth()->user()->role == 'KepalaBengkel' || auth()->user()->role == 'Guru')
                                    <div class="customize-input float-end ms-2">
                                        <a class="btn btn-info" type="button" style="border-radius: 10px"
                                            href="javascript:void(0)" data-bs-toggle="modal"
                                            data-bs-target="#ModalPengajuan">
                                            Ajukan A/B
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
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-responsive">
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
                                                <a class="dropdown-toggle pl-md-3 position-relative"
                                                    href="javascript:void(0)" data-bs-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu">
                                                    @if (auth()->user()->role == 'AdminSekolah')
                                                        <a class="dropdown-item" data-bs-toggle="modal"
                                                            data-bs-target="#ModalPengajuan"href="javascript:void(0)"
                                                            wire:click='info({{ $pengajuan->id }})'>Informasi</a>
                                                    @endif
                                                    <a class="dropdown-item" a href="javascript:void(0)"
                                                        data-bs-toggle="modal" data-bs-target="#ModalPengajuan"
                                                        wire:click='edit({{ $pengajuan->id }})'><i
                                                            class="fas fa-pencil-alt text-info"></i><span
                                                            class="text-info">
                                                            Edit</span></a>
                                                    <a class="dropdown-item" a href="javascript:void(0)"
                                                        wire:click='ondel({{ $pengajuan->id }})'><i
                                                            class="fas fa-trash text-danger"></i><span class="text-danger">
                                                             Delete</span></a>
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
