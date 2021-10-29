@extends('admin.layouts.master')
@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                </div>
                <h4 class="page-title">Thêm mới khóa học</h4>
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
                        <form action="{{ route('courses.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            {{-- Tên khóa học --}}
                            <div class="form-group">
                                <label for="title">Tên khóa học</label>
                                <input type="text" class="form-control" id="title" placeholder="Tên khóa học..."
                                    name="title" value="{{ old('title') }}">
                                @error('title')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Thông tin khóa học --}}
                            <div class="form-group">
                                <label for="info_course">Thông tin khóa học</label>
                                <textarea class="form-control" rows="5"
                                    name="info_course">{!! old('info_course') !!}</textarea>

                                @error('info_course')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            {{-- Nội dung khóa học --}}
                            <div class="form-group">
                                <label for="textareaMCE">Nội dung khóa học</label>
                                <textarea class="form-control" rows="7" name="curriculum">{!! old('curriculum') !!}</textarea>

                                @error('curriculum')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            {{-- Giá cũ --}}
                            <div class="form-group">
                                <label for="price_old">Giá cũ</label>
                                <input type="number" class="form-control" min="1" id="price_old" placeholder="Giá cũ..."
                                    name="price_old" value="{{ old('price_old') }}">

                                @error('price_old')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            {{-- Giá hiện tại --}}
                            <div class="form-group">
                                <label for="price_current">Giá hiện tại</label>
                                <input type="number" class="form-control" min="1" id="price_current"
                                    placeholder="Giá hiện tại..." name="price_current" value="{{ old('price_current') }}">

                                @error('price_current')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            {{-- Số lượng đang học --}}
                            <div class="form-group">
                                <label for="num_student">Số lượng đang học</label>
                                <input type="number" class="form-control" min="1" id="num_student"
                                    placeholder="Số lượng đang học..." name="num_student"
                                    value="{{ old('num_student') }}">

                                @error('num_student')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            {{-- Số lượng vote sao --}}
                            <div class="form-group">
                                <label for="num_star">Số lượng vote sao</label>
                                <input type="number" class="form-control" min="1" id="num_star"
                                    placeholder="Số lượng vote sao..." name="num_star" value="{{ old('num_star') }}">

                                @error('num_star')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            {{-- Thể loại khóa học --}}
                            <div class="form-group">
                                <label for="type">Thể loại khóa học</label>
                                <input type="text" class="form-control" id="type" placeholder="Thể loại khóa học..."
                                    name="type" value="{{ old('type') }}">

                                @error('type')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            {{-- Thời lượng --}}
                            <div class="form-group">
                                <label for="time">Thời lượng</label>
                                <input type="text" class="form-control" id="time" placeholder="Vd: 02:10:09" name="time"
                                    value="{{ old('time') }}">

                                @error('time')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            {{-- Ảnh khóa học --}}
                            <div class="form-group">
                                <label for="thumbnail">Ảnh khóa học</label>
                                <input type="file" class="form-control" id="thumbnail" name="thumbnail">

                                @error('thumbnail')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            {{-- Danh mục khóa học --}}
                            <div class="form-group">
                                <label for="category_course">Danh mục khóa học</label>
                                <select class="form-control" name="category_course" id="category_course"
                                    value="{{ old('category_course') }}">
                                    <option value="0">Chọn danh mục</option>
                                    @foreach ($categoryCourses as $categoryCourse)
                                        <option value="{{ $categoryCourse->id }}"
                                            {{ old('category_course') == $categoryCourse->id ? 'selected' : '' }}>
                                            {{ $categoryCourse->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_course')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            {{-- Link Ebook --}}
                            <div class="form-group">
                                <label for="link_excel">Link Ebook</label>
                                <input type="text" class="form-control" id="link_excel"
                                    placeholder="Nếu là Ebook nhập link..." name="link_excel"
                                    value="{{ old('link_excel') }}">

                                @error('link_excel')
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
