@extends('admin.layouts.master')
@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                </div>
                <h4 class="page-title">Chỉnh sửa bài viết</h4>
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
                        <form action="{{ route('post-advisory-invests.update', $advisoryInvest->id) }}" method="post"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf


                            {{-- Tiêu đề --}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tiêu đề</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Tiêu đề..."
                                    name="title" value="{{ $advisoryInvest->title }}">
                                @error('title')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Keyword --}}
                            <div class="form-group">
                                <label for="keyword">Keyword</label>
                                <input type="text" class="form-control" id="keyword" placeholder="Keyword..." name="keyword"
                                    value="{{ $advisoryInvest->keyword }}">
                                <!--@error('keyword')-->
                                <!--    <div class="text text-danger">{{ $message }}</div>-->
                                <!--@enderror-->
                            </div>

                            {{-- Nội dung --}}
                            <div class="form-group">
                                <label for="content">Nội dung</label>
                                <textarea id="textareaMCE" class="form-control" rows="7"
                                    name="content">{!! $advisoryInvest->content !!}</textarea>
                                @error('content')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Lượt xem --}}
                            <div class="form-group">
                                <label for="num_view">Lượt xem</label>
                                <input type="number" class="form-control" min="1" id="num_view"
                                    placeholder="Số lượt xem ban đầu..." name="num_view"
                                    value="{{ $advisoryInvest->num_view }}">
                            </div>


                            {{-- Danh mục bài viết --}}
                            <div class="form-group">
                                <label for="category_post">Danh mục bài viết</label>
                                <select class="form-control" name="category_post" id="category_post"
                                    value="{{ old('category_post') }}" disabled>
                                    @foreach ($cateAdvisoryInvest as $cateAdvisoryInves)
                                        <option value="{{ $cateAdvisoryInves->id }}"
                                            {{ $advisoryInvest->cate_advisory_invest_id == $cateAdvisoryInves->id ? 'selected' : '' }}>
                                            {{ $cateAdvisoryInves->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>


                            {{-- Ảnh đại diện --}}
                            <div class="form-group">
                                <label for="thumbnail">Ảnh đại diện</label>
                                <input type="file" class="form-control" id="thumbnail" name="thumbnail">
                                <img src="{{ url($advisoryInvest->thumbnail) }}"
                                    style="width: 50px;height: 50px;object-fit: cover;">
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
