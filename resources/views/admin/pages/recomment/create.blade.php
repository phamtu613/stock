@extends('admin.layouts.master')

@section('link')
    @parent
@endsection

@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                </div>
                <h4 class="page-title">Thêm mới khuyến nghị</h4>
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
                        <form action="{{ route('recomments.store') }}" method="post">
                            @csrf

                            {{-- Ngày khuyến nghị --}}
                            <div class="form-group">
                                <label for="date_recomment ">Ngày khuyến nghị</label>
                                <input type="date" class="form-control" placeholder="dd-mm-yyyy" min="2021-01-01" id="date_recomment" name="date_recomment"
                                    value="{{ old('date_recomment') }}">
                                @error('date_recomment')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            {{-- Nội dung --}}
                            <div class="form-group">
                                <label for="textareaMCE">Nội dung</label>
                                <textarea id="textareaMCE" class="form-control" rows="7"
                                    name="content_recomment">{!!  old('content_recomment') !!}</textarea>
                                @error('content_recomment')
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
