@extends('admin.layouts.master')
@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                </div>
                <h4 class="page-title">Chi tiết tài khoản đăng ký
                    <a href="{{ route('users.registerOpenAccount') }}" class="text-white d-inline-block ml-2">
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
                        <form action="{{ route('users.registerOpenAccount.update', $accountOpen->id) }}" method="post">
                            @method('PUT')
                            @csrf

                            <div class="row">
                                {{-- Họ tên --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Họ tên</label>
                                        <input type="text" class="form-control" value="{{ $accountOpen->fullname }}"
                                            disabled>
                                    </div>
                                </div>

                                {{-- Ngày sinh --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Ngày sinh</label>
                                        <input type="text" class="form-control"
                                            value="{{ date('d-m-Y', strtotime($accountOpen->birthday)) }}" disabled>
                                    </div>
                                </div>

                                {{-- Chứng minh nhân dân --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Chứng minh nhân dân</label>
                                        <input type="text" class="form-control" value="{{ $accountOpen->identity_card }}"
                                            disabled>
                                    </div>
                                </div>

                                {{-- Ngày cấp --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Ngày cấp</label>
                                        <input type="text" class="form-control"
                                            value="{{ date('d-m-Y', strtotime($accountOpen->date_permit)) }}" disabled>
                                    </div>
                                </div>

                                {{-- Nơi cấp --}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nơi cấp</label>
                                        <input type="text" class="form-control" value="{{ $accountOpen->address_permit }}"
                                            disabled>
                                    </div>
                                </div>

                                {{-- Địa chỉ đầy đủ --}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Địa chỉ đầy đủ</label>
                                        <input type="text" class="form-control" value="{{ $accountOpen->address_full }}"
                                            disabled>
                                    </div>
                                </div>

                                {{-- Email --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control" value="{{ $accountOpen->email }}" disabled>
                                    </div>
                                </div>

                                {{-- Phone --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Số điện thoại</label>
                                        <input class="form-control" value="{{ $accountOpen->phone }}" disabled>
                                    </div>
                                </div>

                                {{-- Tên đăng nhập ngân hàng --}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Tên đăng nhập ngân hàng</label>
                                        <input class="form-control" name="description"
                                            value="{{ $accountOpen->username_bank }}" disabled>
                                    </div>
                                </div>

                                {{-- Số tài khoản ngân hàng --}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Số tài khoản ngân hàng</label>
                                        <input class="form-control" name="account_number	"
                                            value="{{ $accountOpen->account_number }}" disabled>
                                    </div>
                                </div>

                                {{-- Chi nhánh --}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Chi nhánh</label>
                                        <input class="form-control" rows="5" name="description"
                                            value="{{ $accountOpen->branch_bank }}" disabled>
                                    </div>
                                </div>

                                {{-- Ghi chú --}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Ghi chú</label>
                                        <input class="form-control" rows="5" name="description"
                                            value="{{ $accountOpen->content }}" disabled>
                                    </div>
                                </div>

                                {{-- Trạng thái --}}
                                {{-- <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="status_contact">Trạng thái</label>
                                        <select class="form-control" name="status_contact" id="status_contact"
                                            value="{{ old('status_contact') }}">
                                            <option value="Đã mở"
                                                {{ $accountOpen->status_contact == 'Đã mở' ? 'selected' : '' }}>
                                                Đã mở
                                            </option>
                                            <option value="Chưa mở"
                                                {{ $accountOpen->status_contact == 'Chưa mở' ? 'selected' : '' }}>
                                                Chưa mở
                                            </option>
                                        </select>
                                    </div>
                                </div> --}}
                            </div>

                            {{-- <button type="submit" class="btn btn-success waves-effect waves-light ">Cập nhật</button> --}}

                        </form>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection
