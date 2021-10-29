@extends('admin.layouts.master')
@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                </div>
                <h4 class="page-title">Thêm mới bài viết
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
                        <form action="{{ route('knowledges.store') }}" method="post" enctype="multipart/form-data">
                            @csrf


                            {{-- Tiêu đề --}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tiêu đề</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Tiêu đề..."
                                    name="title" value="{{ old('title') }}">
                                @error('title')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            {{-- Mô tả --}}
                            <div class="form-group">
                                <label for="description">Mô tả ngắn</label>
                                <input class="form-control" id="description" name="description"
                                    value="{{ old('description') }}" />
                                @error('description')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Nội dung --}}
                            <div class="form-group">
                                <label for="textareaMCE">Nội dung</label>
                                <textarea id="textareaMCE" class="form-control" rows="7"
                                    name="content">{!! old('content') !!}</textarea>

                                @error('content')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            {{-- Lượt xem --}}
                            <div class="form-group">
                                <label for="num_view">Lượt xem</label>
                                <input type="number" class="form-control" min="1" id="num_view"
                                    placeholder="Số lượt xem ban đầu..." name="num_view" value="{{ old('num_view') }}">

                                @error('num_view')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            {{-- Danh mục bài viết --}}
                            <div class="form-group">
                                <label for="cate_knowledge">Danh mục bài viết</label>
                                <select class="form-control" name="cate_knowledge" id="cate_knowledge"
                                    value="{{ old('cate_knowledge') }}">
                                    <option value="0">Chọn danh mục</option>
                                    @foreach ($categoryKnowledges as $categoryKnowledge)
                                        <option value="{{ $categoryKnowledge->id }}"
                                            {{ old('cate_knowledge') == $categoryKnowledge->id ? 'selected' : '' }}>
                                            {{ $categoryKnowledge->name }}</option>
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
                                        checked="checked" value="Bình thường">
                                    <label class="custom-control-label" for="normal">Bình thường</label>
                                </div>
                                <div class="custom-control custom-radio d-inline-block">
                                    <input type="radio" class="custom-control-input" id="vip" name="vip" value="Vip">
                                    <label class="custom-control-label" for="vip">Vip</label>
                                </div>
                            </div>


                            {{-- Top bài viết --}}
                            <div class="form-group">
                                <label class="d-block">Top bài viết bài viết</label>
                                <div class="custom-control custom-radio d-inline-block mr-3">
                                    <input type="radio" class="custom-control-input" id="none" name="top_post"
                                        checked="checked" value="Không hiển thị">
                                    <label class="custom-control-label" for="none">Không hiển thị</label>
                                </div>
                                <div class="custom-control custom-radio d-inline-block">
                                    <input type="radio" class="custom-control-input" id="block" name="top_post"
                                        value="Hiển thị">
                                    <label class="custom-control-label" for="block">Hiển thị</label>
                                </div>
                            </div>


                            {{-- Ảnh đầu bài viết --}}
                            <div class="form-group">
                                <label for="image">Ảnh đầu bài viết</label>
                                <input type="file" class="form-control" id="image" name="image">
                                @error('image')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            {{-- Ảnh đại diện --}}
                            <div class="form-group">
                                <label for="thumbnail">Ảnh đại diện bài viết</label>
                                <input type="file" class="form-control" id="thumbnail" name="thumbnail">
                                @error('thumbnail')
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
