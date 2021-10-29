@extends('admin.layouts.master')
@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                </div>
                <h4 class="page-title">Chỉnh sửa bài viết
                    <a href="{{ route('dailyPosts.index') }}" class="text-white d-inline-block ml-2">
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
                        <form action="{{ route('dailyPosts.update', $dailyPost->id) }}" method="post"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf

                            {{-- Tiêu đề --}}
                            <div class="form-group">
                                <label for="title">Tiêu đề</label>
                                <input type="text" class="form-control" id="title" placeholder="Tiêu đề..." name="title"
                                    value="{{ $dailyPost->title }}">
                                @error('title')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Mô tả --}}
                            <div class="form-group">
                                <label for="description">Mô tả</label>
                                <input class="form-control" rows="5" name="description"
                                    value="{{ $dailyPost->description }}">
                                @error('description')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Nội dung --}}
                            <div class="form-group">
                                <label for="content">Nội dung</label>
                                <textarea id="textareaMCE" class="form-control" rows="7"
                                    name="content">{!! $dailyPost->content !!}</textarea>
                                @error('content')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Lượt xem --}}
                            <div class="form-group">
                                <label for="num_view">Lượt xem</label>
                                <input type="number" class="form-control" min="1" id="num_view"
                                    placeholder="Số lượt xem ban đầu..." name="num_view"
                                    value="{{ $dailyPost->num_view }}">
                            </div>

                            {{-- Danh mục bài viết --}}
                            <div class="form-group">
                                <label for="category_post">Danh mục bài viết</label>
                                <select class="form-control" name="category_post" id="category_post"
                                    value="{{ old('category_post') }}">
                                    <option value="0">Chọn danh mục</option>
                                    @foreach ($categoryDailyPosts as $categoryDailyPos)
                                        <option value="{{ $categoryDailyPos->id }}"
                                            {{ $dailyPost->cate_daily_post_id == $categoryDailyPos->id ? 'selected' : '' }}>
                                            {{ $categoryDailyPos->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_post')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            {{-- Loại bài viết --}}
                            <div class="form-group">
                                <label class="d-block">Loại bài viết</label>
                                <div class="custom-control custom-radio d-inline-block mr-4">
                                    <input type="radio" class="custom-control-input" id="normal" name="vip"
                                        value="Bình thường"
                                        {{ $dailyPost->vip == 'Bình thường' ? "checked='checked'" : '' }}>
                                    <label class="custom-control-label" for="normal">Bình thường</label>
                                </div>
                                <div class="custom-control custom-radio d-inline-block">
                                    <input type="radio" class="custom-control-input" id="vip" name="vip" value="Vip"
                                        {{ $dailyPost->vip == 'Vip' ? "checked='checked'" : '' }}>
                                    <label class="custom-control-label" for="vip">Vip</label>
                                </div>
                            </div>

                            {{-- Ảnh đại diện --}}
                            <div class="form-group">
                                <label for="thumbnail" class="d-block">Ảnh đại diện</label>
                                <img src="{{ url($dailyPost->thumbnail) }}"
                                    style="width: 100px;height: 100px;object-fit: cover;">
                                <input type="file" class="form-control" id="thumbnail" name="thumbnail"
                                    value="{{ $dailyPost->thumbnail }}">
                                @error('thumbnail')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Ảnh đầu bài viết --}}
                            <div class="form-group">
                                <label for="image" class="d-block">Ảnh đầu bài viết</label>
                                <img src="{{ $dailyPost->image != '' ? url($dailyPost->image) : url('public/uploads/no-image.png') }}"
                                    style="width: 100px;height: 100px;object-fit: cover;">
                                <div class="d-flex mt-2">
                                    <input type="file" class="form-control" id="image" name="image"
                                        style="flex-basis: 20%;margin: 0px 10px 0 0px;">
                                    @if ($dailyPost->image)
                                        <a href="{{ route('dailyPosts.clearImage', $dailyPost->id) }}"
                                            class="d-block"><button type="button"
                                                class="btn btn-icon waves-effect waves-light btn-danger" title="Xóa"><i
                                                    class="mdi mdi-trash-can-outline"></i>
                                                Xóa
                                                ảnh
                                                đầu bài
                                                viết</button></a>
                                    @endif
                                </div>

                                @error('image')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-success waves-effect waves-light">Cập nhật</button>
                        </form>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection
