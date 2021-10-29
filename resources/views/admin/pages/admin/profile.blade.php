@extends('admin.layouts.master')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Profile admin</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body table-responsive">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('admin.updateProfileAdmin', Auth::guard('admin')->user()->id) }}" method="post"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        {{-- Tên --}}
                        <div class="form-group">
                            <label for="name">Họ Tên</label>
                            <input type="text" class="form-control" id="name" placeholder="Họ Tên..."
                                value="{{ Auth::guard('admin')->user()->name }}" name="name">
                            @error('name')
                                <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control email" name="email" id="email" disabled
                                placeholder="Email" value="{{ Auth::guard('admin')->user()->email }}">
                        </div>

                        {{-- phone --}}
                        <div class="form-group">
                            <label for="phone">Số điện thoại</label>
                            <input type="number" class="form-control" name="phone" id="phone" placeholder="Số điện thoại"
                                value="{{ Auth::guard('admin')->user()->phone }}">
                            @error('phone')
                                <div class="text text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Địa chỉ --}}
                        <div class="form-group">
                            <label for="address">Địa chỉ</label>
                            <input type="text" class="form-control" name="address" id="address" placeholder="Địa chỉ"
                                value="{{ Auth::guard('admin')->user()->address }}">
                            @error('address')
                                <div class="text text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Vị trí --}}
                        <div class="form-group">
                            <label for="position">Vị trí</label>
                            <input type="text" class="form-control" name="position" id="position"
                                placeholder="vd: Co-Founder" value="{{ Auth::guard('admin')->user()->position }}">
                            @error('position')
                                <div class="text text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Mô tả admin --}}
                        <div class="form-group">
                            <label for="desc">Mô tả admin</label>
                            <textarea class="form-control" rows="5" name="desc">{!! Auth::guard('admin')->user()->desc !!}</textarea>
                            @error('desc')
                                <div class="text text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Facebook --}}
                        <div class="form-group">
                            <label for="facebook">Facebook</label>
                            <input type="text" class="form-control" id="facebook" name="facebook"
                                placeholder="Link facebook" value="{{ Auth::guard('admin')->user()->facebook }}">
                            @error('facebook')
                                <div class="text text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Zalo --}}
                        <div class="form-group">
                            <label for="zalo">Zalo</label>
                            <input type="text" class="form-control" name="zalo" id="zalo" placeholder="Link zalo"
                                value="{{ Auth::guard('admin')->user()->zalo }}">
                            @error('zalo')
                                <div class="text text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Hình đại diện --}}
                        <div class="form-group">
                            <label for="avatar" class="d-block">Avatar</label>
                            <img src="{{ url(Auth::guard('admin')->user()->avatar) }}" class="d-bock mt-1 mb-2"
                                style="object-fit: cover" width="100px" height="100px" alt="avatar">
                            <input type="file" class="form-control" id="avatar" name="avatar">
                            @error('avatar')
                                <div class="text text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary btn-update mt-2">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
