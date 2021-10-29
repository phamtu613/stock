@extends('admin.layouts.master')
@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                </div>
                <h4 class="page-title">Cập nhật banner</h4>
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
                        <form action="{{ route('banner-ads.update', $bannerAds->id) }}" method='post'
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf

                            {{-- Tên banner --}}
                            <div class="form-group">
                                <label for="cate">Tên banner</label>
                                <input type="text" class="form-control" id="cate" placeholder="Nhập tên banner..."
                                    name="name" value="{{ $bannerAds->name }}">
                                @error('name')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Link --}}
                            <div class="form-group">
                                <label for="link">Link banner</label>
                                <input type="text" class="form-control" id="link" placeholder="Nhập link banner..."
                                    name="link" value="{{ $bannerAds->link }}">
                                @error('link')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>


                            {{-- Số thứ tự --}}
                            <div class="form-group">
                                <label for="position">Số thứ tự</label>
                                <input type="number" id="position" name="position" min="1" max="100" class="form-control"
                                    id="position" placeholder="Nhập số thứ tự..." name="position"
                                    value="{{ $bannerAds->position }}">
                                @error('position')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Banner --}}
                            <div class="form-group">
                                <label for="banner">Banner</label>
                                <input type="file" class="form-control" id="banner" name="banner">
                                <img src="{{ url($bannerAds->image) }}" class="d-bock mt-2" style="object-fit: cover"
                                    width="50%" height="300px" alt="banner">
                            </div>


                            <button type="submit" class="btn btn-success waves-effect waves-light" value="Cập nhật">Cập
                                nhật</button>
                        </form>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection
