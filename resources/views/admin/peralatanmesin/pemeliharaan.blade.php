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
            @livewire('admin.peralatan-mesin.pemeliharaan.index')
        </div>
        <!-- #/ container -->
    </div>
@endsection
