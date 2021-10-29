@extends('admin.layouts.master')
@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                </div>
                <h4 class="page-title">Thêm mới danh mục khóa học</h4>
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
                        <form action="{{ route('categoryCourses.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="cate">Tên danh mục</label>
                                <input type="text" class="form-control" id="cate" placeholder="Nhập tên danh mục..."
                                    name="name" value="{{ old('name') }}">
                                @error('name')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="position">Số thứ tự</label>
                                <input type="number" id="position" name="position" min="1" max="100" class="form-control"
                                    id="position" placeholder="Nhập số thứ tự..." name="position"
                                    value="{{ old('position') }}">
                                @error('position')
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
