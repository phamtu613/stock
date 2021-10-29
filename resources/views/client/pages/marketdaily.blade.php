@extends('client.layouts.master')

@section('title')
    <title>Marketdaily</title>
    <meta name="keywords" content="Marketdaily" />
    <meta name="description" content="Marketdaily" />
    <meta name="news_keywords" content="Marketdaily" />
    <meta property="og:title" content="Marketdaily" />
    <meta property="og:description" content="Marketdaily" />
    <meta property="og:image" content="{{ url($banner->image) }}" />
    <meta property="og:url" itemprop="url" content="" />
    <meta property="og:type" content="website" />
    <meta itemprop="name" content="Marketdaily" />
    <meta itemprop="description" content="Marketdaily" />
    <meta itemprop="image" content="/public/client/img/image-web.jpg" />
    <!-- Og Image -->
    <meta property="og:image:secure_url" content="" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="627" />
    <meta property="og:image:alt" content="Marketdaily" />
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('client/css/marketdaily.css') }}">
@endsection

@section('content')

    <div class="container p-xs-0 d-none d-sm-block">
        <img src="{{ url($banner->image) }}" width="100%" alt="{{ $banner->name }}" class="banner-quote">
    </div>

    <!-- tab content main -->
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="tabset">
                        <!-- Bài viết hằng ngày -->
                        <input type="radio" name="tabset" id="tab1" aria-controls="post-daily"
                            {{ $urlMarketdaily == 'bai-viet-hang-ngay' ? 'checked' : '' }}>
                        <label
                            onclick="window.location.href='{{ route('client.marketdaily.index', 'bai-viet-hang-ngay') }}'">Bài
                            viết hằng ngày</label>

                        <!-- Khuyến nghị -->
                        {{-- <input type="radio" name="tabset" id="tab2" aria-controls="accordion"
                            {{ $urlMarketdaily == 'khuyen-nghi' ? 'checked' : '' }}>
                        <label
                            onclick="window.location.href='{{ route('client.marketdaily.index', 'khuyen-nghi') }}'">Khuyến
                            nghị</label> --}}

                        <!-- Danh mục -->
                        <input type="radio" name="tabset" id="tab3" aria-controls="desc-portfolio"
                            {{ $urlMarketdaily == 'danh-muc' ? 'checked' : '' }}>
                        <label onclick="window.location.href='{{ route('client.marketdaily.index', 'danh-muc') }}'">Danh
                            mục</label>

                        <!--Top cổ phiếu -->
                        <input type="radio" name="tabset" id="tab4" aria-controls="top-stock"
                            {{ $urlMarketdaily == 'top-co-phieu' ? 'checked' : '' }}>
                        <label
                            onclick="window.location.href='{{ route('client.marketdaily.index', 'top-co-phieu') }}'">Top
                            cổ phiếu</label>

                        <!-- Báo cáo phân tích -->
                        <input type="radio" name="tabset" id="tab5" aria-controls="report-post"
                            {{ $urlMarketdaily == 'bao-cao-phan-tich' ? 'checked' : '' }}>
                        <label
                            onclick="window.location.href='{{ route('client.marketdaily.index', 'bao-cao-phan-tich') }}'">Báo
                            cáo phân tích</label>

                        <div class="form-group select-cate d-block d-sm-none">
                            <label for="select-cate">Chọn danh mục</label>
                            <select class="form-control d-block d-sm-none" id="select-tabset">
                                <option value="bai-viet-hang-ngay"
                                    {{ $urlMarketdaily == 'bai-viet-hang-ngay' ? 'selected' : '' }}>Bài viết hằng ngày
                                </option>
                                {{-- <option value="khuyen-nghi">Khuyến nghị</option> --}}
                                <option value="danh-muc" {{ $urlMarketdaily == 'danh-muc' ? 'selected' : '' }}>Danh mục
                                </option>
                                <option value="top-co-phieu" {{ $urlMarketdaily == 'top-co-phieu' ? 'selected' : '' }}>
                                    Top cổ phiếu</option>
                                <option value="bao-cao-phan-tich"
                                    {{ $urlMarketdaily == 'bao-cao-phan-tich' ? 'selected' : '' }}>Báo cáo phân tích
                                </option>
                            </select>
                        </div>

                        <div class="tab-panels">
                            <section id="post-daily" class="tab-panel">
                                <section class="list-blog">
                                    <div class="row blogs">
                                        @if ($dailyPosts->total() > 0)
                                            @foreach ($dailyPosts as $key => $dailyPost)
                                                <div class="col-md-3 blog {{ $key == 0 ? 'post-newest' : '' }}">
                                                    <div class="card"
                                                        onclick="window.location.href='{{ route('client.marketdailyDetail', [$dailyPost->slug, $dailyPost->id]) }}'">
                                                        <div class="row">
                                                            <div
                                                                class="col-md-12 wp-thumbnail {{ $key != 0 ? 'col-5' : '' }}">
                                                                <img class="card-img-top"
                                                                    src="{{ url($dailyPost->thumbnail) }}"
                                                                    alt="{{ url($dailyPost->thumbnail) }}">
                                                            </div>
                                                            <div
                                                                class="col-md-12 wp-text {{ $key != 0 ? 'col-7' : '' }}">
                                                                <div class="card-body">
                                                                    <h5 class="card-title"><a
                                                                            href="{{ route('client.marketdailyDetail', [$dailyPost->slug, $dailyPost->id]) }}"
                                                                            class="text-decoration-none"
                                                                            title="{{ $dailyPost->title }}">{{ $dailyPost->title }}</a>
                                                                    </h5>
                                                                    <p
                                                                        class="card-text mb-0 {{ $key == 0 ? '' : 'd-none d-sm-block' }}">
                                                                        {!! $dailyPost->description !!}
                                                                    </p>
                                                                    <div class="time-view d-block d-sm-none">
                                                                        <span
                                                                            class="post-on">{{ date('d/m/Y', strtotime($dailyPost->created_at)) }}
                                                                        </span>
                                                                        <span class="post-on">-
                                                                            {{ $dailyPost->num_view }} lượt xem</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <p class="mb-0 text-center w-100">Đang cập nhật bài viết...</p>
                                        @endif

                                    </div>
                                    <!-- pagination -->
                                    <div class="text-center d-flex justify-content-center">
                                        {{ $dailyPosts->onEachSide(0)->links() }}
                                    </div>
                                </section>
                            </section>

                            {{-- Khuyen nghi --}}
                            {{-- <section id="accordion" class="tab-panel">
                                <div class="accordion accordion-custom ">
                                    <div class="card mb-0">
                                        @foreach ($recomments as $key => $recomment)
                                            <div class="card-header collapsed" data-toggle="collapse"
                                                href="#collapse{{ $recomment->id }}"
                                                {{ $key == 0 ? 'aria-expanded=true' : '' }}>
                                                <a class="card-title"> <i class="far fa-calendar-alt mr-2"></i>
                                                    {{ date('d-m-Y', strtotime($recomment->date_recomment)) }}
                                                </a>
                                            </div>

                                            <div id="collapse{{ $recomment->id }}"
                                                class="card-body collapse {{ $key == 0 ? 'show' : '' }}"
                                                data-parent="#accordion">
                                                <p>{!! $recomment->content_recomment !!}
                                                </p>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </section> --}}

                            {{-- Danh mục --}}
                            <section id="desc-portfolio" class="tab-panel">
                                {{-- {!! $linkPortfolio->link_excel !!} --}}
                                @if (Auth::user())
                                    @if ($flag_reg)
                                        {!! $linkPortfolio->link_excel !!}
                                    @else
                                        <div class="tab-content p-0 border-0 tab-content-cate" id="myTabContent">
                                            <div class="content-alert d-flex justify-content-center">
                                                <div class="align-self-center mr-5">
                                                    <img src="{{ asset('client/img/unlock.png') }}" alt="">
                                                </div>
                                                <div class="content-main">
                                                    <p class="text-center mt-3">Tính năng xem danh mục bị khóa </p>
                                                    <p class="">Vui lòng nâng cấp lên tài khoản VIP để sử dụng</p>
                                                    <a href="{{ url('info-user') }}">Nâng cấp ngay</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @else
                                    <div class="tab-content p-0 border-0 tab-content-cate" id="myTabContent">
                                        <div class="content-alert d-flex justify-content-center">
                                            <div class="align-self-center mr-5">
                                                <img src="{{ asset('client/img/unlock.png') }}" alt="">
                                            </div>
                                            <div class="content-main">
                                                <p class="text-center mt-3">Tính năng xem danh mục bị khóa </p>
                                                <p class="">Vui lòng đăng nhập để được xem danh mục</p>
                                                <a href="{{ url('login') }}">Đăng nhập ngay</a>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <div class="desc-portfolio">
                                    <h3>Điều bạn nên biết trước khi sử dụng WatchList này:</h3>
                                    <p>
                                        1. Đây là Danh mục những Cổ phiếu Chuẩn được AlphaStock khuyến nghị cho Nhà đầu tư
                                        là
                                        những thành viên VIP
                                    </p>
                                    <p>
                                        2. Tất cả những CP trong Danh mục trên đều được chọn lọc dưới các điều kiện khắt khe
                                        về
                                        Phương pháp và Quản trị rủi ro
                                    </p>
                                    <p>
                                        3. Danh mục này chỉ Update trong giờ nghỉ trưa và sau giờ giao dịch. Do đó để có thể
                                        nhận được các Khuyến nghị ngay tức thời, anh/chị nên tham gia Group Zalo <a
                                            href="{{ url('bai-viet/3-tu-van-dau-tu.html') }}">tại đây</a>
                                    </p>

                                    <h4>Nguyên tắc đầu tư:</h4>
                                    <p>1. Danh mục trên sẽ có khá nhiều Cổ phiếu, do thời điểm Cổ phiếu cho điểm Mua là khác
                                        nhau và Hải muốn mang đến nhiều Cơ hội hơn cho NĐT. Tuy nhiên, danh mục của bạn chỉ
                                        nên
                                        nắm giữ 2-3 mã để tối ưu hiệu quả</p>
                                    <p>
                                        2. Bạn không nên nắm hơn 2 mã cùng 1 ngành (giảm thiểu rủi ro khi ngành biến động
                                        ngược
                                        kì vọng)
                                    </p>
                                </div>
                            </section>

                            {{-- Top cổ phiếu --}}
                            <section id="top-stock" class="tab-panel">
                                {!! $linkPortfolio->top_stock !!}
                                {{-- @if (Auth::user())
                                    @if ($flag_reg)
                                        {!!  $linkPortfolio->top_stock !!}
                                    @else
                                        <p class="text-center mt-3">Nâng cấp lên tài khoản vip <a
                                                href="{{ url('info-user') }}">tại đây</a> để được xem danh mục</p>
                                    @endif
                                @else
                                    <p class="text-center mt-3">Vui lòng đăng nhập <a href="{{ url('login') }}">tại
                                            đây</a> để được xem danh mục</p>
                                @endif --}}
                            </section>

                            {{-- Báo cáo phân tích --}}
                            <section id="report-post" class="tab-panel">
                                <section class="list-blog">
                                    <div class="row blogs">
                                        @if ($reportPosts->total() > 0)
                                            @foreach ($reportPosts as $reportPost)
                                                <div class="col-md-3 blog">
                                                    <div class="card"
                                                        onclick="window.location.href='{{ route('client.marketdailyDetail', [$reportPost->slug, $reportPost->id]) }}'">
                                                        <div class="row">
                                                            <div class="col-md-12 col-5 wp-thumbnail">
                                                                <img class="card-img-top"
                                                                    src="{{ url($reportPost->thumbnail) }}"
                                                                    alt="{{ url($reportPost->thumbnail) }}">
                                                            </div>
                                                            <div class="col-md-12 col-7 wp-text">
                                                                <div class="card-body">
                                                                    <h5 class="card-title"><a
                                                                            href="{{ route('client.marketdailyDetail', [$reportPost->slug, $reportPost->id]) }}"
                                                                            class="text-decoration-none"
                                                                            title="{{ $reportPost->title }}">{{ $reportPost->title }}</a>
                                                                    </h5>
                                                                    <p class="card-text mb-0">{!! $reportPost->description !!}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <p class="mb-0 text-center w-100">Đang cập nhật bài viết...</p>
                                        @endif
                                    </div>

                                    {{-- pagination --}}
                                    <div class="text-center d-flex justify-content-center">
                                        {{ $reportPosts->links() }}
                                    </div>
                                </section>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $('#select-tabset').on('change', function() {
            const route = this.value;
            window.location.href = 'https://alphastock.vn/marketdaily/' + route
        });
    </script>
    @parent
@endsection
