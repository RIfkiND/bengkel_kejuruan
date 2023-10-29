<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="row justify-between mb-3">
                            <div class="col">
                                <h4 class="card-title">Murid Yang Terdaftar</h4>
                            </div>
                            <div class="col text-center">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#ModalMurid">Tambahkan Murid</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="table-responsive">
                                    <table class="table table-bordered verticle-middle">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Kelas</th>
                                                {{-- <th scope="col">Sekolah</th> --}}
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($murids as $murid)
                                                <tr>
                                                    <td>{{ $murid->nama_murid }}</td>
                                                    <td>{{ $murid->kelas() }}</td>
                                                    {{-- @if ($murid->sekolah())
                                                        <td>{{ $murid->sekolah() }}</td>
                                                    @else
                                                        <td>Tidak Terdaftar Di Sekolah Manapun</td>
                                                    @endif --}}
                                                    <td>
                                                        <span>
                                                            <a href="#" data-toggle="modal"
                                                                data-target="#ModalMurid"
                                                                wire:click='edit({{ $murid->id }})'><i
                                                                    class="fa fa-pencil color-muted m-r-5"></i>
                                                            </a><a href="#"
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
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    @include('livewire.admin.referensi.pengguna.murid.modal')
</div>