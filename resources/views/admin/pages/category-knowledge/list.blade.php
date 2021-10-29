@extends('admin.layouts.master')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Danh mục kiến thức chung</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('categoryKnowledges.create') }}" class="text-white d-inline-block mb-3"><button type="button"
                            class="btn btn-success waves-effect waves-light">Thêm mới</button></a>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table m-0">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>STT</th>
                                    <th>Tên</th>
                                    <th>Thứ tự</th>
                                    <th>Tác vụ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($categoryKnowledges->total() > 0)
                                    @foreach ($categoryKnowledges as $key => $categoryKnowledge)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td>{{ $categoryKnowledge->name }}</td>
                                            <td>{{ $categoryKnowledge->position }}</td>
                                            <td colspan="2">
                                                <a href="{{ route('categoryKnowledges.edit', $categoryKnowledge->id) }}"
                                                    class="d-inline-block">
                                                    <button type="button"
                                                        class="btn btn-icon waves-effect waves-light btn-info mr-2"
                                                        title="Chỉnh sửa"> <i class="mdi mdi-square-edit-outline"></i>
                                                        Sửa</button>
                                                </a>
                                                <a href="#custom-modal-{{$categoryKnowledge->id}}" class="d-inline-block" data-animation="fadein"
                                                    data-plugin="custommodal" data-overlayspeed="200"
                                                    data-overlaycolor="#36404a">
                                                    <button type="button"
                                                        class="btn btn-icon waves-effect waves-light btn-danger"
                                                        title="Xóa"><i class="mdi mdi-trash-can-outline"></i> Xóa</button>
                                                </a>
                                                <!-- Modal -->
                                                <div id="custom-modal-{{$categoryKnowledge->id}}" class="modal-demo">
                                                    <button type="button" class="close" onclick="Custombox.modal.close();">
                                                        <span>&times;</span><span class="sr-only">Close</span>
                                                    </button>
                                                    <h4 class="custom-modal-title bg-warning">Bạn có muốn xóa bảng ghi này?
                                                    </h4>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary waves-effect"
                                                            onclick="Custombox.modal.close();">Đóng</button>
                                                        <form
                                                            action="{{ route('categoryKnowledges.destroy', $categoryKnowledge->id) }}"
                                                            method="post">
                                                            @method('DELETE')
                                                            @csrf
                                                            <input type="submit" class="btn btn-danger" value="Xóa">
                                                        </form>
                                                    </div>
                                                </div>
                                                {{-- <a href=""
                                                    class="btn btn-primary waves-effect waves-light">Fade in</a>
                                                --}}
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
                        {{ $categoryKnowledges->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
