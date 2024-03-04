<div class="container-fluid pt-2">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <!-- multi-column ordering -->
    <div class="row">
        <div class="col-sm-6 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="col-7 pt-2">
                            <caption>Akun Yang Terdaftar</caption>
                        </div>
                        <div class="col-5">
                            <div class="d-flex align-items-center justify-content-end">
                                <form class="me-2 d-none d-lg-block">
                                    <div class="customize-input">
                                        <input class="form-control custom-shadow border-2 bg-white" type="text"
                                            placeholder="Search" aria-label="Search" style="border-radius: 10px;"
                                            wire:model='searchUser' wire:input='resetPage'>
                                    </div>
                                </form>
                                <div class="customize-input float-end ms-2">
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalAkun"
                                        style="border-radius: 10px;">Tambah
                                        Akun</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Sekolah</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr>
                                        <td scope="row">{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role }}</td>
                                        @if ($user->sekolah_id == null)
                                            <td>Tidak Terdaftar Di Sekolah Manapun</td>
                                        @else
                                            <td>{{ $user->sekolah->nama_sekolah }}</td>
                                        @endif
                                        <td>
                                            <a class="dropdown-toggle pl-md-3 position-relative"
                                                href="javascript:void(0)" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" a href="javascript:void(0)"
                                                    data-bs-toggle="modal" data-bs-target="#ModalAkun"
                                                    wire:click='edit({{ $user->id }})'><i
                                                        class="fas fa-pencil-alt text-info"></i><span class="text-info">
                                                        Edit</span></a>
                                                <a class="dropdown-item" href="javascript:void(0)"
                                                    wire:click='ondel({{ $user->id }})'><i
                                                        class="fas fa-trash text-danger"></i><span class="text-danger">
                                                        Delete</span>
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                @if (auth()->user()->role == 'SuperAdmin' || auth()->user()->role == 'Admin')
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.impersonate', $user) }}"><i
                                                            class="fas fa-sign-in-alt text-success"></i><span
                                                            class="text-success"> Login As</span>
                                                    </a>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5">
                                                <h1>Data Kosong</h1>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-12 d-flex justify-content-end">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- Modal -->
        @include('livewire.admin.referensi.pengguna.akun.modal')
