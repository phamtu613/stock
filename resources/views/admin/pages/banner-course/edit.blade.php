@extends('admin.layouts.master')
@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                </div>
                <h4 class="page-title">Cập nhật Banner khóa học</h4>
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
                        
                        <form action="{{ route('banner-courses.update', $bannerCourse->id) }}" method='post'
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf

                            {{-- Tên banner --}}
                            <div class="form-group">
                                <label for="name">Tên banner</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $bannerCourse->name }}">
                                @error('name')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            {{-- Banner --}}
                            <div class="form-group">
                                <label>Banner</label>
                                <img src="{{ url($bannerCourse->image) }}" style="object-fit: cover" width="100%"
                                    height="200px">
                                <input type="file" class="d-block mt-2" name="banner">
                                @error('banner')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success waves-effect waves-light" value="Cập nhật">Cập
                                    nhật</button>
                            </div>

                        </form>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection
