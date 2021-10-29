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

<style>
    .mb-0 {
        margin-bottom: 0px
    }

    .pr-85 {
        padding-right: 85px;
    }

</style>

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
                                <a href="{{ url('/') }}"><img src="{{ asset('client/img/logo.png') }}" width="200"
                                        alt="logo"></a>
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
                    <div class="authfy-login">
                        <!-- panel-signup start -->
                        <div class="authfy-panel panel-signup text-center active">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12">
                                    <div class="authfy-heading">
                                        <h3 class="auth-title">Đăng ký</h3>
                                    </div>

                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf

                                        <div class="form-group row mb-0">
                                            <input id="name" type="text"
                                                class="form-control custominput @error('name') is-invalid @enderror"
                                                name="name" value="{{ old('name') }}" required autocomplete="name"
                                                autofocus placeholder="Tên của bạn">

                                            @error('name')
                                                <span class="invalid-feedback text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>


                                        <div class="form-group row mb-0">
                                            <input id="email" type="email"
                                                class="form-control custominput @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}" required autocomplete="email"
                                                placeholder="Email của bạn">

                                            @error('email')
                                                <span class="invalid-feedback text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>


                                        <div class="form-group row mb-0">
                                            <input id="password" type="password"
                                                class="form-control custominput @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="new-password"
                                                placeholder="Mật khẩu">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group row mb-0">
                                            <input id="password-confirm" type="password"
                                                class="form-control custominput" name="password_confirmation" required
                                                autocomplete="new-password" placeholder="Xác nhận mật khẩu">
                                        </div>

                                        <div class="form-group row">
                                            <button class="btn btn-lg btn-primary btn-block" type="submit">
                                                {{ __('Đăng ký') }}</button>
                                        </div>
                                        {{-- <div class="form-group row">
                                            <p>Bạn đã có tài khoản? <a href="{{ url('login') }}">Đăng nhập!</a></p>
                                        </div> --}}
                                </div>

                                </form>

                                <div class="d-flex">
                                    <a class="pr-85" href="{{ url('login') }}">Bạn đã có tài khoản?</a>
                                    <a href="{{ url('/') }}">Về trang chủ?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ./panel-signup -->
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
