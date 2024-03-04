<div class="container-fluid pt-2">
    <div class="row">
        <div class="col-sm-6 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="col-7 pt-2">
                            <caption>Kategori yang terdaftar</caption>
                        </div>
                        <div class="col-5">
                            <div class="d-flex align-items-center justify-content-end">
                                <form class="me-2 d-none d-lg-block">
                                    <div class="customize-input">
                                        <input class="form-control custom-shadow border-2 bg-white" type="text"
                                            placeholder="Search" aria-label="Search" style="border-radius: 10px;"
                                            wire:model='searchKategori' wire:input='resetPage'>
                                    </div>
                                </form>
                                {{-- @if (auth()->user()->role == 'AdminSekolah') --}}
                                <div class="customize-input float-end ms-2">
                                    <button class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#ModalKategori" style="border-radius: 10px;">Tambah
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
        @forelse ($kategories as $kategori)
            <div class="col-lg-4">
                <div class="card enlarge-on-hover" style="border-radius: 10px;">
                    <div class="row">
                        <div class="col-lg-10 d-flex">
                            <div class="card-header" style="background-color: white;">
                                @if (strlen($kategori->nama_kategori) > 20)
                                    <h4>{{ substr($kategori->nama_kategori, 0, 20) . '...' }}</h4>
                                @else
                                    <h4>{{ $kategori->nama_kategori }}</h4>
                                @endif
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
                                        data-bs-target="#ModalKategori" wire:click='edit({{ $kategori->id }})'><i
                                            class="fas fa-pencil-alt text-info"></i><span class="text-info">
                                            Edit</span></a>
                                    @if (auth()->user()->role == 'AdminSekolah' or auth()->user()->role == 'SuperAdmin')
                                        <a class="dropdown-item" href="javascript:void(0)"
                                            wire:click='ondel({{ $kategori->id }})'><i
                                                class="fas fa-trash text-danger"></i><span class="text-danger">
                                                Delete</span>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="card-body">
                                <a href="javascript:void(0)" class="text-secondary">
                                    <h3 class="card-title text-center">{{ $kategori->peralatan->count() }}</h3>
                                    <p class="card-text text-center">Peralatan</p>
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
                            <div class="col-xl-6">
                                <div class="error-content">
                                    <div class="card mb-0">
                                        <div class="card-body text-center pt-5">
                                            <h1 class="error-text text-warning mt-5"><i class="fa fa-info-circle"></i>
                                            </h1>

                                            <h1 class="my-5 text-warning text-wrap">Data Tidak Ada
                                            </h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforelse
        <div class="col-lg-12 d-flex justify-content-end">
            {{ $kategories->links() }}
        </div>
    </div>

    <!-- Modal -->
    @include('livewire.admin.referensi.kategori-peralatan.modal')
