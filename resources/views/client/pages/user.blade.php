@extends('client.layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('client/css/detail-post.css') }}">
@endsection

@section('content')

    <!-- start content -->
    <main class="bg-grey">
        <div class="container">
            <div class="row">
                <div class="col-md-9 mx-auto">
                    <div class="content-inner">
                        <div class="info-user">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <h3>Thông tin tài khoản</h3>

                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form action="{{ route('info-user.update', Auth::id()) }}" method="post">
                                @method('PUT')
                                @csrf

                                {{-- Tên --}}
                                <div class="form-group">
                                    <label for="name">Họ Tên</label>
                                    <input type="text" class="form-control" id="name" placeholder="Họ Tên..."
                                        value="{{ Auth::user()->name }}" name="name">
                                    @error('name')
                                        <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                {{-- Email --}}
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control email" id="email" disabled placeholder="Email"
                                        value="{{ Auth::user()->email }}">
                                </div>

                                {{-- Loại tài khoản --}}
                                <div class="type-account">
                                    <span class="text">Loại tài khoản: </span> {{ $flag_reg ? 'Bình thường' : 'Vip' }} <a
                                        href="#form" class="d-inline-block">
                                        @if ($flag_reg)
                                            <button type="button" class="ml-3 btn btn-info">Nâng cấp lên Vip ngay</button>
                                        @endif

                                    </a>
                                </div>

                                <button type="submit" class="btn btn-primary btn-update mt-2">Cập nhật</button>
                            </form>
                        </div>


                        {{-- Quyền lợi --}}
                        <div class="benefit" id="form">
                            <h3>Quyền lợi tài khoản vip:</h3>
                            <p><i class="fas fa-check mr-2"></i>Đọc được tất cả các bài viết trong các chuyên mục
                                MarketDaily, Kiến thức chung...</p>
                            <p><i class="fas fa-check mr-2"></i>Phí thành viên vip chỉ 30k/tháng</p>
                        </div>

                        @if ($flag_reg)
                            <div class="register">
                                <h3>Đăng ký ngay tại đây</h3>
                                <form action="{{ route('register-vips') }}" method="post">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="phone" class="col-sm-3 col-form-label">Số điện thoại</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="phone" name="phone"
                                                placeholder="Số điện thoại của bạn..." value="{{ old('phone') }}">
                                            @error('phone')
                                                <small
                                                    class="d-block text-left form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="use" class="col-sm-3 col-form-label">Thời hạn đăng ký</label>
                                        <div class="col-sm-9">
                                            <select class="custom-select my-1 mr-sm-2" name="package">
                                                <option selected value="0">Chọn gói</option>
                                                <option value="1" {{ old('package') == '1' ? 'selected' : '' }}>6 tháng:
                                                    200.000</option>
                                                <option value="2" {{ old('package') == '2' ? 'selected' : '' }}>1 năm:
                                                    400.000</option>
                                                <option value="3" {{ old('package') == '3' ? 'selected' : '' }}>Trọn đời:
                                                    1.500.000</option>
                                            </select>
                                            @error('package')
                                                <small
                                                    class="d-block text-left form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary btn-register"><i
                                                class="fas fa-upload pr-1"></i>Đăng ký ngay</button>
                                    </div>
                                </form>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
    </main>

@endsection
