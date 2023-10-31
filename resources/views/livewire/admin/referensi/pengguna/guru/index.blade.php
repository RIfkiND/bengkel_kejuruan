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
                                <div class="col-3 d-flex justify-content-end px-4 h-50">
                                    <button type="button" class="btn mb-1 btn-primary d-flex justify-content-end"
                                        data-toggle="modal" data-target="#ModalGuru">Tambahkan Guru</button>
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
                                                    <span>
                                                        <a href="#" data-toggle="modal" data-target="#ModalGuru"
                                                            wire:click='edit({{ $guru->id }})'><i
                                                                class="fa fa-pencil color-muted m-r-5"></i>
                                                        </a><a href="#" wire:click='ondel({{ $guru->id }})'><i
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
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    @include('livewire.admin.referensi.pengguna.guru.modal')
</div>
