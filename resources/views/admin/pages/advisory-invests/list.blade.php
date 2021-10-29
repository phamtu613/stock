@extends('admin.layouts.master')
@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Bài viết dành cho đăng ký</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body table-responsive">

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Tiêu đề</th>
                                <th>Danh mục</th>
                                <th>Người tạo</th>
                                <th>Tác vụ</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($postAdvisoryInvests as $key => $postAdvisoryInvest)
                                <tr>
                                    <td>{{ $postAdvisoryInvest->title }}</td>
                                    <td>{{ $postAdvisoryInvest->cateAdvisoryInvest->name }}</td>
                                    <td>{{ $postAdvisoryInvest->admin->name }}</td>
                                    <td colspan="2">
                                        <a href="{{ route('post-advisory-invests.edit', $postAdvisoryInvest->id) }}"
                                            class="d-inline-block">
                                            <button type="button"
                                                class="btn btn-icon waves-effect waves-light btn-info mr-2"
                                                title="Chỉnh sửa"> <i class="mdi mdi-square-edit-outline"></i>
                                                Sửa</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
