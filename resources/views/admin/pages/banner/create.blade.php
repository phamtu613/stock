@extends('admin.layouts.master')
@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                </div>
                <h4 class="page-title">Thêm mới banner</h4>
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
                        <form action="{{ route('banners.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            {{-- Tên hình ảnh --}}
                            <div class="form-group">
                                <label for="name">Tên hình ảnh</label>
                                <input type="text" class="form-control" id="name" placeholder="Nhập tên hình ảnh..."
                                    name="name" value="{{ old('name') }}">
                                @error('name')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Link --}}
                            <div class="form-group">
                                <label for="link">Link banner</label>
                                <input type="text" class="form-control" id="link" placeholder="Nhập link hình ảnh..."
                                    name="link" value="{{ old('Link') }}">
                            </div>

                            {{-- Số thứ tự --}}
                            <div class="form-group">
                                <label for="position">Số thứ tự</label>
                                <input type="number" class="form-control" id="position" placeholder="Nhập số thứ tự..."
                                    name="position" min="1" value="{{ old('position') }}">
                                @error('position')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>


                            {{-- Banner --}}
                            <div class="form-group">
                                <label for="banner">Banner</label>
                                <input type="file" class="form-control" id="banner" name="image">
                                @error('image')
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
