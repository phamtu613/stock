@extends('admin.layouts.master')
@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                </div>
                <h4 class="page-title">Chi tiết đăng ký khóa học
                    <a href="{{ route('carts.index') }}" class="text-white d-inline-block ml-2">
                        <button type="button" class="btn btn-success waves-effect waves-light">Danh sách</button>
                    </a>
                </h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <div class="row">
                    <div class="col-lg-12">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{ route('carts.update', $cart->id) }}" method='post'>
                            @method('PUT')
                            @csrf

                            <div class="row">
                                <div class="col-md-4">
                                    {{-- Người đăng ký --}}
                                    <div class="form-group">
                                        <label for="cate">Tên đăng ký</label>
                                        <input type="text" class="form-control" id="cate" disabled name="name"
                                            value="{{ $cart->name }}">
                                    </div>
                                </div>

                                {{-- email --}}
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email" value="{{ $cart->email }}"
                                            disabled>
                                    </div>
                                </div>

                                {{-- phone --}}
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="phone">Số điện thoại</label>
                                        <input type="text" class="form-control" id="phone" value="{{ $cart->phone }}"
                                            disabled>
                                    </div>
                                </div>
                            </div>

                            {{-- note --}}
                            <div class="form-group">
                                <label for="note">Ghi chú</label>
                                <input class="form-control" id="description" name="description" disabled
                                    value="{{ $cart->note }}">
                            </div>


                            {{-- trạng thái --}}
                            <div class="form-group d-none">
                                <label for="status_payment">Trạng thái</label>
                                <select class="form-control" name="status_payment" id="status_payment" disabled>
                                    <option value="Chưa thanh toán"
                                        {{ $cart->status_payment == 'Chưa thanh toán' ? "selected='selected'" : '' }}>Chưa
                                        thanh toán</option>
                                    <option value="Đã thanh toán"
                                        {{ $cart->status_payment == 'Đã thanh toán' ? "selected='selected'" : '' }}>Đã
                                        thanh
                                        toán</option>
                                </select>
                            </div>


                            {{-- Admin cập nhật --}}
                            <div class="form-group d-none">
                                <label for="admin_id ">Admin cập nhật</label>
                                <select class="form-control" name="admin_id" id="admin_id">
                                    @foreach ($admins as $admin)
                                        <option value="{{ $admin->id }}"
                                            {{ $cart->admin_id == $admin->id ? "selected='selected'" : '' }}>
                                            {{ $admin->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group d-none">
                                <button type="submit" class="btn btn-success waves-effect waves-light" value="Cập nhật">Cập
                                    nhật</button>
                            </div>

                        </form>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection
