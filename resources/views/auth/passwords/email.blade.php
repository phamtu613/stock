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
    <base href="{{ asset('') }}">

    <title>Login Page - DevForum</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/icon" href="client\asset-login\images\android-icon-36x36.png">
    <link rel="icon" type="image/png" sizes="32x32" href="client\asset-login\images\android-icon-36x36.png">
    <link rel="icon" type="image/png" sizes="48x48" href="client\asset-login\images\android-icon-48x48.png">
    <link rel="icon" type="image/png" sizes="72x72" href="client\asset-login\images\android-icon-72x72.png">

    <!-- Main structure css file -->
    <link rel="stylesheet" href="client\asset-login\css\login-style.css">
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
                                <a href="index.html"><img src="client\asset-login\images\devforum.png" width="200"
                                        alt="logo"></a>
                            </div>
                            <!-- ./brand-logo -->
                            <p>Đăng nhập bằng mạng xã hội để truy cập nhanh</p>
                            <!-- social login buttons start -->
                            <div class="row social-buttons">
                                <div class="col-xs-4 col-sm-4 col-md-12">
                                    <a href="#" class="btn btn-block btn-facebook">
                                        <i class="fa fa-facebook"></i> <span class="hidden-xs hidden-sm">Đăng nhập với
                                            facebook</span>
                                    </a>
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-12">
                                    <a href="#" class="btn btn-block btn-twitter">
                                        <i class="fa fa-twitter"></i> <span class="hidden-xs hidden-sm">Đăng nhập với
                                            twitter</span>
                                    </a>
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-12">
                                    <a href="#" class="btn btn-block btn-google">
                                        <i class="fa fa-google-plus"></i> <span class="hidden-xs hidden-sm">Đăng nhập
                                            với
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
                            <div class="row">
                                <div class="col-xs-12 col-sm-12">
                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                    <div class="authfy-heading">
                                        <h3 class="auth-title">Đặt lại mật khẩu</h3>
                                        <p>Nhập địa chỉ e-mail của bạn, chúng tôi sẽ gửi cho bạn một email với các hướng
                                            dẫn thêm.</p>
                                    </div>
                                    <form method="POST" action="{{ route('password.email') }}">
                                        @csrf
                                        {{-- <div class="form-group row">
                                            <label>Địa chỉ</label>
                                        </div> --}}
                                        <div class="form-group row">



                                            <input id="email" type="email"
                                                class="form-control mb-0 @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}" required autocomplete="email"
                                                autofocus placeholder="Địa chỉ email">

                                            @error('email')
                                                <span class="invalid-feedback text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>

                                        <div class="form-group row mb-0">

                                            <button type="submit" class="btn btn-lg btn-primary btn-block">
                                                {{ __('Send Password Reset Link') }}
                                            </button>

                                        </div>
                                        <div class="form-group row mt-5 text-left">
                                            <a class="" href="{{ url('login') }}">Bạn đã có tài khoản?</a>
                                        </div>
                                        <div class="form-group row text-left">
                                            <a class="" href="{{ url('register') }}">Bạn chưa có tài khoản?</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

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
    <script src="client\asset-login\js\jquery-2.2.4.min.js"></script>

    <!-- for Bootstrap js -->
    <script src="client\asset-login\js\bootstrap.min.js"></script>

    <!-- Custom js-->
    <script src="client\asset-login\js\custom.js"></script>

</body>

</html>
