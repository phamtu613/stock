@extends('admin.layouts.master')
@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                </div>
                <h4 class="page-title">Cập nhật thông tin Stock</h4>
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
                        <form action="{{ route('infoStocks.update', $infoStock->id) }}" method='post'>
                            @method('PUT')
                            @csrf

                            {{-- Liên hệ 1 --}}
                            <div class="form-group">
                                <label for="info_footer">Liên hệ 1</label>
                                <input type="number" class="form-control" min="1" id="info_footer" name="phone1"
                                    value="{{ $infoStock->phone1 }}">
                                @error('phone1')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            {{-- Liên hệ 2 --}}
                            <div class="form-group">
                                <label for="address">Liên hệ 2</label>
                                <input type="number" class="form-control" id="address" name="phone2"
                                    value="{{ $infoStock->phone2 }}">
                                @error('phone2')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            {{-- email --}}
                            <div class="form-group">
                                <label for="fanpage">Email</label>
                                <input type="text" class="form-control" id="fanpage" name="email"
                                    value="{{ $infoStock->email }}">
                                @error('email')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- facebook --}}
                            <div class="form-group">
                                <label for="fanpage">Facebook</label>
                                <input type="text" class="form-control" id="fanpage" name="facebook"
                                    value="{{ $infoStock->facebook }}">
                                @error('facebook')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Bản đồ --}}
                            <div class="form-group">
                                <label for="fanpage">Bản đồ</label>
                                <input type="text" class="form-control" id="fanpage" name="map"
                                    value="{{ $infoStock->map }}">
                                @error('map')
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
