<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="row justify-between mb-3">
                            <div class="col">
                                <h4 class="card-title">Guru Yang Terdaftar</h4>
                            </div>
                            <div class="col text-center">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#ModalGuru">Tambahkan Guru</button>
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
                                                        <td>{{ $guru->sekolah() }}</td>
                                                    @else
                                                        <td>Tidak Terdaftar Di Sekolah Manapun</td>
                                                    @endif
                                                    <td>
                                                        <span>
                                                            <a href="#" data-toggle="modal"
                                                                data-target="#ModalGuru"
                                                                wire:click='edit({{ $guru->id }})'><i
                                                                    class="fa fa-pencil color-muted m-r-5"></i>
                                                            </a><a href="#"
                                                                wire:click='ondel({{ $guru->id }})'><i
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
    @include('livewire.admin.referensi.pengguna.guru.modal')
</div>
