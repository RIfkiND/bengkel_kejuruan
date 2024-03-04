<div class="container-fluid pt-2">
    <div class="row">
        <div class="col-sm-6 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="col-7 pt-2">
                            <caption>Sekolah yang terdaftar</caption>
                        </div>
                        <div class="col-5">
                            <div class="d-flex align-items-center justify-content-end">
                                <form class="me-2 d-none d-lg-block">
                                    <div class="customize-input">
                                        <input class="form-control custom-shadow border-2 bg-white" type="text"
                                            placeholder="Search" aria-label="Search" style="border-radius: 10px;"
                                            wire:model='searchSekolah' wire:input='resetPage'>
                                    </div>
                                </form>
                                <div class="customize-input float-end ms-2">
                                    <button class="btn btn-primary" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" style="border-radius: 10px;">Tambah <i
                                            class="fas fa-caret-down"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <!-- Dropdown menu links -->
                                        <a class="dropdown-item" href="javascriptvoid(0)" data-bs-toggle="modal"
                                            data-bs-target="#ModalSekolah"><i class="fas fa-plus text-primary"></i>
                                            <span class="text-primary"> Tambah Sekolah</span></a>
                                        <a class="dropdown-item" href="javascriptvoid(0)" data-bs-toggle="modal"
                                            data-bs-target="#ModalImportSekolah"><i
                                                class="fas fa-download text-success"></i> <span
                                                class="text-success">Import Sekolah</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @forelse ($sekolahs as $sekolah)
            <div class="col-lg-4">
                <div class="card enlarge-on-hover" style="border-radius: 10px;">
                    <div class="row">
                        <div class="col-lg-10 d-flex">
                            <div class="card-header" style="background-color: white;">
                                <h4 class="mb-0">
                                    @if (strlen($sekolah->nama_sekolah) > 20)
                                        {{ substr($sekolah->nama_sekolah, 0, 20) . '...' }}
                                    @else
                                        {{ $sekolah->nama_sekolah }}
                                    @endif
                                </h4>
                            </div>
                        </div>
                        <div class="col-lg-2 d-flex justify-content-end">
                            <div class="card-header" style="background-color: white;">
                                <a class="dropdown-toggle pl-md-3 position-relative" href="javascript:void(0)"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-h"></i>
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" a href="javascript:void(0)"
                                        wire:click='edit({{ $sekolah->id }})' data-bs-toggle="modal"
                                        data-bs-target="#ModalSekolah"><i class="fas fa-pencil-alt text-info"></i><span
                                            class="text-info">
                                            Edit</span></a>
                                    <a class="dropdown-item" href="javascript:void(0)"
                                        wire:click='ondel({{ $sekolah->id }})'><i
                                            class="fas fa-trash text-danger"></i><span class="text-danger">
                                            Delete</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="card-body">
                                <a href="{{ route('admin.sekolah.kelas-ruangan', $sekolah->id) }}"
                                    class="text-secondary">
                                    <div class="row">
                                        <div class="col-lg-6 border-right">
                                            <div class="card-text">
                                                <span>Peralatan :<span class="card-title">
                                                        {{ $sekolah->total_peralatan_count }}</span></span><br><br>
                                                <span>Guru :<span class="card-title">
                                                        {{ $sekolah->guru->count() }}</span></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 border-right">
                                            <div class="card-text">
                                                <span>Ruangan :<span class="card-title">
                                                        {{ $sekolah->ruangan->count() }}</span></span><br><br>
                                                <span>Murid : <span class="card-title">
                                                        {{ $sekolah->total_murid_count }}</span></span>
                                            </div>
                                        </div>
                                    </div>
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
            {{ $sekolahs->links() }}
        </div>
    </div>

    <!-- Modal -->
    @include('livewire.admin.referensi.sekolah.modal')
