<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h4 class="card-title">Guru Yang Terdaftar</h4>
                            </div>
                            <div class="col d-flex justify-content-end px-4">
                                <div class="form-group">
                                    <input type="text" class="form-control input-rounded h-25" placeholder="Cari"
                                        wire:model='searchGuru' wire:input='resetPage'>
                                </div>
                            </div>
                            @if (auth()->user()->sekolah_id)
                                <div class="col-lg-2 d-flex justify-content-end px-4 h-50">
                                    <a href="#" type="button"
                                        class="btn mb-1 btn-primary d-flex justify-content-end" data-toggle="modal"
                                        data-target="#ModalGuru">Tambahkan Guru</a>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="table-responsive">
                                <table class="table table-bordered verticle-middle">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Mapel</th>
                                            <th scope="col">Sekolah</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($gurus as $guru)
                                            <tr>
                                                <td>{{ $guru->nama_guru }}</td>
                                                <td>{{ $guru->mata_pelajaran }}</td>
                                                @if ($guru->sekolah())
                                                    <td>{{ $guru->sekolah->nama_sekolah }}</td>
                                                @else
                                                    <td>Tidak Terdaftar Di Sekolah Manapun</td>
                                                @endif
                                                <td>
                                                    <div class="dropdown">
                                                        <a href="#" data-toggle="dropdown"><i
                                                                class="fa fa-ellipsis-v fa-lg"></i></a>
                                                        <div class="dropdown-menu"><a class="dropdown-item"
                                                                href="javascript:void(0)" data-toggle="modal"
                                                                data-target="#ModalGuru"
                                                                wire:click='edit({{ $guru->id }})'><i
                                                                    class="fa fa-pencil fa-lg mr-2"></i>Edit</a> <a
                                                                class="dropdown-item text-danger"
                                                                href="javascript:void(0)"
                                                                wire:click='ondel({{ $guru->id }})'><i
                                                                    class="fa fa-trash fa-lg mr-2"></i>Delete</a>
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
                    <div class="row">
                        <div class="col">
                            {{ $gurus->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    @include('livewire.admin.referensi.pengguna.guru.modal')
</div>
