@extends('layouts.admin')

@section('content')
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-sm-6 col-lg-12">
                    <div class="card" style="background-color: #dde7ff;  max-height: 125px; overflow: hidden;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-10">
                                    @if (auth()->user()->role == 'SuperAdmin' or auth()->user()->role == 'Admin')
                                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-3 pt-2">
                                            Daftar Kelas & Ruangan
                                        </h4>
                                    @else
                                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-3 pt-2">
                                            Daftar Kelas
                                        </h4>
                                    @endif
                                    <div class="d-flex align-items-center">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb m-0 p-0">
                                                <li class="breadcrumb-item"><a href="index.html" class="text-dark">Dashboard
                                                    </a>
                                                </li>
                                                <li class="breadcrumb-item text-dark active" aria-current="page">
                                                    Sekolah
                                                </li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                                <div class="col-sm-2 position-relative">
                                    <img src="/Asset/images/ChatBc.png" alt="welcome" class="img-fluid" width="165">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if ($sekolah != null)
            @livewire('admin.referensi.kelola-ruangan.kelas.index', ['sekolah_id' => $sekolah->id])
        @else
            @livewire('admin.referensi.kelola-ruangan.kelas.index')
        @endif
    </div>
@endsection
