@extends('admin.layouts.master')
@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Danh sách user</h4>
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

                    <form action="{{ route('users.action') }}">
                        <div class="form-action form-inline py-3">
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
                                    <th>Họ tên</th>
                                    <th>Email</th>
                                    <th>Sđt</th>
                                    <th>Loại</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($users as $key => $user)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="list_check[]" value="{{ $user->id }}">
                                        </td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td {{$user->expiration > $timeCurrent ? "style=color:green" : ''}}>{{$user->expiration > $timeCurrent ? "Vip" : "Bình thường"}}</td>
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
