@extends('admin.layouts.master')
@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Danh sách đăng ký
                    {{ $action == 'users.actionStatusConsulting' ? 'tư vấn đầu tư' : ($action == 'users.actionStatusTrust' ? 'ủy thác đầu tư' : '') }}
                </h4>
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

                    <form action="{{ route($action) }}">
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
                                    <th>
                                        <input type="checkbox" name="checkall" id="all">
                                    </th>
                                    <th>Họ tên</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Ghi chú</th>
                                    <th>Admin cập nhật</th>
                                    <th>Trạng thái</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($listRegisters as $key => $listRegister)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="list_check[]" value="{{ $listRegister->id }}">
                                        </td>
                                        <td>{{ $listRegister->name }}</td>
                                        <td>{!! $listRegister->email !!}</td>
                                        <td>{{ $listRegister->phone }}</td>
                                        <td>{{ $listRegister->content }}</td>
                                        <td>
                                            @if ($listRegister->admin_id)
                                                {{ $listRegister->admin->name }}
                                            @endif
                                        </td>
                                        <td
                                            style="color:{{ $listRegister->status_contact == 'Đã liên hệ' ? 'green' : 'red' }}">
                                            {{ $listRegister->status_contact }}</td>
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
