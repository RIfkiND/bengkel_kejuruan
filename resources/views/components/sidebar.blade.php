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
            <li class="mega-menu mega-menu-sm">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-user menu-icon"></i><span class="nav-text">Pengguna</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.pengguna.akun') }}">Akun</a></li>
                    <li><a href="{{ route('admin.pengguna.guru') }}">Guru</a></li>
                    <li><a href="{{ route('admin.pengguna.murid') }}">Murid</a></li>
                </ul>
            </li>
            <li class="mega-menu mega-menu-sm">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-home menu-icon"></i><span class="nav-text">Kelola Ruangan</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.kelolaruangan.ruangan') }}">Ruangan</a></li>
                    <li><a href="{{ route('admin.kelolaruangan.kelas') }}">Kelas</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ route('admin.sekolah') }}" aria-expanded="false">
                    <i class="icon-home menu-icon"></i><span class="nav-text">Sekolah</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.kategoriperalatan') }}" aria-expanded="false">
                    <i class="fa fa-sitemap menu-icon"></i><span class="nav-text">Kategori</span>
                </a>
            </li>
            <li class="nav-label">Peralatan / Mesin</li>
            <li>
                <a href="{{ route('admin.peralatanmesin.daftar') }}" aria-expanded="false">
                    <i class="icon-menu menu-icon"></i><span class="nav-text">Daftar Peralatan</span>
                </a>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-refresh menu-icon"></i> <span class="nav-text">Transaksi</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.peralatanmesin.transaksi.masuk') }}">Peralatan Masuk</a></li>
                    <li><a href="{{ route('admin.peralatanmesin.transaksi.keluar') }}">Peralatan Keluar</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ route('admin.peralatanmesin.pemeliharaan') }}" aria-expanded="false">
                    <i class="icon-wrench menu-icon"></i><span class="nav-text">Pemeliharaan</span>
                </a>
            </li>
            <li class="nav-label">Alat / Bahan</li>
            <li>
                <a href="{{ route('admin.alatbahan.daftar') }}" aria-expanded="false">
                    <i class="icon-menu menu-icon"></i><span class="nav-text">Daftar Alat Bahan</span>
                </a>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-refresh menu-icon"></i> <span class="nav-text">Transaksi</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.alatbahan.transaksi.masuk') }}">Alat Bahan Masuk</a></li>
                    <li><a href="{{ route('admin.alatbahan.transaksi.keluar') }}">Alat Bahan Keluar</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ route('admin.alatbahan.pengajuan') }}" aria-expanded="false">
                    <i class="icon-check menu-icon"></i><span class="nav-text">Pengajuan</span>
                </a>
            </li>
        </ul>
    </div>
</div>
