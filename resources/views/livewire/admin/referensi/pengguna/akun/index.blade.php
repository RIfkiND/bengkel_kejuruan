<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h4 class="card-title">Akun Yang Terdaftar</h4>
                            </div>
                            <div class="col d-flex justify-content-end px-4">
                                <div class="form-group">
                                    <input type="text" class="form-control input-rounded h-25" placeholder="Cari"
                                        wire:model='searchAkun' wire:input='resetPage'>
                                </div>
                            </div>
                            <div class="col-3 d-flex justify-content-end px-4 h-50">
                                <button type="button" class="btn mb-1 btn-primary d-flex justify-content-end"
                                    data-toggle="modal" data-target="#ModalAkun">Tambahkan Akun</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="table-responsive">
                                    <table class="table table-bordered verticle-middle">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nama Pengguna</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Role</th>
                                                <th scope="col">Sekolah</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->role }}</td>
                                                    @if ($user->sekolah_id == null)
                                                        <td>Tidak Terdaftar Di Sekolah Manapun</td>
                                                    @else
                                                        <td>{{ $user->sekolah->nama_sekolah }}</td>
                                                    @endif

                                                    <td>
                                                        <span>
                                                            <a href="" data-toggle="modal"
                                                                data-target="#ModalAkun"
                                                                wire:click='edit({{ $user->id }})'><i
                                                                    class="fa fa-pencil color-muted m-r-5"></i>
                                                            </a><a href=""
                                                                wire:click='ondel({{ $user->id }})'><i
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
    </div>

    <!-- Modal -->
    @include('livewire.admin.referensi.pengguna.akun.modal')
</div>
