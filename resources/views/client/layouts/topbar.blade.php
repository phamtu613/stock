<div class="topbar">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light py-0">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="tel:{{ $infoStock->phone1 }}"><i class="fa fa-phone pr-1"
                                aria-hidden="true"></i> {{ $infoStock->phone1 }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="mailto:{{ $infoStock->email }}"><i
                                class="fas fa-paper-plane pr-1"></i>
                            {{ $infoStock->email }}
                        </a>
                    </li>
                </ul>
                <div class="login-register">
                    <a href="{{ route('client.contact.index') }}" class="tool-text pr-2 text-decoration-none"><button
                            type="button" class="btn btn-outline-success">Liên hệ</button></a>
                    <a href="{{ route('client.advisoryInvestDetail', [$postAdvisoryInvests['0']->slug, $postAdvisoryInvests['0']->id]) }}"
                        class="tool-text pr-3 text-decoration-none"><button type="button"
                            class="btn btn-outline-success">Công cụ đầu tư</button></a>

                    @if (Auth::user())

                        <div class="dropdown">
                            <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('info-user.index') }}">Thông tin tài khoản</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Đăng xuất') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                {{-- </div> --}}
                            </div>
                        </div>
                    @else
                        <button class="custom-btn btn-3 mr-2"><a href="{{ route('register') }}"
                                class="text-decoration-none">Đăng ký</a></button>
                        <button class="custom-btn btn-3"><a href="{{ route('login') }}"
                                class="text-decoration-none">Đăng nhập</a></button>
                    @endif

                    {{-- <a href=""><button type="button"
                            class="btn btn-outline-primary">Đăng nhập</button></a> --}}

                </div>
            </div>
        </nav>
    </div>
</div>
