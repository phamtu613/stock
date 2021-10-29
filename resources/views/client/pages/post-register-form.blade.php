@extends('client.layouts.master')

@section('title')
    <title>{{ $post->title }}</title>
    <meta name="keywords" content="{{ $post->title }}" />
    <meta name="news_keywords" content="{{ $post->title }}" />
    <meta name="description" content="{{ $post->keyword }}" />
    <meta property="og:title" content="{{ $post->title }}" />
    <meta property="og:description" content="{{ $post->keyword }}" />
    <meta property="og:image" content="{{ url($post->thumbnail) }}" />
    <meta property="og:url" itemprop="url" content="" />
    <meta property="og:type" content="website" />
    <meta itemprop="name" content="{{ $post->title }}" />
    <meta itemprop="description" content="{{ $post->keyword }}" />
    <meta itemprop="image" content="{{ url($post->thumbnail) }}" />
    <!-- Og Image -->
    <meta property="og:image:secure_url" content="" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="627" />
    <meta property="og:image:alt" content="{{ $post->title }}" />
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('client/css/detail-post.css') }}">
@endsection

@section('content')

    <!-- start content -->
    <main class="bg-grey">
        <div class="container">
            <div class="row">
                <div class="col-md-11 mx-auto border-left-md border-right-md">
                    <div class="content-inner">
                        <div class="header-post">
                            <h1 class="title">
                                {{ $post->title }}
                            </h1>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="auth-time d-flex">
                                        <div class="wp-auth d-flex">
                                            @if ($post->admin->avatar)
                                                <img src="{{ url($post->admin->avatar) }}" class="avatar" alt="">
                                            @else
                                                <img src="{{ asset('client/img/img-author.jpg') }}" class="avatar"
                                                    alt="img-author.jpg">
                                            @endif
                                            <div class="name-time">
                                                <div class="name">
                                                    <span>By</span> <span>{{ $post->admin->name }}</span>
                                                </div>
                                                <div class="time">
                                                    {{ date('d-m-Y', strtotime($post->created_at)) }}
                                                </div>
                                            </div>
                                        </div>

                                        {{-- desktop --}}
                                        <div class="share-social d-none">
                                            <span>Chia sẻ: </span>
                                            <a href="#" class="text-decoration-none">
                                                <img src="{{ asset('client/img/facebook.png') }}" alt="facebook">
                                            </a>
                                            <a href="#" class="text-decoration-none">
                                                <img src="{{ asset('client/img/pinterest.png') }}" alt="pinterest">
                                            </a>
                                        </div>

                                        {{-- mobile --}}
                                        <div class="num-view d-block d-sm-none">
                                            <span>Lượt xem:</span> <span class="num">{{ $post->num_view }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    {{-- Desktop --}}
                                    <div class="view-share d-none d-sm-block">
                                        <div class="num-view">
                                            <span>Lượt xem:</span> <span class="num">{{ $post->num_view }}</span>
                                        </div>
                                        <div class="share-social d-none d-sm-block">
                                            <span>Chia sẻ: </span>
                                            <a href="#" class="text-decoration-none">
                                                <img src="{{ asset('client/img/facebook.png') }}" alt="facebook">
                                            </a>
                                            <a href="#" class="text-decoration-none">
                                                <img src="{{ asset('client/img/pinterest.png') }}" alt="pinterest">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="main-post">
                            @if ($post->image)
                                <div class="thumb-img">
                                    <img src="{{ url($post->image) }}" class="img-main" alt="{{ $post->title }}">
                                </div>
                            @endif
                            <div class="content">
                                {!! $post->content !!}
                            </div>
                        </div>

                        {{-- Form --}}
                        {{-- 3: TƯ VẤN ĐẦU TƯ,  4: ỦY THÁC ĐẦU TƯ --}}
                        @if ($post->id == 3 || $post->id == 4)
                            <div class="col-md-6 mx-auto form-post">
                                <div class="contact-form">
                                    @if (!session('success'))
                                        <div class="box-text">
                                            @if ($post->id == 4)
                                                <h3 class="text-center text-uppercase">Đăng ký ủy thác ngay tại đây
                                                </h3>
                                                <p class="text-center">Chúng tôi sẽ liên hệ và trao đổi chi tiết với bạn sau
                                                    khi nhận được thông tin đăng ký</p>
                                            @else
                                                <h3 class="text-center">LIÊN HỆ VỚI CHÚNG TÔI</h3>
                                                <p class="text-center">Để chúng tôi phục vụ tốt nhất cho bạn cũng như tư vấn
                                                    sản
                                                    phẩm tốt nhất</p>
                                            @endif

                                            <form
                                                action="{{ $post->id == 3 ? route('client.register-investment-consulting') : route('client.register-investment-trust') }}"
                                                method="post">
                                                @csrf

                                                {{-- Tên --}}
                                                <div class="form-group">
                                                    <input class="form-control" name="name" type="text"
                                                        placeholder="Tên của bạn..." value="{{ old('name') }}">

                                                    @error('name')
                                                        <small
                                                            class="d-block text-left form-text text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                {{-- Email --}}
                                                <div class="form-group">
                                                    <input class="form-control" name="email" type="email"
                                                        placeholder="Địa chỉ Email..." value="{{ old('email') }}">

                                                    @error('email')
                                                        <small
                                                            class="d-block text-left form-text text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                {{-- Số điện thoại --}}
                                                <div class="form-group">
                                                    <input class="form-control" name="phone" type="number"
                                                        placeholder="Số điện thoại..." value="{{ old('phone') }}">

                                                    @error('phone')
                                                        <small
                                                            class="d-block text-left form-text text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                {{-- Ghi chú --}}
                                                <div class="form-group">
                                                    <textarea class="form-control" name="content" id="note" rows="3"
                                                        placeholder="Ghi chú...">{{ old('content') }}</textarea>

                                                    @error('content')
                                                        <small
                                                            class="d-block text-left form-text text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-primary btn-register"><i
                                                            class="fas fa-upload"></i>Gửi
                                                        Liên Hệ</button>
                                                </div>
                                            </form>
                                        </div>
                                    @endif
                                    <!-- alert-success -->
                                    @if (session('success'))
                                        <div class="alert alert-success mt-2">
                                            {{ session('success') }}
                                            <br>
                                            {{ session('hotline') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endif

                        {{-- Form mở tài khoản --}}
                        @if ($post->id == 2)
                            <div class="col-md-7 mx-auto">
                                <div class="contact-form">
                                    @if (!session('success'))
                                        <div class="box-text">
                                            <h3 class="text-center mb-4 mt-2" style="font-size: 23px">ĐĂNG KÝ MỞ TÀI KHOẢN
                                                CHỨNG
                                                KHOÁN</h3>
                                            <form action="{{ route('client.register-open-account') }}" method="post">
                                                @csrf

                                                {{-- Tên --}}
                                                <div class="form-group has-search">
                                                    <span class="fa fa-user form-control-feedback"></span>
                                                    <input class="form-control" name="fullname" type="text"
                                                        placeholder="Tên của bạn..." value="{{ old('fullname') }}">
                                                    @error('fullname')
                                                        <small
                                                            class="d-block text-left form-text text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                {{-- Ngày sinh --}}
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        {{-- Ngày sinh --}}
                                                        <div class="form-group has-search">
                                                            {{-- <label for="birthday">Ngày sinh</label> --}}
                                                            <span class="fas fa-birthday-cake form-control-feedback"></span>
                                                            <input placeholder="Ngày sinh" type="text"
                                                                onfocus="(this.type='date')" class="form-control"
                                                                min="1970-01-01" id="birthday" name="birthday"
                                                                value="{{ old('birthday') }}">
                                                            @error('birthday')
                                                                <small
                                                                    class="d-block text-left form-text text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    {{-- CMND --}}
                                                    <div class="col-md-6">
                                                        <div class="form-group has-search">
                                                            {{-- <label for="identity_card">Chứng minh nhân dân</label> --}}
                                                            <span class="far fa-address-card form-control-feedback"></span>
                                                            <input type="number" class="form-control"
                                                                placeholder="Chứng minh nhân dân..." name="identity_card"
                                                                id="identity_card" value="{{ old('identity_card') }}">
                                                            @error('identity_card')
                                                                <small
                                                                    class="d-block text-left form-text text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    {{-- Ngày cấp --}}
                                                    <div class="col-md-6">
                                                        <div class="form-group has-search">
                                                            <span class="far fa-calendar-alt form-control-feedback"></span>
                                                            <input type="text" onfocus="(this.type='date')"
                                                                class="form-control" placeholder="Ngày cấp" min="1970-01-01"
                                                                id="date_permit" name="date_permit"
                                                                value="{{ old('date_permit') }}">
                                                            @error('date_permit')
                                                                <small
                                                                    class="d-block text-left form-text text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    {{-- Nơi cấp --}}
                                                    <div class="col-md-6">
                                                        <div class="form-group has-search">
                                                            {{-- <label for="address_permit">Nơi cấp</label> --}}
                                                            <span class="fas fa-hotel form-control-feedback"></span>
                                                            <input type="text" class="form-control" name="address_permit"
                                                                id="address_permit" placeholder="Nơi cấp..."
                                                                value="{{ old('address_permit') }}">
                                                            @error('address_permit')
                                                                <small
                                                                    class="d-block text-left form-text text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- Địa chỉ chi tiết --}}
                                                <div class="form-group has-search">
                                                    <span class="fas fa-map-marker-alt form-control-feedback"></span>
                                                    <textarea class="form-control" name="address_full" id="note" rows="2"
                                                        placeholder="Địa chỉ chi tiết...">{{ old('address_full') }}</textarea>

                                                    @error('address_full')
                                                        <small
                                                            class="d-block text-left form-text text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                {{-- Email --}}
                                                <div class="form-group has-search">
                                                    <span class="far fa-envelope form-control-feedback"></span>
                                                    <input class="form-control" name="email" type="email"
                                                        placeholder="Địa chỉ Email..." value="{{ old('email') }}">

                                                    @error('email')
                                                        <small
                                                            class="d-block text-left form-text text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                {{-- Số điện thoại --}}
                                                <div class="form-group has-search">
                                                    <span class="fas fa-mobile-alt form-control-feedback"></span>
                                                    <input class="form-control" name="phone" type="number"
                                                        placeholder="Số điện thoại..." value="{{ old('phone') }}">

                                                    @error('phone')
                                                        <small
                                                            class="d-block text-left form-text text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                <div class="row">
                                                    {{-- Tên đăng nhập bạn muốn đặt --}}
                                                    <div class="col-md-12">
                                                        <div class="form-group has-search">
                                                            {{-- <label for="username_bank">Tên đăng nhập ngân hàng</label> --}}
                                                            <span class="fas fa-signature form-control-feedback"></span>
                                                            <input class="form-control" name="username_bank" type="text"
                                                                id="username_bank"
                                                                placeholder="Tên đăng nhập bạn muốn đặt..."
                                                                value="{{ old('username_bank') }}">

                                                            @error('username_bank')
                                                                <small
                                                                    class="d-block text-left form-text text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    {{-- Sô tài khoản --}}
                                                    <div class="col-md-6">
                                                        <div class="form-group has-search">
                                                            <span class="far fa-credit-card form-control-feedback"></span>
                                                            <input class="form-control" name="account_number" type="number"
                                                                id="account_number" placeholder="Sô tài khoản ngân hàng..."
                                                                value="{{ old('account_number') }}">

                                                            @error('account_number')
                                                                <small
                                                                    class="d-block text-left form-text text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    {{-- Chi nhánh --}}
                                                    <div class="col-md-6">
                                                        <div class="form-group has-search">
                                                            <span class="far fa-map form-control-feedback"></span>
                                                            <input class="form-control" name="branch_bank" type="text"
                                                                id="branch_bank" placeholder="Tên ngân hàng & chi nhánh..."
                                                                value="{{ old('branch_bank') }}">

                                                            @error('branch_bank')
                                                                <small
                                                                    class="d-block text-left form-text text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- Ghi chú --}}
                                                <div class="form-group">
                                                    <textarea class="form-control" name="content" id="note" rows="3"
                                                        placeholder="Để lại lời nhắn (nếu có)...">{{ old('content') }}</textarea>

                                                    @error('content')
                                                        <small
                                                            class="d-block text-left form-text text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-primary btn-register"><i
                                                            class="fas fa-upload"></i>Đăng ký</button>
                                                </div>
                                            </form>
                                        </div>
                                    @endif
                                    <!-- alert-success -->
                                    @if (session('success'))
                                        <div class="alert alert-success mt-2">
                                            {{ session('success') }}
                                            <br>
                                            {{ session('hotline') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endif

                    </div>

                    {{-- Bạn có thể thích --}}
                    <div class="relative-post mt-5">
                        <h3 class="title">Bạn có thể thích</h3>
                        <div class="row">
                            @foreach ($relativePosts as $relativePost)
                                <div class="col-md-6">
                                    <div class="card post-item">
                                        <div class="row no-gutters">
                                            <div class="col-sm-3 col-4 text-center">
                                                <div class="thumb-avatar"><img class="card-img"
                                                        src="{{ url($relativePost->thumbnail) }}"
                                                        alt="{{ $relativePost->title }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-9 col-8">
                                                <div class="card-body post-item-body">
                                                    <h5 class="card-title"><a
                                                            href="{{ route($urlDetail, [$relativePost->slug, $relativePost->id]) }}"
                                                            title="{{ $relativePost->title }}"
                                                            class="text-decoration-none">{{ $relativePost->title }}</a>
                                                    </h5>
                                                    <div class="time-view">
                                                        <span class="post-on">
                                                            {{ date('d-m-Y', strtotime($relativePost->created_at)) }}</span>
                                                        <span class="post-on">| {{ $relativePost->num_view }} lượt
                                                            xem</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
