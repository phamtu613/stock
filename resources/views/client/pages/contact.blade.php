@extends('client.layouts.master')

@section('title')
    <title>Liên hệ</title>
    <meta name="keywords" content="Liên hệ" />
    <meta name="description" content='Liên hệ' />
    <meta name="news_keywords" content="Liên hệ">
    <meta property="og:title" content="Liên hệ" />
    <meta property="og:description" content="Liên hệ" />
    <meta property="og:image" content="{{ asset('client/img/banner-contact.png') }}" />
    <meta property="og:url" itemprop="url" content="" />
    <meta property="og:type" content="website" />
    <meta itemprop="name" content="Liên hệ" />
    <meta itemprop="description" content="Liên hệ" />
    <meta itemprop="image" content="/public/client/img/image-web.jpg" />
    <!-- Og Image -->
    <meta property="og:image:secure_url" content="" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="627" />
    <meta property="og:image:alt" content="Liên hệ" />
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('client/css/contact.css') }}">
@endsection

@section('content')

    <div class="banner">
        <img src="{{ asset('client/img/banner-contact.png') }}" alt="{{ asset('client/img/banner-contact.png') }}">
    </div>
    <div class="container">
        <div class="row contact">
            <div class="col-md-6">
                <div class="contact-call">
                    <img src="{{ asset('client/img/icon-contact-page.png') }}"
                        alt="{{ asset('client/img/icon-contact-page.png') }}">
                    <div class="box-text">
                        <h4>Gọi trực tiếp</h4>
                        <p>Bạn quan tâm thắc mắc đến khóa học chúng tôi? Chỉ cần nhấc điện thoại và gọi cho chúng tôi
                            <span>{{ $infoStock->phone1 }}</span> – <span>{{ $infoStock->phone2 }}</span>
                        </p>
                        <a href="tel:{{ $infoStock->phone1 }}" class="text-decoration-none">{{ $infoStock->phone1 }}</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 ">
                <div class="contact-chat ">
                    <img src="{{ asset('client/img/icon-chat-page.png') }}"
                        alt="{{ asset('client/img/icon-chat-page.png') }}">
                    <div class="box-text">
                        <h4>Liên hệ hỗ trợ</h4>
                        <p>Đôi khi bạn cần một chút giúp đỡ. Đừng lo lắng, chúng tôi ở đây vì bạn.</p>
                        <a href="{{ $infoStock->facebook }}" target="t_bank" class="text-decoration-none">Messenger</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mx-auto">
                <div class="contact-mail">
                    <div class="box-text">
                        @if (!session('status'))
                            <h3>LIÊN HỆ VỚI CHÚNG TÔI</h3>
                            <p>Để chúng tôi phục vụ tốt nhất cho bạn cũng như tư vấn sản phẩm tốt nhất</p>
                            <form action="{{ route('client.contact.contact') }}" method="post">
                                @csrf

                                {{-- Tên --}}
                                <div class="form-group">
                                    <input class="form-control" name="name" type="text" placeholder="Tên của bạn...">

                                    @error('name')
                                        <small class="d-block text-left form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                                {{-- Email --}}
                                <div class="form-group">
                                    <input class="form-control" name="email" type="email" placeholder="Địa chỉ Email...">

                                    @error('email')
                                        <small class="d-block text-left form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                                {{-- Số điện thoại --}}
                                <div class="form-group">
                                    <input class="form-control" name="phone" type="number" placeholder="Số điện thoại...">

                                    @error('phone')
                                        <small class="d-block text-left form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                                {{-- Nội dung liên hệ --}}
                                <div class="form-group">
                                    <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3"
                                        placeholder="Nhập nội dung liên hệ..."></textarea>

                                    @error('content')
                                        <small class="d-block text-left form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-register"><i
                                            class="fas fa-upload"></i>Gửi
                                        Liên Hệ</button>
                                </div>
                            </form>
                        @endif

                        <!-- alert-success -->
                        @if (session('status'))
                            <div class="alert alert-success mt-2">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-6 ">
                <div class="contact-map">
                    {!! $infoStock->map !!}
                </div>
            </div>
        </div>
    </div>

@endsection
