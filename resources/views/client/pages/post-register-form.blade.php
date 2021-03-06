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
                                            <span>Chia s???: </span>
                                            <a href="#" class="text-decoration-none">
                                                <img src="{{ asset('client/img/facebook.png') }}" alt="facebook">
                                            </a>
                                            <a href="#" class="text-decoration-none">
                                                <img src="{{ asset('client/img/pinterest.png') }}" alt="pinterest">
                                            </a>
                                        </div>

                                        {{-- mobile --}}
                                        <div class="num-view d-block d-sm-none">
                                            <span>L?????t xem:</span> <span class="num">{{ $post->num_view }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    {{-- Desktop --}}
                                    <div class="view-share d-none d-sm-block">
                                        <div class="num-view">
                                            <span>L?????t xem:</span> <span class="num">{{ $post->num_view }}</span>
                                        </div>
                                        <div class="share-social d-none d-sm-block">
                                            <span>Chia s???: </span>
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
                        {{-- 3: T?? V???N ?????U T??,  4: ???Y TH??C ?????U T?? --}}
                        @if ($post->id == 3 || $post->id == 4)
                            <div class="col-md-6 mx-auto form-post">
                                <div class="contact-form">
                                    @if (!session('success'))
                                        <div class="box-text">
                                            @if ($post->id == 4)
                                                <h3 class="text-center text-uppercase">????ng k?? ???y th??c ngay t???i ????y
                                                </h3>
                                                <p class="text-center">Ch??ng t??i s??? li??n h??? v?? trao ?????i chi ti???t v???i b???n sau
                                                    khi nh???n ???????c th??ng tin ????ng k??</p>
                                            @else
                                                <h3 class="text-center">LI??N H??? V???I CH??NG T??I</h3>
                                                <p class="text-center">????? ch??ng t??i ph???c v??? t???t nh???t cho b???n c??ng nh?? t?? v???n
                                                    s???n
                                                    ph???m t???t nh???t</p>
                                            @endif

                                            <form
                                                action="{{ $post->id == 3 ? route('client.register-investment-consulting') : route('client.register-investment-trust') }}"
                                                method="post">
                                                @csrf

                                                {{-- T??n --}}
                                                <div class="form-group">
                                                    <input class="form-control" name="name" type="text"
                                                        placeholder="T??n c???a b???n..." value="{{ old('name') }}">

                                                    @error('name')
                                                        <small
                                                            class="d-block text-left form-text text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                {{-- Email --}}
                                                <div class="form-group">
                                                    <input class="form-control" name="email" type="email"
                                                        placeholder="?????a ch??? Email..." value="{{ old('email') }}">

                                                    @error('email')
                                                        <small
                                                            class="d-block text-left form-text text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                {{-- S??? ??i???n tho???i --}}
                                                <div class="form-group">
                                                    <input class="form-control" name="phone" type="number"
                                                        placeholder="S??? ??i???n tho???i..." value="{{ old('phone') }}">

                                                    @error('phone')
                                                        <small
                                                            class="d-block text-left form-text text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                {{-- Ghi ch?? --}}
                                                <div class="form-group">
                                                    <textarea class="form-control" name="content" id="note" rows="3"
                                                        placeholder="Ghi ch??...">{{ old('content') }}</textarea>

                                                    @error('content')
                                                        <small
                                                            class="d-block text-left form-text text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-primary btn-register"><i
                                                            class="fas fa-upload"></i>G???i
                                                        Li??n H???</button>
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

                        {{-- Form m??? t??i kho???n --}}
                        @if ($post->id == 2)
                            <div class="col-md-7 mx-auto">
                                <div class="contact-form">
                                    @if (!session('success'))
                                        <div class="box-text">
                                            <h3 class="text-center mb-4 mt-2" style="font-size: 23px">????NG K?? M??? T??I KHO???N
                                                CH???NG
                                                KHO??N</h3>
                                            <form action="{{ route('client.register-open-account') }}" method="post">
                                                @csrf

                                                {{-- T??n --}}
                                                <div class="form-group has-search">
                                                    <span class="fa fa-user form-control-feedback"></span>
                                                    <input class="form-control" name="fullname" type="text"
                                                        placeholder="T??n c???a b???n..." value="{{ old('fullname') }}">
                                                    @error('fullname')
                                                        <small
                                                            class="d-block text-left form-text text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                {{-- Ng??y sinh --}}
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        {{-- Ng??y sinh --}}
                                                        <div class="form-group has-search">
                                                            {{-- <label for="birthday">Ng??y sinh</label> --}}
                                                            <span class="fas fa-birthday-cake form-control-feedback"></span>
                                                            <input placeholder="Ng??y sinh" type="text"
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
                                                            {{-- <label for="identity_card">Ch???ng minh nh??n d??n</label> --}}
                                                            <span class="far fa-address-card form-control-feedback"></span>
                                                            <input type="number" class="form-control"
                                                                placeholder="Ch???ng minh nh??n d??n..." name="identity_card"
                                                                id="identity_card" value="{{ old('identity_card') }}">
                                                            @error('identity_card')
                                                                <small
                                                                    class="d-block text-left form-text text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    {{-- Ng??y c???p --}}
                                                    <div class="col-md-6">
                                                        <div class="form-group has-search">
                                                            <span class="far fa-calendar-alt form-control-feedback"></span>
                                                            <input type="text" onfocus="(this.type='date')"
                                                                class="form-control" placeholder="Ng??y c???p" min="1970-01-01"
                                                                id="date_permit" name="date_permit"
                                                                value="{{ old('date_permit') }}">
                                                            @error('date_permit')
                                                                <small
                                                                    class="d-block text-left form-text text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    {{-- N??i c???p --}}
                                                    <div class="col-md-6">
                                                        <div class="form-group has-search">
                                                            {{-- <label for="address_permit">N??i c???p</label> --}}
                                                            <span class="fas fa-hotel form-control-feedback"></span>
                                                            <input type="text" class="form-control" name="address_permit"
                                                                id="address_permit" placeholder="N??i c???p..."
                                                                value="{{ old('address_permit') }}">
                                                            @error('address_permit')
                                                                <small
                                                                    class="d-block text-left form-text text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- ?????a ch??? chi ti???t --}}
                                                <div class="form-group has-search">
                                                    <span class="fas fa-map-marker-alt form-control-feedback"></span>
                                                    <textarea class="form-control" name="address_full" id="note" rows="2"
                                                        placeholder="?????a ch??? chi ti???t...">{{ old('address_full') }}</textarea>

                                                    @error('address_full')
                                                        <small
                                                            class="d-block text-left form-text text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                {{-- Email --}}
                                                <div class="form-group has-search">
                                                    <span class="far fa-envelope form-control-feedback"></span>
                                                    <input class="form-control" name="email" type="email"
                                                        placeholder="?????a ch??? Email..." value="{{ old('email') }}">

                                                    @error('email')
                                                        <small
                                                            class="d-block text-left form-text text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                {{-- S??? ??i???n tho???i --}}
                                                <div class="form-group has-search">
                                                    <span class="fas fa-mobile-alt form-control-feedback"></span>
                                                    <input class="form-control" name="phone" type="number"
                                                        placeholder="S??? ??i???n tho???i..." value="{{ old('phone') }}">

                                                    @error('phone')
                                                        <small
                                                            class="d-block text-left form-text text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                <div class="row">
                                                    {{-- T??n ????ng nh???p b???n mu???n ?????t --}}
                                                    <div class="col-md-12">
                                                        <div class="form-group has-search">
                                                            {{-- <label for="username_bank">T??n ????ng nh???p ng??n h??ng</label> --}}
                                                            <span class="fas fa-signature form-control-feedback"></span>
                                                            <input class="form-control" name="username_bank" type="text"
                                                                id="username_bank"
                                                                placeholder="T??n ????ng nh???p b???n mu???n ?????t..."
                                                                value="{{ old('username_bank') }}">

                                                            @error('username_bank')
                                                                <small
                                                                    class="d-block text-left form-text text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    {{-- S?? t??i kho???n --}}
                                                    <div class="col-md-6">
                                                        <div class="form-group has-search">
                                                            <span class="far fa-credit-card form-control-feedback"></span>
                                                            <input class="form-control" name="account_number" type="number"
                                                                id="account_number" placeholder="S?? t??i kho???n ng??n h??ng..."
                                                                value="{{ old('account_number') }}">

                                                            @error('account_number')
                                                                <small
                                                                    class="d-block text-left form-text text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    {{-- Chi nh??nh --}}
                                                    <div class="col-md-6">
                                                        <div class="form-group has-search">
                                                            <span class="far fa-map form-control-feedback"></span>
                                                            <input class="form-control" name="branch_bank" type="text"
                                                                id="branch_bank" placeholder="T??n ng??n h??ng & chi nh??nh..."
                                                                value="{{ old('branch_bank') }}">

                                                            @error('branch_bank')
                                                                <small
                                                                    class="d-block text-left form-text text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- Ghi ch?? --}}
                                                <div class="form-group">
                                                    <textarea class="form-control" name="content" id="note" rows="3"
                                                        placeholder="????? l???i l???i nh???n (n???u c??)...">{{ old('content') }}</textarea>

                                                    @error('content')
                                                        <small
                                                            class="d-block text-left form-text text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-primary btn-register"><i
                                                            class="fas fa-upload"></i>????ng k??</button>
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

                    {{-- B???n c?? th??? th??ch --}}
                    <div class="relative-post mt-5">
                        <h3 class="title">B???n c?? th??? th??ch</h3>
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
                                                        <span class="post-on">| {{ $relativePost->num_view }} l?????t
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
