<div class="navbar-collapse collapse" id="navbarSupportedContent">
    <!-- ============================================================== -->
    <!-- toggle and nav items -->
    <!-- ============================================================== -->
    <ul class="navbar-nav float-left me-auto ms-3 ps-1">
        <!-- Notification -->
        {{-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle pl-md-3 position-relative" href="javascript:void(0)" id="bell"
                role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span><i data-feather="bell" class="svg-icon"></i></span>
                <span class="badge text-bg-danger notify-no rounded-circle">2</span>
            </a>
            <div class="dropdown-menu dropdown-menu-left mailbox animated bounceInDown">
                <ul class="list-style-none">
                    <li>
                        <div class="message-center notifications position-relative">
                            <!-- Message -->
                            <a href="javascript:void(0)"
                                class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                <div class="btn btn-danger rounded-circle btn-circle"><i data-feather="airplay"
                                        class="text-white"></i></div>
                                <div class="w-75 d-inline-block v-middle ps-2">
                                    <h6 class="message-title mb-0 mt-1">Luanch Admin</h6>
                                    <span class="font-12 text-nowrap d-block text-muted">Just see
                                        the my new
                                        admin!</span>
                                    <span class="font-12 text-nowrap d-block text-muted">9:30 AM</span>
                                </div>
                            </a>
                            <!-- Message -->
                            <a href="javascript:void(0)"
                                class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                <span class="btn btn-success text-white rounded-circle btn-circle"><i
                                        data-feather="calendar" class="text-white"></i></span>
                                <div class="w-75 d-inline-block v-middle ps-2">
                                    <h6 class="message-title mb-0 mt-1">Event today</h6>
                                    <span class="font-12 text-nowrap d-block text-muted text-truncate">Just
                                        a reminder that you have event</span>
                                    <span class="font-12 text-nowrap d-block text-muted">9:10 AM</span>
                                </div>
                            </a>
                            <!-- Message -->
                            <a href="javascript:void(0)"
                                class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                <span class="btn btn-info rounded-circle btn-circle"><i data-feather="settings"
                                        class="text-white"></i></span>
                                <div class="w-75 d-inline-block v-middle ps-2">
                                    <h6 class="message-title mb-0 mt-1">Settings</h6>
                                    <span class="font-12 text-nowrap d-block text-muted text-truncate">You
                                        can customize this template
                                        as you want</span>
                                    <span class="font-12 text-nowrap d-block text-muted">9:08 AM</span>
                                </div>
                            </a>
                            <!-- Message -->
                            <a href="javascript:void(0)"
                                class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                <span class="btn btn-primary rounded-circle btn-circle"><i data-feather="box"
                                        class="text-white"></i></span>
                                <div class="w-75 d-inline-block v-middle ps-2">
                                    <h6 class="message-title mb-0 mt-1">Pavan kumar</h6> <span
                                        class="font-12 text-nowrap d-block text-muted">Just
                                        see the my admin!</span>
                                    <span class="font-12 text-nowrap d-block text-muted">9:02 AM</span>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li>
                        <a class="nav-link pt-3 text-center text-dark" href="javascript:void(0);">
                            <strong>Check all notifications</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </li> --}}
        <!-- End Notification -->
        <!-- ============================================================== -->
        <!-- create new -->
        <!-- ============================================================== -->
        {{-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i data-feather="settings" class="svg-icon"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </li> --}}
        {{-- <li class="nav-item d-none d-md-block">
            <a class="nav-link" href="javascript:void(0)">
                <div class="customize-input">
                    <select class="custom-select form-control bg-white custom-radius custom-shadow border-0"
                        id="languageSelect">
                        <option value="id">ID</option>
                        <option value="en">EN</option>
                    </select>
                </div>
            </a>
        </li> --}}
        <li class="nav-item">
            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-bs-container="body"
                data-bs-toggle="popover" data-bs-placement="bottom"
                data-bs-content="Saat ini baru tersedia bahasa Indonesia">
                <img src="/Asset/images/indonesia.png" class="rounded-circle" width="30">
            </a>
        </li>
    </ul>
    <!-- ============================================================== -->
    <!-- Right side toggle and nav items -->
    <!-- ============================================================== -->
    <ul class="navbar-nav float-end">
        <!-- ============================================================== -->
        <!-- Search -->
        <!-- ============================================================== -->
        @if (auth()->user()->role == 'KepalaBengkel')
            <li class="nav-item d-none d-md-block">
                <a class="nav-link">
                    <form>
                        <div class="customize-input">
                            <p class="form-control custom-shadow border-0 bg-white" style="border-radius: 10px"><span
                                    id="mengelolaText">Anda mengelola ruangan </span><span><b
                                        class="text-info">{{ auth()->user()->ruangan_id }}
                                    </b></span></p>
                        </div>
                    </form>
                </a>
            </li>
        @endif
        <!-- ============================================================== -->
        <!-- User profile and search -->
        <!-- ============================================================== -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-bs-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <img id="userImage" src="/Asset/images/UserImage1.png" alt="user" class="rounded-circle"
                    width="30">
                <span class="ms-2 d-none d-lg-inline-block"><span id="halloText">Halo,</span> <span
                        class="text-dark">{{ auth()->user()->name }}</span> {{--<i data-feather="chevron-down"
                        class="svg-icon"></i>--}}</span>
            </a>
            {{-- <div class="dropdown-menu dropdown-menu-end dropdown-menu-right animated flipInY"> --}}
                {{-- <a class="dropdown-item" href="javascript:void(0)" id="changeUserImage"><i data-feather="user"
                        class="svg-icon me-2 ms-1"></i>
                    Change Profile</a> --}}
                {{-- <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"><i
                        data-feather="log-out" class="svg-icon me-2 ms-1"></i>
                    Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form> --}}
                @if (session('original_user_id'))
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('admin.stop-impersonating') }}" class="text-info dropdown-item"><i
                            data-feather="power" class="svg-icon me-2 ms-1"></i>
                        Berhenti</a>
                @endif
            {{-- </div> --}}
        </li>
        <!-- ============================================================== -->
        <!-- User profile and search -->
        <!-- ============================================================== -->
    </ul>
</div>
