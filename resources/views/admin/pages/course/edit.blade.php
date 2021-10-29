@extends('admin.layouts.master')
@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                </div>
                <h4 class="page-title">Cập nhật khóa học</h4>
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
                        <form action="{{ route('courses.update', $course->id) }}" method="post"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf

                            {{-- Tên khóa học --}}
                            <div class="form-group">
                                <label for="title">Tên khóa học</label>
                                <input type="text" class="form-control" id="title" placeholder="Tên khóa học..."
                                    name="title" value="{{ $course->title }}">
                                @error('title')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Thông tin khóa học --}}
                            <div class="form-group">
                                <label for="info_course">Thông tin khóa học</label>
                                <textarea class="form-control" rows="5"
                                    name="info_course">{!! $course->info_course !!}</textarea>

                                @error('info_course')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Nội dung khóa họ --}}
                            <div class="form-group">
                                <label for="textareaMCE">Nội dung khóa học</label>
                                <textarea class="form-control" rows="7" name="curriculum">{!! $course->curriculum !!}</textarea>

                                @error('curriculum')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Giá cũ --}}
                            <div class="form-group">
                                <label for="price_old">Giá cũ</label>
                                <input type="number" class="form-control" min="1" id="price_old" placeholder="Giá cũ..."
                                    name="price_old" value="{{ $course->price_old }}">

                                @error('price_old')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Giá hiện tại --}}
                            <div class="form-group">
                                <label for="price_current">Giá hiện tại</label>
                                <input type="number" class="form-control" min="1" id="price_current"
                                    placeholder="Giá hiện tại..." name="price_current"
                                    value="{{ $course->price_current }}">

                                @error('price_current')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Số lượng đang học --}}
                            <div class="form-group">
                                <label for="num_student">Số lượng đang học</label>
                                <input type="number" class="form-control" min="1" id="num_student"
                                    placeholder="Số lượng đang học..." name="num_student"
                                    value="{{ $course->num_student }}">

                                @error('num_student')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Số lượng vote sao --}}
                            <div class="form-group">
                                <label for="num_star">Số lượng vote sao</label>
                                <input type="number" class="form-control" min="1" id="num_star"
                                    placeholder="Số lượng vote sao..." name="num_star" value="{{ $course->num_star }}">

                                @error('num_star')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Thể loại khóa học --}}
                            <div class="form-group">
                                <label for="type">Thể loại khóa học</label>
                                <input type="text" class="form-control" id="type" placeholder="Thể loại khóa học..."
                                    name="type" value="{{ $course->type }}">

                                @error('type')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Thời lượng --}}
                            <div class="form-group">
                                <label for="time">Thời lượng</label>
                                <input type="text" class="form-control" id="time" placeholder="Vd: 02:10:09" name="time"
                                    value="{{ $course->time }}">

                                @error('time')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Ảnh khóa học --}}
                            <div class="form-group">
                                <label for="thumbnail" class="d-block">Ảnh khóa học</label>
                                <img src="{{ url($course->thumbnail) }}" alt="{{ $course->thumbnail }}" width="300px"
                                    height="150px" style="object-fit: cover">
                                <input type="file" class="form-control d-block mt-2" id="thumbnail" name="thumbnail">

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
                                            {{ $course->cate_course_id == $categoryCourse->id ? 'selected' : '' }}>
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
                                    value="{{ $course->link_excel }}">

                                @error('link_excel')
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
