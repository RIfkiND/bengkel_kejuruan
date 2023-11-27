<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="card-title">
                                <h4>Daftar Sekolah</h4>
                            </div>
                        </div>
                        <div class="col d-flex justify-content-end px-4">
                            <div class="form-group">
                                <input type="text" class="form-control input-rounded h-25" placeholder="Cari"
                                    wire:model='searchSekolah' wire:input='resetPage'>
                            </div>
                        </div>
                        <div class="col-lg-2 d-flex justify-content-end px-4 h-50">
                            <div class="basic-dropdown">
                                <div class="dropdown">
                                    <button type="button" class="btn btn-primary dropdown-toggle"
                                        data-toggle="dropdown">Tambahkan</button>
                                    <div class="dropdown-menu"><a href="javascript:void(0)" type="button"
                                            class="dropdown-item" data-toggle="modal"
                                            data-target="#ModalImportSekolah"><i class="fa fa-download fa-lg mr-2 text-success"></i>Import Sekolah</a> <a
                                            href="javascript:void(0)" type="button" class="dropdown-item"
                                            data-toggle="modal" data-target="#ModalSekolah"><i class="fa fa-plus fa-lg mr-2"></i>Tambah Sekolah</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($sekolahs as $sekolah)
                            <div class="col-lg-4 col-sm-6">
                                <a href="{{ route('admin.sekolah.kelas-ruangan', $sekolah->id) }}">
                                    <div class="card d-flex justify-content-between" aria-label="Hallo">
                                        <h5 class="card-header position-absolute">
                                            @if (strlen($sekolah->nama_sekolah) > 20)
                                                {{ substr($sekolah->nama_sekolah, 0, 20) . '...' }}
                                            @else
                                                {{ $sekolah->nama_sekolah }}
                                            @endif
                                        </h5>
                                        <div class="card-header ml-auto btn">
                                            <div class="dropdown">
                                                <a href="javascript:void(0)" data-toggle="dropdown"><i
                                                        class="fa fa-info-circle fa-lg mr-1"></i>More</a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="javascript:void(0)"
                                                        wire:click='edit({{ $sekolah->id }})' data-toggle="modal"
                                                        data-target="#ModalSekolah">Edit</a>
                                                    <a class="dropdown-item text-danger" href="javascript:void(0)"
                                                        wire:click='ondel({{ $sekolah->id }})'>Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-6 border-right">
                                                    <div class="card-text">
                                                        <span>Murid : {{ $sekolah->total_murid_count }}</span><br><br>
                                                        <span>Ruangan :{{ $sekolah->ruangan->count() }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 border-right">
                                                    <div class="card-text">
                                                        <span>Guru : {{ $sekolah->guru->count() }}</span><br><br>
                                                        <span>Peralatan :{{ $sekolah->total_peralatan_count }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach

                    </div>
                    <div class="row">
                        <div class="col">
                            {{ $sekolahs->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    @include('livewire.admin.referensi.sekolah.modal')
</div>
