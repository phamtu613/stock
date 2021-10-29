<header>
    <div class="container">
        <div class="header-top" id="none-mobile">
            <div class="row">
                <div class="col-md-3">
                    <a href="{{ url('/') }}" class="thumb-logo">
                        <img src="{{ asset('client/img/logo.png') }}" alt="logo">
                    </a>
                </div>
                <div class="col-md-9 align-self-center">
                    <div class="block-post row">
                        <div class="col-md-4 align-self-center">
                            <div class="box-icon {{ request()->is('bai-viet/huong-dan-mo*') ? 'active' : '' }}">
                                <img src="{{ asset('client/img/protrade-1.png') }}" class=" show" alt="image">
                                <img src="{{ asset('client/img/protrade-color-1.png') }}" class=" hide" alt="image">
                                <a href="{{ route('client.advisoryInvestDetail', [$postAdvisoryInvests['1']->slug, $postAdvisoryInvests['1']->id]) }}"
                                    class="text-decoration-none">Hướng dẫn mở tài khoản</a>
                            </div>
                        </div>
                        <div class="col-md-4 align-self-center">
                            <div class="box-icon {{ request()->is('bai-viet/huong-dan-xem-bang*') ? 'active' : '' }}">
                                <img src="{{ asset('client/img/icon2-1.png') }}" class=" show" alt="image">
                                <img src="{{ asset('client/img/icon2-active.png') }}" class=" hide" alt="image">
                                <a href="{{ route('client.advisoryInvestDetail', [$postAdvisoryInvests['5']->slug, $postAdvisoryInvests['5']->id]) }}"
                                    class="text-decoration-none" class=" text-decoration-none">Hướng dẫn xem bảng giá
                                </a>
                            </div>

                        </div>
                        <div class="col-md-4 align-self-center">
                            <div class="box-icon {{ request()->is('bai-viet/triet-ly*') ? 'active' : '' }}">
                                <img src="{{ asset('client/img/icon5-1.png') }}" class="show" alt="image">
                                <img src="{{ asset('client/img/icon5-active.png') }}" class="hide" alt="image">
                                <a href="{{ route('client.advisoryInvestDetail', [$postAdvisoryInvests['4']->slug, $postAdvisoryInvests['4']->id]) }}"
                                    class="text-decoration-none">Triết lý đầu tư</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="wp-menu">
        <div class="container">
            <!-- Navigation -->
            <nav class="navbar navbar-expand-lg navbar-dark static-top main-menu" id="navbar_top">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                        aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand logo d-none" href="{{ url('/') }}">
                        <img src="{{ asset('client/img/logo-mobile.png') }}" alt="logo">
                    </a>

                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav">
                            <li class="nav-item {{ request()->is('marketdaily*') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('client.marketdaily.index') }}">Market Daily
                                </a>
                            </li>
                            <li class="nav-item {{ request()->is('system*') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('client.system.index') }}">Alpha System
                                </a>
                            </li>
                            <li class="nav-item {{ request()->is('kien-thuc-chung*') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('client.knowledge.index') }}">Kiến Thức Chung</a>
                            </li>
                            <li class="nav-item {{ request()->is('bai-viet/tu-van*') ? 'active' : '' }}">
                                <a class="nav-link"
                                    href="{{ route('client.advisoryInvestDetail', [$postAdvisoryInvests['2']->slug, $postAdvisoryInvests['2']->id]) }}">Tư
                                    vấn đầu tư</a>
                            </li>
                            <li class="nav-item {{ request()->is('khoa-hoc*') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('client.course.index') }}">Khóa học</a>
                            </li>
                            <li class="nav-item {{ request()->is('bai-viet/uy-thac*') ? 'active' : '' }}">
                                <a class="nav-link"
                                    href="{{ route('client.advisoryInvestDetail', [$postAdvisoryInvests['3']->slug, $postAdvisoryInvests['3']->id]) }}">Ủy
                                    Thác Đầu Tư</a>
                            </li>
                            <li class="nav-item {{ request()->is('usbStock') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('client.usbStock.index') }}">Usb Stock</a>
                            </li>
                            <li class="nav-item {{ request()->is('danh-gia*') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('client.review.index') }}">Đánh Giá</a>
                            </li>
                            <li style="border-right:none"
                                class="nav-item d-block d-sm-none {{ request()->is('contact') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('client.contact.index') }}">Liên Hệ</a>
                            </li>
                            {{-- mobile --}}
                            <li
                                class="border-top-opacity nav-item d-block d-sm-none {{ request()->is('bai-viet/huong-dan-mo*') ? 'active' : '' }}">
                                <a class="nav-link"
                                    href="{{ route('client.advisoryInvestDetail', [$postAdvisoryInvests['1']->slug, $postAdvisoryInvests['1']->id]) }}"><i
                                        class="far fa-user pr-2 main-color"></i>Hướng
                                    dẫn mở tài khoản</a>
                            </li>
                            <li
                                class="border-top-opacity nav-item d-block d-sm-none {{ request()->is('bai-viet/huong-dan-xem-bang*') ? 'active' : '' }}">
                                <a class="nav-link"
                                    href="{{ route('client.advisoryInvestDetail', [$postAdvisoryInvests['5']->slug, $postAdvisoryInvests['5']->id]) }}"><i
                                        class="fas fa-hand-holding-usd pr-2 main-color"></i>Hướng
                                    dẫn xem bảng
                                    giá</a>
                            </li>
                            <li
                                class="border-top-opacity nav-item d-block d-sm-none {{ request()->is('bai-viet/triet-ly*') ? 'active' : '' }}">
                                <a class="nav-link"
                                    href="{{ route('client.advisoryInvestDetail', [$postAdvisoryInvests['4']->slug, $postAdvisoryInvests['4']->id]) }}"><i
                                        class="fas fa-coins pr-2 main-color"></i>Triết
                                    lý đầu tư</a>
                            </li>
                            <li
                                class="border-top-opacity nav-item d-block d-sm-none {{ request()->is('bai-viet/1*') ? 'active' : '' }}">
                                <a class="nav-link"
                                    href="{{ route('client.advisoryInvestDetail', [$postAdvisoryInvests['0']->slug, $postAdvisoryInvests['0']->id]) }}"><i
                                        class="fas fa-money-check-alt pr-2 main-color"></i>Công
                                    cụ đầu tư</a>
                            </li>

                            @if (Auth::user())
                                <li class="nav-item d-block d-sm-none">
                                    <div class="dropdown">
                                        <button class="btn btn-success dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            {{ Auth::user()->name }}
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{ route('info-user.index') }}">Thông tin
                                                tài
                                                khoản</a>
                                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                {{ __('Đăng xuất') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                            {{-- </div> --}}
                                        </div>
                                    </div>
                                </li>
                            @else
                                <li class="border-top-opacity nav-item d-block d-sm-none">
                                    <a class="nav-link" href="{{ route('login') }}"><i
                                            class="fas fa-sign-in-alt pr-2 main-color"></i>Đăng nhập</a>
                                </li>
                                <li class="border-top-opacity nav-item d-block d-sm-none">
                                    <a class="nav-link" href="{{ route('register') }}"><i
                                            class="fas fa-user-plus pr-2 main-color"></i>Đăng ký</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>
