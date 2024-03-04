<div class="container-fluid pt-2">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-7">
                            <caption>Daftar Kelas</caption>
                        </div>
                        <div class="col-5">
                            <div class="d-flex align-items-center justify-content-end">
                                <form class="me-2 d-none d-lg-block">
                                    <div class="customize-input">
                                        <input class="form-control custom-shadow border-2 bg-white" type="text"
                                            placeholder="Search" aria-label="Search" style="border-radius: 10px;"
                                            wire:model='searchKelas' wire:input='resetPage'>
                                    </div>
                                </form>
                                @if (auth()->user()->sekolah_id)
                                    <div class="customize-input float-end ms-2">
                                        <button class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#ModalKelas" style="border-radius: 10px;">Tambah
                                        </button>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @forelse ($kelas as $kls)
                            <div class="col-lg-4">
                                <div class="card enlarge-on-hover" style="border-radius: 10px;">
                                    <div class="row">
                                        <div class="col-lg-10 d-flex">
                                            <div class="card-header" style="background-color: white;">
                                                {{ $kls->nama_kelas }}
                                            </div>
                                        </div>
                                        <div class="col-lg-2 d-flex justify-content-end">
                                            <div class="card-header" style="background-color: white;">
                                                <a class="dropdown-toggle pl-md-3 position-relative"
                                                    href="javascript:void(0)" data-bs-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="javascript:void(0)"
                                                        data-bs-toggle="modal" data-bs-target="#ModalKelas"
                                                        wire:click='edit({{ $kls->id }})'><i
                                                            class="fas fa-pencil-alt text-info"></i><span
                                                            class="text-info">
                                                            Edit</span></a>
                                                    @if (auth()->user()->role == 'AdminSekolah' or auth()->user()->role == 'SuperAdmin')
                                                        <a class="dropdown-item" href="javascript:void(0)"
                                                            wire:click='ondel({{ $kls->id }})'><i
                                                                class="fas fa-trash text-danger"></i><span
                                                                class="text-danger">
                                                                Delete</span>
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="card-body">
                                                @if (auth()->user()->role == 'SuperAdmin' or auth()->user()->role == 'Admin')
                                                    <a href="{{ route('admin.sekolah.kelas-ruangan.murid', $kls->id) }}"
                                                        class="text-secondary">
                                                    @else
                                                        <a href="{{ route('admin.kelolaruangan.murid', $kls->id) }}"
                                                            class="text-secondary">
                                                @endif
                                                <h3 class="card-title text-center">
                                                    {{ $kls->murid->count() }}</h3>
                                                <p class="card-text text-center">Murid</p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col">
                                <div class="login-form-bg h-100">
                                    <div class="container h-100">
                                        <div class="row justify-content-center h-100">
                                            <div class="col-xl-12">

                                                <h2 class="my-5 text-secondary text-wrap">Tidak ada Kelas yang dimaksud
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforelse
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
                                <form class="me-2 d-none d-lg-block">
                                    <div class="customize-input">
                                        <input class="form-control custom-shadow border-2 bg-white" type="text"
                                            placeholder="Search" aria-label="Search" style="border-radius: 10px;"
                                            wire:model='searchRuangan' wire:input='resetPage'>
                                    </div>
                                </form>
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
                                                    <a class="dropdown-toggle pl-md-3 position-relative"
                                                        href="javascript:void(0)" data-bs-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-h"></i>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="javascript:void(0)"
                                                            data-bs-toggle="modal" data-bs-target="#ModalKelas"
                                                            wire:click='edit({{ $kls->id }})'><i
                                                                class="fas fa-pencil-alt text-info"></i><span
                                                                class="text-info">
                                                                Edit</span></a>
                                                        @if (auth()->user()->role == 'AdminSekolah' or auth()->user()->role == 'SuperAdmin')
                                                            <a class="dropdown-item" href="javascript:void(0)"
                                                                wire:click='ondel({{ $kls->id }})'><i
                                                                    class="fas fa-trash text-danger"></i><span
                                                                    class="text-danger">
                                                                    Delete</span>
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="card-body">
                                                    <a href="{{ route('admin.sekolah.ruangan.peralatan', $ruangan->id) }}"
                                                        class="text-secondary">

                                                        <h3 class="card-title text-center">
                                                            {{ $ruangan->peralatanataumesinDitempat->count() }}</h3>
                                                        <p class="card-text text-center">Ruangan</p>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
