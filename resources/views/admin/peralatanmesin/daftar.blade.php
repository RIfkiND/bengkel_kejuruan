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
            @if ($ruangan != null)
                @livewire('admin.peralatan-mesin.daftar.index', ['ruangan_byadmin' => $ruangan->id])
            @else
                @livewire('admin.peralatan-mesin.daftar.index')
            @endif
        </div>
        <!-- #/ container -->
    </div>
@endsection
