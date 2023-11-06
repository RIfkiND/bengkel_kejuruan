<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card-title">
                                    <h4>Murid Yang Terdaftar</h4>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <input type="text" class="form-control input-rounded h-25" placeholder="Cari"
                                        wire:model='searchMurid' wire:input='resetPage'>
                                </div>
                            </div>
                            @if (auth()->user()->sekolah_id)
                                <div class="col-lg-4">
                                    <a href="javascript:void(0)" type="button"
                                        class="btn mb-1 btn-primary justify-content-end" data-toggle="modal"
                                        data-target="#ModalMuridKelas">Tambah Murid</a>
                                </div>
                            @endif
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
                                            @foreach ($murids as $murid)
                                                <tr>
                                                    <td>{{ $murid->nama_murid }}</td>
                                                    <td>
                                                        <span>
                                                            <a href="javascript:void(0)" data-toggle="modal"
                                                                data-target="#ModalMuridKelas"
                                                                wire:click='edit({{ $murid->id }})'><i
                                                                    class="fa fa-pencil color-muted m-r-5"></i>
                                                            </a><a href="javascript:void(0)"
                                                                wire:click='ondel({{ $murid->id }})'><i
                                                                    class="fa fa-trash color-danger"></i></a>
                                                        </span>
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
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="card-title">
                                        <h4>Guru Yang Mengajar</h4>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control input-rounded h-25" placeholder="Cari"
                                            wire:model='searchGuru' wire:input='resetPage'>
                                    </div>
                                </div>
                                @if (auth()->user()->sekolah_id)
                                    <div class="col-lg-4">
                                        <a href="javascript:void(0)" type="button"
                                            class="btn mb-1 btn-primary justify-content-end" data-toggle="modal"
                                            data-target="#ModalGuruKelas">Tambah Guru</a>
                                    </div>
                                @endif
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
                                                        <td>
                                                            <span>
                                                                <a href="javascript:void(0)" data-toggle="modal"
                                                                    data-target="#ModalGuruKelas"
                                                                    wire:click='info({{ $guru->id }})'><i
                                                                        class="fa fa-pencil color-muted m-r-5"></i>
                                                                </a><a href="javascript:void(0)"
                                                                    wire:click='delete_guru({{ $guru->id }})'><i
                                                                        class="fa fa-trash color-danger"></i></a>
                                                            </span>
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
    </div>

    <!-- Modal -->
    @include('livewire.admin.referensi.kelola-ruangan.kelas.murid.modal')
</div>
