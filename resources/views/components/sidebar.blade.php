<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Dashboard</li>
            <li>
                <a href="{{ route('admin.index') }}">
                    <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-label">Referensi</li>

            @if (auth()->user()->role == 'SuperAdmin' or auth()->user()->role == 'Admin' or auth()->user()->role == 'AdminSekolah')
                <li class="mega-menu mega-menu-sm">
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="icon-user menu-icon"></i><span class="nav-text">Pengguna</span>
                    </a>
                    <ul aria-expanded="false">
                        @if (auth()->user()->role == 'SuperAdmin' or auth()->user()->role == 'Admin' or auth()->user()->role == 'AdminSekolah')
                            <li><a href="{{ route('admin.pengguna.akun') }}">Akun</a></li>
                        @endif
                        @if (auth()->user()->role == 'SuperAdmin' or auth()->user()->role == 'AdminSekolah')
                            <li><a href="{{ route('admin.pengguna.guru') }}">Guru</a></li>
                        @endif
                        {{-- @if (auth()->user()->role == 'SuperAdmin' or auth()->user()->role == 'AdminSekolah')
                            <li><a href="{{ route('admin.pengguna.murid') }}">Murid</a></li>
                        @endif --}}
                    </ul>
                </li>
            @endif

            @if (auth()->user()->role == 'AdminSekolah')
                <li class="mega-menu mega-menu-sm">
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="icon-home menu-icon"></i><span class="nav-text">Kelola Ruangan</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('admin.kelolaruangan.ruangan') }}">Ruangan</a></li>
                        <li><a href="{{ route('admin.kelolaruangan.kelas') }}">Kelas</a></li>
                    </ul>
                </li>
            @endif

            @if (auth()->user()->role == 'Guru')
                <li>
                    <a href="{{ route('admin.pengguna.murid') }}" aria-expanded="false">
                        <i class="icon-people menu-icon"></i><span class="nav-text">Murid</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.kelolaruangan.kelas') }}" aria-expanded="false">
                        <i class="icon-home menu-icon"></i><span class="nav-text">Kelas</span>
                    </a>
                </li>
            @endif

            @if (auth()->user()->role == 'SuperAdmin' or auth()->user()->role == 'Admin')
                <li>
                    <a href="{{ route('admin.sekolah') }}" aria-expanded="false">
                        <i class="icon-home menu-icon"></i><span class="nav-text">Sekolah</span>
                    </a>
                </li>
            @endif

            <li>
                <a href="{{ route('admin.kategoriperalatan') }}" aria-expanded="false">
                    <i class="fa fa-sitemap menu-icon"></i><span class="nav-text">Kategori</span>
                </a>
            </li>

            @if (auth()->user()->role == 'SuperAdmin' or
                    auth()->user()->role == 'Guru' or
                    auth()->user()->role == 'AdminSekolah' or
                    auth()->user()->role == 'KepalaBengkel')
                <li class="nav-label">Peralatan / Mesin</li>

                <li>
                    <a href="{{ route('admin.peralatanmesin.daftar') }}" aria-expanded="false">
                        <i class="icon-menu menu-icon"></i><span class="nav-text">Daftar Peralatan</span>
                    </a>
                </li>

                @if (auth()->user()->role == 'SuperAdmin' or
                        auth()->user()->role == 'AdminSekolah' or
                        auth()->user()->role == 'KepalaBengkel')
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-refresh menu-icon"></i> <span class="nav-text">Transaksi</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('admin.peralatanmesin.transaksi.masuk') }}">Peralatan Masuk</a></li>
                            <li><a href="{{ route('admin.peralatanmesin.transaksi.keluar') }}">Peralatan Keluar</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="{{ route('admin.peralatanmesin.pemeliharaan') }}" aria-expanded="false">
                            <i class="icon-wrench menu-icon"></i><span class="nav-text">Pemeliharaan</span>
                        </a>
                    </li>
                @endif

                <li>
                    <a href="#" aria-expanded="false">
                        <i class="icon-clock menu-icon"></i><span class="nav-text">Pemakaian/Peminjaman</span>
                    </a>
                </li>

                <li class="nav-label">Alat / Bahan</li>

                <li>
                    <a href="{{ route('admin.alatbahan.daftar') }}" aria-expanded="false">
                        <i class="icon-menu menu-icon"></i><span class="nav-text">Daftar Alat Bahan</span>
                    </a>
                </li>

                @if (auth()->user()->role == 'SuperAdmin' or
                        auth()->user()->role == 'AdminSekolah' or
                        auth()->user()->role == 'KepalaBengkel')
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-refresh menu-icon"></i> <span class="nav-text">Transaksi</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('admin.alatbahan.transaksi.masuk') }}">Alat Bahan Masuk</a></li>
                            <li><a href="{{ route('admin.alatbahan.transaksi.keluar') }}">Alat Bahan Keluar</a></li>
                        </ul>
                    </li>
                @endif

                <li>
                    <a href="{{ route('admin.alatbahan.pengajuan') }}" aria-expanded="false">
                        <i class="icon-check menu-icon"></i><span class="nav-text">Pengajuan</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</div>
