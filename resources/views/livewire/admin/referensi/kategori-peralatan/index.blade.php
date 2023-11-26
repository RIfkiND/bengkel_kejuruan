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
                        @if (auth()->user()->role == 'Admin' || auth()->user()->role == 'SuperAdmin')
                            <div class="col-lg-2 d-flex justify-content-end px-3 h-50">
                                <a href="#" type="button" class="btn mb-1 btn-primary d-flex justify-content-end"
                                    data-toggle="modal" data-target="#ModalKategori">Tambahkan Kategori</a>
                            </div>
                        @endif
                    </div>
                    <div class="row">
                        @foreach ($kategories as $kategori)
                            <div class="col-lg-4 col-sm-6">
                                <div class="card border-primary  d-flex justify-content-between">
                                    <div class="card-header position-absolute">
                                        @if (strlen($kategori->nama_kategori) > 20)
                                            <b>{{ substr($kategori->nama_kategori, 0, 20) . '...' }}</b>
                                        @else
                                            <b>{{ $kategori->nama_kategori }}</b>
                                        @endif
                                    </div>
                                    <div class="card-header ml-auto btn">
                                        <div class="dropdown">
                                            <a href="javascript:void(0)" data-toggle="dropdown"><i
                                                    class="fa fa-info-circle fa-lg mr-1"></i>More</a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="javascript:void(0)" data-toggle="modal"
                                                    data-target="#ModalKategori" wire:click='edit({{ $kategori->id }})'>Edit</a>
                                                @if (auth()->user()->role == 'AdminSekolah' or auth()->user()->role == 'SuperAdmin')
                                                    <a class="dropdown-item text-danger" href="javascript:void(0)"
                                                        wire:click='ondel({{ $kategori->id }})'>Delete</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title text-center">Peralatan</h5>
                                        <div class="card-text pb-3 pl-0 pr-0 text-center">
                                            <h4 class="m-1">{{ $kategori->peralatan->count() }}</h4>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="card">
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
                                </div> --}}
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col">
                            {{ $kategories->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    @include('livewire.admin.referensi.kategori-peralatan.modal')
</div>
