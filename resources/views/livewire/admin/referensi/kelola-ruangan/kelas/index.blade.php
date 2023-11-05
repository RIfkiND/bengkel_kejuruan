<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="card-title">
                                <h4>Daftar Kelas</h4>
                            </div>
                        </div>
                        <div class="col d-flex justify-content-end px-4">
                            <div class="form-group">
                                <input type="text" class="form-control input-rounded h-25" placeholder="Cari"
                                    wire:model='searchKelas' wire:input='resetPage'>
                            </div>
                        </div>
                        @if (auth()->user()->sekolah_id)
                            <div class="col-lg-2 d-flex justify-content-end px-3 h-50">
                                <a href="#" type="button" class="btn mb-1 btn-primary d-flex justify-content-end"
                                    data-toggle="modal" data-target="#ModalKelas">Tambahkan Kelas</a>
                            </div>
                        @endif
                    </div>
                    <div class="row">
                        @foreach ($kelas as $kls)
                            <div class="col-lg-4 col-sm-6">
                                @if (auth()->user()->role == 'SuperAdmin' or auth()->user()->role == 'Admin')
                                    <a href="{{ route('admin.sekolah.kelas-ruangan.murid', $kls->id) }}">
                                    @else
                                        <a href="{{ route('admin.kelolaruangan.murid', $kls->id) }}">
                                @endif
                                <div class="card">
                                    <div class="social-graph-wrapper widget-facebook">
                                        <span class="s-icon text-truncate"
                                            title="{{ $kls->nama_kelas }}">{{ $kls->nama_kelas }}</span>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                                <h4 class="m-1">{{ $kls->murid->count() }}</h4>
                                                <p class="m-0">Murid</p>
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
                            {{ $kelas->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (auth()->user()->role == 'Admin' or auth()->user()->role == 'SuperAdmin')
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
                        </div>
                        <div class="row">
                            @foreach ($ruangans as $ruangan)
                                <div class="col-lg-4 col-sm-6">
                                    <a href="{{ route('admin.sekolah.ruangan.peralatan', $ruangan->id) }}">
                                        <div class="card">
                                            <div class="social-graph-wrapper widget-facebook">
                                                <span class="s-icon text-truncate"
                                                    title="{{ $ruangan->nama_ruangan }}">{{ $ruangan->nama_ruangan }}</span>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                                        <h4 class="m-1">
                                                            {{ $ruangan->peralatanataumesinDitempat->count() }}
                                                        </h4>
                                                        <p class="m-0">Peralatan</p>
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
                                {{ $ruangans->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Modal -->
    @include('livewire.admin.referensi.kelola-ruangan.kelas.modal')
</div>
