@extends('admin.layouts.master')
@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Danh sách đăng ký khóa học</h4>
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
                    <form action="{{ route('users.actionStatusRegisterCourse') }}">
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
                                    <th>#</th>
                                    <th>Tên</th>
                                    <th>Số điện thoại</th>
                                    <th>Khóa học</th>
                                    <th>Admin cập nhật</th>
                                    <th>Trạng thái</th>
                                    <th>Tác vụ</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if ($carts)
                                    @foreach ($carts as $key => $cart)
                                        <tr>
                                            <th>
                                                <input type="checkbox" name="list_check[]" value="{{ $cart->id }}">
                                            </th>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td>{{ $cart->name }}</td>
                                            <td>{{ $cart->phone }}</td>
                                            <td>{{ $cart->course->title }}</td>
                                            <td>
                                                @if ($cart->admin_id && $cart->admin)
                                                    {{ $cart->admin->name }}
                                                @endif
                                            </td>
                                            <td
                                                {{ $cart->status_payment == 'Đã thanh toán' ? 'style=color:green' : 'style=color:red' }}>
                                                {{ $cart->status_payment }}
                                            </td>

                                            <td colspan="2">
                                                <a href="{{ route('carts.edit', $cart->id) }}" class="d-inline-block">
                                                    <button type="button"
                                                        class="btn btn-icon waves-effect waves-light btn-info mr-2"
                                                        title="Chi tiết"> <i class="mdi mdi-square-edit-outline"></i>
                                                        Chi tiết</button>
                                                </a>
                                                {{-- <a href="#custom-modal-{{ $cart->id }}" class="d-inline-block"
                                                    data-animation="fadein" data-plugin="custommodal"
                                                    data-overlayspeed="200" data-overlaycolor="#36404a">
                                                    <button type="button"
                                                        class="btn btn-icon waves-effect waves-light btn-danger"
                                                        title="Xóa"><i class="mdi mdi-trash-can-outline"></i> Xóa</button>
                                                </a> --}}

                                                <!-- Modal -->
                                                {{-- <div id="custom-modal-{{ $cart->id }}" class="modal-demo">
                                                    <button type="button" class="close" onclick="Custombox.modal.close();">
                                                        <span>&times;</span><span class="sr-only">Close</span>
                                                    </button>
                                                    <h4 class="custom-modal-title bg-warning">Bạn có muốn xóa bảng ghi này?
                                                    </h4>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary waves-effect"
                                                            onclick="Custombox.modal.close();">Đóng</button>
                                                        <form action="{{ route('carts.destroy', $cart->id) }}"
                                                            method="post">
                                                            @method('DELETE')
                                                            @csrf
                                                            <input type="submit" class="btn btn-danger" value="Xóa">
                                                        </form>
                                                    </div>
                                                </div> --}}
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
