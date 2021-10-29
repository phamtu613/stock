@extends('client.layouts.master')

@section('title')
    <title>Trang chủ - Alphastock</title>
    <meta name="keywords"
        content="chung khoan, khoa hoc chung khoan, dau tu chung khoan, chứng khoán, khóa học chứng khoán, đầu tư chứng khoán, khoa hoc dau tu, khóa học đầu tư, hoc chung khoan, học chứng khoán, co phieu, cổ phiếu, sieu co phieu, siêu cổ phiếu, alphastock, alphastock.vn, uy thac dau tu, ủy thác đầu tư, mo tai khoan chung khoan, mở tài khoản chứng khoán" />
    <meta name="description"
        content='Chuyên trang Đầu tư Chứng khoán. Tư vấn đầu tư, Phân tích Cổ phiếu, Huấn luyện Đầu tư, ủy thác Đầu tư' />
    <meta name="news_keywords"
        content="chung khoan, khoa hoc chung khoan, dau tu chung khoan, chứng khoán, khóa học chứng khoán, đầu tư chứng khoán, khoa hoc dau tu, khóa học đầu tư, hoc chung khoan, học chứng khoán, co phieu, cổ phiếu, sieu co phieu, siêu cổ phiếu, alphastock, alphastock.vn, uy thac dau tu, ủy thác đầu tư, mo tai khoan chung khoan, mở tài khoản chứng khoán">
    <meta property="og:title" content="AlphaStock - Bí mật của Siêu Cổ Phiếu" />
    <meta property="og:description"
        content="Chuyên trang Đầu tư Chứng khoán. Tư vấn đầu tư, Phân tích Cổ phiếu, Huấn luyện Đầu tư, ủy thác Đầu tư" />
    <meta property="og:image" content="/public/client/img/image-web.jpg" />
    <meta property="og:url" itemprop="url" content="{{ route('stock.index') }}">
    <meta property="og:type" content="website" />
    <meta itemprop="name" content="alphastock" />
    <meta itemprop="description"
        content="Chuyên trang Đầu tư Chứng khoán. Tư vấn đầu tư, Phân tích Cổ phiếu, Huấn luyện Đầu tư, ủy thác Đầu tư" />
    <meta itemprop="image" content="/public/client/img/image-web.jpg" />
    <!-- Og Image -->
    <meta property="og:image:secure_url" content="" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="627" />
    <meta property="og:image:alt" content="Trang chủ" />
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('client/css/style.css') }}">
@endsection

@section('slide')
    <section class="section-banner">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @foreach ($banners as $key => $banner)
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}"
                        class={{ $key == 0 ? 'active' : '' }}></li>
                @endforeach
            </ol>
            <div class="carousel-inner">
                @foreach ($banners as $banner)
                    <div class="carousel-item {{ $banner->position == 1 ? 'active' : '' }}">
                        <a href="{{ $banner->link }}" class="d-block"><img class="d-block w-100"
                                src="{{ $banner->image }}" alt="{{ $banner->name }}"></a>
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>
    @parent
@endsection

@section('content')

    <!-- intro us -->
    <section class="intro-about">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-6 about-text">
                    <div class="title">
                        <h2>CHÚNG TÔI LÀ AI</h2>
                        <h1>Đến với chúng tôi bạn có thể an tâm & tin tưởng tuyệt đối.</h1>
                    </div>
                    <p class="text-justify">
                        AlphaStock Team gồm các nhà đầu tư chứng khoán chuyên nghiệp, huấn luyện viên đầu tư, chuyên gia tư
                        vấn đầu tư và diễn giả với hơn 10 năm kinh nghiệm trên thị trường tài chính chứng khoán
                    </p class="text-justify">
                    <p class="text-justify">
                        Chúng tôi tâm huyết đưa ra thị trường những công cụ và sản phẩm nhằm giúp Nhà đầu tư có định hướng
                        đúng đắn, thành công hơn và kiếm được nhiều tiền hơn trên thị trường chứng khoán
                    </p>
                    <div class="thumb-img">
                        <img src="{{ asset('client/img/banner-stock.gif') }}" alt="banner-stock">
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 about-image">
                    <div class="row">
                        <div class=" col-md-4 col-lg-6">
                            <div class="box box-1">
                                <div class="box-img">
                                    <img src="{{ asset('client/img/bat-tay.jpg') }}" center alt="bat-tay">
                                </div>
                                <div class="box-text">
                                    <p class="title">Tư vấn đầu tư</p>
                                    <p class="text-center desc">AlphaStock cam kết đồng hành cùng bạn và mang đến cho bạn
                                        những tư vấn
                                        có độ chính xác cao nhất, hiệu quả nhất</p>
                                </div>
                            </div>
                            <div class="box box-2 d-md-none d-lg-block">
                                <div class="box-img">
                                    <img src="{{ asset('client/img/la-tien.webp') }}" center alt="la-tien">
                                </div>
                                <div class="box-text">
                                    <p class="title">Ủy thác đầu tư</p>
                                    <p class="text-center desc">Tỷ suất lợi nhuận trung bình 5 năm đạt mức 25% - 30% là
                                        điều chúng tôi
                                        luôn tự hào về phương pháp mà chúng tôi đang theo đuổi.</p>
                                </div>
                            </div>
                        </div>
                        <div class=" col-md-4 col-lg-6 ">
                            <div class="box box-3">
                                <div class="box-img">
                                    <img src="{{ asset('client/img/user.jpg') }}" center alt="img-user">
                                </div>
                                <div class="box-text">
                                    <p class="title">Huấn luyện đầu tư</p>
                                    <p class="text-center desc">Đầu tư có kiến thức là cách mà bạn có thể tồn tại bền vững
                                        với thị
                                        trường trong dài hạn.</p>
                                </div>
                            </div>
                        </div>
                        <div class=" col-md-4 col-lg-6 d-none d-md-block d-lg-none box-4-wrapper">
                            <div class="box box-4">
                                <div class="box-img">
                                    <img src="{{ asset('client/img/la-tien.webp') }}" center alt="la-tien">
                                </div>
                                <div class="box-text">
                                    <p class="title">Ủy thác đầu tư</p>
                                    <p class="desc text-justify">Hỗ trợ thiết kế website chuẩn SEO, chuyên nghiệp, các
                                        website tuyển
                                        dụng, book tour du lịch, sàn thương mại điện tử</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- investment consulting -->
    <section class="investment-consulting">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-lg-4 consulting-text">
                    <h1>Tư vấn đầu tư</h1>
                    <p class="text-justify">
                        Bạn sẽ không cô đơn trên con đường đi tới thành công trong Trading. Đội ngũ chuyên gia AlphaStock sẽ
                        đồng hành cùng bạn, đưa ra các chiến lược đầu tư hợp lý với từng giai đoạn của thị trường. Bạn sẽ
                        được cung cấp nhiều thông tin vô cùng hữu ích, xác suất chọn được siêu Cổ phiếu của bạn sẽ cao hơn
                        rất nhiều
                    </p>
                    <div class="buttons">
                        <button class="btn-hover color-11"
                            onclick="window.location.href='{{ route('client.advisoryInvestDetail', [$postAdvisoryInvests['2']->slug, $postAdvisoryInvests['2']->id]) }}'">Chi
                            Tiết</button>
                    </div>
                </div>
                <div class="col-md-7 col-lg-8 consulting-image">
                    <div class="row">
                        <div class="col-6 col-sm-3 col-md-6 col-lg-3 box-item">
                            <img src="{{ asset('client/img/hand.png') }}" alt="trung-thuc">
                            <p>Trung thực</p>
                        </div>
                        <div class="col-6 col-sm-3 col-md-6 col-lg-3 box-item">
                            <img src="{{ asset('client/img/khach-quan.jpg') }}" alt="khach-quan">
                            <p>Đánh giá khách quan</p>
                        </div>
                        <div class="col-6 col-sm-3 col-md-6 col-lg-3 box-item">
                            <img src="{{ asset('client/img/chuyen-gia.jpg') }}" alt="chuyen-gia">
                            <p>Chuyên gia kinh nghiệm</p>
                        </div>
                        <div class="col-6 col-sm-3 col-md-6 col-lg-3 box-item">
                            <img src="{{ asset('client/img/cay-tien.jpg') }}" alt="cay-tien">
                            <p>Hiệu quả</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- investment trust -->
    <section class="investment-trust">
        <div class="container">
            <div class="row">

                <div class="col-md-8 trust-image">
                    <div class="img">
                        <img src="{{ asset('client/img/uy-thac-dau-tu.jpg') }}" alt="uy-thac-dau-tu">
                    </div>
                </div>
                <div class="col-md-4 trust-text">
                    <h1>Ủy thác đầu tư</h1>
                    <p class="text-justify">
                        Bất kỳ ai trong chúng ta đều có những công việc khác nhau… đừng để những bận rộn trong công việc và
                        cuộc sống khiến bạn không thể tiếp cận được thị trường chứng khoán. AlphaStock sẽ đầu tư giúp bạn
                    </p>
                    <div class="buttons">
                        <button class="btn-hover color-11"
                            onclick="window.location.href='{{ route('client.advisoryInvestDetail', [$postAdvisoryInvests['3']->slug, $postAdvisoryInvests['3']->id]) }}'">Chi
                            Tiết</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- investment trainning -->
    <section class="investment-trainning">
        <div class="container">
            <div class="row">
                <div class="col-md-4 trainning-text">
                    <h1>Huấn luyện đầu tư</h1>
                    <p class="text-justify">
                        Chúng tôi đã tổ chức thành công hàng chục khóa huấn luyện, đào tạo hơn 350 NĐT trở thành NĐT chứng
                        khoán chuyện nghiệp.
                    </p>
                    <p class="text-justify">
                        Giờ đây họ đã rất tự tin và đang kiếm lợi nhuận rất tốt trên Thị trường chứng
                        khoán. Nếu bạn muốn đầu tư một cách bài bản, kiến thức, kĩ năng, kinh nghiệm là 3 hành trang không
                        bao giờ được thiếu. Hãy để chúng tôi giúp bạn điều đó
                    </p>
                    <div class="buttons">
                        <button class="btn-hover color-11"
                            onclick="window.location.href='{{ route('client.course.index') }}'">Chi
                            Tiết</button>
                    </div>
                </div>
                <div class="col-md-8 trainning-slide">
                    <div id="custCarousel" class="carousel slide" data-ride="carousel" align="center">
                        <div class="row">
                            <div class="col-md-10">
                                <!-- slides -->
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="{{ asset('client/img/img_course_1.jpg') }}"
                                            alt="{{ asset('client/img/img_course_1.jpg') }}">
                                    </div>
                                    <div class="carousel-item ">
                                        <img src="{{ asset('client/img/img_course_2.jpg') }}"
                                            alt="{{ asset('client/img/img_course_2.jpg') }}">
                                    </div>
                                    <div class="carousel-item ">
                                        <img src="{{ asset('client/img/img_course_3.jpg') }}"
                                            alt="{{ asset('client/img/img_course_3.jpg') }}">
                                    </div>
                                    <div class="carousel-item ">
                                        <img src="{{ asset('client/img/img_course_4.jpg') }}"
                                            alt="{{ asset('client/img/img_course_4.jpg') }}">
                                    </div>

                                </div>
                                <!-- Left right -->
                                <a class="carousel-control-prev" href="#custCarousel" data-slide="prev"> <span
                                        class="carousel-control-prev-icon"></span> </a>
                                <a class="carousel-control-next" href="#custCarousel" data-slide="next"> <span
                                        class="carousel-control-next-icon"></span> </a>
                            </div>
                            <div class="col-md-2">
                                <!-- Thumbnails -->
                                <ol class="carousel-indicators list-inline">
                                    <li class="list-inline-item active">
                                        <a id="carousel-selector-0" class="selected" data-slide-to="0"
                                            data-target="#custCarousel"> <img
                                                src="{{ asset('client/img/img_course_1.jpg') }}" class="img-fluid"> </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a id="carousel-selector-1" data-slide-to="1" data-target="#custCarousel"> <img
                                                src="{{ asset('client/img/img_course_2.jpg') }}" class="img-fluid"> </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a id="carousel-selector-2" data-slide-to="2" data-target="#custCarousel"> <img
                                                src="{{ asset('client/img/img_course_3.jpg') }}" class="img-fluid"> </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a id="carousel-selector-3" data-slide-to="3" data-target="#custCarousel"> <img
                                                src="{{ asset('client/img/img_course_4.jpg') }}" class="img-fluid"> </a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- customer review -->
    <section class="customer-review ">
        <div class="container">
            <div class="row">
                <div class="col-md-8 customer-slide">
                    <div class="owl-carousel owl-theme">
                        <div class="item">
                            <img src="{{ asset('client/img/jh1.jpg') }}" alt="jh1">
                            <div class="star">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="content">
                                Được Hai Le Canslim hướng dẫn và tư vấn, mình đã tích lũy kinh nghiệm đầu tư một cách bài
                                bản, có nguyên tắc, biết quản trị rủi ro. Mua/bán một cách hợp lý. Hai Le Canslim rất có tâm
                                và tầm, có trách nhiệm, hỗ trợ, cập nhật thị trường sâu sát. Cảm ơn Hải và team nhiều
                            </div>
                            <div class="auth">
                                <span class="name">Đặng Bảo Lâm</span> <span class="career">/ PGĐ Cty Đăng
                                    Kiểm Quảng Nam</span>
                            </div>
                        </div>

                        <div class="item">
                            <img src="{{ asset('client/img/kh2.jpg') }}" alt="kh2">
                            <div class="star">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="content">
                                Khóa AlphaStock trang bị được cho mình nhiều kiến
                                thức bổ ích và thiết thực mà mình nghĩ mọi nhà đầu tư đều cần biết trước khi "dấn thân" vào
                                thị trường chứng khoán. Cám ơn team AlphaStock
                                đã giúp NĐT F0 như mình.
                            </div>
                            <div class="auth">
                                <span class="name">Nhat Nguyen</span> <span class="career">/ Marketing Leader ShopBase Viet
                                    Nam</span>
                            </div>
                        </div>

                        <div class="item">
                            <img src="{{ asset('client/img/kh3.jpg') }}" alt="kh3">
                            <div class="star">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="content">
                                Bạn tư vấn chuyên nghiệp, có phương pháp quản trị rủi ro khi đầu tư hợp lý, có
                                phương pháp để mua bán chuẩn. Xin cảm ơn đội ngũ tư vấn đã luôn đồng
                                hành với nhà đầu tư, đăc biệt trong những giai đoạn khốc liệt nhất của thị trường.
                            </div>
                            <div class="auth">
                                <span class="name">Anh Vinh</span> <span class="career">/ Nhà đầu tư lâu năm</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 customer-text">
                    <h1>Nhà đầu tư nói gì sau khi sử dụng dịch vụ của chúng tôi</h1>
                    <p class="text-justify">
                        Cảm ơn quý Nhà đầu tư đã tin tưởng và sử dụng các dịch vụ của chúng tôi. Chúng tôi cam kết 100% các
                        sản phẩm dịch vụ của chúng tôi sẽ làm hài lòng được bạn.
                    </p>

                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            items: 2,
            loop: true,
            margin: 20,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                600: {
                    items: 2,
                    nav: true
                },
            }
        });
        $('.play').on('click', function() {
            owl.trigger('play.owl.autoplay', [1000])
        })
        $('.stop').on('click', function() {
            owl.trigger('stop.owl.autoplay')
        })

    </script>
    @parent
@endsection
