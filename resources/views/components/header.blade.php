<div class="header">
    <div class="header-content clearfix">

        <div class="nav-control">
            <div class="hamburger">
                <span class="toggle-icon"><i class="icon-menu"></i></span>
            </div>
        </div>
        <div class="header-left">
            {{-- <div class="input-group icons">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i
                            class="mdi mdi-magnify"></i></span>
                </div>
                <input type="search" class="form-control" placeholder="Search Dashboard" aria-label="Search Dashboard">
                <div class="drop-down animated flipInX d-md-none">
                    <form action="#">
                        <input type="text" class="form-control" placeholder="Search">
                    </form>
                </div>
            </div> --}}
        </div>
        <div class="header-right">
            <ul class="clearfix">
                {{-- <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
                        <i class="mdi mdi-email-outline"></i>
                        <span class="badge badge-pill gradient-1">3</span>
                    </a>
                    <div class="drop-down animated fadeIn dropdown-menu">
                        <div class="dropdown-content-heading d-flex justify-content-between">
                            <span class="">3 New Messages</span>
                            <a href="javascript:void()" class="d-inline-block">
                                <span class="badge badge-pill gradient-1">3</span>
                            </a>
                        </div>
                        <div class="dropdown-content-body">
                            <ul>
                                <li class="notification-unread">
                                    <a href="javascript:void()">
                                        <img class="float-left mr-3 avatar-img" src="/Asset/images/avatar/1.jpg"
                                            alt="">
                                        <div class="notification-content">
                                            <div class="notification-heading">Saiful Islam</div>
                                            <div class="notification-timestamp">08 Hours ago</div>
                                            <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-unread">
                                    <a href="javascript:void()">
                                        <img class="float-left mr-3 avatar-img" src="/Asset/images/avatar/2.jpg"
                                            alt="">
                                        <div class="notification-content">
                                            <div class="notification-heading">Adam Smith</div>
                                            <div class="notification-timestamp">08 Hours ago</div>
                                            <div class="notification-text">Can you do me a favour?</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void()">
                                        <img class="float-left mr-3 avatar-img" src="/Asset/images/avatar/3.jpg"
                                            alt="">
                                        <div class="notification-content">
                                            <div class="notification-heading">Barak Obama</div>
                                            <div class="notification-timestamp">08 Hours ago</div>
                                            <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void()">
                                        <img class="float-left mr-3 avatar-img" src="/Asset/images/avatar/4.jpg"
                                            alt="">
                                        <div class="notification-content">
                                            <div class="notification-heading">Hilari Clinton</div>
                                            <div class="notification-timestamp">08 Hours ago</div>
                                            <div class="notification-text">Hello</div>
                                        </div>
                                    </a>
                                </li>
                            </ul>

                        </div>
                    </div>
                </li> --}}
                @if (auth()->user()->role == 'KepalaBengkel')
                <li class="icons dropdown">
                    <div class="alert alert-primary">Anda mengelola ruangan <b>{{ auth()->user()->sekolah->nama_sekolah }}</b></div>
                    
                </li>
                @endif

                <li class="icons dropdown">
                    <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                        <span class="activity active"></span>
                        <img src="/Asset/images/user/default_user.jpg" height="40" width="40" alt="">
                    </div>
                    <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                        <div class="dropdown-content-body">
                            <ul>
                                <li>
                                    @if (Auth::check())
                                        <span>Anda Login Sebagai</span>
                                        <h4>{{ auth()->user()->name }}</h4>
                                    @else
                                        <a href="{{ route('login') }}"><i class="icon-user"></i>
                                            <span>Login</span></a>
                                    @endif
                                </li>

                                <hr class="my-2">
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        <i class="icon-key"></i> <span>Logout</span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>

                                @if (session('original_user_id'))
                                    <li>
                                        <a href="{{ route('admin.stop-impersonating') }}">
                                            <i class="icon-key"></i> <span>Berhenti</span>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
