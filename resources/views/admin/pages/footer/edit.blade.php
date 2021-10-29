@extends('admin.layouts.master')
@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                </div>
                <h4 class="page-title">Cập nhật thông tin footer</h4>
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
                        <form action="{{ route('footers.update', $footer->id) }}" method='post'
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf

                            {{-- Giới thiệu footer --}}
                            <div class="form-group">
                                <label for="info_footer">Giới thiệu footer</label>
                                <input type="text" class="form-control" id="info_footer" name="info_footer"
                                    value="{{ $footer->info_footer }}">
                                @error('info_footer')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            {{-- địa chỉ --}}
                            <div class="form-group">
                                <label for="address">Địa chỉ</label>
                                <input type="text" class="form-control" id="address" name="address"
                                    value="{{ $footer->address }}">
                                @error('address')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            {{-- fanpage --}}
                            <div class="form-group">
                                <label for="fanpage">Fanpage</label>
                                <input type="text" class="form-control" id="fanpage" name="fanpage"
                                    value="{{ $footer->fanpage }}">
                                @error('fanpage')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            {{-- Trainer1 --}}
                            <div class="row">
                                <div class="col-md-2">
                                    {{--  --}}
                                    <div class="form-group">
                                        <label>Hình trainner 1</label>
                                        <img src="{{ url($footer->image_trainer1) }}" style="object-fit: cover"
                                            width="70px" height="70px">
                                        @error('thumbnail')
                                            <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name_trainer1">Tên trainer 1</label>
                                        <input type="text" class="form-control" id="name_trainer1"
                                            value="{{ $footer->name_trainer1 }}" name="name_trainer1">
                                        <input type="file" class="d-block mt-1" name="image_trainer1"
                                            value="{{ url($footer->image_trainer1) }}">
                                        @error('name_trainer1')
                                            <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                        @error('image_trainer1')
                                            <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="desc_trainer1">Mô tả trainer 1</label>
                                        <input type="text" class="form-control" id="desc_trainer1"
                                            value="/{{ $footer->desc_trainer1 }}" name="desc_trainer1">
                                        @error('desc_trainer1')
                                            <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            {{-- Trainer2 --}}
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Hình trainer 2</label>
                                        <img src="{{ url($footer->image_trainer2) }}" class="d-block"
                                            style="object-fit: cover" width="70px" height="70px" alt="img-trainner">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name_trainer2">Tên trainer 2</label>
                                        <input type="text" class="form-control" id="name_trainer2"
                                            value="{{ $footer->name_trainer2 }}" name="name_trainer2">
                                        <input type="file" class="d-block mt-1" name="image_trainer2"
                                            value="{{ $footer->name_trainer2 }}">
                                        @error('name_trainer2')
                                            <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                        @error('image_trainer2')
                                            <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="desc_trainer2">Mô tả trainer 2</label>
                                        <input type="text" class="form-control" id="desc_trainer2"
                                            value="{{ $footer->desc_trainer2 }}" name="desc_trainer2">
                                        @error('desc_trainer2')
                                            <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            {{-- Trainer3 --}}
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Hình trainer 3</label>
                                        <img src="{{ url($footer->image_trainer3) }}" class="d-block"
                                            style="object-fit: cover" width="70px" height="70px" alt="img-trainner">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name_trainer3">Tên trainer 3</label>
                                        <input type="text" class="form-control" id="name_trainer3"
                                            value="{{ $footer->name_trainer3 }}" name="name_trainer3">
                                        <input type="file" class="d-block mt-1" name="image_trainer3"
                                            value="{{ $footer->name_trainer3 }}">
                                        @error('name_trainer3')
                                            <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                        @error('image_trainer3')
                                            <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="desc_trainer3">Mô tả trainer 3</label>
                                        <input type="text" class="form-control" id="desc_trainer3"
                                            value="{{ $footer->desc_trainer3 }}" name="desc_trainer3">
                                        @error('desc_trainer3')
                                            <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- Trainer4 --}}
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Hình trainer 4</label>
                                        <img src="{{ url($footer->image_trainer4) }}" class="d-block"
                                            style="object-fit: cover" width="70px" height="70px" alt="img-trainner">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name_trainer4">Tên trainer 4</label>
                                        <input type="text" class="form-control" id="name_trainer4"
                                            value="{{ $footer->name_trainer4 }}" name="name_trainer4">
                                        <input type="file" class="d-block mt-1" name="image_trainer4"
                                            value="{{ $footer->name_trainer4 }}">
                                        @error('name_trainer4')
                                            <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                        @error('image_trainer4')
                                            <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="desc_trainer4">Mô tả trainer 4</label>
                                        <input type="text" class="form-control" id="desc_trainer4"
                                            value="{{ $footer->desc_trainer4 }}" name="desc_trainer4">
                                        @error('desc_trainer4')
                                            <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
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
