<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="{{ route('admin.index') }}" aria-expanded="false">
                        <i data-feather="home" class="feather-icon"></i><span class="hide-menu">Dasbor</span></a>
                </li>

                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">Referensi</span></li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i
                            data-feather="users" class="feather-icon"></i><span class="hide-menu">Pengguna
                        </span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level base-level-line">
                        <li class="sidebar-item"><a href="{{ route('admin.pengguna.guru') }}" class="sidebar-link"><span
                                    class="hide-menu"> Guru
                                </span></a></li>

                        <li class="sidebar-item"><a href="{{ route('admin.pengguna.murid') }}"
                                class="sidebar-link"><span class="hide-menu">
                                    Murid </span></a></li>
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                        aria-expanded="false"><i data-feather="sliders" class="feather-icon"></i><span
                            class="hide-menu">Kelola Ruang
                        </span></a>
                    <ul aria-expanded="false" class="collapse first-level base-level-line">
                        <li class="sidebar-item"><a href="{{ route('admin.kelolaruangan.kelas') }}"
                                class="sidebar-link"><span class="hide-menu">
                                    Kelas </span></a></li>

                        <li class="sidebar-item"><a href="{{ route('admin.kelolaruangan.ruangan') }}"
                                class="sidebar-link"><span class="hide-menu">
                                    Ruangan </span></a></li>
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link"
                        href="{{ route('admin.kategoriperalatan') }}" aria-expanded="false"><i data-feather="grid"
                            class="feather-icon"></i><span class="hide-menu">Kategori Peralatan
                        </span></a>
                </li>

                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">Peralatan/Mesin</span></li>
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="{{ route('admin.peralatanmesin.daftar') }}"
                        aria-expanded="false"><i data-feather="list" class="feather-icon"></i><span
                            class="hide-menu">Daftar Peralatan
                        </span>
                    </a>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                        aria-expanded="false"><i data-feather="refresh-ccw" class="feather-icon"></i><span
                            class="hide-menu">Transaksi </span></a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item"><a href="{{ route('admin.peralatanmesin.transaksi.masuk') }}"
                                class="sidebar-link"><span class="hide-menu"> Peralatan Masuk
                                </span></a>
                        </li>
                        <li class="sidebar-item"><a href="{{ route('admin.peralatanmesin.transaksi.keluar') }}"
                                class="sidebar-link"><span class="hide-menu"> Peralatan Keluar
                                </span></a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="{{ route('admin.peralatanmesin.pemeliharaan') }}"
                        aria-expanded="false"><i data-feather="shield" class="feather-icon"></i><span
                            class="hide-menu">Pemeliharaan
                        </span>
                    </a>
                </li>
                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">Alat/Bahan</span></li>
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route("admin.alatbahan.daftar") }}"
                        aria-expanded="false"><i data-feather="list" class="feather-icon"></i><span
                            class="hide-menu">Daftar Alat/Bahan
                        </span></a>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                        aria-expanded="false"><i data-feather="refresh-ccw" class="feather-icon"></i><span
                            class="hide-menu">Transaksi </span></a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item"><a href="{{ route("admin.alatbahan.transaksi.masuk") }}" class="sidebar-link"><span
                                    class="hide-menu"> Alat/Bahan Masuk
                                </span></a>
                        </li>
                        <li class="sidebar-item"><a href="{{ route("admin.alatbahan.transaksi.keluar") }}" class="sidebar-link"><span
                                    class="hide-menu"> Alat/Bahan Keluar
                                </span></a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route("admin.alatbahan.pengajuan") }}"
                        aria-expanded="false"><i data-feather="inbox" class="feather-icon"></i><span
                            class="hide-menu">Pengajuan
                        </span></a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
