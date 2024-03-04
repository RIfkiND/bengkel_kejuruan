<div class="container-fluid pt-2">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-4 pt-2">
                            <h4>Daftar Murid</h4>
                        </div>
                        <div class="col-8">
                            <div class="d-flex align-items-center justify-content-end">
                                <form class="me-2 d-none d-lg-block">
                                    <div class="customize-input">
                                        <input class="form-control custom-shadow border-2 bg-white" type="text"
                                            placeholder="Search" aria-label="Search" style="border-radius: 10px;"
                                            wire:model='searchMurid' wire:input='resetPage'>
                                    </div>
                                </form>
                                @if (auth()->user()->sekolah_id)
                                    <div class="customize-input float-end ms-2">
                                        <button class="btn btn-primary" data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false" style="border-radius: 10px;">Tambah
                                        </button>
                                        <div class="dropdown-menu">
                                            <!-- Dropdown menu links -->
                                            <a class="dropdown-item" href="javascriptvoid(0)" data-bs-toggle="modal"
                                                data-bs-target="#ModalMuridKelas"><i
                                                    class="fas fa-plus text-primary"></i>
                                                <span class="text-primary"> Tambah Murid</span></a>
                                            <a class="dropdown-item" href="javascriptvoid(0)" data-bs-toggle="modal"
                                                data-bs-target="#ModalImportMuridKelas"><i
                                                    class="fas fa-download text-success"></i> <span
                                                    class="text-success">Import Murid</span></a>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="table-responsive">
                                <table class="table table-bordered verticle-middle">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($murids as $murid)
                                            <tr>
                                                <td>
                                                    {{ $loop->iteration + $murids->firstItem() - 1 }}
                                                </td>
                                                <td>{{ $murid->nama_murid }}</td>
                                                <td class="px-4">
                                                    <a class="dropdown-toggle pl-md-3 position-relative"
                                                        href="javascript:void(0)" data-bs-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="javascript:void(0)"
                                                            wire:click='edit({{ $murid->id }})'
                                                            data-bs-toggle="modal" data-bs-target="#ModalMuridKelas"><i
                                                                class="fas fa-pencil-alt text-info"></i><span
                                                                class="text-info">
                                                                Edit</span></a>
                                                        <a class="dropdown-item" href="javascript:void(0)"
                                                            wire:click='ondel({{ $murid->id }})'><i
                                                                class="fas fa-trash text-danger"></i><span
                                                                class="text-danger">
                                                                Delete</span>
                                                        </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            {{ $murids->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (auth()->user()->role == 'AdminSekolah')
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-4 pt-2">
                                <h4>Daftar Guru</h4>
                            </div>
                            <div class="col-8">
                                <div class="d-flex align-items-center justify-content-end">
                                    <form class="me-2 d-none d-lg-block">
                                        <div class="customize-input">
                                            <input class="form-control custom-shadow border-2 bg-white" type="text"
                                                placeholder="Search" aria-label="Search" style="border-radius: 10px;"
                                                wire:model='searchGuru' wire:input='resetPage'>
                                        </div>
                                    </form>
                                    @if (auth()->user()->sekolah_id)
                                        <div class="customize-input float-end ms-2">
                                            <button class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#ModalGuruKelas" style="border-radius: 10px;">Tambah
                                            </button>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="table-responsive">
                                    <table class="table table-bordered verticle-middle">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pengajars as $guru)
                                                <tr>
                                                    <td>{{ $guru->guru->nama_guru }}</td>
                                                    <td class="px-4">
                                                        <a class="dropdown-toggle pl-md-3 position-relative"
                                                            href="javascript:void(0)" data-bs-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </a>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="javascript:void(0)"
                                                                wire:click='info({{ $guru->id }})'
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#ModalGuruKelas"><i
                                                                    class="fas fa-pencil-alt text-info"></i><span
                                                                    class="text-info">
                                                                    Edit</span></a>
                                                            <a class="dropdown-item" href="javascript:void(0)"
                                                                wire:click='delete_guru({{ $guru->id }})'><i
                                                                    class="fas fa-trash text-danger"></i><span
                                                                    class="text-danger">
                                                                    Delete</span>
                                                            </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                {{ $pengajars->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>


    <!-- Modal -->
    @include('livewire.admin.referensi.kelola-ruangan.kelas.murid.modal')
