<div class="container-fluid pt-2">
    <div class="row">
        <div class="col-sm-6 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="col-7 pt-2">
                            <caption>Daftar Ruangan</caption>
                        </div>
                        <div class="col-5">
                            <div class="d-flex align-items-center justify-content-end">
                                <form class="me-2 d-none d-lg-block">
                                    <div class="customize-input">
                                        <input class="form-control custom-shadow border-2 bg-white" type="text"
                                            placeholder="Search" aria-label="Search" style="border-radius: 10px;"
                                            wire:model='searchRuangan' wire:input='resetPage'>
                                    </div>
                                </form>
                                {{-- @if (auth()->user()->role == 'AdminSekolah') --}}
                                <div class="customize-input float-end ms-2">
                                    <button class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#ModalRuangan" style="border-radius: 10px;">Tambah
                                    </button>
                                </div>
                                {{-- @endif --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach ($ruangans as $ruangan)
            <div class="col-lg-4">
                <div class="card enlarge-on-hover" style="border-radius: 10px;">
                    <div class="row">
                        <div class="col-lg-10 d-flex">
                            <div class="card-header" style="background-color: white;">
                                {{ $ruangan->nama_ruangan }}
                            </div>
                        </div>
                        <div class="col-lg-2 d-flex justify-content-end">
                            <div class="card-header" style="background-color: white;">
                                <a class="dropdown-toggle pl-md-3 position-relative" href="javascript:void(0)"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-h"></i>
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="javascript:void(0)" data-bs-toggle="modal"
                                        wire:click='edit({{ $ruangan->id }})' data-bs-toggle="modal"
                                        data-bs-target="#ModalRuangan"><i class="fas fa-pencil-alt text-info"></i><span
                                            class="text-info">
                                            Edit</span></a>
                                    <a class="dropdown-item" href="javascript:void(0)"
                                        wire:click='ondel({{ $ruangan->id }})'><i
                                            class="fas fa-trash text-danger"></i><span class="text-danger">
                                            Delete</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="card-body">
                                @if (auth()->user()->role == 'AdminSekolah')
                                    <a href="{{ route('admin.kelolaruangan.ruangan.peralatan', $ruangan->id) }}"
                                        class="text-secondary">
                                    @else
                                        <a href="{{ route('admin.sekolah.ruangan.peralatan', $ruangan->id) }}"
                                            class="text-secondary">
                                @endif
                                <h3 class="card-title text-center"> {{ $ruangan->peralatanataumesinDitempat->count() }}
                                </h3>
                                <p class="card-text text-center">Peralatan</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="col-lg-12 d-flex justify-content-end">
            {{ $ruangans->links() }}
        </div>
    </div>

    <!-- Modal -->
    @include('livewire.admin.referensi.kelola-ruangan.ruangan.modal')
