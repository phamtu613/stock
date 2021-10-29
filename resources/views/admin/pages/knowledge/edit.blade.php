@extends('admin.layouts.master')
@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                </div>
                <h4 class="page-title">Chỉnh sửa bài viết
                    <a href="{{ route('knowledges.index') }}" class="text-white d-inline-block ml-2">
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
                        <form action="{{ route('knowledges.update', $knowledge->id) }}" method="post"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf

                            {{-- Tiêu đề --}}
                            <div class="form-group">
                                <label for="title">Tiêu đề</label>
                                <input type="text" class="form-control" id="title" placeholder="Tiêu đề..." name="title"
                                    value="{{ $knowledge->title }}">
                                @error('title')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Mô tả --}}
                            <div class="form-group">
                                <label for="description">Mô tả ngắn</label>
                                <input class="form-control" name="description" value="{!! $knowledge->description !!}" />
                                @error('description')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Nội dung --}}
                            <div class="form-group">
                                <label for="content">Nội dung</label>
                                <textarea id="textareaMCE" class="form-control" rows="7"
                                    name="content">{!! $knowledge->content !!}</textarea>
                                @error('content')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Lượt xem --}}
                            <div class="form-group">
                                <label for="num_view">Lượt xem</label>
                                <input type="number" class="form-control" min="1" id="num_view"
                                    placeholder="Số lượt xem ban đầu..." name="num_view"
                                    value="{{ $knowledge->num_view }}">
                            </div>


                            {{-- Danh mục bài viết --}}
                            <div class="form-group">
                                <label for="cate_knowledge">Danh mục bài viết</label>
                                <select class="form-control" name="cate_knowledge">
                                    <option>---Chọn danh mục---</option>
                                    @foreach ($categoryKnowledges as $categoryKnowledge)
                                        <option value="{{ $categoryKnowledge->id }}"
                                            {{ $categoryKnowledge->id == $knowledge->cate_knowledge_id ? 'selected' : '' }}>
                                            {{ $categoryKnowledge->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('cate_knowledge')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            {{-- Loại bài viết --}}
                            <div class="form-group">
                                <label class="d-block">Loại bài viết</label>
                                <div class="custom-control custom-radio d-inline-block mr-4">
                                    <input type="radio" class="custom-control-input" id="normal" name="vip"
                                        value="Bình thường"
                                        {{ $knowledge->vip == 'Bình thường' ? "checked='checked'" : '' }}>
                                    <label class="custom-control-label" for="normal">Bình thường</label>
                                </div>
                                <div class="custom-control custom-radio d-inline-block">
                                    <input type="radio" class="custom-control-input" id="vip" name="vip" value="Vip"
                                        {{ $knowledge->vip == 'Vip' ? "checked='checked'" : '' }}>
                                    <label class="custom-control-label" for="vip">Vip</label>
                                </div>
                            </div>


                            {{-- Top bài viết --}}
                            <div class="form-group">
                                <label class="d-block">Top bài viết</label>
                                <div class="custom-control custom-radio d-inline-block mr-3">
                                    <input type="radio" class="custom-control-input" id="none" name="top_post"
                                        value="Không hiển thị"
                                        {{ $knowledge->top_post == 'Không hiển thị' ? "checked='checked'" : '' }}>
                                    <label class="custom-control-label" for="none">Không hiển thị</label>
                                </div>
                                <div class="custom-control custom-radio d-inline-block">
                                    <input type="radio" class="custom-control-input" id="block" name="top_post"
                                        value="Hiển thị"
                                        {{ $knowledge->top_post == 'Hiển thị' ? "checked='checked'" : '' }}>
                                    <label class="custom-control-label" for="block">Hiển thị</label>
                                </div>
                            </div>

                            {{-- Ảnh đầu bài viết --}}
                            <div class="form-group">
                                <label for="image" class="d-block">Ảnh đầu bài viết</label>
                                <img src="{{ $knowledge->image != '' ? url($knowledge->image) : url('public/uploads/no-image.png') }}"
                                    style="width: 50px;height: 50px;object-fit: cover;">

                                <div class="d-flex mt-2">
                                    <input type="file" class="form-control" id="image" name="image"
                                        style="flex-basis: 20%;margin: 0px 10px 0 0px;">
                                    @if ($knowledge->image)
                                        <a href="{{ route('knowledges.clearImage', $knowledge->id) }}"
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

                            {{-- Ảnh đại diện --}}
                            <div class="form-group">
                                <label for="thumbnail" class="d-block">Ảnh đại diện</label>
                                <img src="{{ url($knowledge->thumbnail) }}"
                                    style="width: 50px;height: 50px;object-fit: cover;">
                                <input type="file" class="form-control" id="thumbnail" name="file"
                                    value="{{ $knowledge->thumbnail }}">
                                @error('thumbnail')
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
