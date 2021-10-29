@extends('admin.layouts.master')
@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Thêm chart ngày mới nào
                </h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="row">
                    <div class="col-lg-12">
                        <form action="{{ route('alpha-system.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            {{-- Banner --}}
                            <div class="form-group">
                                <div class="row mb-2 align-items-center">
                                    <div class="col-md-2">
                                        <label for="image_chart">Import all chart</label>
                                    </div>
                                    <div class="offset-md-7 col-md-3">
                                        <input type="date" class="form-control date-chart" max="{{ $dateNow }}"
                                            value="{{ $dateNow }}" name="date">
                                    </div>
                                </div>
                                <input type="file" class="form-control" id="image_chart" name="image_chart[]" multiple>
                                @error('image_chart')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-success waves-effect waves-light">Tạo mới</button>
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
