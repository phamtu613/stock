<div class="slimscroll-menu">

    <!--- Sidemenu -->
    <div id="sidebar-menu">

        <ul class="metismenu" id="side-menu">

            <li class="menu-title">Admin</li>

            {{-- Dashboard --}}
            <li>
                <a href="{{ url('admin/dashboard') }}">
                    <i class="fe-airplay"></i>
                    <span class="badge badge-success badge-pill float-right">1</span>
                    <span>Dashboard</span>
                </a>
            </li>

            {{-- Banner --}}
            @if (Auth::guard('admin')->user()->role != 'moderator')
                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-grid"></i>
                        <span> Quản lý Banner </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('banner-ads.index') }}">Banner quảng cáo</a></li>
                        <li><a href="{{ route('banner-ads.create') }}">Thêm mới banner quảng cáo</a></li>
                        <li><a href="{{ route('banner-market-dailies.edit', 1) }}">Banner marketdaily</a></li>
                        <li><a href="{{ route('banner-knowledges.edit', 1) }}">Banner kiến thức chung</a></li>
                        <li><a href="{{ route('banner-courses.edit', 1) }}">Banner khóa học</a></li>
                    </ul>
                </li>
            @endif

            {{-- Alphastock System --}}
            <li>
                <a href="javascript: void(0);">
                    <i class="fe-map"></i>
                    <span> Alphastock System </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li><a href="{{ route('alpha-system.create') }}">Thêm chart mới</a></li>
                    <li><a href="{{ route('alpha-system.index') }}">Danh sách chart</a></li>
                    <li><a href="{{ route('admin.user-manual.edit') }}">Hướng dẫn sử dụng</a></li>
                </ul>
            </li>

            {{-- Marketdaily --}}
            <li>
                <a href="javascript: void(0);">
                    <i class="fe-box"></i>
                    <span> Marketdaily </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                    {{-- <li><a href="{{ route('category-daily-post.index') }}">Danh mục bài viết</a></li> --}}
                    <li><a href="{{ route('dailyPosts.index') }}">Bài viết hằng ngày</a></li>
                    <li><a href="{{ route('recomments.index') }}">Khuyến nghị</a></li>
                    <li><a href="{{ route('recomments.create') }}">Thêm mới khuyến nghị</a></li>
                    <li><a href="{{ route('portfolios.edit', 1) }}">Danh mục CP - SIC</a></li>
                </ul>
            </li>

            {{-- Kiến thức chung --}}
            <li>
                <a href="javascript: void(0);">
                    <i class="fe-briefcase"></i>
                    <span>Kiến thức chung</span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li><a href="{{ route('categoryKnowledges.index') }}">Danh mục</a></li>
                    <li><a href="{{ route('categoryKnowledges.create') }}">Thêm danh mục</a></li>
                    <li><a href="{{ route('knowledges.index') }}">Bài viết</a></li>
                    <li><a href="{{ route('knowledges.create') }}">Thêm bài viết</a></li>
                </ul>
            </li>

            {{-- Khóa học --}}
            @if (Auth::guard('admin')->user()->role != 'moderator')
                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-pie-chart"></i>
                        <span> Khóa học </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('categoryCourses.index') }}">Danh mục</a></li>
                        <li><a href="{{ route('categoryCourses.create') }}">Thêm danh mục</a></li>
                        <li><a href="{{ route('courses.index') }}">Khóa học</a></li>
                        <li><a href="{{ route('courses.create') }}">Thêm khóa học</a></li>
                    </ul>
                </li>
            @endif

            {{-- Người dùng --}}
            <li>
                <a href="javascript: void(0);">
                    <i class="fe-target"></i>
                    <span> Người dùng</span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                    @if (Auth::guard('admin')->user()->role != 'moderator')
                        <li><a href="{{ route('users.index') }}">Danh sách user</a></li>
                        <li><a href="{{ route('users.registerVip') }}">Đăng ký tài khoản vip</a></li>
                        <li><a href="{{ route('carts.index') }}">Đăng ký khóa học</a></li>
                    @endif

                    <li><a href="{{ route('users.registerOpenAccount') }}">Danh sách mở tài khoản</a></li>

                    @if (Auth::guard('admin')->user()->role != 'moderator')
                        <li><a href="{{ route('users.registerConsulting') }}">KH đăng ký tư vấn</a></li>
                        <li><a href="{{ route('users.registerTrust') }}">KH đăng ký ủy thác</a></li>
                        <li><a href="{{ route('contacts.index') }}">Đăng ký liên hệ</a></li>
                    @endif
                </ul>
            </li>

            {{-- Admin --}}
            @if (Auth::guard('admin')->user()->role == 'admin')
                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-calendar"></i>
                        <span>Admin</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('admin.index') }}">Danh sách admin</a></li>
                        <li><a href="{{ route('admin.create') }}">Thêm mới</a></li>
                    </ul>
                </li>
            @endif

            {{-- Bài viết dăng ký --}}
            @if (Auth::guard('admin')->user()->role != 'moderator')
                <li>
                    <a href="{{ route('post-advisory-invests.index') }}">
                        <i class="fe-layout"></i>
                        <span> Bài viết dăng ký</span>
                    </a>
                </li>
            @endif

            @if (Auth::guard('admin')->user()->role != 'moderator')
                {{-- Trang chủ --}}
                <li class="menu-title mt-2">Trang chủ</li>

                {{-- Banner --}}
                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-map"></i>
                        <span> Banner </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('banners.index') }}">Danh sách banner</a></li>
                        <li><a href="{{ route('banners.create') }}">Thêm banner</a></li>
                    </ul>
                </li>

                {{-- Thông tin liên hệ --}}
                <li>
                    <a href="{{ route('infoStocks.edit', 1) }}">
                        <i class="fe-disc"></i>
                        <span> Thông tin liên hệ </span>
                    </a>
                </li>

                {{-- footers --}}
                <li>
                    <a href="{{ route('footers.edit', 1) }}">
                        <i class="fe-grid"></i>
                        <span> Thông tin Footer </span>
                    </a>
                </li>

            @endif

        </ul>

    </div>
    <!-- End Sidebar -->

    <div class="clearfix"></div>

</div>
<!-- Sidebar -left -->
