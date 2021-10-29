@extends('admin.layouts.master')
@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                </div>
                <h4 class="page-title">Thêm mới admin</h4>
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
                        <form action="{{ route('admin.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            {{-- Tên --}}
                            <div class="form-group">
                                <label for="name">Tên</label>
                                <input type="text" class="form-control" id="name" placeholder="Tên..." name="name"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Email --}}
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Email..." name="email"
                                    value="{{ old('email') }}">
                                @error('email')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- password --}}
                            <div class="form-group">
                                <label for="price_old">Mật khẩu</label>
                                <input type="password" class="form-control" min="1" id="password" placeholder="Mật khẩu..."
                                    name="password">
                                @error('password')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Địa chỉ --}}
                            <div class="form-group">
                                <label for="address">Địa chỉ</label>
                                <input type="text" class="form-control" min="1" id="address" placeholder="Địa chỉ..."
                                    name="address" value="{{ old('address') }}">
                                @error('address')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- desc --}}
                            <div class="form-group">
                                <label for="desc">Mô tả</label>
                                <textarea class="form-control" rows="5" name="desc">{!! old('desc') !!}</textarea>
                                @error('desc')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Vị trí --}}
                            <div class="form-group">
                                <label for="position">Vị trí</label>
                                <input type="text" class="form-control" id="position" name="position"
                                    placeholder="vd: Co-Founder" value="{{ old('position') }}">
                                @error('position')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Facebook --}}
                            <div class="form-group">
                                <label for="facebook">Facebook</label>
                                <input type="text" class="form-control" id="facebook" name="facebook"
                                    placeholder="Link facebook" value="{{ old('facebook') }}">
                                @error('facebook')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Zalo --}}
                            <div class="form-group">
                                <label for="zalo">Zalo</label>
                                <input type="text" class="form-control" name="zalo" id="zalo" placeholder="Link zalo"
                                    value="{{ old('zalo') }}">
                                @error('zalo')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Hình đại diện --}}
                            <div class="form-group">
                                <label for="avatar" class="d-block">Avatar</label>
                                <img src="{{ asset('client/img/admin.png') }}" class="d-bock mt-1 mb-2"
                                    style="object-fit: cover" width="100px" height="100px" alt="avatar">
                                <input type="file" class="form-control" id="avatar" name="avatar"
                                    value="{{ old('avatar') }}">
                            </div>


                            {{-- Quyền --}}
                            <div class="form-group">
                                <label for="role">Quyền</label>
                                <select class="form-control" name="role" id="role" value="{{ old('role') }}">
                                    <option value="0">Chọn quyền</option>
                                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="manager" {{ old('role') == 'manager' ? 'selected' : '' }}>Manager
                                    </option>
                                    <option value="moderator" {{ old('role') == 'moderator' ? 'selected' : '' }}>
                                        Moderator</option>
                                </select>
                                @error('role')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-success waves-effect waves-light">Tạo mới</button>
                        </form>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection
