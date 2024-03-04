<div class="container-fluid pt-2">
    <div class="row">
        <div class="col-sm-6 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="col-7 pt-2">
                            <caption>Guru yang terdaftar</caption>
                        </div>
                        <div class="col-5">
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
                                            data-bs-target="#ModalGuru" style="border-radius: 10px;">Tambah
                                            Guru</button>
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
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Mapel</th>
                                    <th scope="col">Sekolah</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($gurus as $guru)
                                    <tr>
                                        <td scope="row">{{ $guru->nama_guru }}</td>
                                        <td>{{ $guru->mata_pelajaran }}</td>
                                        @if ($guru->sekolah())
                                            <td>{{ $guru->sekolah->nama_sekolah }}</td>
                                        @else
                                            <td>Tidak Terdaftar Di Sekolah Manapun</td>
                                        @endif
                                        <td>
                                            <a class="dropdown-toggle pl-md-3 position-relative"
                                                href="javascript:void(0)" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" a href="javascript:void(0)"
                                                    data-bs-toggle="modal" data-bs-target="#ModalGuru"
                                                    wire:click='edit({{ $guru->id }})'><i
                                                        class="fas fa-pencil-alt text-info"></i><span
                                                        class="text-info">
                                                        Edit</span></a>
                                                <a class="dropdown-item" href="javascript:void(0)"
                                                    wire:click='ondel({{ $guru->id }})'><i
                                                        class="fas fa-trash text-danger"></i><span
                                                        class="text-danger">
                                                        Delete</span>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">
                                            <h1>Data Kosong</h1>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-12 d-flex justify-content-end">
                        {{ $gurus->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    @include('livewire.admin.referensi.pengguna.guru.modal')
