@extends('admin.layouts.master')
@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Danh sách khuyến nghị</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body table-responsive">
                    <a href="{{ route('recomments.create') }}" class="text-white d-inline-block mb-3"><button type="button"
                            class="btn btn-success waves-effect waves-light">Thêm mới</button></a>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Ngày khuyến nghị</th>
                                <th>Nội dung</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if ($recomments->total() > 0)
                                @foreach ($recomments as $key => $recomment)
                                    <tr>
                                        <td>{{ date('d-m-Y', strtotime($recomment->date_recomment)) }}</td>
                                        <td>{!! $recomment->content_recomment !!}</td>
                                        <td colspan="2">
                                            <a href="{{ route('recomments.edit', $recomment->id) }}" class="d-inline-block">
                                                <button type="button"
                                                    class="btn btn-icon waves-effect waves-light btn-info mr-2"
                                                    title="Chỉnh sửa"> <i class="mdi mdi-square-edit-outline"></i>
                                                    Sửa</button>
                                            </a>
                                            <a href="#custom-modal-{{$recomment->id}}" class="d-inline-block" data-animation="fadein"
                                                data-plugin="custommodal" data-overlayspeed="200"
                                                data-overlaycolor="#36404a">
                                                <button type="button"
                                                    class="btn btn-icon waves-effect waves-light btn-danger" title="Xóa"><i
                                                        class="mdi mdi-trash-can-outline"></i> Xóa</button>
                                            </a>
                                            <!-- Modal -->
                                            <div id="custom-modal-{{$recomment->id}}" class="modal-demo">
                                                <button type="button" class="close" onclick="Custombox.modal.close();">
                                                    <span>&times;</span><span class="sr-only">Close</span>
                                                </button>
                                                <h4 class="custom-modal-title bg-warning">Bạn có muốn xóa bảng ghi này?
                                                </h4>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary waves-effect"
                                                        onclick="Custombox.modal.close();">Đóng</button>
                                                    <form action="{{ route('recomments.destroy', $recomment->id) }}"
                                                        method="post">
                                                        @method('DELETE')
                                                        @csrf
                                                        <input type="submit" class="btn btn-danger" value="Xóa">
                                                    </form>
                                                </div>
                                            </div>
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
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection
