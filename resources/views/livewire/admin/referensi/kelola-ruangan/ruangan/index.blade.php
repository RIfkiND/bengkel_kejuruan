<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="card-title">
                                <h4>Daftar Ruangan</h4>
                            </div>
                        </div>
                        <div class="col d-flex justify-content-end px-4">
                            <div class="form-group">
                                <input type="text" class="form-control input-rounded h-25" placeholder="Cari"
                                    wire:model='searchRuangan' wire:input='resetPage'>
                            </div>
                        </div>
                        @if (auth()->user()->sekolah_id)
                            <div class="col-lg-2 d-flex justify-content-end px-3 h-50 mr-1">
                                <a href="javasccript:void(0)" type="button"
                                    class="btn mb-1 btn-primary d-flex justify-content-end" data-toggle="modal"
                                    data-target="#ModalRuangan">Tambahkan Ruangan</a>
                            </div>
                        @endif
                    </div>
                    <div class="row">
                        @foreach ($ruangans as $ruangan)
                            @if (auth()->user()->role == 'AdminSekolah')
                                <a href="{{ route('admin.kelolaruangan.ruangan.peralatan', $ruangan->id) }}">
                                @else
                                    <a href="{{ route('admin.sekolah.ruangan.peralatan', $ruangan->id) }}">
                            @endif
                            <div class="col-lg-4 col-sm-6">
                                <div class="card border-primary  d-flex justify-content-between">
                                    <h5 class="card-header position-absolute ">{{ $ruangan->nama_ruangan }}</h5>
                                    <div class="card-header ml-auto btn">
                                        <div class="dropdown">
                                            <a href="javascript:void(0)" data-toggle="dropdown"><i
                                                    class="fa fa-info-circle fa-lg mr-1"></i>More</a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="javascript:void(0)"
                                                    wire:click='edit({{ $ruangan->id }})' data-toggle="modal"
                                                    data-target="#ModalRuangan">Edit</a><a
                                                    class="dropdown-item text-success"
                                                    href="{{ route('print.daftarruangbarang', ['id' => $ruangan->id]) }}">Print</a>
                                                <a class="dropdown-item text-danger" href="avascript:void(0)"
                                                    wire:click='ondel({{ $ruangan->id }})'>Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title"></h5>
                                        <div class="row">
                                            <div class="col ">
                                                <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                                    <h4 class="m-1">
                                                        {{ $ruangan->peralatanataumesinDitempat->count() }}
                                                    </h4>
                                                    <p class="m-0">Peralatan</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col">
                            {{ $ruangans->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    @include('livewire.admin.referensi.kelola-ruangan.ruangan.modal')
</div>
