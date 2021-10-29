@extends('admin.layouts.master')
@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Danh sách System</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body table-responsive">
                    <div class="row">
                        <div class="col-md-8">
                            <a href="{{ route('alpha-system.create') }}" class="text-white d-inline-block mb-3">
                                <button type="button" class="btn btn-success waves-effect waves-light">Thêm chart ngày
                                    mới</button>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <form action="{{ route('admin.alpha-system-delete') }}">
                                <div class="row">
                                    <div class="col-md-7">
                                        <input type="date" class="form-control date-chart" max="{{ $dateNow }}"
                                            value="" name="date">
                                    </div>
                                    <div class="col-md-5">
                                        <button type="submit" class="btn btn-danger waves-effect waves-light"><a
                                                href="{{ route('admin.alpha-system-delete') }}"></a> Reset chart </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" name="checkall" id="all">
                                </th>
                                <th>Danh mục</th>
                                <th>Chart daily</th>
                                <th>Chart week</th>
                                <th>Ngày tạo</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($listSystem as $key => $system)
                                <tr>
                                    <th>
                                        <input type="checkbox" name="list_check[]" value="{{ $system->id }}">
                                    </th>
                                    <td>{{ $system->categorySystem->name }}</td>
                                    <td> <input id="chart{{ $key + 1 }}" type="file" class="d-none"
                                            onchange="updateChart({{ $system->id }}, this.value)"> <label
                                            for="chart{{ $key + 1 }}">
                                            <img class="image_chart" style="height: 100px;width: 100%;object-fit: contain;"
                                                src="{{ url($system->image_chart) }}" alt=""></label></td>
                                    <td><img style="height: 100px;width: 100%;object-fit: contain;"
                                            src="{{ url($system->image_chart_week) }}" alt=""></td>
                                    <td>{{ date('d-m-Y', strtotime($system->date_upload)) }}</td>
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
            "pageLength": 21,
            "lengthMenu": [
                [10, 15, 25, 35, 50, 100, -1],
                [10, 15, 25, 35, 50, 100, "All"]
            ]
        });
        $("#all").click(function() {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });

        function updateChart(id, image) {
            $.ajax({
                url: "{{ route('admin.alpha-system-change-image') }}",
                type: "GET",
                cache: false,
                data: {
                    "id": id,
                    "image": image,
                },
                success: function(data) {
                    // return location.reload();
                },
                error: function() {
                    console.log("Loi roi");
                }
            })
        }
    </script>
    @parent
@endsection
