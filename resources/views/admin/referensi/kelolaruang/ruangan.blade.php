@extends('layouts.admin')

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Referensi</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Kelola Ruang</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Nama Sekolah</a></li>
                    </ol>
                </div>
            </div>
            @livewire('admin.referensi.kelola-ruangan.ruangan.index')
        </div>
        <!-- #/ container -->
    </div>
@endsection
