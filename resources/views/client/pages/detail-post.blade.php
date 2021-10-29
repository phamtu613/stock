@extends('client.layouts.master')

@section('title')
    <title>{{ $post->title }}</title>
    <meta name="keywords" content="{{ $post->title }}" />
    <meta name="news_keywords" content="{{ $post->title }}" />
    <meta name="description" content="{{ $post->description }}" />
    <meta property="og:title" content="{{ $post->title }}" />
    <meta property="og:description" content="{{ $post->description }}" />
    <meta property="og:image" content="{{ url($post->thumbnail) }}" />
    <meta property="og:url" itemprop="url" content="" />
    <meta property="og:type" content="website" />
    <meta itemprop="name" content="{{ $post->title }}" />
    <meta itemprop="description" content="{{ $post->description }}" />
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
    <link rel="stylesheet" href="{{ asset('client/css/zoom.css') }}">
@endsection

@section('content')

    <!-- start content -->
    <main class="bg-grey">
        <div class="container">
            <div class="row">
                <div class="col-md-9 border-right-md">
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
                                                <img src="{{ url($post->admin->avatar) }}" class="avatar" alt="avatar">
                                            @else
                                                <img src="{{ asset('client/img/img-author.jpg') }}" class="avatar"
                                                    alt="avatar">
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
                                                <img src="{{ asset('client/img/facebook.png') }}"
                                                    alt="{{ $post->title }}">
                                            </a>
                                            <a href="#" class="text-decoration-none">
                                                <img src="{{ asset('client/img/pinterest.png') }}"
                                                    alt="{{ $post->title }}">
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
                    </div>
                    <div class="main-post">
                        @if ($post->image)
                            <div class="thumb-img">
                                <img src="{{ url($post->image) }}" class="img-main" alt="{{ $post->title }}">
                            </div>
                        @endif
                        <div class="position-relative content {{ $opacity_text == true ? 'opacity_text' : '' }}">
                            {!! $post->content !!}
                        </div>

                        @if ($post->vip == 'Vip')
                            @if (Auth::user())
                                {{-- Tài khoản ko vip -> vui lòng nâng cấp... --}}
                                @if (!$flag_reg)
                                    <div class="d-flex justify-content-center mb-3">
                                        <button type="button" class="btn btn-outline-info" data-toggle="modal"
                                            data-target="#exampleModalCenter">
                                            Xem thêm
                                        </button>
                                    </div>
                                @endif
                            @else
                                <div class="d-flex justify-content-center mb-3"><a href="{{ url($urlLogin) }}">
                                        <button type="button" class="btn btn-outline-info">Xem thêm</button></a>
                                </div>
                            @endif
                        @endif
                    </div>

                    {{-- Bài viết liên quan --}}
                    <div class="relative-post mt-5">
                        <h3 class="title">Bài viết liên quan</h3>
                        <div class="row">
                            @foreach ($relativePosts as $relativePost)
                                <div class="col-md-6">
                                    <div class="card post-item"
                                        onclick="window.location.href='{{ route($urlDetail, [$relativePost->slug, $relativePost->id]) }}'">
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
                                                        <span
                                                            class="post-on">{{ date('d-m-Y', strtotime($relativePost->created_at)) }}
                                                        </span>
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

                <div class="col-md-3 col-sidebar">
                    <div class="sidebar">
                        @foreach ($bannerAds as $bannerAdsItem)
                            <a href="{{ $bannerAdsItem->link != '' ? $bannerAdsItem->link : 'javascript: void(0);' }}"
                                class="thumb-ads" target="t_blank">
                                <img src="{{ url($bannerAdsItem->image) }}" alt="{{ $bannerAdsItem->name }}">
                            </a>
                        @endforeach

                        <section class="list-popular">
                            <div class="title-main mb-20">
                                Top bài viết hay nhất
                            </div>
                            <div class="list-post">
                                @foreach ($topPosts as $topPost)
                                    <div class="row post-item mb-30"
                                        onclick="window.location.href ='{{ route('client.knowledgeDetail', [$topPost->slug, $topPost->id]) }}">
                                        <div class="col-md-8 col-8 text-post pl-0">
                                            <a href="{{ route('client.knowledgeDetail', [$topPost->slug, $topPost->id]) }}"
                                                class="title text-decoration-none" title="{{ $topPost->title }}">
                                                {{ $topPost->title }}
                                            </a>
                                            <div class="time-view">
                                                {{-- <span
                                                    class="post-on">{{ date('d-m-Y', strtotime($topPost->created_at)) }}</span> --}}
                                                <i class="fas fa-circle"></i>
                                                <span class="post-on">{{ $topPost->num_view }} lượt xem</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-4 p-0">
                                            <a href="{{ route('client.knowledgeDetail', [$topPost->slug, $topPost->id]) }}"
                                                class="thumb-img">
                                                <img src="{{ url($topPost->thumbnail) }}" alt="{{ $topPost->title }}">
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </section>
                        <div class="ads-zalo d-none">
                            <p>Mở tài khoản chứng khoán, liên hệ ngay <img src="{{ asset('client/img/hand.png') }}"
                                    class="hand-icon" alt="hand"> <img src="./assets/img/Zalo.gif" class="zalo-icon"
                                    alt="zalo"></p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>
    </main>

    {{-- modal alert --}}
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header py-1">
                    <h5 class="modal-title w-100 text-center" id="exampleModalLongTitle">Vui Lòng Nâng Cấp Lên Tài Khoản VIP
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center py-2">
                    <p class="mb-1">Tài khoản vip sẽ xem được toàn bộ các Khuyến nghị, Danh mục và Bài viết HOT nhất trên
                        Website</p>
                    <button type="button" class="btn btn-info px-2 py-1 ml-1">
                        <a href="{{ route('info-user.index') }}" class="text-white text-decoration-none">NÂNG CẤP VIP</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <!--<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">-->
    <!--    <div class="modal-dialog modal-dialog-img-zoom" data-dismiss="modal">-->
    <!--        <div class="modal-content">-->
    <!--            <div class="modal-body">-->
    <!--                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span-->
    <!--                        class="sr-only">Close</span></button>-->
    <!--                <img src="" class="imagepreview" style="width: 100%;">-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
@endsection

@section('js')
    // <script>
    //     $(function() {
    //         $('img[alt="oke"]').on('click', function() {
    //             $('.imagepreview').attr('src', $(this).attr('src'));
    //             $('#imagemodal').modal('show');
    //         });
    //     });
    // </script>
    @parent
@endsection
