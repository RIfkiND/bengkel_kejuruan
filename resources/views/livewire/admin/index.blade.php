<div>
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-md-12 grid-margin mb-4">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Selamat Datang @if (Auth::check())
                                @if (auth()->user()->role == 'AdminSekolah' || auth()->user()->role == 'Guru' || auth()->user()->role == 'KepalaBengkel')
                                    <h4>{{ auth()->user()->name }}</h4>
                                    <span>dari:</span><br>
                                    <h4>{{ auth()->user()->sekolah->nama_sekolah }}</h4>
                                @else
                                    <h4>{{ auth()->user()->name }}</h4>
                                @endif
                            @else
                                <a href="{{ route('login') }}"><i class="icon-user"></i>
                                    <span>Login</span></a>
                            @endif
                        </h3>
                        <h6 class="font-weight-normal mb-0">Semua sistem berjalan lancar!<span class="text-primary">
                                Mulai mengelola sekarang</span></h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card tale-bg">
                    <div class="card-people mt-auto">
                        <img src="/Asset/images/people.svg" alt="people" width="100%">
                    </div>
                </div>
            </div>
            @if (auth()->user()->role == 'SuperAdmin' or auth()->user()->role == 'Admin' or auth()->user()->role == 'AdminSekolah')
                <div class="col-md-6 grid-margin transparent">
                    <div class="row">
                        <div class="col-md-6 mb-4 mb-lg-0">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <div class="d-inline-flex align-items-center">
                                                <h2 class="text-primary mb-1 font-weight-medium">{{ $akuns->count() }}
                                                </h2>
                                            </div>
                                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Akun</h6>
                                        </div>
                                        <div class="ms-auto mt-md-3 mt-lg-0">
                                            <span class="opacity-7 text-muted">
                                                <h1><i class="fa fa-user text-primary"></i></h1>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4 mb-lg-0">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <div class="d-inline-flex align-items-center">
                                                <h2 class="text-info mb-1 font-weight-medium">{{ $gurus->count() }}</h2>
                                            </div>
                                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Guru</h6>
                                        </div>
                                        <div class="ms-auto mt-md-3 mt-lg-0">
                                            <span class="opacity-7 text-muted">
                                                <h1><i class="fa fa-user-circle text-info"></i></h1>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4 mb-lg-0">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <div class="d-inline-flex align-items-center">
                                                <h2 class="text-secondary mb-1 font-weight-medium">{{ $kelas->count() }}
                                                </h2>
                                            </div>
                                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Kelas
                                            </h6>
                                        </div>
                                        <div class="ms-auto mt-md-3 mt-lg-0">
                                            <span class="opacity-7 text-muted">
                                                <h1><i class="fa fa-window-restore text-secondary"></i></h1>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <div class="d-inline-flex align-items-center">
                                                <h2 class="text-warning mb-1 font-weight-medium">
                                                    {{ $ruangans->count() }}</h2>
                                            </div>
                                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Ruangan
                                            </h6>
                                        </div>
                                        <div class="ms-auto mt-md-3 mt-lg-0">
                                            <span class="opacity-7 text-muted">
                                                <h1><i class="fa fa-home text-warning"></i></h1>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <div class="d-inline-flex align-items-center">
                                        <h2 class="text-primary mb-1 font-weight-medium">{{ $peralatans->count() }}</h2>
                                    </div>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Peralatan
                                        tersedia</h6>
                                </div>
                                <div class="ms-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted">
                                        <h1><i class="fa fa-wrench text-primary"></i></h1>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <div class="d-inline-flex align-items-center">
                                        <h2 class="text-success mb-1 font-weight-medium">
                                            {{ $pemeliharaans->where('status', 'selesai')->count() }}</h2>
                                    </div>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">
                                        Pemeliharaan
                                        Selesai</h6>
                                </div>
                                <div class="ms-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted">
                                        <h1><i class="fa fa-check text-success"></i></h1>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <div class="d-inline-flex align-items-center">
                                        <h2 class="text-warning mb-1 font-weight-medium">
                                            {{ $pemeliharaans->where('status', 'Belum Selesai')->count() }}</h2>
                                    </div>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Dalam
                                        Proses
                                    </h6>
                                </div>
                                <div class="ms-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted">
                                        <h1><i class="fa fa-tasks text-warning"></i></h1>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <div class="d-inline-flex align-items-center">
                                        <h2 class="text-info mb-1 font-weight-medium">{{ $alats->count() }}</h2>
                                    </div>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Alat dan
                                        Bahan
                                    </h6>
                                </div>
                                <div class="ms-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted">
                                        <h1><i class="fa fa-cube text-info"></i></h1>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if (auth()->user()->role == 'KepalaBengkel')
                <div class="col-md-6 grid-margin transparent">
                    <div class="row">
                        <div class="col-md-6 mb-4 mb-lg-0">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <div class="d-inline-flex align-items-center">
                                                <h2 class="text-primary mb-1 font-weight-medium">
                                                    {{ $peralatans->count() }}</h2>
                                            </div>
                                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">
                                                Peralatan</h6>
                                        </div>
                                        <div class="ms-auto mt-md-3 mt-lg-0">
                                            <span class="opacity-7 text-muted">
                                                <h1><i class="fa fa-wrench text-primary"></i></h1>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4 mb-lg-0">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <div class="d-inline-flex align-items-center">
                                                <h2 class="text-success mb-1 font-weight-medium">
                                                    {{ $pemeliharaans->where('status', 'selesai')->count() }}</h2>
                                            </div>
                                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">
                                                Pemeliharaan
                                                Selesai</h6>
                                        </div>
                                        <div class="ms-auto mt-md-3 mt-lg-0">
                                            <span class="opacity-7 text-muted">
                                                <h1><i class="fa fa-check text-success"></i></h1>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4 mb-lg-0">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <div class="d-inline-flex align-items-center">
                                                <h2 class="text-warning mb-1 font-weight-medium">
                                                    {{ $pemeliharaans->where('status', 'Belum Selesai')->count() }}
                                                </h2>
                                            </div>
                                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Dalam
                                                Proses
                                            </h6>
                                        </div>
                                        <div class="ms-auto mt-md-3 mt-lg-0">
                                            <span class="opacity-7 text-muted">
                                                <h1><i class="fa fa-tasks text-warning"></i></h1>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <div class="d-inline-flex align-items-center">
                                                <h2 class="text-info mb-1 font-weight-medium">{{ $alats->count() }}
                                                </h2>
                                            </div>
                                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Alat dan
                                                Bahan
                                            </h6>
                                        </div>
                                        <div class="ms-auto mt-md-3 mt-lg-0">
                                            <span class="opacity-7 text-muted">
                                                <h1><i class="fa fa-cube text-info"></i></h1>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if (auth()->user()->role == 'Guru')
                <div class="col-md-6 grid-margin transparent">
                    <div class="row">
                        <div class="col-md-6 mb-4 mb-lg-0">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <div class="d-inline-flex align-items-center">
                                                <h2 class="text-secondary mb-1 font-weight-medium">
                                                    {{ $kelas->count() }}</h2>
                                            </div>
                                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Kelas
                                            </h6>
                                        </div>
                                        <div class="ms-auto mt-md-3 mt-lg-0">
                                            <span class="opacity-7 text-muted">
                                                <h1><i class="fa fa-window-restore text-secondary"></i></h1>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4 mb-lg-0">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <div class="d-inline-flex align-items-center">
                                                <h2 class="text-warning mb-1 font-weight-medium">
                                                    {{ $ruangans->count() }}</h2>
                                            </div>
                                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Ruangan
                                            </h6>
                                        </div>
                                        <div class="ms-auto mt-md-3 mt-lg-0">
                                            <span class="opacity-7 text-muted">
                                                <h1><i class="fa fa-home text-warning"></i></h1>
                                            </span>
                                        </div>
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
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="card-title">
                                        <h4>Daftar Pengajuan</h4>
                                    </div>
                                </div>
                                <div class="col d-flex justify-content-end px-5">
                                    <div class="form-group">
                                        <input type="text" class="form-control input-rounded h-25"
                                            placeholder="Cari" wire:model='searchPengajuan' wire:input='resetPage'>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Gambar</th>
                                                <th>Kode A/B</th>
                                                <th>Nama A/B</th>
                                                <th>Volume</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pengajuans as $pengajuan)
                                                <tr>
                                                    <td>{{ $pengajuan->tanggal }}</td>
                                                    <td>
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
                                                    </td>
                                                    <td>{{ $pengajuan->kode }}</td>
                                                    <td>{{ $pengajuan->nama_alat_atau_bahan }}</td>
                                                    <td>{{ $pengajuan->volume }}{{ $pengajuan->satuan }}</td>
                                                    <td>{{ $pengajuan->status }}</td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <a href="javascript:void(0)" data-toggle="dropdown"><i
                                                                    class="fa fa-ellipsis-v fa-lg"></i></a>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" data-toggle="modal"
                                                                    data-target="#ModalPengajuan"href="javascript:void(0)"
                                                                    wire:click='info({{ $pengajuan->id }})'>Informasi</a>
                                                            </div>
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
            </div>
        @endif
        {{-- <div class="row">
            <div class="col-xl-3 col-lg-6 col-sm-6 col-xxl-6">

                <div class="card">
                    <div class="chart-wrapper mb-4">
                        <div class="px-4 pt-4 d-flex justify-content-between">
                            <div>
                                <h4>Sales Activities</h4>
                                <p>Last 6 Month</p>
                            </div>
                            <div>
                                <span><i class="fa fa-caret-up text-success"></i></span>
                                <h4 class="d-inline-block text-success">720</h4>
                                <p class=" text-danger">+120.5(5.0%)</p>
                            </div>
                        </div>
                        <div>
                            <canvas id="chart_widget_3"></canvas>
                        </div>
                    </div>
                    <div class="card-body border-top pt-4">
                        <div class="row">
                            <div class="col-sm-6">
                                <ul>
                                    <li>5% Negative Feedback</li>
                                    <li>95% Positive Feedback</li>
                                </ul>
                                <div>
                                    <h5>Customer Feedback</h5>
                                    <h3>385749</h3>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div id="chart_widget_3_1"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-sm-6 col-xxl-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Activity</h4>
                        <div id="activity">
                            <div class="media border-bottom-1 pt-3 pb-3">
                                <img width="35" src="./images/avatar/1.jpg" class="mr-3 rounded-circle">
                                <div class="media-body">
                                    <h5>Received New Order</h5>
                                    <p class="mb-0">I shared this on my fb wall a few months back,</p>
                                </div><span class="text-muted ">April 24, 2018</span>
                            </div>
                            <div class="media border-bottom-1 pt-3 pb-3">
                                <img width="35" src="./images/avatar/2.jpg" class="mr-3 rounded-circle">
                                <div class="media-body">
                                    <h5>iPhone develered</h5>
                                    <p class="mb-0">I shared this on my fb wall a few months back,</p>
                                </div><span class="text-muted ">April 24, 2018</span>
                            </div>
                            <div class="media border-bottom-1 pt-3 pb-3">
                                <img width="35" src="./images/avatar/2.jpg" class="mr-3 rounded-circle">
                                <div class="media-body">
                                    <h5>3 Order Pending</h5>
                                    <p class="mb-0">I shared this on my fb wall a few months back,</p>
                                </div><span class="text-muted ">April 24, 2018</span>
                            </div>
                            <div class="media border-bottom-1 pt-3 pb-3">
                                <img width="35" src="./images/avatar/2.jpg" class="mr-3 rounded-circle">
                                <div class="media-body">
                                    <h5>Join new Manager</h5>
                                    <p class="mb-0">I shared this on my fb wall a few months back,</p>
                                </div><span class="text-muted ">April 24, 2018</span>
                            </div>
                            <div class="media border-bottom-1 pt-3 pb-3">
                                <img width="35" src="./images/avatar/2.jpg" class="mr-3 rounded-circle">
                                <div class="media-body">
                                    <h5>Branch open 5 min Late</h5>
                                    <p class="mb-0">I shared this on my fb wall a few months back,</p>
                                </div><span class="text-muted ">April 24, 2018</span>
                            </div>
                            <div class="media border-bottom-1 pt-3 pb-3">
                                <img width="35" src="./images/avatar/2.jpg" class="mr-3 rounded-circle">
                                <div class="media-body">
                                    <h5>New support ticket received</h5>
                                    <p class="mb-0">I shared this on my fb wall a few months back,</p>
                                </div><span class="text-muted ">April 24, 2018</span>
                            </div>
                            <div class="media pt-3 pb-3">
                                <img width="35" src="./images/avatar/3.jpg" class="mr-3 rounded-circle">
                                <div class="media-body">
                                    <h5>Facebook Post 30 Comments</h5>
                                    <p class="mb-0">I shared this on my fb wall a few months back,</p>
                                </div><span class="text-muted ">April 24, 2018</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-12 col-sm-12 col-xxl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-0">Store Location</h4>
                        <div id="world-map" style="height: 470px;"></div>
                    </div>
                </div>
            </div>
        </div> --}}
        {{-- <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="social-graph-wrapper widget-facebook">
                        <span class="s-icon"><i class="fa fa-facebook"></i></span>
                    </div>
                    <div class="row">
                        <div class="col-6 border-right">
                            <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                <h4 class="m-1">89k</h4>
                                <p class="m-0">Friends</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                <h4 class="m-1">119k</h4>
                                <p class="m-0">Followers</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="social-graph-wrapper widget-linkedin">
                        <span class="s-icon"><i class="fa fa-linkedin"></i></span>
                    </div>
                    <div class="row">
                        <div class="col-6 border-right">
                            <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                <h4 class="m-1">89k</h4>
                                <p class="m-0">Friends</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                <h4 class="m-1">119k</h4>
                                <p class="m-0">Followers</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="social-graph-wrapper widget-googleplus">
                        <span class="s-icon"><i class="fa fa-google-plus"></i></span>
                    </div>
                    <div class="row">
                        <div class="col-6 border-right">
                            <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                <h4 class="m-1">89k</h4>
                                <p class="m-0">Friends</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                <h4 class="m-1">119k</h4>
                                <p class="m-0">Followers</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="social-graph-wrapper widget-twitter">
                        <span class="s-icon"><i class="fa fa-twitter"></i></span>
                    </div>
                    <div class="row">
                        <div class="col-6 border-right">
                            <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                <h4 class="m-1">89k</h4>
                                <p class="m-0">Friends</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                <h4 class="m-1">119k</h4>
                                <p class="m-0">Followers</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
    {{-- modal --}}
    @include('livewire.admin.alat-bahan.pengajuan.modal')
</div>
