@extends('layouts.admin')

@section('content')
    <div class="content-body">

        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Peralatan</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Pemeliharaan</a></li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="card-title">
                                        <h4>Daftar Pemeliharaan</h4>
                                    </div>
                                </div>
                                <div class="col d-flex justify-content-end px-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control input-rounded h-25" placeholder="Cari"
                                            wire:model='searchCategory' wire:input='resetPage'>
                                    </div>
                                </div>
                                <div class="col-2 d-flex justify-content-end px-4 h-50">
                                    <a href="add-pemeliharaan.html" type="button"
                                        class="btn mb-1 btn-primary d-flex justify-content-end">Tambahkan</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Kode Barang</th>
                                                <th>Kategori P/M</th>
                                                <th>Nama Barang</th>
                                                <th>Spesifikasi</th>
                                                <th>Jenis Kerusakan</th>
                                                <th>Keterangan</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>DD-MM-YY</td>
                                                <td>BRG-001</td>
                                                <td>test cat</td>
                                                <td>Kolor</td>
                                                <td>
                                                    Merk: <i>SAMSUNG</i><br>
                                                    Type/Model: <i>A01S</i><br>
                                                    Tahun: <i>2018</i><br>
                                                    Kapasitas: <i>50</i>
                                                </td>
                                                <td>Perawatan Rutin</td>
                                                <td>Baut na leungit hiji</td>
                                                <td>
                                                    <h3><span class="badge badge-success px-2">Selesai</span></h3>
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a href="#" data-toggle="dropdown"><i
                                                                class="fa fa-ellipsis-v fa-lg"></i></a>
                                                        <div class="dropdown-menu"><a class="dropdown-item"
                                                                href="#">Link 1</a> <a class="dropdown-item"
                                                                href="#">Link 2</a> <a class="dropdown-item"
                                                                href="#">Link 3</a>
                                                        </div>
                                                    </div>
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
        </div>
        <!-- #/ container -->
    </div>
@endsection
