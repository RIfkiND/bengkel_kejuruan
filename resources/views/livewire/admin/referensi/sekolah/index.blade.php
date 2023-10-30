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
                        <div class="col-2 d-flex justify-content-end px-4 h-50">
                            <button type="button" class="btn mb-1 btn-primary d-flex justify-content-end"
                                data-toggle="modal" data-target="#ModalSekolah">Tambahkan Sekolah</button>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($sekolahs as $sekolah)
                            <div class="col-lg-4 col-sm-6">
                                <div class="card">
                                    <div class="social-graph-wrapper widget-facebook">
                                        <span class="s-icon text-truncate" title="{{ $sekolah->nama_sekolah }}">{{ $sekolah->nama_sekolah }}</span>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 border-right">
                                            <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                                <h4 class="m-1">{{ $sekolah->total_murid_count }}</h4>
                                                <p class="m-0">Murid</p>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                                <h4 class="m-1">{{ $sekolah->ruangan->count() }}</h4>
                                                <p class="m-0">Ruangan</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 border-right">
                                            <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                                <h4 class="m-1">{{ $sekolah->guru->count() }}</h4>
                                                <p class="m-0">Guru</p>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                                <h4 class="m-1">{{ $sekolah->total_peralatan_count }}</h4>
                                                <p class="m-0">Peralatan/Mesin</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    @include('livewire.admin.referensi.sekolah.modal')
</div>
