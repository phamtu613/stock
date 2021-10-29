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

    <title>Lấy lại mật khẩu</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/icon" href="{{ asset('client/asset-login/images\android-icon-36x36.png') }}">
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
                <div class="col-sm-12 authfy-panel-right">
                    <div class="authfy-login" style="height: 420px">
                        <!-- panel-signup start -->
                        <div class="authfy-panel panel-signup text-center active">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12">
                                    <div class="authfy-heading">
                                        <h3 class="auth-title">Đặt lại mật khẩu</h3>
                                    </div>

                                    <form method="POST" action="{{ route('password.update') }}">
                                        @csrf
                                        <input type="hidden" name="token" value="{{ $token }}">

                                        {{-- Email --}}
                                        <div class="form-group row mb-0">
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ $email ?? old('email') }}" required autocomplete="email"
                                                autofocus>

                                            @error('email')
                                                <span class="invalid-feedback text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>


                                        {{-- mật khẩu --}}
                                        <div class="form-group row mb-0">
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="new-password" placeholder="Mật khẩu mới...">

                                            @error('password')
                                                <span class="invalid-feedback text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>


                                        {{-- Mật khẩu mới --}}
                                        <div class="form-group row mb-0">
                                                <input id="password-confirm" type="password" class="form-control"
                                                    name="password_confirmation" required autocomplete="new-password" placeholder="Xác nhận mật khẩu">
                                        </div>

                                        <div class="form-group row">
                                            <button type="submit" class="btn btn-lg btn-primary btn-block">
                                                {{ __('Đặt lại mật khẩu') }}
                                            </button>
                                        </div>
                                </div>

                                </form>
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
