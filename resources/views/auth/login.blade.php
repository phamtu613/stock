<!DOCTYPE html>
<html lang="vi">

<head>
    <!-- Basic Page Needs
  ================================================== -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Specific Metas
  ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- For Search Engine Meta Data  -->
    <meta name="description" content="Login Form design by DevForum">
    <meta name="keywords" content="Login Form">
    <meta name="author" content="devforum.info">

    <title>Đăng nhập</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/icon"
        href="{{ asset('client/asset-login/images\android-icon-36x36.png') }}">
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset('client/asset-login/images\android-icon-36x36.png') }}">
    <link rel=" icon" type="image/png" sizes="48x48"
        href="{{ asset('client/asset-login/images\android-icon-48x48.png') }}">
    <link rel=" icon" type="image/png" sizes="72x72"
        href="{{ asset('client/asset-login/images\android-icon-72x72.png') }}">

    <!-- Main structure css file -->
    <link rel=" stylesheet" href="{{ asset('client/asset-login/css\login-style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />

</head>

<body>
    <!-- Start Preloader -->
    <div id="preload-block">
        <div class="square-block"></div>
    </div>
    <!-- Preloader End -->

    <div class="container-fluid">
        <div class="row">
            <div
                class="authfy-container col-xs-12 col-sm-10 col-md-8 col-lg-6 col-sm-offset-1 col-md-offset-2 col-lg-offset-3">
                <div class="col-sm-5 authfy-panel-left">
                    <div class="brand-col">
                        <div class="headline">
                            <!-- brand-logo start -->
                            <div class="brand-logo">
                                <a href="{{ url('/') }}"><img src="{{ asset('client/img/logo.png') }}"
                                        width="200" alt="logo"></a>
                            </div>
                            <!-- ./brand-logo -->
                            <p>Đăng nhập với mạng xã hội</p>
                            <!-- social login buttons start -->
                            <div class="row social-buttons">
                                <div class="col-xs-4 col-sm-4 col-md-12">
                                    <a href="#" class="btn btn-block btn-facebook">
                                        <i class="fa fa-facebook"></i> <span class="hidden-xs hidden-sm">Signin with
                                            facebook</span>
                                    </a>
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-12">
                                    <a href="#" class="btn btn-block btn-twitter">
                                        <i class="fa fa-twitter"></i> <span class="hidden-xs hidden-sm">Signin with
                                            twitter</span>
                                    </a>
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-12">
                                    <a href="#" class="btn btn-block btn-google">
                                        <i class="fa fa-google-plus"></i> <span class="hidden-xs hidden-sm">Signin with
                                            google</span>
                                    </a>
                                </div>
                            </div>
                            <!-- ./social-buttons -->
                        </div>
                    </div>
                </div>
                <div class="col-sm-7 authfy-panel-right">
                    <!-- authfy-login start -->
                    <div class="authfy-login">
                        <!-- panel-login start -->
                        <div class="authfy-panel panel-login text-center active">
                            <div class="authfy-heading">
                                <h3 class="auth-title">Đăng nhập</h3>
                                <p>Bạn chưa có tài khoản? <a href="{{ url('register') }}">Đăng ký!</a></p>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        {{-- @if ($url)
                                            <input type="hidden" name="key" class="form-control"
                                                value='{{ $url }}'>
                                        @endif --}}

                                        {{-- Email --}}
                                        <div class="form-group">
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                placeholder="Email" name="email" value="{{ old('email') }}" required
                                                autocomplete="email" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>


                                        {{-- Mật khẩu --}}
                                        <div class="form-group">
                                            <div class="pwdMask">
                                                <input id="password" type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" required autocomplete="current-password"
                                                    placeholder="Mật khẩu">

                                                @error('password')
                                                    <span class="invalid-feedback text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <span class="fa fa-eye-slash pwd-toggle"></span>
                                            </div>
                                        </div>


                                        <!-- start remember-row -->
                                        <div class="row remember-row">
                                            <div class="col-xs-6 col-sm-6">
                                                <label class="checkbox text-left">
                                                    <input type="checkbox" value="remember-me" name="remember"
                                                        id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                    <span class="label-text"> {{ __('Nhớ mật khẩu') }}</span>
                                                </label>
                                            </div>

                                            <div class="col-xs-6 col-sm-6">
                                                <p class="forgotPwd">
                                                    @if (Route::has('password.request'))
                                                        <a class="btn btn-link"
                                                            href="{{ route('password.request') }}">
                                                            {{ __('Quên mật khẩu?') }}
                                                        </a>
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                        <!-- ./remember-row -->
                                        <div class="form-group">

                                            <div class="form-group">
                                                <button class="btn btn-lg btn-primary btn-block" type="submit">
                                                    {{ __('Đăng nhập') }} </button>
                                            </div>
                                        </div>

                                        <a href="{{ url('/') }}" class="d-block">Về Trang Chủ</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- ./panel-login -->
                    </div>
                    <!-- ./authfy-login -->
                </div>
            </div>
        </div>
        <!-- ./row -->
    </div>
    <!-- ./container -->

    <!-- Javascript Files -->

    <!-- initialize jQuery Library -->
    <script src="{{ asset('client/asset-login/js\jquery-2.2.4.min.js') }}"></script>

    <!-- for Bootstrap js -->
    <script src="{{ asset('client/asset-login/js\bootstrap.min.js') }}"></script>

    <!-- Custom js-->
    <script src="{{ asset('client/asset-login/js\custom.js') }}"></script>

</body>

</html>
