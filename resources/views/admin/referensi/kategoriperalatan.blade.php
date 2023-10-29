@extends('layouts.admin')

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Peralatan</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Daftar</a></li>
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
                                    <h4>Daftar Kategori</h4>
                                </div>
                            </div>
                            <div class="col d-flex justify-content-end px-4">
                                <div class="form-group">
                                    <input type="text" class="form-control input-rounded h-25" placeholder="Cari"
                                        wire:model='searchCategory' wire:input='resetPage'>
                                </div>
                            </div>
                            <div class="col-2 d-flex justify-content-end px-4 h-50">
                                <a href="#" type="button"
                                    class="btn mb-1 btn-primary d-flex justify-content-end">Tambahkan</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-sm-6">
                                <div class="card">
                                    <div class="social-graph-wrapper widget-facebook">
                                        <span class="s-icon">Nama Kategori</span>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                                <h4 class="m-1">70000</h4>
                                                <p class="m-0">Peralatan</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
