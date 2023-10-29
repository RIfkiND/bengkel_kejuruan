<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Dashboard</li>
            <li>
                <a href="{{ route('admin.index') }}">
                    <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                </a>

            </li>
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
        </ul>
    </div>
</div>
