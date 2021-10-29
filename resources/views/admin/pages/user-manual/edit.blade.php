@extends('admin.layouts.master')
@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                </div>
                <h4 class="page-title">Hướng dẫn sử dụng Alphastock System</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <div class="row">
                    <div class="col-lg-12">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{ route('admin.user-manual.update', $userManual->id) }}" method="post">
                            @method('PUT')
                            @csrf

                            {{-- Nội dung --}}
                            <div class="form-group">
                                <label for="content">Nội dung</label>
                                <textarea id="textareaMCE" class="form-control" rows="7"
                                    name="content">{!! $userManual->content !!}</textarea>
                                @error('content')
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
