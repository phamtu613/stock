@extends('client.layouts.master')

@section('title')
    <title>System</title>
    <meta name="keywords" content="Alpha System" />
    <meta name="description"
        content="Hệ thống đỉnh cao xác định Sức Mạnh Giá + Động Lượng cho từng nhóm Ngành và Cổ phiếu" />
    <meta name="news_keywords" content="Alpha System" />
    <meta property="og:title" content="RRG - Hệ thống Chuyển Vị Xoay Tương Đối" />
    <meta property="og:description"
        content="Hệ thống đỉnh cao xác định Sức Mạnh Giá + Động Lượng cho từng nhóm Ngành và Cổ phiếu" />
    <meta property="og:image" content="/public/client/img/image-system.jpg" />
    <meta property="og:url" itemprop="url" content="" />
    <meta property="og:type" content="website" />
    <meta itemprop="name" content="Alpha System" />
    <meta itemprop="description"
        content="Hệ thống đỉnh cao xác định Sức Mạnh Giá + Động Lượng cho từng nhóm Ngành và Cổ phiếu" />
    <meta itemprop="image" content="/public/client/img/image-system.jpg" />
    <!-- Og Image -->
    <meta property="og:image:secure_url" content="" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="627" />
    <meta property="og:image:alt" content="Alpha System" />
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('client/css/system.css') }}">
@endsection

@section('content')
    <!-- tab content main -->
    <div class="main-content mt-4">
        <div class="container">
            <div class="row">

                {{-- desktop tab --}}
                <div class="col-md-2 mb-3 d-none d-sm-block">
                    <form action="">
                        <div class="form-group">
                            <input type="date" class="form-control date-chart" max="{{ $dateNow }}"
                                value="{{ $dateRequest }}" name="date" onchange="this.form.submit()">
                        </div>
                    </form>
                    <ul class="nav nav-pills d-block list-cate" id="myTab" role="tablist">
                        @foreach ($cateSystems as $key => $cateSystem)
                            <li class="nav-item {{ $key == 0 ? 'sticky-catesystem' : '' }}">
                                <a href="{{ request()->fullUrlWithQuery(['cate' => $cateSystem->slug]) }}"
                                    class="nav-link {{ $cateRequest == $cateSystem->slug ? 'active' : '' }}"
                                    id="{{ $cateSystem->slug }}-tab">{{ $cateSystem->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- mobile search --}}
                <div class="col-12 d-block d-sm-none">
                    <form action="">
                        <div class="row">
                            <div class="col-6">
                                <input type="date" class="form-control date-chart" max="{{ $dateNow }}"
                                    value="{{ $dateRequest }}" name="date">
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <select class="form-control" name="cate">
                                        <option value="">Chọn Nghành</option>
                                        @foreach ($cateSystemsMobile as $key => $cateSystemMobile)
                                            <option value="{{ $cateSystemMobile->slug }}"
                                                {{ $cateRequest == $cateSystemMobile->slug ? 'selected' : '' }}>
                                                {{ $cateSystemMobile->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 mb-3"><button type="submit" class="btn btn-search w-100">Get
                                    Chart</button>
                            </div>
                        </div>
                    </form>

                </div>

                <div class="col-md-10 col-12 pl-sm-0">

                    <div class="tab-content tab-content-cate" id="myTabContent">
                        <div
                            class="tab-pane tab-content-user-manual fade show {{ $cateRequest === 'hdsd' ? 'active' : '' }}">
                            {!! $userManual->content !!}
                        </div>
                        @if (count($alphaSystems) > 0)
                            @foreach ($alphaSystems as $key => $alphaSystem)
                                <div
                                    class="tab-pane fade show {{ $alphaSystem->categorySystem->slug == $cateRequest ? 'active' : '' }}">
                                    <h2 class="title-cate mb-3">Đồ thị xoay tương đối -
                                        <span> {{ $alphaSystem->categorySystem->name }}</span>
                                    </h2>

                                    {{-- nếu có user --}}
                                    @if (Auth::user())
                                        @if ($flag_reg)
                                            {{-- content image --}}
                                            <div class="tab-content tab-content-inner" id="pills-tabContent">
                                                <div class="tab-pane fade show active" id="chart-week{{ $key + 1 }}">
                                                    <div class="fg-gallery">
                                                        <img src="{{ url($alphaSystem->image_chart) }}" alt="">
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="chart-day{{ $key + 1 }}">
                                                    <div class="fg-gallery">
                                                        <img src="{{ url($alphaSystem->image_chart_week) }}" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        @else

                                            <div class="tab-content p-0 border-0 tab-content-cate" id="myTabContent">
                                                <div class="content-alert d-flex justify-content-center">
                                                    <div class="align-self-center mr-3 mr-md-5">
                                                        <img src="{{ asset('client/img/unlock.png') }}" alt="">
                                                    </div>
                                                    <div class="content-main">
                                                        <p class="text-center mt-3">Tính năng xem Chart bị khóa </p>
                                                        <p class="">Vui lòng nâng cấp lên tài khoản VIP để sử dụng</p>
                                                        <a href="{{ url('info-user') }}">Nâng cấp ngay</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                    @else
                                        <div class="tab-content p-0 border-0 tab-content-cate" id="myTabContent">
                                            <div class="content-alert d-flex justify-content-center">
                                                <div class="align-self-center mr-3 mr-md-5">
                                                    <img src="{{ asset('client/img/unlock.png') }}" alt="">
                                                </div>
                                                <div class="content-main">
                                                    <p class="text-center mt-3">Tính năng xem Chart bị khóa </p>
                                                    <p class="">Vui lòng đăng nhập để xem được chart</p>
                                                    <a href="{{ url('login') }}">Đăng nhập ngay</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <p class="text-center mt-1 mb-0 d-sm-none d-block" style="background: #ddf9de;
                                                        color: #364a44;">Click vào hình để xem rõ hơn</p>
                                    <ul class="nav nav-pill mt-1 justify-content-center " id="pills-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="pill"
                                                href="#chart-week{{ $key + 1 }}" role="tab"
                                                aria-selected="true">Ngày</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#chart-day{{ $key + 1 }}"
                                                role="tab" aria-selected="false">
                                                Tuần</a>
                                        </li>
                                        <li class="nav-item nav-item-usemanual d-block d-sm-none">
                                            <a class="nav-link" href="{{ route('client.system.index') }}">
                                                Xem hướng dẫn sử dụng</a>
                                        </li>
                                    </ul>
                                </div>
                            @endforeach
                        @else
                            <div class="tab-content p-0 border-0 tab-content-cate {{ $cateRequest === 'hdsd' ? 'd-none' : '' }}"
                                id="myTabContent">
                                <div class="content-alert content-alert-no-data d-flex justify-content-center">
                                    <div class="align-self-center mr-3 mr-md-5">
                                        <img src="{{ asset('client/img/sad-face.png') }}" alt="">
                                    </div>
                                    <div class="content-main">
                                        <p class="text-center mt-3">Không có dữ liệu cho ngày này</p>
                                        <p class="">Vui lòng chọn ngày khác</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- modal image --}}



@endsection

@section('js')
    <script>
        if (window.matchMedia("(max-width: 575px)").matches) {
            var a = new FgGallery('.fg-gallery', {
                cols: 1,
                style: {
                    height: '200px',
                }
            })

            var a = new FgGallery('.ns', {
                cols: 3,
                style: {
                    border: '0 solid #fff',
                    height: '240px',
                    borderRadius: '5px',
                }
            })
        } else {
            var a = new FgGallery('.fg-gallery', {
                cols: 1,
                style: {
                    height: '460px',
                }
            })

            var a = new FgGallery('.ns', {
                cols: 3,
                style: {
                    border: '0 solid #fff',
                    height: '240px',
                    borderRadius: '5px',
                }
            })
        }
    </script>
    @parent
@endsection
