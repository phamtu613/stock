@extends('admin.layouts.master')
@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                </div>
                <h4 class="page-title">Cập nhật link danh mục</h4>
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
                        <form action="{{ route('portfolios.update', $portfolio->id) }}" method='post'
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf

                            {{-- Danh mục CP - SIC --}}
                            <div class="form-group">
                                <label for="link_excel">Link danh mục CP - SIC</label>
                                <input type="text" class="form-control" id="link_excel" name="link_excel"
                                    value="{{ $portfolio->link_excel }}">
                                @error('link_excel')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            
                            {{-- Top cổ phiếu --}}
                            <div class="form-group">
                                <label for="top_stock">Top cổ phiếu</label>
                                <input type="text" class="form-control" id="top_stock" name="top_stock"
                                    value="{{ $portfolio->top_stock }}">
                                @error('top_stock')
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
