<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('title')
    {{--  --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- slide  owl carousel -->
    <link rel="stylesheet" href="{{ asset('client/css/carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/carousel/owl.theme.default.min.css') }}">
    <link rel="shortcut icon" href="{{ asset('client/img/favicon.jpg') }}">

    <!-- css -->
    <link rel="stylesheet" href="{{ asset('client/css/header.css') }}">
    @yield('css')
    <link rel="stylesheet" href="{{ asset('client/css/footer.css') }}">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" as="style"
        onload="this.onload=null;this.rel='stylesheet'"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('client/css/base.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/fonts/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/fonts/fontawesome-webfont.woff') }}">
</head>

<body>
    {{-- chat fanpage --}}
    <style>
        .fb-livechat,
        .fb-widget {
            display: none
        }

        .ctrlq.fb-button,
        .ctrlq.fb-close {
            position: fixed;
            right: 24px;
            cursor: pointer
        }

        .ctrlq.fb-button {
            z-index: 999;
            background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDEyOCAxMjgiIGhlaWdodD0iMTI4cHgiIGlkPSJMYXllcl8xIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCAxMjggMTI4IiB3aWR0aD0iMTI4cHgiIHhtbDpzcGFjZT0icHJlc2VydmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjxnPjxyZWN0IGZpbGw9IiMwMDg0RkYiIGhlaWdodD0iMTI4IiB3aWR0aD0iMTI4Ii8+PC9nPjxwYXRoIGQ9Ik02NCwxNy41MzFjLTI1LjQwNSwwLTQ2LDE5LjI1OS00Niw0My4wMTVjMCwxMy41MTUsNi42NjUsMjUuNTc0LDE3LjA4OSwzMy40NnYxNi40NjIgIGwxNS42OTgtOC43MDdjNC4xODYsMS4xNzEsOC42MjEsMS44LDEzLjIxMywxLjhjMjUuNDA1LDAsNDYtMTkuMjU4LDQ2LTQzLjAxNUMxMTAsMzYuNzksODkuNDA1LDE3LjUzMSw2NCwxNy41MzF6IE02OC44NDUsNzUuMjE0ICBMNTYuOTQ3LDYyLjg1NUwzNC4wMzUsNzUuNTI0bDI1LjEyLTI2LjY1N2wxMS44OTgsMTIuMzU5bDIyLjkxLTEyLjY3TDY4Ljg0NSw3NS4yMTR6IiBmaWxsPSIjRkZGRkZGIiBpZD0iQnViYmxlX1NoYXBlIi8+PC9zdmc+) center no-repeat #0084ff;
            width: 60px;
            height: 60px;
            text-align: center;
            bottom: 200px;
            border: 0;
            outline: 0;
            border-radius: 60px;
            -webkit-border-radius: 60px;
            -moz-border-radius: 60px;
            -ms-border-radius: 60px;
            -o-border-radius: 60px;
            box-shadow: 0 1px 6px rgba(0, 0, 0, .06), 0 2px 32px rgba(0, 0, 0, .16);
            -webkit-transition: box-shadow .2s ease;
            background-size: 80%;
            transition: all .2s ease-in-out
        }

        .ctrlq.fb-button:focus,
        .ctrlq.fb-button:hover {
            transform: scale(1.1);
            box-shadow: 0 2px 8px rgba(0, 0, 0, .09), 0 4px 40px rgba(0, 0, 0, .24)
        }

        .fb-widget {
            background: #fff;
            z-index: 999999999;
            position: fixed;
            width: 360px;
            /* height: 435px; */
            overflow: hidden;
            opacity: 0;
            bottom: 0;
            right: 24px;
            border-radius: 6px;
            -o-border-radius: 6px;
            -webkit-border-radius: 6px;
            box-shadow: 0 5px 40px rgba(0, 0, 0, .16);
            -webkit-box-shadow: 0 5px 40px rgba(0, 0, 0, .16);
            -moz-box-shadow: 0 5px 40px rgba(0, 0, 0, .16);
            -o-box-shadow: 0 5px 40px rgba(0, 0, 0, .16)
        }

        .fb-credit {
            text-align: center;
            margin-top: 8px
        }

        .fb-credit a {
            transition: none;
            color: #bec2c9;
            font-family: Helvetica, Arial, sans-serif;
            font-size: 12px;
            text-decoration: none;
            border: 0;
            font-weight: 400
        }

        .ctrlq.fb-overlay {
            z-index: 0;
            position: fixed;
            height: 100vh;
            width: 100vw;
            -webkit-transition: opacity .4s, visibility .4s;
            transition: opacity .4s, visibility .4s;
            top: 0;
            left: 0;
            background: rgba(0, 0, 0, .05);
            display: none
        }

        .ctrlq.fb-close {
            z-index: 4;
            padding: 0 6px;
            background: #365899;
            font-weight: 700;
            font-size: 11px;
            color: #fff;
            margin: 8px;
            border-radius: 3px
        }

        .ctrlq.fb-close::after {
            content: "X";
            font-family: sans-serif
        }

        .bubble {
            width: 20px;
            height: 20px;
            background: #c00;
            color: #fff;
            position: absolute;
            z-index: 999999999;
            text-align: center;
            vertical-align: middle;
            top: -2px;
            left: -5px;
            border-radius: 50%;
        }

        .bubble-msg {
            width: 120px;
            left: -140px;
            top: 5px;
            position: relative;
            background: rgba(59, 89, 152, .8);
            color: #fff;
            padding: 5px 8px;
            border-radius: 8px;
            text-align: center;
            font-size: 13px;
        }

    </style>
    <div class="fb-livechat">
        <div class="ctrlq fb-overlay"></div>
        <div class="fb-widget">
            <div class="ctrlq fb-close"></div>
            <div class="fb-page" data-href="https://www.facebook.com/alphastock2021" data-tabs="messages"
                data-width="360" data-height="400" data-small-header="true" data-hide-cover="true"
                data-show-facepile="false"> </div>
            {{-- <div class="fb-credit"> <a href="https://chanhtuoi.com" target="_blank">Powered by ChanhTuoi</a> </div> --}}
            <div id="fb-root"></div>
        </div><a href="https://m.me/alphastock2021" title="Gửi tin nhắn cho chúng tôi qua Facebook"
            class="ctrlq fb-button d-none" id="btn-chat-fanpage">
            <div class="bubble">1</div>
            {{-- <div class="bubble-msg">Bạn cần hỗ trợ?</div> --}}
        </a>
    </div>
    <script src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
        jQuery(document).ready(function($) {
            function detectmob() {
                if (navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator
                    .userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i) || navigator.userAgent
                    .match(/iPod/i) || navigator.userAgent.match(/BlackBerry/i) || navigator.userAgent.match(
                        /Windows Phone/i)) {
                    return true;
                } else {
                    return false;
                }
            }
            var t = {
                delay: 125,
                overlay: $(".fb-overlay"),
                widget: $(".fb-widget"),
                button: $(".fb-button")
            };
            setTimeout(function() {
                $("div.fb-livechat").fadeIn()
            }, 8 * t.delay);
            if (!detectmob()) {
                $(".ctrlq").on("click", function(e) {
                    e.preventDefault(), t.overlay.is(":visible") ? (t.overlay.fadeOut(t.delay), t.widget
                        .stop().animate({
                            bottom: 0,
                            opacity: 0
                        }, 2 * t.delay, function() {
                            $(this).hide("slow"), t.button.show()
                        })) : t.button.fadeOut("medium", function() {
                        t.widget.stop().show().animate({
                            bottom: "30px",
                            opacity: 1
                        }, 2 * t.delay), t.overlay.fadeIn(t.delay)
                    })
                })
            }
        });
    </script>
    {{-- end chat fanpage --}}


    <div class="wrapper">
        <!-- top bar -->
        @include('client.layouts.topbar')

        <!-- start menu -->
        @include('client.layouts.header')

        <!-- tart banner -->
        @section('slide')

        @show

        <!-- content -->
        <div class="wp-content">
            @yield('content')
        </div>


        <!-- start footer -->
        <footer class="footer">
            @include('client.layouts.footer')
        </footer>
        <!-- end footer -->

        <!-- back to top -->
        <a href="#" id="scroll" style="display: none;"><span></span></a>

        {{-- btn chat --}}
        <div class="fab-wrapper">
            <input id="fabCheckbox" type="checkbox" class="fab-checkbox">
            <label class="fab" for="fabCheckbox" style="right: 15px">
                <i class="icon-cps-fab-menu"></i>
                <i class="icon-cps-close"></i>
            </label>
            <label class="fab-wheel" for="fabCheckbox">
                <a class="fab-action fab-action-1" href="{{ route('client.contact.index') }}" rel="nofollow">
                    <span class="fab-title">Liên hệ</span>
                    <div class="fab-button fab-button-1"><i class="icon-cps-local"></i></div>
                </a>
                <a class="fab-action fab-action-2" href="tel:0905915183" rel="nofollow">
                    <span class="fab-title">Gọi trực tiếp</span>
                    <div class="fab-button fab-button-2"><i class="icon-cps-phone"></i></div>
                </a>
                <a class="fab-action fab-action-3" onclick="showChatFanpage()">
                    <span class="fab-title">Chat ngay</span>
                    <div class="fab-button fab-button-3"><i class="icon-cps-chat"></i></div>
                </a>
                <a class="fab-action fab-action-4" href="https://zalo.me/0905915183" target="_blank" rel="nofollow">
                    <span class="fab-title">Chat trên Zalo</span>
                    <div class="fab-button fab-button-4"><i class="icon-cps-chat-zalo"></i></div>
                </a>
            </label>
            <div class="suggestions-chat-box hidden" style="display: none;">
                <div class="box-content d-flex justify-content-around align-items-center">
                    <i class="fa fa-times-circle" aria-hidden="true" id="btnClose"
                        onclick="jQuery('.suggestions-chat-box').hide()"></i>
                    <p class="mb-0 font-14">Liên hệ ngay <i class="fa fa-hand-o-right" aria-hidden="true"></i></p>
                </div>
            </div>
            <label class="devvn_bg" for="fabCheckbox"></label>
        </div>
        {{-- end btn chat --}}
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
    <script src="{{ asset('client/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('client/js/main.js') }}"></script>
    <script src="{{ asset('client/js/gallery.js') }}"></script>

    <script>
        if ($(window).width() < 565) {
            document.getElementById('none-mobile').style.display = 'none';
        }

        function showChatFanpage() {
            document.getElementById("btn-chat-fanpage").click();
        }
    </script>

    @section('js')

    @show
</body>

</html>
