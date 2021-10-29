@extends('client.layouts.master')

@section('title')
    <title>{{ $course->title }}</title>
    <meta name="keywords" content="{{ $course->title }}" />
    <meta name="news_keywords" content="{{ $course->title }}" />
    <meta name="description" content="{{ $course->description }}" />
    <meta property="og:title" content="{{ $course->title }}" />
    <meta property="og:description" content="{{ $course->description }}" />
    <meta property="og:image" content="{{ url($course->thumbnail) }}" />
    <meta property="og:url" itemprop="url" content="" />
    <meta property="og:type" content="website" />
    <meta itemprop="name" content="{{ $course->title }}" />
    <meta itemprop="description" content="{{ $course->description }}" />
    <meta itemprop="image" content="/public/client/img/image-web.jpg" />
    <!-- Og Image -->
    <meta property="og:image:secure_url" content="" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="627" />
    <meta property="og:image:alt" content="{{ $course->title }}" />
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('client/css/detail-course.css') }}">
@endsection

@section('content')

    <!-- start featured -->
    <main>
        <div class="container">
            <div class="row wp-content-inner">
                <div class="col-md-8 main-content">
                    <div class="course-info">
                        <h1>{{ $course->title }}</h1>
                        <p class="subtitle d-none">
                            {{ $course->admin->name }} - {{ $course->title }}
                        </p>
                        <div class="auth-area">
                            <div class="author-info">
                                @if ($course->admin->avatar)
                                    <img src="{{ url($course->admin->avatar) }}" class="avatar" alt="avatar">
                                @else
                                    <img src="{{ asset('client/img/img-author.jpg') }}" alt="avatar">
                                @endif
                                <span>{{ $course->admin->name }}</span>
                            </div>
                            <div class="student-count">
                                <i class="fas fa-user"></i>
                                <span class="count">{{ $course->num_student }}</span>
                                <span>học viên</span>
                            </div>
                            <div class="front-stars d-none d-sm-block">
                                <i aria-hidden="true" class="fa fa-star"></i>
                                <i aria-hidden="true" class="fa fa-star"></i>
                                <i aria-hidden="true" class="fa fa-star"></i>
                                <i aria-hidden="true" class="fa fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <b>4.5</b>
                                <span>({{ $course->num_star }})</span>
                            </div>

                        </div>
                    </div>

                    <div class="course-detail-sub-menu" data-spy="scroll" data-target=".navbar" data-offset="50">
                        <ul class="menu">
                            <li><a href="#info" class="text-decoration-none">Thông tin chung <span
                                        class="sr-only">(current)</span></a></li>
                            <li><a href="#content" class="text-decoration-none">Nội dung khóa học</a></li>
                            <li><a href="#teacher" class="text-decoration-none">Giảng viên</a></li>
                        </ul>

                        <div id="info" class="container-fluid">
                            {!! $course->info_course !!}
                        </div>

                        <div id="content" class="container-fluid">
                            <div class="title">Nội dung khóa học</div>
                            <div class="curriculum-overview">
                                <div class="curriculum-type">
                                    Thể loại: <span>{{ $course->type }}</span>
                                </div>
                                <div class="curriculum-lessons">
                                    <div class="curriculum-time curriculum-lessons-child">
                                        <i class="far fa-clock"></i> Thời lượng: <span>{{ $course->time }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="content-inner">
                                {!! $course->curriculum !!}
                            </div>
                        </div>

                        <div id="teacher" class="container-fluid">
                            <div class="title">Thông tin giảng viên</div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="card teacher-personal-info">
                                        <div class="row no-gutters">
                                            <div class="col-sm-4 col-4">
                                                <a href="javascript:void(0)" class="thumb-avatar">
                                                    <img class="card-img" src="{{ url($course->admin->avatar) }}"
                                                        alt="img-admin">
                                                </a>
                                            </div>
                                            <div class="col-8 col-sm-6 teacher-info">
                                                <div class="card-body p-0">
                                                    <p class="title-teacher">{{ $course->admin->position }}</p>
                                                    <p class="title-name">{{ $course->admin->name }}</p>
                                                    <div class="front-stars">
                                                        <i aria-hidden="true" class="fa fa-star"></i>
                                                        <i aria-hidden="true" class="fa fa-star"></i>
                                                        <i aria-hidden="true" class="fa fa-star"></i>
                                                        <i aria-hidden="true" class="fa fa-star"></i>
                                                        <i class="fas fa-star-half-alt"></i>
                                                        <b>4.5</b>
                                                        <span>({{ $course->num_star }})</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 teacher-social">

                                    <a class="thumb-social" target="_blank"
                                        href="{{ strpos($course->admin->facebook, 'https') === false ? 'https://' . $course->admin->facebook : $course->admin->facebook }}"
                                        rel="nofollow"><img src="{{ asset('client/img/facebook-btn.png') }}"
                                            alt="facebook"></a>

                                    <a class="thumb-social" target="_blank"
                                        href="{{ strpos($course->admin->zalo, 'https') === false ? 'https://' . $course->admin->zalo : $course->admin->zalo }}"
                                        rel="nofollow"><img src="{{ asset('client/img/zalo-btn.jpg') }}" alt="zalo"></a>
                                </div>
                            </div>
                            <div class="content-inner">
                                {!! $course->admin->desc !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 sidebar-content">
                    <div class="course-checkout">
                        <div class="banner-course">
                            <img src="{{ url($course->thumbnail) }}" class="course-banner" alt="{{ $course->title }}">
                        </div>
                        <div class="course-checkout-inner">

                            <!-- price -->
                            <div class="checkout-course-price">
                                <span class="current">{{ number_format($course->price_current, 0, ',', '.') }}₫</span>
                                <span class="old-price">
                                    @if ($course->price_old)
                                        {{ number_format($course->price_old, 0, ',', '.') }}₫
                                    @endif
                                </span>
                            </div>

                            <!-- btn register or learn ebook -->
                            @if ($course->categoryCourse->id == 3)
                                <div class="btn-register-learn">
                                    <button type="button" class="btn btn-danger register_now">Đăng Ký Ngay</button>
                                    <button type="button" class="btn btn-success"><a href="{{ $course->link_excel }}"
                                            target="t_blank" class="text-white text-decoration-none">Học Ngay</a></button>
                                </div>
                            @endif


                            <!-- form register course -->
                            @if (!session('status'))
                                <div class="form-register {{ $course->categoryCourse->id == 3 ? 'd-none' : '' }}">
                                    <p class="title">Đăng ký khóa học
                                        <img src="{{ asset('client/img/hot.gif') }}" alt="{{ $course->title }}">
                                    </p>
                                    <form action="{{ route('client.registerCourse', $course->id) }}" method="post">
                                        @csrf

                                        {{-- Tên --}}
                                        <div class="form-group">
                                            <input class="form-control" name="name" type="text" placeholder="Tên của bạn..."
                                                required value="{{ old('name') }}">

                                            @error('name')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>


                                        {{-- Email --}}
                                        <div class="form-group">
                                            <input class="form-control" name="email" type="email" required
                                                placeholder="Địa chỉ Email..." value="{{ old('email') }}">
                                            @error('email')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>


                                        {{-- Số điện thoại --}}
                                        <div class="form-group">
                                            <input class="form-control" name="phone" type="number" required
                                                placeholder="Số điện thoại..." value="{{ old('phone') }}">

                                            @error('phone')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>


                                        {{-- Ghi chú --}}
                                        <div class="form-group">
                                            <textarea class="form-control" name="note" rows="3" placeholder="Ghi chú..."
                                                value="{{ old('note') }}"></textarea>
                                            @error('note')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-register"><i
                                                    class="fas fa-upload"></i> Đăng Ký</button>
                                        </div>
                                    </form>
                                </div>
                            @endif

                            <!-- alert-success -->
                            @if (session('status'))
                                <div class="alert-success-custom">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <!-- info payment -->
                            <div class="info-payment">
                                <p class="title">Thông tin thanh toán</p>
                                <div class="payment-content">
                                    <p><span>Chủ tài khoản: </span>Lê Quang Hải</p>
                                    <p><span>Ngân hàng Vietcombank: </span>0041.000.234.381 - Ngân hàng Vietcombank - chi
                                        nhánh Đà Nẵng</p>
                                    <p><span>Nội dung chuyển khoản:</span>[Họ Tên] thanh toán khoá học [Tên Khoá Học]
                                    </p>
                                    <p><span>Ví dụ:</span>Nguyen Van A thanh toan khoa hoc Huan luyen dau tu Thang 3
                                    </p>
                                </div>
                            </div>

                            <!-- endow -->
                            <div class="endow-area">
                                <div class="endow-item">
                                    <img src="{{ asset('client/img/icon-promotion.png') }}"
                                        alt="{{ $course->title }}">
                                    <span>Cam kết chất lượng đào tạo</span>
                                </div>
                                <div class="endow-item">
                                    <img src="{{ asset('client/img/icon-lap.png') }}" alt="{{ $course->title }}">
                                    <span>Theo sát học viên trong quá trình học</span>
                                </div>
                                <div class="endow-item">
                                    <img src="{{ asset('client/img/icon-return.png') }}" alt="{{ $course->title }}">
                                    <span>Miễn phí học lại tại các khoá tương tự sau đó</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection

@section('js')
    <script>
        $(".register_now").click(function() {
            $(".form-register").toggleClass("d-none");
        });

    </script>
@endsection
