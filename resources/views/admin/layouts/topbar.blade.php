<div class="navbar-custom">
    <ul class="list-unstyled topnav-menu float-right mb-0">

        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#"
                role="button" aria-haspopup="false" aria-expanded="false">
                <img src="{{ url(Auth::guard('admin')->user()->avatar) }}" style="object-fit: cover" alt="user-image"
                    class="rounded-circle">
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                <!-- item-->
                <div class="dropdown-header noti-title">
                    <h6 class="text-overflow m-0">{{ Auth::guard('admin')->user()->name }}</h6>
                </div>

                <!-- item-->
                <a href="{{ route('admin.profile') }}" class="dropdown-item notify-item">
                    <i class="fe-user"></i>
                    <span>Profile</span>
                </a>

                <div class="dropdown-divider"></div>

                <!-- item-->
                <a href="{{ route('admin.logout') }}" class="dropdown-item notify-item">
                    <i class="fe-log-out"></i>
                    <span>Logout</span>
                </a>

            </div>
        </li>

        <li class="opacity-1 dropdown notification-list">
            <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect waves-light">
                <i class="fe-settings noti-icon"></i>
            </a>
        </li>


    </ul>

    <!-- LOGO -->
    <div class="logo-box">
        <a href="{{ url('/') }}" class="logo text-center logo-light">
            <span class="logo-lg">
                <img src="{{ asset('admin-asset\images\logo-light.png') }}" alt="logo" height="20">
                <!-- <span class="logo-lg-text-light">Codefox</span> -->
            </span>
            <span class="logo-sm">
                <!-- <span class="logo-sm-text-light">C</span> -->
                <img src="{{ asset('admin-asset\images\logo-sm.png') }}" alt="logo" height="24">
            </span>
        </a>
        <a href="{{ url('admin/dashboard') }}" class="logo text-center logo-dark">
            <span class="logo-lg">
                <img src="{{ asset('admin-asset\images\logo-dark.png') }}" alt="logo" height="20">
                <!-- <span class="logo-lg-text-dark">Codefox</span> -->
            </span>
            <span class="logo-sm">
                <!-- <span class="logo-sm-text-dark">C</span> -->
                <img src="{{ asset('admin-asset\images\logo-sm.png') }}" alt="logo" height="24">
            </span>
        </a>
    </div>

    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
        <li>
            <button class="button-menu-mobile waves-effect waves-light">
                <i class="fe-menu"></i>
            </button>
        </li>

        <li class="dropdown d-none d-lg-block ">
            <div class="lang-option">
                <select class="selectpicker form-control" title="" data-width="110px">
                    <option> English </option>
                    <option> French </option>
                    <option> Germany </option>
                    <option> Spanish</option>
                </select>
            </div>

        </li>

    </ul>
</div>
