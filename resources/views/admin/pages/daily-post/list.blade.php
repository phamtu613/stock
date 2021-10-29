@extends('admin.layouts.master')
@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Bài viết hằng ngày</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body table-responsive">
                    <div class="analytic">
                        <a href="{{ request()->fullUrlWithQuery(['status' => 'active']) }}" class="text-primary">Kích
                            hoạt<span class="text-muted pr-3">({{ $count[0] }})</span></a>
                        <a href="{{ request()->fullUrlWithQuery(['status' => 'trash']) }}" class="text-primary">Vô hiệu
                            hóa<span class="text-muted">({{ $count[1] }})</span></a>
                    </div>

                    <form action="{{ route('dailyPosts.action') }}">
                        <div class="form-action form-inline py-3">
                            <a href="{{ route('dailyPosts.create') }}" class="text-white d-inline-block mr-3">
                                <button type="button" class="btn btn-success waves-effect waves-light">Thêm mới</button>
                            </a>
                            <select class="form-control mr-1" id="" name="action">
                                <option>Chọn</option>
                                @foreach ($list_action as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                            <input type="submit" name="btn-search" value="Áp dụng" class="btn btn-primary">
                        </div>

                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-warning">
                                {{ session('error') }}
                            </div>
                        @endif
                        <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>
                                        <input type="checkbox" name="checkall" id="all">
                                    </th>
                                    <th>Tiêu đề</th>
                                    <th>Loại bài viết</th>
                                    <th>Danh mục</th>
                                    <th>Người tạo</th>
                                    <th>Tác vụ</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if ($dailyPosts)
                                    @foreach ($dailyPosts as $key => $dailyPost)
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="list_check[]" value="{{ $dailyPost->id }}">
                                            </td>
                                            <td>{{ $dailyPost->title }}</td>
                                            <td style="{{ $dailyPost->vip == 'Vip' ? 'color:green' : '' }}">
                                                {{ $dailyPost->vip }}</td>
                                            <td>{{ $dailyPost->categoryPost->name }}</td>
                                            <td>{{ $dailyPost->admin->name }}</td>
                                            <td colspan="2">
                                                <a href="{{ route('dailyPosts.edit', $dailyPost->id) }}"
                                                    class="d-inline-block">
                                                    <button type="button"
                                                        class="btn btn-icon waves-effect waves-light btn-info mr-2"
                                                        title="Chỉnh sửa"> <i class="mdi mdi-square-edit-outline"></i>
                                                        Sửa</button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4" class="bg-white">
                                            Không có dữ liệu
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- end row -->

@endsection

@section('js')
    <script>
        $('#datatable').DataTable({
            "pageLength": 10,
            "lengthMenu": [
                [10, 15, 25, 35, 50, 100, -1],
                [10, 15, 25, 35, 50, 100, "All"]
            ]
        });
        $("#all").click(function() {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });

    </script>
    @parent
@endsection
