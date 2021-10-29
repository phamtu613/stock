<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('admin-asset\images\favicon.ico') }}">

    <!-- Table datatable css -->
    <link href="{{ asset('admin-asset\libs\datatables\dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css">
    {{-- <link href="{{ asset('admin-asset\libs\datatables\scroller.bootstrap4.min.css') }}" rel="stylesheet" type="text/css"> --}}
    {{-- <link href="{{ asset('admin-asset\libs\datatables\dataTables.colVis.css') }}" rel="stylesheet" type="text/css"> --}}


    <!-- Custom box css -->
    <link href="{{ asset('admin-asset\libs\custombox\custombox.min.css') }}" rel="stylesheet">

    <!-- Bootstrap select plugins -->
    <link href="{{ asset('admin-asset\libs\bootstrap-select\bootstrap-select.min.css') }}" rel="stylesheet"
        type="text/css">

    <!-- c3 plugin css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-asset\libs\c3\c3.min.css') }}">

    <!-- App css -->
    <link href="{{ asset('admin-asset\css\bootstrap.min.css') }}" rel="stylesheet" type="text/css"
        id="bootstrap-stylesheet">
    <link href="{{ asset('admin-asset\css\icons.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin-asset\css\app.min.css') }}" rel="stylesheet" type="text/css" id="app-stylesheet">

    {{-- tiny mce --}}
    <script src="https://cdn.tiny.cloud/1/0hbl5cty8j2c3ymygihbedgn19j4tt70fhuo9qy6wnonh71y/tinymce/4/tinymce.min.js"
        referrerpolicy="origin"></script>

    <script>
        var editor_config = {
            path_absolute: "https://alphastock.vn/",
            selector: "textarea",
            height: "350",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist checklist | forecolor backcolor casechange permanentpen formatpainter removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media pageembed template link anchor codesample | a11ycheck ltr rtl | showcomments addcomment',
            relative_urls: false,
            file_browser_callback: function(field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document
                    .getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight || document.documentElement.clientHeight || document
                    .getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file: cmsURL,
                    title: 'Filemanager',
                    width: x * 0.8,
                    height: y * 0.8,
                    resizable: "yes",
                    close_previous: "no"
                });
            }
        };

        tinymce.init(editor_config);

    </script>

    @section('link')

    @show
</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        @include('admin.layouts.topbar')
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu">
            @include('admin.layouts.sidebar')
        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- end container-fluid -->

            </div>
            <!-- end content -->



            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            2021 &copy; Design by <a href="javascript:void(0);">Izisoftware</a>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- Vendor js -->
    <script src="{{ asset('admin-asset\js\vendor.min.js') }}"></script>

    <!-- Bootstrap select plugin -->
    <script src="{{ asset('admin-asset\libs\bootstrap-select\bootstrap-select.min.js') }}"></script>

    <!-- plugins -->
    <script src="{{ asset('admin-asset\libs\c3\c3.min.js') }}"></script>
    <script src="{{ asset('admin-asset\libs\d3\d3.min.js') }}"></script>

    <!-- dashboard init -->
    <script src="{{ asset('admin-asset\js\pages\dashboard.init.js') }}"></script>

    <!-- Modal-Effect -->
    <script src="{{ asset('admin-asset\libs\custombox\custombox.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('admin-asset\js\app.min.js') }}"></script>
    <script>
        $.fn.dataTable.ext.errMode = 'none';

    </script>

    <!-- Datatable plugin js -->
    <script src="{{ asset('admin-asset\libs\datatables\jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin-asset\libs\datatables\dataTables.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('admin-asset\libs\datatables\dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin-asset\libs\datatables\responsive.bootstrap4.min.js') }}"></script>

    {{-- <script src="{{ asset('admin-asset\libs\datatables\dataTables.buttons.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('admin-asset\libs\datatables\buttons.bootstrap4.min.js') }}"></script> --}}

    {{-- <script src="{{ asset('admin-asset\libs\datatables\buttons.html5.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('admin-asset\libs\datatables\buttons.print.min.js') }}"></script> --}}

    {{-- <script src="{{ asset('admin-asset\libs\datatables\dataTables.keyTable.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('admin-asset\libs\datatables\dataTables.fixedHeader.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('admin-asset\libs\datatables\dataTables.scroller.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('admin-asset\libs\datatables\dataTables.colVis.js') }}"></script> --}}
    {{-- <script
        src="{{ asset('admin-asset\libs\datatables/dataTables.fixedColumns.min.js') }}"></script> --}}

    {{-- <script src="{{ asset('admin-asset\libs\jszip\jszip.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('admin-asset\libs\pdfmake\pdfmake.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('admin-asset\libs\pdfmake\vfs_fonts.js') }}"></script> --}}

    {{-- <script src="{{ asset('admin-asset\js\pages\datatables.init.js') }}"></script> --}}

    @section('js')

    @show
</body>

</html>
