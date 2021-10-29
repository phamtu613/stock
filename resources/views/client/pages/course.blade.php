@extends('client.layouts.master')

@section('title')
    <title>Khóa học</title>
    <meta name="keywords" content="Khóa học" />
    <meta name="description" content="Khóa học" />
    <meta name="news_keywords" content="Khóa học" />
    <meta property="og:title" content="Khóa học" />
    <meta property="og:description" content="Khóa học" />
    <meta property="og:image" content="{{ url($banner->image) }}" />
    <meta property="og:url" itemprop="url" content="" />
    <meta property="og:type" content="website" />
    <meta itemprop="name" content="Khóa học" />
    <meta itemprop="description" content="Khóa học" />
    <meta itemprop="image" content="/public/client/img/image-web.jpg" />
    <!-- Og Image -->
    <meta property="og:image:secure_url" content="" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="627" />
    <meta property="og:image:alt" content="Khóa học" />
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('client/css/course.css') }}">
@endsection

@section('content')

    <!-- quote -->
    <section class="quote">
        <div class="container p-xs-0">
            <img src="{{ url($banner->image) }}" width="100%" alt="{{ $banner->name }}" class="banner-quote">
        </div>
    </section>

    <!-- tab content main -->
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="tabbed">

                        @foreach ($cateCourses as $key => $cateCourse)
                            <input type="radio" name="tabs" {{ $idCategoryCourse == $cateCourse->id ? 'checked' : '' }}>
                            <label onclick="window.location.href='{{ route('client.course.index', $cateCourse->id) }}'"><a
                                    href="javascript:void(0)"
                                    class="text-white text-decoration-none">{{ $cateCourse->name }}</a></label>
                        @endforeach

                        <div class="tabs">
                            <!-- tab 1 -->
                            @if ($courses->total() > 0)
                                <div>
                                    <section class="list-blog">
                                        <div class="row blogs">
                                            @foreach ($courses as $course)
                                                <div class="col-md-3 blog">
                                                    <div class="card"
                                                        onclick="window.location.href='{{ route('client.courseDetail', [$course->slug, $course->id]) }}'">
                                                        <img class="card-img-top" src="{{ url($course->thumbnail) }}"
                                                            alt="{{ $course->title }}">
                                                        <div class="card-body">
                                                            <h5 class="card-title"><a
                                                                    href="{{ route('client.courseDetail', [$course->slug, $course->id]) }}"
                                                                    class="text-decoration-none">{{ $course->title }}</a>
                                                            </h5>
                                                            <p class="card-text">{{ $course->admin->name }}</p>
                                                            <div class="front-stars">
                                                                <i aria-hidden="true" class="fa fa-star"></i>
                                                                <i aria-hidden="true" class="fa fa-star"></i>
                                                                <i aria-hidden="true" class="fa fa-star"></i>
                                                                <i aria-hidden="true" class="fa fa-star"></i>
                                                                <i class="fas fa-star-half-alt"></i>
                                                                <span>({{ $course->num_star }})</span>
                                                            </div>
                                                            <small class="num-learn">{{ $course->num_student }} người
                                                                đang
                                                                học</small>
                                                            <div class="info-price">
                                                                <span class="old-price">
                                                                    @if ($course->price_old)
                                                                        {{ number_format($course->price_old, 0, ',', '.') }}₫
                                                                    @endif
                                                                </span>
                                                                <span
                                                                    class="course-price">{{ number_format($course->price_current, 0, ',', '.') }}₫</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            @endforeach
                                        </div>

                                        <!-- pagination -->
                                        <div class="text-center d-flex justify-content-center">
                                            {{ $courses->links() }}
                                        </div>

                                    </section>
                                </div>
                            @else
                                <div>
                                    <P class="text-center mb-0 pt-3">Đang cập nhật...</P>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
