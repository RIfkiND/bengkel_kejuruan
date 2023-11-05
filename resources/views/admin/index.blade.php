@extends('layouts.admin')

@push('css')
    <!-- Pignose Calender -->
    <link href="/Asset/plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="/Asset/plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="/Asset/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
@endpush

@section('content')
    <div class="content-body">

        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-md-12 grid-margin mb-4">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">Selamat Datang @if (Auth::check())
                                    <h4>{{ auth()->user()->name }}</h4>
                                @else
                                    <a href="{{ route('login') }}"><i class="icon-user"></i>
                                        <span>Login</span></a>
                                @endif
                            </h3>
                            <h6 class="font-weight-normal mb-0">Semua sistem berjalan lancar!<span class="text-primary">
                                    Mulai mengelola sekarang</span></h6>
                        </div>
                        <div class="col-12 col-xl-4">
                            <div class="justify-content-end d-flex">
                                <form action="">
                                    <div class="form-group">
                                        <select class="form-control" id="sel1" style="border-radius: 5px">
                                            <option selected id="default">Umum</option>
                                            <option>LAB-TIK</option>
                                            <option>LAB-RPL</option>
                                            <option>LAB SIMDIG</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
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
                <div class="col-md-6 grid-margin transparent">
                    <div class="row">
                        <div class="col-md-6 mb-4 mb-lg-0">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <div class="d-inline-flex align-items-center">
                                                <h2 class="text-primary mb-1 font-weight-medium">12</h2>
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
                                                <h2 class="text-info mb-1 font-weight-medium">125</h2>
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
                                                <h2 class="text-secondary mb-1 font-weight-medium">12</h2>
                                            </div>
                                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Kelas</h6>
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
                                                <h2 class="text-warning mb-1 font-weight-medium">12</h2>
                                            </div>
                                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Ruangan</h6>
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
                <div class="col-md-6 grid-margin transparent">
                    <div class="row">
                        <div class="col-md-6 mb-4 mb-lg-0">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <div class="d-inline-flex align-items-center">
                                                <h2 class="text-primary mb-1 font-weight-medium">12</h2>
                                                <span
                                                    class="badge font-12 text-secondary font-weight-medium rounded-pill ms-2 d-lg-block d-md-none">/25</span>
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
                        <div class="col-md-6 mb-4 mb-lg-0">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <div class="d-inline-flex align-items-center">
                                                <h2 class="text-success mb-1 font-weight-medium">12</h2>
                                            </div>
                                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Pemeliharaan
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
                                                <h2 class="text-warning mb-1 font-weight-medium">12</h2>
                                            </div>
                                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Dalam Proses
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
                                                <h2 class="text-info mb-1 font-weight-medium">12</h2>
                                            </div>
                                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Alat / Bahan
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
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="active-member">
                                <div class="table-responsive">
                                    <table class="table table-xs mb-0">
                                        <thead>
                                            <h4>Laporan Pengajuan</h4>
                                            <tr>
                                                <th>Gambar</th>
                                                <th>Nama</th>
                                                <th>Country</th>
                                                <th>Status</th>
                                                <th>Payment Method</th>
                                                <th>Activity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><img src="/Asset/images/avatar/1.jpg"
                                                        style="max-width: 100px; height: auto; " alt=""></td>
                                                <td>iPhone X</td>
                                                <td>
                                                    <span>United States</span>
                                                </td>
                                                <td>
                                                    <div>
                                                        <div class="progress" style="height: 6px">
                                                            <div class="progress-bar bg-success" style="width: 50%"></div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-circle-o text-success  mr-2"></i> Paid</td>
                                                <td>
                                                    <span>Last Login</span>
                                                    <span class="m-0 pl-3">10 sec ago</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><img src="/Asset/images/cc.jpg" alt=""
                                                        style="max-width: 100px; height: auto; ">
                                                </td>
                                                <td>OnePlus</td>
                                                <td><span>Germany</span></td>
                                                <td>
                                                    <div>
                                                        <div class="progress" style="height: 6px">
                                                            <div class="progress-bar bg-warning" style="width: 50%"></div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-circle-o text-warning  mr-2"></i> Pending</td>
                                                <td>
                                                    <span>Last Login</span>
                                                    <span class="m-0 pl-3">10 sec ago</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
        <!-- #/ container -->
    </div>
@endsection

@push('js')
    <!-- Chartjs -->
    <script src="/Asset/plugins/chart.js/Chart.bundle.min.js"></script>
    <!-- Datamap -->
    <script src="/Asset/plugins/d3v3/index.js"></script>
    <script src="/Asset/plugins/topojson/topojson.min.js"></script>
    <script src="/Asset/plugins/datamaps/datamaps.world.min.js"></script>
    <!-- Morrisjs -->
    <script src="/Asset/plugins/raphael/raphael.min.js"></script>
    <script src="/Asset/plugins/morris/morris.min.js"></script>
    <!-- Pignose Calender -->
    <script src="/Asset/plugins/moment/moment.min.js"></script>
    <script src="/Asset/plugins/pg-calendar/js/pignose.calendar.min.js"></script>
    <!-- ChartistJS -->
    <script src="/Asset/plugins/chartist/js/chartist.min.js"></script>
    <script src="/Asset/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>



    <script src="/Asset/js/dashboard/dashboard-1.js"></script>
@endpush
