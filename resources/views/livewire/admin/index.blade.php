<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6 col-lg-8">
            <div class="custom-card card" style="background-color: #dde7ff;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-7">
                            @if (Auth::check())
                                @if (auth()->user()->role == 'AdminSekolah' || auth()->user()->role == 'Guru' || auth()->user()->role == 'KepalaBengkel')
                                    <h2 class="card-title text-truncate text-dark font-weight-medium mb-1"><span
                                            class="text-info">{{ auth()->user()->role }}</span>
                                    </h2>
                                    <p class="card-text">
                                        <span id="welcomeText">dari</span>
                                        {{ auth()->user()->sekolah->nama_sekolah }}
                                    </p>
                                @else
                                    <h2 class="card-title text-truncate text-dark font-weight-medium mb-1"><span
                                            class="text-info">{{ auth()->user()->role }}</span>
                                    </h2>
                                    <p class="card-text">
                                        <span id="welcomeText">Semua Sistem berjalan dengan lancar!</span>

                                    </p>
                                @endif
                            @else
                                <a href="{{ route('login') }}"><i class="icon-user"></i>
                                    <span>Login</span></a>
                            @endif
                        </div>
                        <div class="col-sm-5">
                            <img src="/Asset/images/welcome-image.png" alt="welcome" class="img-fluid"
                                style="height: 
                          150px ;">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if (auth()->user()->role == 'SuperAdmin' or auth()->user()->role == 'Admin')
            <div class="col-sm-6 col-lg-2 mb-4">
                <div class="custom-card card">
                    <div class="card-body text-center">
                        <div class="icon-container mb-4">
                            <a href="{{ route('admin.pengguna.akun') }}"
                                class="btn btn-primary btn-circle mb-2 btn-item">
                                <i data-feather="user"></i>
                            </a>
                        </div>
                        <h2 class="text-primary mb-1 font-weight-medium">{{ $akuns->count() }}</h2>
                        <div class="d-flex align-items-center mt-4">
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">
                                Akun
                            </h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-2 mb-4">
                <div class="custom-card card">
                    <div class="card-body text-center">
                        <div class="icon-container mb-4">
                            <a href="{{ route('admin.sekolah') }}" class="btn text-primary btn-circle mb-2 btn-item"
                                style="background-color: #dde7ff;">
                                <i data-feather="trello"></i>
                            </a>
                        </div>
                        <h2 class="text-dark mb-1 font-weight-medium">4</h2>
                        <div class="d-flex align-items-center mt-4">
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">
                                Sekolah
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if (auth()->user()->role == 'AdminSekolah')
            <div class="col-sm-6 col-lg-2 mb-4">
                <div class="custom-card card">
                    <div class="card-body text-center">
                        <div class="icon-container mb-4">
                            <a href="{{ route('admin.pengguna.akun') }}"
                                class="btn btn-primary btn-circle mb-2 btn-item">
                                <i data-feather="user"></i>
                            </a>
                        </div>
                        <h2 class="text-primary mb-1 font-weight-medium">{{ $akuns->count() }}</h2>
                        <div class="d-flex align-items-center mt-4">
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">
                                Akun
                            </h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-2 mb-4">
                <div class="custom-card card">
                    <div class="card-body text-center">
                        <div class="icon-container mb-4">
                            <a href="{{ route('admin.pengguna.guru') }}"
                                class="btn text-primary btn-circle mb-2 btn-item" style="background-color: #dde7ff;">
                                <i data-feather="user-check"></i>
                            </a>
                        </div>
                        <h2 class="text-dark mb-1 font-weight-medium">{{ $gurus->count() }}</h2>
                        <div class="d-flex align-items-center mt-4">
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">
                                Guru
                            </h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Siap Digunakan</h4>
                        <div class="mt-4 activity">
                            <div class="d-flex align-items-start border-left-line pb-3">
                                <div>
                                    <a href="{{ route('admin.peralatanmesin.daftar') }}"
                                        class="btn text-white btn-circle mb-2 btn-item"
                                        style="background-color: dodgerblue;">
                                        <i data-feather="settings"></i>
                                    </a>
                                </div>
                                <div class="ms-3 mt-2">
                                    <h2 class="font-weight-medium mb-2" style="color: dodgerblue;">
                                        {{ $peralatans->count() }}</h2>
                                    <p class="font-14 mb-2 text-muted">Peralatan Mesin
                                    </p>
                                </div>
                            </div>
                            <div class="d-flex align-items-start border-left-line pb-3">
                                <div>
                                    <a href="{{ route('admin.alatbahan.daftar') }}"
                                        class="btn btn-circle mb-2 btn-item"
                                        style="background-color: #c870f5; color: white;">
                                        <i data-feather="package"></i>
                                    </a>
                                </div>
                                <div class="ms-3 mt-2">
                                    <h2 class="font-weight-medium mb-2" style="color: #c870f5;">
                                        {{ $alats->count() }}</h2>
                                    <p class="font-14 mb-2 text-muted">Alat dan bahan </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Peralatan Mesin</h4>
                        <div class="mt-4 activity">
                            <div class="d-flex align-items-start border-left-line pb-3">
                                <div>
                                    <a href="javascript:void(0)" class="btn btn-danger btn-circle mb-2 btn-item">
                                        <i data-feather="x-circle"></i>
                                    </a>
                                </div>
                                <div class="ms-3 mt-2">
                                    <h2 class="text-danger font-weight-medium mb-2">
                                        {{ $pemeliharaans->where('status', 'Belum Selesai')->count() }}</h2>
                                    <p class="font-14 mb-2 text-muted">Dalam Perbaikan
                                    </p>
                                </div>
                            </div>
                            <div class="d-flex align-items-start border-left-line pb-3">
                                <div>
                                    <a href="javascript:void(0)" class="btn btn-success btn-circle mb-2 btn-item">
                                        <i data-feather="check-circle"></i>
                                    </a>
                                </div>
                                <div class="ms-3 mt-2">
                                    <h2 class="text-success font-weight-medium mb-2">
                                        {{ $pemeliharaans->where('status', 'selesai')->count() }}</h2>
                                    <p class="font-14 mb-2 text-muted">Pemeliharaan Selesai </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="row pt-2">
                    <div class="col-md-12">
                        <div class="card border-end">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-2">
                                    <div>
                                        <div class="d-inline-flex align-items-center">
                                            <h2 class="text-warning mb-1 font-weight-medium"> {{ $kelas->count() }}
                                            </h2>

                                        </div>
                                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Kelas
                                        </h6>
                                    </div>
                                    <div class="ms-auto mt-md-3 mt-lg-0">
                                        <a href="{{ route('admin.kelolaruangan.kelas') }}"
                                            class="btn btn-warning text-white btn-circle mb-2 btn-item">
                                            <i data-feather="trello"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card border-end">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-2">
                                    <div>
                                        <div class="d-inline-flex align-items-center">
                                            <h2 class="text-secondary mb-1 font-weight-medium">
                                                {{ $ruangans->count() }}</h2>
                                        </div>
                                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">
                                            Ruangan
                                        </h6>
                                    </div>
                                    <div class="ms-auto mt-md-3 mt-lg-0">
                                        <a href="{{ route('admin.kelolaruangan.ruangan') }}"
                                            class="btn btn-secondary btn-circle mb-2 btn-item">
                                            <i data-feather="home"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if (auth()->user()->role == 'Guru')
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Navigasi</h4>
                        <div class="mt-4 activity">
                            <div class="d-flex align-items-start border-left-line pb-3">
                                <div>
                                    <a href="{{ route('admin.peralatanmesin.daftar') }}"
                                        class="btn text-white btn-circle mb-2 btn-item"
                                        style="background-color: dodgerblue;">
                                        <i data-feather="settings"></i>
                                    </a>
                                </div>
                                <div class="ms-3 mt-2">
                                    <h2 class="font-weight-medium mb-2" style="color: dodgerblue;">
                                        12</h2>
                                    <p class="font-14 mb-2 text-muted">Peralatan Mesin
                                    </p>
                                </div>
                            </div>
                            <div class="d-flex align-items-start border-left-line pb-3">
                                <div>
                                    <a href="{{ route('admin.kelolaruangan.kelas') }}"
                                        class="btn btn-warning btn-circle mb-2 btn-item text-white">
                                        <i data-feather="trello"></i>
                                    </a>
                                </div>
                                <div class="ms-3 mt-2">
                                    <h2 class="font-weight-medium mb-2" style="color: #c870f5;">
                                        {{ $kelas->count() }}</h2>
                                    <p class="font-14 mb-2 text-muted">Kelas</p>
                                    <a href="{{ route('admin.peralatanmesin.peminjaman') }}"
                                        class="font-14 border-bottom pb-1 border-info">Mulai
                                        Meminjam
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if (auth()->user()->role == 'KepalaBengkel')
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('admin.peralatanmesin.pemeliharaan') }}"
                            class="font-14 border-bottom pb-1 border-info">Cek Pemeliharaan

                        </a>
                        <div class="mt-4 activity">
                            <div class="d-flex align-items-start border-left-line pb-3">
                                <div>
                                    <a href="{{ route('admin.peralatanmesin.daftar') }}"
                                        class="btn text-white btn-circle mb-2 btn-item"
                                        style="background-color: dodgerblue;">
                                        <i data-feather="settings"></i>
                                    </a>
                                </div>
                                <div class="ms-3 mt-2">
                                    <h2 class="font-weight-medium mb-2" style="color: dodgerblue;">
                                        {{ $peralatans->count() }}</h2>
                                    <p class="font-14 mb-2 text-muted">Peralatan Mesin
                                    </p>
                                </div>
                            </div>
                            <div class="d-flex align-items-start border-left-line pb-3">
                                <div>
                                    <a href="{{ route('admin.alatbahan.daftar') }}"
                                        class="btn btn-circle mb-2 btn-item"
                                        style="background-color: #c870f5; color: white;">
                                        <i data-feather="package"></i>
                                    </a>
                                </div>
                                <div class="ms-3 mt-2">
                                    <h2 class="font-weight-medium mb-2" style="color: #c870f5;">
                                        {{ $alats->count() }}</h2>
                                    <p class="font-14 mb-2 text-muted">Alat dan bahan </p>
                                </div>
                            </div>
                            <div class="d-flex align-items-start border-left-line pb-3">
                                <div>
                                    <a href="javascript:void(0)" class="btn btn-danger btn-circle mb-2 btn-item">
                                        <i data-feather="x-circle"></i>
                                    </a>
                                </div>
                                <div class="ms-3 mt-2">
                                    <h2 class="text-danger font-weight-medium mb-2">
                                        {{ $pemeliharaans->where('status', 'Belum Selesai')->count() }}</h2>
                                    <p class="font-14 mb-2 text-muted">Dalam Perbaikan
                                    </p>
                                </div>
                            </div>
                            <div class="d-flex align-items-start border-left-line pb-3">
                                <div>
                                    <a href="javascript:void(0)" class="btn btn-success btn-circle mb-2 btn-item">
                                        <i data-feather="check-circle"></i>
                                    </a>
                                </div>
                                <div class="ms-3 mt-2">
                                    <h2 class="text-success font-weight-medium mb-2">
                                        {{ $pemeliharaans->where('status', 'selesai')->count() }}</h2>
                                    <p class="font-14 mb-2 text-muted">Pemeliharaan Selesai </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    @if (auth()->user()->role == 'AdminSekolah')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-4">
                            <h4 class="card-title">Daftar Pengajuan</h4>
                            <div class="ms-auto">
                                <form>
                                    <div class="customize-input">
                                        <input class="form-control custom-shadow custom-radius border-1 bg-white"
                                            type="text" placeholder="Search" aria-label="Search"
                                            wire:model='searchPengajuan' wire:input='resetPage'>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table no-wrap v-middle mb-0">
                                <thead>
                                    <tr class="border-0">
                                        <th class="border-0 font-14 font-weight-medium text-muted">Nama Alat
                                            Bahan
                                        </th>
                                        <th class="border-0 font-14 font-weight-medium text-muted px-2">
                                            Tanggal Pengajuan
                                        </th>
                                        <th class="border-0 font-14 font-weight-medium text-muted px-2">Kode
                                            Alat Bahan</th>
                                        <th class="border-0 font-14 font-weight-medium text-muted text-center">
                                            Volume
                                        </th>
                                        <th class="border-0 font-14 font-weight-medium text-muted text-center">
                                            Status
                                        </th>
                                        <th class="border-0 font-14 font-weight-medium text-muted">Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pengajuans as $pengajuan)
                                        <tr>
                                            <td class="border-top-0 px-2 py-4">
                                                <div class="d-flex no-block align-items-center">
                                                    <div class="me-3">
                                                        @if ($pengajuan->gambar)
                                                            <img onclick="previewImage(this)"
                                                                src="{{ asset('storage/' . $pengajuan->gambar) }}"
                                                                alt=""
                                                                style="max-width: 100px; height: auto; cursor: pointer;">
                                                        @else
                                                            <svg class="bd-placeholder-img img-thumbnail"
                                                                width="200" height="200"
                                                                xmlns="http://www.w3.org/2000/svg" role="img"
                                                                aria-label="A generic square placeholder image with a white border around it, making it resemble a photograph taken with an old instant camera: 200x200"
                                                                preserveAspectRatio="xMidYMid slice"
                                                                focusable="false">
                                                                <title>A generic square placeholder image with a white
                                                                    border
                                                                    around
                                                                    it,
                                                                    making it resemble a photograph taken with an old
                                                                    instant
                                                                    camera
                                                                </title>
                                                                <rect width="100%" height="100%" fill="#868e96">
                                                                </rect>
                                                                <text y="50%" x="20%" fill="#dee2e6"
                                                                    dy=".3em">Gambar
                                                                    Preview</text>
                                                            </svg>
                                                        @endif
                                                    </div>
                                                    <div class="">
                                                        <h5 class="text-dark mb-0 font-16 font-weight-medium">
                                                            {{ $pengajuan->nama_alat_atau_bahan }}</h5>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="border-top-0 text-muted px-2 py-4 font-14">
                                                {{ $pengajuan->tanggal }}
                                            </td>
                                            <td class="border-top-0 px-2 py-4 font-14">
                                                {{ $pengajuan->kode }}
                                            </td>
                                            <td
                                                class="border-top-0 text-center font-weight-medium text-muted px-2 py-4">
                                                {{ $pengajuan->volume }}{{ $pengajuan->satuan }}
                                            </td>
                                            <td class="border-top-0 text-center px-4 py-4">{{ $pengajuan->status }}
                                            </td>
                                            <td class="font-weight-medium text-dark border-top-0 px-4 py-4">
                                                <a class="dropdown-toggle pl-md-3 position-relative"
                                                    href="javascript:void(0)" data-bs-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"data-toggle="modal"
                                                        data-target="#ModalPengajuan"href="javascript:void(0)"
                                                        wire:click='info({{ $pengajuan->id }})'>Informasi</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif


    {{-- modal --}}
    @include('livewire.admin.alat-bahan.pengajuan.modal')
