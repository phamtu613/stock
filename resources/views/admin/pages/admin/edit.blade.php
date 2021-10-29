@extends('admin.layouts.master')
@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                </div>
                <h4 class="page-title">Cập nhật tài khoản
                    <a href="{{ route('admin.index') }}" class="text-white d-inline-block ml-2">
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
                        <form action="{{ route('admin.update', $admin->id) }}" method="post">
                            @method('PUT')
                            @csrf

                            <div class="row">
                                {{-- Họ tên --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Họ tên</label>
                                        <input type="text" class="form-control" name="name" value="{{ $admin->name }}">
                                        @error('name')
                                            <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Email --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control" value="{{ $admin->email }}" disabled>
                                    </div>
                                </div>

                                {{-- Phone --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Số điện thoại</label>
                                        <input class="form-control" name="phone" value="{{ $admin->phone }}">
                                        @error('phone')
                                            <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Vị trí --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="position">Vị trí</label>
                                        <input type="text" class="form-control" name="position" id="position"
                                            placeholder="vd: Co-Founder" value="{{ $admin->position }}">
                                        @error('position')
                                            <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Facebook --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Facebook</label>
                                        <input class="form-control" name="facebook" value="{{ $admin->facebook }}">
                                        @error('facebook')
                                            <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Zalo --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Zalo</label>
                                        <input class="form-control" name="zalo" value="{{ $admin->zalo }}">
                                        @error('zalo')
                                            <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Mô tả --}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Mô tả</label>
                                        <textarea class="form-control" rows="5" name="desc">{{ $admin->desc }}</textarea>
                                        @error('desc')
                                            <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Quyền --}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="role">Quyền</label>
                                        <select class="form-control" name="role" id="role" value="{{ old('role') }}">
                                            <option value="Admin" {{ $admin->role == 'admin' ? 'selected' : '' }}>
                                                Admin
                                            </option>
                                            <option value="manager" {{ $admin->role == 'manager' ? 'selected' : '' }}>
                                                Manager
                                            </option>
                                            <option value="moderator"
                                                {{ $admin->role == 'moderator' ? 'selected' : '' }}>
                                                Moderator
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success waves-effect waves-light ">Cập nhật</button>

                        </form>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection
