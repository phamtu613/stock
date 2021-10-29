@extends('admin.layouts.master')
@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Danh sách đăng ký vip member</h4>
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
                    <form action="{{ route('users.actionStatus') }}">
                        <div class="form-action form-inline py-3">
                            <select class="form-control mr-1" id="" name="action">
                                <option>Chọn trạng thái</option>
                                @foreach ($list_action as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>

                            <select class="form-control mr-1" id="" name="admin-update">
                                <option>Admin cập nhật</option>
                                @foreach ($listAdmins as $admin)
                                    <option value="{{ $admin->id }}">{{ $admin->name }}</option>
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
                                    <th>#</th>
                                    <th>Họ tên</th>
                                    <th>Số điện thoại</th>
                                    <th>Gói</th>
                                    <th>Hạn sử dụng</th>
                                    <th>Admin cập nhật</th>
                                    <th>Trạng thái</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($registerVips as $key => $registerVip)
                                    <tr>
                                        <td>
                                            <input type="radio" name="item_check" value="{{ $registerVip->id }}">
                                        </td>
                                        <td>{{ $registerVip->name }}</td>
                                        <td>{!! $registerVip->phone !!}</td>
                                        <td>{{ $registerVip->package }}đ</td>
                                        <td>{{ date('d-m-Y', strtotime($registerVip->expiration)) }}</td>
                                        <td>
                                            @if ($registerVip->admin_id)
                                                {{ $registerVip->admin->name }}
                                            @endif
                                        </td>
                                        <td
                                            {{ $registerVip->status == 'Đã thanh toán' ? 'style=color:green' : 'style=color:red' }}>
                                            {{ $registerVip->status }}</td>
                                    </tr>
                                @endforeach
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
