@extends('client.layouts.master')

@section('title')
    <title>Đánh giá</title>
    <meta name="keywords" content="Đánh giá" />
    <meta name="description" content="Đánh giá" />
    <meta name="news_keywords" content="Đánh giá" />
    <meta property="og:title" content="Đánh giá" />
    <meta property="og:description" content="Đánh giá" />
    <meta property="og:image" content="/public/client/img/image-web.jpg" />
    <meta property="og:url" itemprop="url" content="" />
    <meta property="og:type" content="website" />
    <meta itemprop="name" content="Đánh giá" />
    <meta itemprop="description" content="Đánh giá" />
    <meta itemprop="image" content="/public/client/img/image-web.jpg" />
    <!-- Og Image -->
    <meta property="og:image:secure_url" content="" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="627" />
    <meta property="og:image:alt" content="Review" />
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('client/css/review.css') }}">
@endsection

@section('content')

    <!-- tab content main -->
    <div class="main-content">
        <div class="container">
            <div class="review-title">
                <h3 class="title">Đánh giá của Khách hàng về các Dịch vụ của AlphaStock</h3>
                <p class="sub-title">Những cảm nhận đánh giá của học viên sau khi hoàn thành các dịch vụ của AlphaStock
                </p>
            </div>

            <div class="list-testimonial">
                <div class="card testimonial-item">
                    <div class="row no-gutters">
                        <div class="col-sm-2 text-center">
                            <div class="thumb-avatar"><img class="card-img" src="{{ asset('client/img/jh1.jpg') }}"
                                    alt="khach-hang"></div>
                        </div>
                        <div class="col-sm-9">
                            <div class="card-body testimonial-item-body">
                                <h5 class="card-title">“Làm việc tận tâm, chuyên nghiệp, có trách nhiệm”</h5>
                                <p class="card-text">“Được Hai Le Canslim hướng dẫn và tư vấn, mình đã tích lũy kinh nghiệm
                                    đầu tư một cách bài
                                    bản, có nguyên tắc, biết quản trị rủi ro. Mua/bán một cách hợp lý. Hai Le Canslim rất có
                                    tâm
                                    và tầm, có trách nhiệm, hỗ trợ, cập nhật thị trường sâu sát. Cảm ơn Hải và team rất
                                    nhiều."</p>
                                <span>Đặng Bảo Lâm, Phó GĐ phụ trách, Cty CP Đăng Kiểm Quảng Nam</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card testimonial-item">
                    <div class="row no-gutters">
                        <div class="col-sm-2 text-center">
                            <div class="thumb-avatar">
                                <img class="card-img" src="{{ asset('client/img/kh2.jpg') }}" alt="khach-hang">
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <div class="card-body testimonial-item-body">
                                <h5 class="card-title">“Kiến thức Admin uyên thâm, mình học được rất nhiều kiến thức và kĩ
                                    năng bổ ích”</h5>
                                <p class="card-text">“Sau khi tham gia khóa học của AlphaStock thì mình đã trang bị được rất
                                    nhiều kiến
                                    thức bổ ích và thiết thực mà mình nghĩ mọi nhà đầu tư đều cần biết trước khi "dấn thân"
                                    vào
                                    thị trường chứng khoán nhiều cơ hội nhưng cũng đầy cạm bẫy và rủi ro. Cám ơn team
                                    AlphaStock
                                    đã giúp NĐT F0 như mình có thể về bờ trước bao cơn sóng dữ."</p>
                                <span>Nhat Nguyen, Marketing Leader ShopBase Viet Nam</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card testimonial-item">
                    <div class="row no-gutters">
                        <div class="col-sm-2 text-center">
                            <div class="thumb-avatar">
                                <img class="card-img" src="{{ asset('client/img/kh3.jpg') }}" alt="khach-hang">
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <div class="card-body testimonial-item-body">
                                <h5 class="card-title">“ Kiến thức Admin uyên thâm, mình học được rất nhiều kiến thức và kĩ
                                    năng bổ ích”</h5>
                                <p class="card-text">“Bạn tư vấn chuyên nghiệp, có phương pháp quản trị rủi ro khi đầu tư
                                    chứng khoán hợp lý, có
                                    phương pháp để vào/ra khi quyết định mua/bán chuẩn. Xin cảm ơn đội ngũ tư vấn đã luôn
                                    đồng
                                    hành với nhà đầu tư, đăc biệt trong những giai đoạn khốc liệt nhất của thị trường."</p>
                                <span>Anh Vinh, Nhà đầu tư lâu năm</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="list-img-value">
                <div class="review-title mb-4">
                    <h3 class="title"> Đánh giá học viên về khóa học</h3>
                </div>

                <!--Grid row-->
                <div class="row">
                    <div class="col-lg-6 col-md-12 d-flex">
                        <img src="{{ asset('client/img/review/rv50.png') }}" class="img-fluid mb-4" alt="img-review">
                    </div>
                    <div class="col-lg-6 col-md-12 d-flex">
                        <img src="{{ asset('client/img/review/rv51.png') }}" class="img-fluid mb-4" alt="img-review"
                            data-wow-delay="0.3s">
                    </div>

                    <div class="col-lg-6 col-md-6 d-flex">
                        <img src="{{ asset('client/img/review/rv52.png') }}" class="img-fluid mb-4" alt="img-review"
                            data-wow-delay="0.1s">
                    </div>
                    <div class="col-lg-6 col-md-6 d-flex">
                        <img src="{{ asset('client/img/review/rv53.png') }}" class="img-fluid mb-4" alt="img-review"
                            data-wow-delay="0.4s">
                    </div>

                    <div class="col-lg-6 col-md-6 d-flex">
                        <img src="{{ asset('client/img/review/rv54.png') }}" class="img-fluid mb-4" alt="img-review"
                            data-wow-delay="0.2s">
                    </div>
                    <div class="col-lg-6 col-md-6 d-flex">
                        <img src="{{ asset('client/img/review/rv55.png') }}" class="img-fluid mb-4" alt="img-review">
                    </div>
                </div>
                <!--Grid row-->
            </div>

            <div class="list-img-review">
                <div class="review-title">
                    <h3 class="title"> Kết quả đầu tư của khách hàng</h3>
                </div>

                <!--Grid row-->
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="fg-gallery">
                            <img src="{{ asset('client/img/review/rv1.jpg') }}" class="img-fluid mb-4" alt="img-review">
                            <img src="{{ asset('client/img/review/rv2.jpg') }}" class="img-fluid mb-4" alt="img-review"
                                data-wow-delay="0.3s">
                            <img src="{{ asset('client/img/review/rv3.jpg') }}" class="img-fluid mb-4" alt="img-review"
                                data-wow-delay="0.1s">
                            <img src="{{ asset('client/img/review/rv4.jpg') }}" class="img-fluid mb-4" alt="img-review"
                                data-wow-delay="0.4s">
                            <img src="{{ asset('client/img/review/rv5.jpg') }}" class="img-fluid mb-4" alt="img-review"
                                data-wow-delay="0.2s">
                            <img src="{{ asset('client/img/review/rv6.jpg') }}" class="img-fluid mb-4" alt="img-review"
                                data-wow-delay="0.5s">
                            <img src="{{ asset('client/img/review/rv7.jpg') }}" class="img-fluid mb-4" alt="img-review"
                                data-wow-delay="0.2s">
                            <img src="{{ asset('client/img/review/rv8.jpg') }}" class="img-fluid mb-4" alt="img-review"
                                data-wow-delay="0.5s">
                            <img src="{{ asset('client/img/review/rv37.jpg') }}" class="img-fluid mb-4" alt="img-review"
                                data-wow-delay="0.2s">
                            <img src="{{ asset('client/img/review/rv38.jpg') }}" class="img-fluid mb-4" alt="img-review"
                                data-wow-delay="0.5s">
                            <img src="{{ asset('client/img/review/rv33.jpg') }}" class="img-fluid mb-4" alt="img-review"
                                data-wow-delay="0.2s">
                            <img src="{{ asset('client/img/review/rv34.jpg') }}" class="img-fluid mb-4" alt="img-review"
                                data-wow-delay="0.5s">
                            <img src="{{ asset('client/img/review/rv30.jpg') }}" class="img-fluid mb-4" alt="img-review"
                                data-wow-delay="0.5s">
                            <img src="{{ asset('client/img/review/rv35.jpg') }}" class="img-fluid mb-4" alt="img-review"
                                data-wow-delay="0.2s">
                            <img src="{{ asset('client/img/review/rv36.jpg') }}" class="img-fluid mb-4" alt="img-review"
                                data-wow-delay="0.5s">
                            <img src="{{ asset('client/img/review/rv40.jpg') }}" class="img-fluid mb-4" alt="img-review"
                                data-wow-delay="0.5s">
                            <img src="{{ asset('client/img/review/rv24.jpg') }}" class="img-fluid mb-4" alt="img-review"
                                data-wow-delay="0.5s">
                            <img src="{{ asset('client/img/review/rv24.jpg') }}" class="img-fluid mb-4" alt="img-review"
                                data-wow-delay="0.5s">
                            <img src="{{ asset('client/img/review/rv31.jpg') }}" class="img-fluid mb-4" alt="img-review"
                                data-wow-delay="0.2s">
                            <img src="{{ asset('client/img/review/rv32.jpg') }}" class="img-fluid mb-4" alt="img-review"
                                data-wow-delay="0.5s">
                            <img src="{{ asset('client/img/review/rv27.jpg') }}" class="img-fluid mb-4" alt="img-review"
                                data-wow-delay="0.2s">
                            <img src="{{ asset('client/img/review/rv28.jpg') }}" class="img-fluid mb-4" alt="img-review"
                                data-wow-delay="0.5s">

                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="fg-gallery">
                            <img src="{{ asset('client/img/review/rv9.jpg') }}" class="img-fluid mb-4" alt="img-review"
                                data-wow-delay="0.2s">
                            <img src="{{ asset('client/img/review/rv10.jpg') }}" class="img-fluid mb-4" alt="img-review"
                                data-wow-delay="0.5s">
                            <img src="{{ asset('client/img/review/rv12.jpg') }}" class="img-fluid mb-4" alt="img-review"
                                data-wow-delay="0.2s">
                            <img src="{{ asset('client/img/review/rv20.jpg') }}" class="img-fluid mb-4" alt="img-review"
                                data-wow-delay="0.5s">
                            <img src="{{ asset('client/img/review/rv13.jpg') }}" class="img-fluid mb-4" alt="img-review"
                                data-wow-delay="0.2s">
                            <img src="{{ asset('client/img/review/rv11.jpg') }}" class="img-fluid mb-4" alt="img-review"
                                data-wow-delay="0.2s">
                            <img src="{{ asset('client/img/review/rv41.jpg') }}" class="img-fluid mb-4" alt="img-review"
                                data-wow-delay="0.5s">
                            <img src="{{ asset('client/img/review/rv15.jpg') }}" class="img-fluid mb-4" alt="img-review"
                                data-wow-delay="0.2s">
                            <img src="{{ asset('client/img/review/rv16.jpg') }}" class="img-fluid mb-4" alt="img-review"
                                data-wow-delay="0.5s">
                            <img src="{{ asset('client/img/review/rv17.jpg') }}" class="img-fluid mb-4" alt="img-review"
                                data-wow-delay="0.2s">
                            <img src="{{ asset('client/img/review/rv18.jpg') }}" class="img-fluid mb-4" alt="img-review"
                                data-wow-delay="0.5s">
                            <img src="{{ asset('client/img/review/rv19.jpg') }}" class="img-fluid mb-4" alt="img-review"
                                data-wow-delay="0.2s">
                            <img src="{{ asset('client/img/review/rv42.jpg') }}" class="img-fluid mb-4" alt="img-review"
                                data-wow-delay="0.5s">
                            <img src="{{ asset('client/img/review/rv21.jpg') }}" class="img-fluid mb-4" alt="img-review"
                                data-wow-delay="0.2s">
                            <img src="{{ asset('client/img/review/rv22.jpg') }}" class="img-fluid mb-4" alt="img-review"
                                data-wow-delay="0.5s">
                            <img src="{{ asset('client/img/review/rv14.jpg') }}" class="img-fluid mb-4" alt="img-review"
                                data-wow-delay="0.5s">
                            <img src="{{ asset('client/img/review/rv39.jpg') }}" class="img-fluid mb-4" alt="img-review"
                                data-wow-delay="0.2s">
                            <img src="{{ asset('client/img/review/rv43.jpg') }}" class="img-fluid mb-4" alt="img-review"
                                data-wow-delay="0.2s">
                            <img src="{{ asset('client/img/review/rv29.jpg') }}" class="img-fluid mb-4" alt="img-review"
                                data-wow-delay="0.2s">
                            <img src="{{ asset('client/img/review/rv23.jpg') }}" class="img-fluid mb-4" alt="img-review"
                                data-wow-delay="0.2s">
                            <img src="{{ asset('client/img/review/rv25.jpg') }}" class="img-fluid mb-4" alt="img-review"
                                data-wow-delay="0.2s">
                            <img src="{{ asset('client/img/review/rv26.jpg') }}" class="img-fluid mb-4" alt="img-review"
                                data-wow-delay="0.5s">
                        </div>

                    </div>
                    <!--Grid row-->
                </div>
            </div>
        </div>

        {{--  --}}
        <!-- The Modal -->
        <div id="myModal" class="modal">

            <!-- The Close Button -->
            <span class="close">&times;</span>

            <!-- Modal Content (The Image) -->
            <img class="modal-content" id="img01">

            <!-- Modal Caption (Image Text) -->
            <div id="caption"></div>
        </div>
    @endsection

    @section('js')
        <script>
            var a = new FgGallery('.fg-gallery', {
                cols: 1,
                style: {
                    height: '100px',
                    width: '100%'
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
        </script>
        @parent
    @endsection
