<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="card-title">
                                <h4>Daftar Kategori</h4>
                            </div>
                        </div>
                        <div class="col d-flex justify-content-end px-4">
                            <div class="form-group">
                                <input type="text" class="form-control input-rounded h-25" placeholder="Cari"
                                    wire:model='searchKategori' wire:input='resetPage'>
                            </div>
                        </div>
                        <div class="col d-flex justify-content-end px-4 h-50">
                            <button type="button" class="btn mb-1 btn-primary d-flex justify-content-end"
                            data-toggle="modal" data-target="#ModalKategori">Tambahkan Kategori</button>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($kategories as $kategori)
                            <div class="col-lg-4 col-sm-6">
                                <div class="card">
                                    <div class="social-graph-wrapper widget-facebook">
                                        <span class="s-icon text-truncate" title="{{ $kategori->nama_kategori }}">{{ $kategori->nama_kategori }}</span>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                                <h4 class="m-1">{{$kategori->peralatan->count()}}</h4>
                                                <p class="m-0">Peralatan</p>
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
    @include('livewire.admin.referensi.kategori-peralatan.modal')
</div>
